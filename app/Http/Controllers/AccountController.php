<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    protected function getUser() 
    {
        return User::with('shippingAddress', 'billingAddress')->find(Auth::id());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    { 
        return view('user.account', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * Show the form for editing logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit', [
            'user' => $this->getUser()
        ]);
    }

    /**
     * Show the form for editing the password of the logged in user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword()
    {
        return view('user.edit_password', [
            'user' => $this->getUser()
        ]);
    }


    /**
     * Get a validator for an incoming update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, User $user)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'min:1', 'max:255'],
            'last_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'shipping_address' => ['required', 'string', 'min:5'],
            'shipping_zipcode' => ['required', 'string', 'min:4'],
            'shipping_city' => ['required', 'string', 'min:2'],
            'billing_address' => ['required', 'string', 'min:5'],
            'billing_zipcode' => ['required', 'string', 'min:4'],
            'billing_city' => ['required', 'string', 'min:2'],
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $user = $this->getUser();

        $this->validator($request->all(), $user)->validate();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phonenr = $request->phonenr;
        $user->shippingAddress->address = $request->shipping_address;
        $user->shippingAddress->zipcode = $request->shipping_zipcode;
        $user->shippingAddress->city = $request->shipping_city;
        $user->billingAddress->address = $request->billing_address;
        $user->billingAddress->zipcode = $request->billing_zipcode;
        $user->billingAddress->city = $request->billing_city;

        if ($user->isDirty()) $user->save();
        if ($user->shippingAddress->isDirty()) $user->shippingAddress->save();
        if ($user->billingAddress->isDirty()) $user->billingAddress->save();

       if ($user->newsletterSubscription()->exists() !== ($request->newsletter ?? false)) {
           if ($user->newsletterSubscription()->exists()) {
            (new NewsletterSubscriptionController)->destroy($user->email);
           }
           else {
            (new NewsletterSubscriptionController)->create($user->email, $user->id);
           }
       }

        return redirect('account')->with('success', 'changes have been saved!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

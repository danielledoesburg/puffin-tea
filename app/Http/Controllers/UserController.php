<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected function getUser($withAddress = true) 
    {
        if ($withAddress) {
            return User::with('shippingAddress', 'billingAddress')->find(Auth::id());
        }

        return Auth::user();
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
    public function password()
    {
        return view('user.password', [
            'user' => $this->getUser(false)
        ]);
    }


    /**
     * Get a validator for an incoming account update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function userValidator(array $data, User $user)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'min:1', 'max:255'],
            'last_name' => ['required', 'string', 'min:1', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')],
            'shipping_address' => ['required', 'string', 'min:5'],
            'shipping_zipcode' => ['required', 'string', 'min:4'],
            'shipping_city' => ['required', 'string', 'min:2'],
            'billing_address' => ['required', 'string', 'min:5'],
            'billing_zipcode' => ['required', 'string', 'min:4'],
            'billing_city' => ['required', 'string', 'min:2'],
        ]);
    }


    /**
     * Update the logged in user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $user = $this->getUser();

        $this->userValidator($request->all(), $user)->validate();

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

        return redirect('account')->with('success', 'Your changes have been saved.');   
    }


    /**
     * Get a validator for an incoming password update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function passwordValidator(array $data)
    {
        return Validator::make($data, [
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Update the logged in user password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->passwordValidator($request->all())->validate();

        $user = User::find(Auth::user()->id);

        if (! Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Wrong password']);
        }

        $user->update(['password'=> Hash::make($request->password)]);

        return redirect('account')->with('success', 'Your password has been saved.');
            
    }

    /**
     * Remove the logged in user from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = $this->getUser();

        Address::whereIn('id', array($user->billingAddress->id, $user->shippingAddress->id))->delete();

        if ($user->newsletterSubscription()->exists()) {
            NewsletterSubscription::where('id',$user->id)->update(['user_id' => 1]);
        }

        $user->update(['email' => $user->email.'_deleted_'.time()]);
        $user->delete();

        return redirect('home')->with('success', 'Your account has been deleted.');   
    }
}

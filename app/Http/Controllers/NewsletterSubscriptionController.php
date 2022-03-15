<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterSubscriptionController extends Controller
{
    use SoftDeletes;


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($email, $userId = null)
    {
        if (!$userId) $userId = User::where('email', $email)->first()->id ?? null;
        
        if ($userId)
        {
            NewsletterSubscription::updateOrCreate(
                ['email' => $email],
                ['user_id' => $userId]
            );
        } else
        {
            NewsletterSubscription::firstOrCreate(
                ['email' => $email]
            );
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
         $messages = array(
            'newsletter_email.unique' => "You're already subscribed!",
        );
    
        return Validator::make($data, [
            'newsletter_email' => ['required', 'string', 'email', 'max:255', 'unique:newsletter_subscriptions,email'],
        ], $messages);
    }

    /**
     * register for newsletter.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->newsletter_email);

        return redirect()->back()->with('newsletter_email', "You're signed up!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserId($email, $userId)
    {
        if ($record = $this->existingSubscription($email))
        {
            $record->user_id=$userId;
            $record->save();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        NewsletterSubscription::where('email', $email)->delete();
    }


    public function existingSubscription($email)
    {
        return NewsletterSubscription::where('email', $email)->first() ?? false;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class NewsletterSubscriptionController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($email, $userId = null)
    {
        if (!$userId) $userId = User::where('email', $email)->first()->id;
        
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function existingSubscription($email)
    {
        return NewsletterSubscription::where('email', $email)->first() ?? false;
    }
}

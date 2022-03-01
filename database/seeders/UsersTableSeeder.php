<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)
        ->create()
        ->each(function($user){
            
            \App\Models\Address::factory(1)->create(['user_id' => $user->id, 'address_type_id' => 1]);

            if (rand(0,1)) \App\Models\Address::factory(1)->create(
                [
                    'user_id' => $user->id, 
                    'address_type_id' => 2
                ]
            );
            
            if (rand(0,1)) \App\Models\NewsletterSubscription::create(
                [
                    'user_id' => $user->id, 
                    'email' => $user->email
                ]
            );
            
            if (rand(0,1)) \App\Models\Message::factory(rand(0,3))->create(
                [
                    'name' => $user->first_name . ' ' . $user->last_name, 
                    'email' => $user->email,
                    'user_id' => $user->id, 
                ]
            );


        });
    }
}

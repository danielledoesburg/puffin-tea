@extends('layouts.app')
@include('navbar')
@section('content')

                 <div class="flex-to-center">
                            <div class="col-lg-6">
                                <div class="p-5 user-cart">
                                <a class="button edit-btn" href="/account/edit">Edit</a>
                                    <div class= "flex-to-center">
                                        <img class="user-image" src="images/userimage.png">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Information</h5>
                                                <p>name: {{ $user->first_name }} {{ $user->last_name }}</br>
                                                email: {{ $user->email }}</br>
                                                phone number: {{ $user->phonenr }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Shipping Adress</h5>
                                            <p>{{ $user->shippingAddress->address}}</br>
                                            {{ $user->shippingAddress->zipcode}} {{ $user->shippingAddress->city}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Billing Adress</h5>
                                            <p>{{ $user->billingAddress->address}}</br>
                                                {{ $user->billingAddress->zipcode}} {{ $user->billingAddress->city}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline flex-to-center">
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <button class="btn btn-light btn-lg purple-btn" type="submit">Log out</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p id="delete-user-account">Delete account</p>
                                </div>
                        </div>

                        <div>subscribed to newsletter: 
                            @if ($user->newsletterSubscription()->exists()) Yes
                            @else No
                            @endif
                        </div>
                        <a class="button" href="/account/password">Edit password</a>
   

@endsection
@include('footer')
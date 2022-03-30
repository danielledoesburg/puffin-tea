@extends('layouts.app')
@include('navbar')
@section('content')
<div class="delete-modal-box" :class="{displaymodalbox: isActive}">
    <div class="box-area">
        <p>Are you sure that you want to delete your account?</p>
        <div class="flex-to-center">
            <form action="/account" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-light btn-lg btn-modal " type="submit">Delete account</button>
            </form>
            <button class="btn btn-light btn-lg btn-modal " v-on:click="isActive=!isActive">Cancel</button>
        </div>
    </div>
</div>
<div class="flex-to-center">
    <div class="col-lg-6" id="move-the-footer">
        <div class="p-5 user-cart">
            <div class="flex-to-center">
                <img class="user-image" src="/images/userimage.png">
            </div>
            <div class="flex-to-left">
                <div class="example spacing edit-padding">
                    <a class="button edit-btn hover hover-1 smaler-font" href="/account/edit">edit</a>
                </div>
                <div class="example spacing">
                    <a class="button edit-btn hover hover-1 smaler-font" href="/account/password">edit password</a>
                </div>
                <div class="example spacing">
                    <a class="button edit-btn hover hover-1 smaler-font" href="/account/orders">orders</a>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6 mb-4 pb-2 ">
                    <div class="form-outline ">
                        <h5>Information</h5>
                        <p class="user-info">name: {{ $user->first_name }} {{ $user->last_name }}</br>
                            email: {{ $user->email }}</br>
                            phone number: {{ $user->phonenr }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 pb-2 ">
                    <div class="form-outline ">
                        <h5>Delivery Adress</h5>
                        <p class="user-info">{{ $user->deliveryAddress->address }}</br>
                            {{ $user->deliveryAddress->zipcode }} {{ $user->deliveryAddress->city }}</p>

                        <p class="user-info"> subscribed to newsletter:
                            @if($user->newsletterSubscription()->exists()) Yes
                            @elseNo
                            @endif
                        </p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 pb-2 user-info">
                    <div class="form-outline ">
                        <h5>Billing Adress</h5>
                        <p class="user-info">{{ $user->billingAddress->address }}</br>
                            {{ $user->billingAddress->zipcode }} {{ $user->billingAddress->city }}</p>
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
        <p id="delete-account" v-on:click="isActive=!isActive">Delete Account</p>

    </div>
</div>





@endsection
@include('footer')

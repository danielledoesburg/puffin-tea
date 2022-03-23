@extends('layouts.app')
@include('navbar')
@section('content')



<div class="delete-modal-box" :class ="{displaymodalbox: isActive}" >
<div class="box-area">
<p>Are you sure that you want to delete your account?</p>
<div class= "flex-to-center">
<form action="/account" method="POST">
@method('delete')
@csrf
<button class="btn btn-light btn-lg btn-modal " type="submit">Delete account</button>
</form>
<button class="btn btn-light btn-lg btn-modal " v-on:click="isActive=!isActive">Cancel</button>
</div>
</div>
</div>
    <form action="/account/" method="POST">
    @method('put')
    @csrf
                 <div class="flex-to-center">
                            <div class="col-lg-6"  id="move-the-footer">
                                <div class="p-5 user-cart">
                                <div class= "flex-to-center">
                                        <img class="user-image" src="/images/userimage.png">
                                    </div>
                                <div class ="flex-to-left">
                                    <div class="example spacing edit-padding">
                                    <a class="button edit-btn hover hover-1 smaler-font" href="/account/">my account</a> 
                                    </div>
                                </div>

                                   
                                    

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Information</h5>
                                            <input 
                                                name="first_name"
                                                type="text" 
                                                id="first_name" 
                                                value="{{ old('first_name') ?? $user->first_name }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="first_name">First name</label>
                                            <input 
                                                    name="last_name"
                                                    type="text" 
                                                    id="last_name" 
                                                    value="{{ old('last_name') ?? $user->last_name }}"
                                                    class="form-control form-control-lg"
                                                    required />
                                                <label class="form-label" for="last_name">Last name</label>
                                                <input 
                                                        name="email"
                                                        type="text" 
                                                        id="email" 
                                                        value="{{ old('email') ?? $user->email }}"
                                                        class="form-control form-control-lg"
                                                        required />
                                                    <label class="form-label" for="email">Email</label>
                                                    <input 
                                                            name="phonenr"
                                                            type="text" 
                                                            id="phonenr" 
                                                            value="{{ old('phonenr') ?? $user->phonenr }}"
                                                            class="form-control form-control-lg"
                                                            required />
                                                        <label class="form-label" for="phonenr">Phonenr</label>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Delivery Adress</h5>
                                            <input 
                                                name="delivery_address"
                                                type="text" 
                                                id="delivery_address" 
                                                value="{{ old('delivery_address') ?? $user->deliveryAddress->address }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="delivery_address">address</label>
                                            <input 
                                                name="delivery_zipcode"
                                                type="text" 
                                                id="delivery_zipcode" 
                                                value="{{ old('delivery_zipcode') ?? $user->deliveryAddress->zipcode }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="delivery_zipcode">zipcode</label>
                                            <input 
                                                name="delivery_city"
                                                type="text" 
                                                id="delivery_city" 
                                                value="{{ old('delivery_city') ?? $user->deliveryAddress->city }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="delivery_city">city</label>


                                        </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                            <h5>Billing Adress</h5>
                                            <input 
                                                name="billing_address"
                                                type="text" 
                                                id="billing_address" 
                                                value="{{ old('billing_address') ?? $user->billingAddress->address }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="billing_address">address</label>
                                            <input 
                                                name="billing_zipcode"
                                                type="text" 
                                                id="billing_zipcode" 
                                                value="{{ old('billing_zipcode') ?? $user->billingAddress->zipcode }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="billing_zipcode">zipcode</label>
                                            <input 
                                                name="billing_city"
                                                type="text" 
                                                id="billing_city" 
                                                value="{{ old('billing_city') ?? $user->billingAddress->city }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="billing_city">city</label>


                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline flex-to-center">
                                        <input
                                                name="newsletter"
                                                class="form-check-input me-3 color-checkbox-purple"
                                                type="checkbox"
                                                value="true"
                                                id="newsletter"
                                                @checked( old('newsletter', $user->newsletterSubscription()->exists()) ) />
                                            <label class="form-check-label text-white" for="newsletter">
                                                Subscribed to newsletter </label>
                                        </div>
                                            <div class="form-outline flex-to-center">

                                            
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <button type="submit" class="btn btn-light btn-lg purple-btn" data-mdb-ripple-color="dark">Save</button>
                                            </form>
                                            </div>
                    
                                        </div>
                                    </div>
                                    </div>
                                    <p id="delete-account" v-on:click="isActive=!isActive">Delete Account</p>

                                </div>
                        </div>
    </form>


@endsection
@include('footer')
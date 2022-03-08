@extends('layouts.app')
@include('navbar')
@section('content')
 
<hr>
<section class="h-100 h-custom gradient-custom-2">

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <h4>Register</h4>
        <form method="POST" action="/register">
            @csrf
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5">General Infomation</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('first_name')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input 
                                                    name="first_tname"
                                                    type="text" 
                                                    id="first_name" 
                                                    value="{{ old('first_name') }}"
                                                    class="form-control form-control-lg"
                                                    required />
                                                <label class="form-label" for="first_name">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('last_name')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input
                                                    name="last_name"
                                                    type="text" 
                                                    id="last_name" 
                                                    value="{{ old('last_name') }}"
                                                    class="form-control form-control-lg" 
                                                    required />
                                                <label class="form-label" for="last_name">Last name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            @error('password')
                                                <p>{{$message}}</p>
                                            @enderror
                                            <input 
                                                name="password"    
                                                type="password" 
                                                id="password" 
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            @error('password_confirmation')
                                                <p>{{$message}}</p>
                                            @enderror
                                            <input 
                                                name="password_confirmation"
                                                type="password" 
                                                id="password_confirmation" 
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 bg-indigo text-white">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5">Delivery and Contact Details</h3>
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline form-white">
                                            @error('adress')
                                                <p>{{$message}}</p>
                                            @enderror
                                            <input 
                                                name="adress"
                                                type="text" 
                                                id="adress" 
                                                value="{{ old('adress') }}"
                                                class="form-control form-control-lg"
                                                required />
                                            <label class="form-label" for="adress">Street + Nr</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                @error('zipcode')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input 
                                                    name="zipcode"
                                                    type="text" 
                                                    id="zipcode" 
                                                    value="{{ old('zipcode') }}"
                                                    class="form-control form-control-lg"
                                                    required />
                                                <label class="form-label" for="zipcode">Zip Code</label>
                                            </div>
                                        </div>
                                        <div class="col-md-7 mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                @error('city')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input 
                                                name="city"
                                                type="text" 
                                                id="city" 
                                                value="{{ old('city') }}"
                                                class="form-control form-control-lg"
                                                required/>
                                                <label class="form-label" for="city">Place</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('city')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input
                                                    name="email"
                                                    type="email" 
                                                    id="email" 
                                                    value="{{ old('city') }}"
                                                    class="form-control form-control-lg"
                                                    required/>
                                                <label class="form-label" for="email">E-mail</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                @error('city')
                                                    <p>{{$message}}</p>
                                                @enderror
                                                <input
                                                    name="phonenr"
                                                    type="text" 
                                                    id="phonenr" 
                                                    value="{{ old('phonenr') }}"
                                                    class="form-control form-control-lg"                                                    
                                                    required />
                                                <label class="form-label" for="phonenr">Phone number</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                        <input
                                            name="newsletter"
                                            class="form-check-input me-3"
                                            type="checkbox"
                                            value="confirmed"
                                            id="newsletter"
                                            />
                                        <label class="form-check-label text-white" for="newsletter">
                                            Let's keep in touch. Sign up for our Newsletter to be up to date with our new arrivals.
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</section>
@endsection
@include('footer')


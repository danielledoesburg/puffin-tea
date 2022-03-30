@extends('layouts.app')
@include('navbar')
@section('content')
<div id="full-page">
    <div class="login-page">
    <div class="form-login">
        @if (session()->has('message'))
            <p>{{session()->get('message')}}</p>
        @else
            <p>Login</p>
        @endif
        <form class="login-form" method="POST" action="login">
        @csrf
        <input type="text" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder=""/>
        <label class="form-label" for="email">e-mail</label>
        <input type="password" class="form-control form-control-lg" name="password" placeholder=""/>
        <label class="form-label" for="password">password</label>
        @error('email')
            <p id="smaller-font-login">{{$message}}</p>
        @enderror
        
        <div class="row mb-3">
          <div class="col-md-6">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="remember-me" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
          </div>
      </div>

        <div class="message">Not registered? <a href="register">Create an account</a></div>
        <div id="button-to-the-right">
        <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Login</button>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection
@include('footer')
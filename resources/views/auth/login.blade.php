@extends('layouts.app')
@include('navbar')
@section('content')
<div class="login-page">
  <div class="form-login">
    <form class="login-form" method="POST" action="login">
    @csrf
      <input type="text" class="form-control form-control-lg" name="email" placeholder="email"/>
      <input type="password" name="password" placeholder="password"/>
      <div class="row mb-3">
          <div class="col-md-6">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
          </div>
      </div>
      <button type="submit">login</button>
      </form>
      <p class="message">Not registered? <a href="register">Create an account</a></p>
  </div>
</div>
@endsection
@include('footer')

@extends('layouts.app')
@include('navbar')
@section('content')
<div class="login-page">
  <div class="form-login">
    <form class="login-form">
      <input type="text" class="form-control form-control-lg" placeholder="username"/>
      <input type="password"  placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
@endsection
@include('footer')

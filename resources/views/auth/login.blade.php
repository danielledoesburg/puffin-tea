@extends('layouts.app')
@include('navbar')
@section('content')
<div class="login-page">
  <div class="form-login">
    <form class="login-form" method="POST" action="login">
    @csrf
      <input type="text" class="form-control form-control-lg" name="email" placeholder="email"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a href="register">Create an account</a></p>
    </form>
  </div>
</div>
@endsection
@include('footer')

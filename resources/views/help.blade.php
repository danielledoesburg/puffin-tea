@extends('layouts.app')
@include('navbar')
@section('content')

@if (session()->has('success'))
    <div>
        <p class="succsess-message">{{session()->get('success')}}</p>
    </div>
@endif

<h2 id="fav-faq">Frequently asked questions:</h2>
<div class="accordion-flex">

<div>
        
@foreach ($faq as $q)
<div id="accordion-margin">
<div class="accordion-item questions-accordion width-accordion-button">
    <h2 class="accordion-header width-accordion-button " id="headingOne">
      <button class="accordion-button  width-accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#question{{$q->id}}" aria-expanded="true" aria-controls="collapseOne">
    <li>{{ rtrim($q->question, '.') }}?</li>
      </button>
    </h2>
    <div id="question{{$q->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      {{ $q->answer }}
    
      </div>
    </div>
</div>
</div>
@endforeach
</div>
</div>

<div class="help-form">
<h2>Send us a message!</h2>
<form action="/help" method="POST">
    @csrf
    
    <input 
            name="name"
            type="text" 
            value="{{ old('name') ?? Auth::user()->name ?? '' }}"
            class="form-control form-control-lg name-help"
            required />
    <label class="form-label" for="name">name</label>
    @error('name')
        <p>{{$message}}</p>
    @enderror
    
    
    <input 
            name="email"
            type="text" 
            value="{{ old('email') ?? Auth::user()->email ?? '' }}"
            class="form-control form-control-lg email-help"
            required />
    <label class="form-label" for="email">e-mail</label>
    @error('email')
        <p>{{$message}}</p>
    @enderror
    <textarea name="message_text" cols="40" rows="5" class="form-control form-control-lg">{{ old('message_text') }}</textarea>
    @error('message_text')
        <p>{{$message}}</p>
    @enderror
    <div class="flex-to-right" id="button-sumbit-help">
    <button class="btn btn-light btn-lg" type="submit">submit</button>
    </div>
</form>
</div>

@endsection
@include('footer')
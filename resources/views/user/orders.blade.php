@extends('layouts.app')
@include('navbar')
@section('content')




<div class="accordion" id="accordionExample">
@foreach ($orders as $order)
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order{{$order->id}}" aria-expanded="true" aria-controls="collapseOne">
      <li><span class="boldorder">ordernr: </span>{{ $order->ordernr }}, </li> <li> <span class="boldorder">order date: </span> {{ $order->created_at }} </li>
      </button>
    </h2>
    <div id="order{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <li><span class="boldorder">total:</span>  {{ $order->total }} 	&#8364;</li>
        <li><span class="boldorder">shippingcosts:</span> {{ $order->shipping_rate }} 	&#8364;</li>
        <span class="boldorder">delivery address:</span><br>
        {{ $order->delivery_address }} <br>
        {{ $order->delivery_zipcode }} {{ $order->delivery_city }}<br>
        <span class= "bold order">billing address:</span>
        {{ $order->billing_address }} <br>
        {{ $order->billing_zipcode }} {{ $order->billing_city }}<br>
        
       <span class="boldorder"> Products:</span>
        @foreach ($order->orderDetails as $orderDetails)
            <li>{{ $orderDetails->quantity }}x {{ $orderDetails->unit_amount }} {{ $orderDetails->unit }} of <strong>{{ $orderDetails->product }}</strong> for &euro;{{ $orderDetails->price}} </li>
        @endforeach
        
      </div>
    </div>
  </div>

  @endforeach
</div>



@endsection
@include('footer')
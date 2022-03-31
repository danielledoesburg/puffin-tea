
@extends('layouts.app')

@include('navbar')
@section('content')
    <product-details
    :product="{{ $product }}"
    @add-to-cart="updateCart"
    >
    </product-details>

@endsection
@include('footer')
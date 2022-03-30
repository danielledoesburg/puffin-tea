
@extends('layouts.app')

@include('navbar')
@section('content')
    <product-details
    :product="{{ $product }}"
    >
    </product-details>

@endsection
@include('footer')
@extends('layouts.app')

@include('navbar')
@section('content')
<hr>

        <products 
            @add-to-cart="updateCart"
            :products="{{ $products }}"
            >
        </products>


@endsection
@include('footer')
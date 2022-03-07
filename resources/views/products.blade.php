@extends('layouts.app')

@include('navbar')
@section('content')
<hr>

        <products 
            :products="products">
        </products>


@endsection
@include('footer')
 
@extends('layouts.app')

@include('navbar')
@section('content')


    <header-carousel></header-carousel>
    <h1>Best Sellers</h1>
    <bestsellers
        :products="{{ $bestsellers }}">
    </bestsellers>

    <h1>Sale</h1>
    <sale
        :products="{{ $saleProducts }}">>
    </sale>




@endsection
@include('footer')
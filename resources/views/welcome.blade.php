 
@extends('layouts.app')

@include('navbar')
@section('content')


    <header-carousel></header-carousel>
    <div id="break"></div>
    <bestsellers
        :products="{{ $bestsellers }}">
    </bestsellers>
    <div class="custom-shape-divider-top-1646675180">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
    </div>
    <h1>Sale</h1>
    <sale
        :products="{{ $saleProducts }}">>
    </sale>
    <div class="example spacing to-center no-padding">
        <a class="nav-link hover hover-1 first-link font-size-big">more &#x2192</a>
    </div>



@endsection
@include('footer')
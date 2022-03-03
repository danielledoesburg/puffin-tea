@extends('layouts.app')



@section('content')
    @foreach ($bestSellers as $product)
        <ul>
            <li>{{ $product->name }}</li>
            <li>description: {{ $product->description }}</li>
            <li>category: {{ $product->category->name }}</li>
            <li>type: {{ $product->type }}</li>
            <li>price: {{ $product->price }}</li>
            @isset($product->onSale->price)
                <li>sale price: {{ $product->onSale->price}}</li>
            @endisset
            <li>{{ $product->vat->percentage }} percent vat</li>
            <li>{{ $product->unit_amount }} {{ $product->unit->name }}</li>
            @foreach ($product->images as $image)
                <img src="/images/{{ $image->filename}}" style="height:100px;">
            @endforeach
        </ul>    
    @endforeach
@endsection
 
@extends('layouts.app')

@include('navbar')
@section('content')

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            
            <img src="images/macha.jpg"  class="d-block w-100" alt="...">
            <div class="absolute-div">
              <div class="carousel-caption">
                  <h3>Lorem ipsum, dolor sit amet consectetur...</h3>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/kettle.jpg" class="d-block w-100" alt="...">
            <div class="absolute-div">
              <div class="carousel-caption kettle-background">
                  <h3 class="kettle-background">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</h3>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/field.jpg" class="d-block w-100" alt="...">
            <div class="absolute-div">
              <div class="carousel-caption ">
                  <h3>Lorem ipsum, dolor sit amet</h3>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <h1>Best Sellers</h1>

    <div class="flex-wrap">
    <example-component></example-component>

    <h1>Sale</h1>


   <div class="to-center">
        <div class="responsive">
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg">
                  <p>PRICE&TITLE</p>
            </div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg">
                  <p>PRICE&TITLE</p>
            </div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg">
                  <p>PRICE&TITLE</p>
            </div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
        </div>
    </div>
   

    @endsection
    @include('footer')
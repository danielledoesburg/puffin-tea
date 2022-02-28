 
@extends('layouts.app')

@section('content')


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <div class="container-fluid">
            <a class="navbar-brand" href="x">
                <img id="logo" src="https://i.ibb.co/jDN8ddD/puffin-tea-logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div class= "example spacing">
                        <a class="nav-link hover hover-1 first-link" aria-current="page" href="#">All Teas</a>
                    </div>
                    <div class= "example spacing">
                        <a class="nav-link hover hover-1" href="#">Help Center</a>
                    </div>
                </div>
            </div>
        </div>
        <div class= " navbar-brand display-in-row">
            <div class= "example spacing link-right">
                <a class="nav-link hover hover-1" href="#">Log in</a>
            </div>
            <?xml version="1.0" encoding="UTF-8" standalone="no"?> 
            <svg id= "basket-size" class="link-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                <g id="Layer_9" data-name="Layer 9">
                    <path d="M59.4,53.82,53.51,24.37a6,6,0,0,0-5.88-4.83H45V16a13,13,0,0,0-26,0v3.54H16.37a6,6,0,0,0-5.88,4.83L4.6,53.82A6,6,0,0,0,10.48,61h43a6,6,0,0,0,5.88-7.18ZM21,16a11,11,0,0,1,22,0v3.54H21ZM56.61,57.54A4,4,0,0,1,53.52,59h-43a4,4,0,0,1-3.92-4.78l5.89-29.46a4,4,0,0,1,3.92-3.22H19v5.71a1,1,0,0,0,2,0V21.54H43v5.71a1,1,0,0,0,2,0V21.54h2.63a4,4,0,0,1,3.92,3.22l5.89,29.46A4,4,0,0,1,56.61,57.54Z"/>
                </g>
            </svg>
        </div>
    </nav>

      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            
            <img src="https://i.ibb.co/NCXZSfq/macha.jpg"  class="d-block w-100" alt="...">
            <div class="absolute-div">
              <div class="carousel-caption">
                  <h3>Lorem ipsum, dolor sit amet consectetur...</h3>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.ibb.co/WyF7fb1/kettle.jpg" class="d-block w-100" alt="...">
            <div class="absolute-div">
              <div class="carousel-caption kettle-background">
                  <h3 class="kettle-background">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</h3>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.ibb.co/0KMTdfp/field.jpg" class="d-block w-100" alt="...">
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

    </div>
    <div class="grid-wrapper">
      <div class="grid-object">
        <img class= "resize-image" src="https://i.ibb.co/nwJxTmz/tea-example.jpg">
        <p>bhjbsadhashdgjhasd</p>
        </div>
        <div class="grid-object">
          <img class= "resize-image" src="https://i.ibb.co/nwJxTmz/tea-example.jpg">
          <p>bhjbsadhashdgjhasd</p>
        </div>
        <div class="grid-object">
          <img class= "resize-image" src="https://i.ibb.co/nwJxTmz/tea-example.jpg">
          <p>bhjbsadhashdgjhasd</p>
        </div>
    </div>

    <h1>Sale</h1>


   <div class="to-center">
        <div class="responsive">
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
            <div> <img class= "small-image" src="https://i.ibb.co/6NT2jxd/pexels-olenka-sergienko-3323682.jpg"></div>
        </div>
    </div>
   

    <footer>

    <div class="newsletter">
        <p>sign in in our newsletter </p>
        
        <form class="form">
            <p>e-mail:</p> <input>
        </form>
        
    </div>
        <p>puffin tea 2022</p>
    </footer>


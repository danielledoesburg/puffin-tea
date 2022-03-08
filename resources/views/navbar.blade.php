
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img id="logo" src="https://i.ibb.co/jDN8ddD/puffin-tea-logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <div class= "example spacing">
                    <a class="nav-link hover hover-1 first-link" aria-current="page" href="/products">All Teas</a>
                </div>
                <div class= "example spacing">
                    <a class="nav-link hover hover-1" href="#">Help Center</a>
                </div>
            </div>
        </div>
    </div>
    <div class= " navbar-brand display-in-row">
        <div class= "example spacing link-right">
            <a class="nav-link hover hover-1" href="/login">Log in</a>
        </div>
        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi  link-right position-circle" viewBox="0 0 16 16">
        <circle cx="8" cy="8" r="8"/>
        </svg>
        <svg id= "basket-size" class="link-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
            <g id="Layer_9" data-name="Layer 9">
                <path d="M59.4,53.82,53.51,24.37a6,6,0,0,0-5.88-4.83H45V16a13,13,0,0,0-26,0v3.54H16.37a6,6,0,0,0-5.88,4.83L4.6,53.82A6,6,0,0,0,10.48,61h43a6,6,0,0,0,5.88-7.18ZM21,16a11,11,0,0,1,22,0v3.54H21ZM56.61,57.54A4,4,0,0,1,53.52,59h-43a4,4,0,0,1-3.92-4.78l5.89-29.46a4,4,0,0,1,3.92-3.22H19v5.71a1,1,0,0,0,2,0V21.54H43v5.71a1,1,0,0,0,2,0V21.54h2.63a4,4,0,0,1,3.92,3.22l5.89,29.46A4,4,0,0,1,56.61,57.54Z"/>
            </g>
        </svg>
    </div>
</nav>
<div class="position-right-flex">
    <div class="cart">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <h3>Cart</h3>
        <hr>
        <div class="row">
            <div class="column">
                <img class=tinypic src="/images/orteajasmine1.jpg">
            </div>
            <div class="column">
                <div id="cartitems-margin-right">
                    <p>fgjsdgfjhgsdjfhg</p>
                    <p>Price</p>
                    <div class="quantity">
                        <a href="#" class="quantity__minus"><span>-</span></a>
                        <input name="quantity" type="text" class="quantity__input" value="1">
                        <a href="#" class="quantity__plus"><span>+</span></a>
                    </div>
                </div>
            </div>
        </div>
        <h6>total price</h6>
        <hr>
        <div class="example spacing to-center no-padding check-out">
            <p class="hover hover-1 first-link ">check out</p>
        </div>
    </div>
</div>
    @endsection

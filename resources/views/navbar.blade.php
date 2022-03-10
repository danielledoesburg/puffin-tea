
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
        <div class="link-right" @click="isActive=!isActive">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-handbag link-right position-the-bag" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
</svg>
        </div>
    </div>
</nav>
<div class="position-right-flex">
    <div class="cart" :class="{toggleCart:!isActive}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" id="change-the-position" @click="isActive=!isActive" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
        <h3>Cart</h3>
        <hr>
        <div class="row" id="row-width">
            <div class="column">
                <img class=tinypic src="/images/orteajasmine1.jpg">
            </div>
            <div class="column" id="display-basket-description">
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

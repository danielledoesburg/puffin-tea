
@section('navbar')
    <navbar-and-cart
        @cartplus="plusToCart" 
        @delete-from-cart="deleteFromCart"
        @cart-minus="decrement"

        :products="products"
        :cart="cart"
        :cart_no_repetition="cart_no_repetition"
        :products_for_cart="products_for_cart"
        :logged_in="{{ json_encode(auth()->check()) }}">
    </navbar-and-cart>
@endsection

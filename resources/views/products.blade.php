@extends('layouts.app')

@include('navbar')
@section('content')
<hr>
<div class="position-categories">
    <div class="categories">
        <h4>Categories</h4>
        <ul>
            <li>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Green Tea 
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Black tea
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        White Tea
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Oolong
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                       Pu Erh
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Matcha
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Rooibos
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                       Herbal
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                       Gifts
                    </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Accesories
                    </label>
                </div>
            </li>
        </ul>
        <hr>
        <ul>
        <li>        
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                <label class="form-check-label" for="flexCheckIndeterminate">
                    Leaf
                </label>
                </div>
            </li>
            <li>        
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        Bags
                    </label>
                </div>
            </li>
        </ul>
    </div>
    <div class="right-side">
        <h5>Products</h5>
        <products 
            :products="products">
        </products>
    </div>
</div>

@endsection
@include('footer')
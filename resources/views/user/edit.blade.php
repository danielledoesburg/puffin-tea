<form action="/account" method="POST">
    @csrf
    <h3 class="fw-normal mb-5">General Infomation</h3>

    <div>
        <input 
            name="first_name"
            type="text" 
            id="first_name" 
            value="{{ old('first_name') ?? $user->first_name }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="first_name">First name</label>
    </div>
    <div>
        <input 
            name="last_name"
            type="text" 
            id="last_name" 
            value="{{ old('last_name') ?? $user->last_name }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="last_name">Last name</label>
    </div>
    <div>
        <input 
            name="email"
            type="text" 
            id="email" 
            value="{{ old('email') ?? $user->email }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="email">Email</label>
    </div>
    <div>
        <input 
            name="phonenr"
            type="text" 
            id="phonenr" 
            value="{{ old('phonenr') ?? $user->phonenr }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="phonenr">Phonenr</label>
    </div>

    <h3 class="fw-normal mb-5">Shipping address</h3>

    <div>
        <input 
            name="shipping_address"
            type="text" 
            id="shipping_address" 
            value="{{ old('shipping_address') ?? $user->shippingAddress->address }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="shipping_address">address</label>
    </div>
    <div>
        <input 
            name="shipping_zipcode"
            type="text" 
            id="shipping_zipcode" 
            value="{{ old('shipping_zipcode') ?? $user->shippingAddress->zipcode }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="shipping_zipcode">zipcode</label>
    </div>
    <div>
        <input 
            name="shipping_city"
            type="text" 
            id="shipping_city" 
            value="{{ old('shipping_city') ?? $user->shippingAddress->city }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="shipping_city">city</label>
    </div>

    <h3 class="fw-normal mb-5">Billing address</h3>

    <div>
        <input 
            name="billing_address"
            type="text" 
            id="billing_address" 
            value="{{ old('billing_address') ?? $user->billingAddress->address }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="billing_address">address</label>
    </div>
    <div>
        <input 
            name="billing_zipcode"
            type="text" 
            id="billing_zipcode" 
            value="{{ old('billing_zipcode') ?? $user->billingAddress->zipcode }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="billing_zipcode">zipcode</label>
    </div>
    <div>
        <input 
            name="billing_city"
            type="text" 
            id="billing_city" 
            value="{{ old('billing_city') ?? $user->billingAddress->city }}"
            class="form-control form-control-lg"
            required />
        <label class="form-label" for="billing_city">city</label>
    </div>


    <div class="form-check d-flex justify-content-start mb-4 pb-3">
        <input
            name="newsletter"
            class="form-check-input me-3"
            type="checkbox"
            value="true"
            id="newsletter"
            @checked( old('newsletter', $user->newsletterSubscription()->exists()) ) />
        <label class="form-check-label text-white" for="newsletter">
            Subscribed to newsletter
        </label>
    </div>


                                   
    <button type="submit" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Save</button>
</form>

<form action="account{{Auth::user()->id}}" method="DELETE">
@csrf
<button type="submit">Delete account</button>
</form>
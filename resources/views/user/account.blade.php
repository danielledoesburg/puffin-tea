<h4>information</h4>

<ul>
    <li>name: {{ $user->first_name }} {{ $user->last_name }}</li>
    <li>email: {{ $user->email }}</li>
    <li>phone number: {{ $user->phonenr }}</li>
    <li>subscribed to newsletter: 
        @if ($user->newsletterSubscription()->exists()) Yes
        @else No
        @endif
    </li>
</ul>

<h4>shipping address</h4>
<p>{{ $user->shippingAddress->address}}</br>
{{ $user->shippingAddress->zipcode}} {{ $user->shippingAddress->city}}</p>

<h4>billing address</h4>
<p>{{ $user->billingAddress->address}}</br>
{{ $user->billingAddress->zipcode}} {{ $user->billingAddress->city}}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Log out</button>
</form>

<a class="button" href="/account/edit">Edit</a>
<a class="button" href="/account/password">Edit password</a>
<div>
    @foreach ($orders as $order)
        <li>ordernr: {{ $order->ordernr }}</li>
        <li>order date: {{ $order->created_at }} </li>
        <li>total:  {{ $order->total }}</li>
        <li>shippingcosts: {{ $order->shipping_costs }}</li>
        <h4>delivery address:</h4>
        {{ $order->delivery_address }} <br>
        {{ $order->delivery_zipcode }} {{ $order->delivery_city }}<br>
        <h4>billing address:</h4>
        {{ $order->billing_address }} <br>
        {{ $order->billing_zipcode }} {{ $order->billing_city }}<br>
        
        <h4>Products</h4>
        @foreach ($order->orderDetails as $orderDetails)
            <li>{{ $orderDetails->quantity }}x {{ $orderDetails->unit_amount }} {{ $orderDetails->unit }} of <strong>{{ $orderDetails->product }}</strong> for &euro;{{ $orderDetails->price}} </li>
        @endforeach
        <hr>
    @endforeach
</div>
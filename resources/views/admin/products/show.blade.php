<div>
    <strong>{{ $product->name }}</strong>
    <ul>
        <li>{{ $product->slug }}</li>
        <li>{{ $product->description }}</li>
        <li>{{ $product->category->name }}</li>
        <li>{{ $product->type }}</li>
        <li>{{ $product->price }}</li>
        @if ($product->onSale)
            <li>{{ $product->onSale->price }}</li>
            <li>{{ $product->onSale->date_from }} - {{ $product->onSale->date_till }}</li>
        @endif
       
        <li>{{ $product->vat->name }} - {{ $product->vat->percentage }}%</li>
        <li>{{ $product->unit_amount }} - {{ $product->unit->name }}</li>
    </ul>

    pending on sale prices
    <table>
        <tr>
            <th>Date from</th>
            <th>Date till</th>
            <th>Price</th>
        </tr>
        
        @foreach ($product->pendingOnSales as $sale)
        <tr>
            <td>{{ $sale->date_from }}</td>
            <td>{{ $sale->date_till }}</td>
            <td>{{ $sale->price }}</td>
        </tr>
        @endforeach
    </table>
</div>

<a href="/admin/products/{{ $product->id }}/edit"><button>Edit</button></a>

<form action="/admin/products/{{ $product->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
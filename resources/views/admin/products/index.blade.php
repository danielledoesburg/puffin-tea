<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<a href="/admin/products"><h1>Products</h1></a>

<form action="#" method="GET">
    <input type="text" name="search" placeholder="find product">
    <label for="exact">Exact search</label>
    <input type="checkbox" name="exact" id="exact" value="true">

</form>

@if ($products->total())
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Category</th>
            <th>Type</th>
            <th>Price</th>
            <th>Current sale price</th>
            <th>Current sale period</th>
            <th>Vat</th>
            <th>Unit amount</th>
            <th>Unit</th>
            <th>Show</th>
            <th>Edit</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ Str::limit($product->description, 25, '...') }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @if($product->onSale) 
                    {{ $product->onSale->price }}
                @endif
            </td>
            <td>
                @if($product->onSale)
                    {{ $product->onSale->date_from }} - {{ $product->onSale->date_till ?? 'unknown' }}
                @endif
            </td>
            <td>{{ $product->vat->name }}</td>
            <td>{{ $product->unit_amount }}</td>
            <td>{{ $product->unit->name }}</td>
            <td><a href="/admin/products/{{ $product->id }}"><button>Show</button></a></td>
            <td><a href="/admin/products/{{ $product->id }}/edit"><button>Edit</button></a></td>
            <td>
                <form action="/admin/products/{{ $product->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    <div>{{ $products->links()}}</div>

</div>
@else 
    <p>no products found</p>
@endif

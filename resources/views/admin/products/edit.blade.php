<form action="/admin/products/{{ $product->id }}" method="POST">
    @method('PATCH')
    @csrf
    
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ?? $product->name }}">
    </div>
    @error('name')
        <p>{{$message}}</p>
    @enderror
    
    <div>
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug') ?? $product->slug }}">
    </div>
    @error('slug')
        <p>{{$message}}</p>
    @enderror
    
    <div>
        <label for="description">Description</label>
        <textarea cols="40" rows="10" name="description" id="description">{{ old('description') ?? $product->description }}</textarea>
    </div>
    @error('message')
        <p>{{$message}}</p>
    @enderror

    <div>
        <label for="category">Category</label>
        <select name="category" required id="category">
            <option value="0" disabled selected>select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id  ? 'selected' : ''}}>{{ $category->name}}</option>
            @endforeach
        </select>
    </div>
    @error('category')
        <p>{{$message}}</p>
    @enderror

    <div>
        <label for="type">Type</label>
        <select name="type" required id="type">
            <option value="0" disabled selected>select type</option>
            @foreach($types as $type)
                <option value="{{ $type }}" {{ $type == $product->type  ? 'selected' : ''}}>{{ $type }}</option>
            @endforeach
        </select>
    </div>
    @error('type')
        <p>{{$message}}</p>
    @enderror
    
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ old('price') ?? $product->price }}">
    </div>
    @error('price')
        <p>{{$message}}</p>
    @enderror

    <div>
        <label for="vat">VAT</label>
        <select name="vat" required id="vat">
            <option value="0" disabled selected>select vat</option>
            @foreach($vats as $vat)
                <option value="{{ $vat->id }}" {{ $vat->id == $product->vat_id  ? 'selected' : ''}}>{{ $vat->name }} - {{ $vat->percentage}}%</option>
            @endforeach
        </select>
    </div>
    @error('vat')
        <p>{{$message}}</p>
    @enderror


    <div>
        <label for="unit_amount">Units</label>
        <input type="text" name="unit_amount" id="unit_amount" value="{{ old('unit_amount') ?? $product->unit_amount }}">
        <select name="unit" required id="unit">
            <option value="0" disabled selected>select unit</option>
            @foreach($units as $unit)
                <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id  ? 'selected' : ''}}>{{ $unit->name }}</option>
            @endforeach
        </select>
    </div>
    @error('unit_amount')
        <p>{{$message}}</p>
    @enderror

    <h4>pending sale prices</h4>
    <table>
        <tr>
            <th>Date from</th>
            <th>Date till</th>
            <th>Price</th>
        </tr>
        @foreach ($product->pendingOnSales as $sale)
        <tr>
        <td>
            <input type="date" name="sale_date_from[{{ $sale->id}}]" id="sale_date_from[{{ $sale->id}}]" value="{{ old('sale_date_from') ? old('sale_date_from.'.$sale->id) : date('Y-m-d', strtotime($sale->date_from)) }}">
            @error('sale_date_from.'.$sale->id)
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </td>
        <td>
            <input type="date" name="sale_date_till[{{ $sale->id}}]" id="sale_date_till[{{ $sale->id}}]" value="{{ old('sale_date_till.'.$sale->id) ?? ( $sale->date_till ? date('Y-m-d', strtotime($sale->date_till)) : '')}}">
            @error('sale_date_till.'.$sale->id)
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </td>
        <td>
            <input type="text" name="sale_price[{{ $sale->id}}]" id="sale_price[{{ $sale->id}}]" value="{{ old('sale_price') ? old('sale_price.'.$sale->id) : $sale->price }}">
            @error('sale_price.'.$sale->id)
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </td>
        </tr>
        @endforeach
    </table>

    <h4>images</h4>

    

    <button type="submit">submit changes</button>
</form>
<div>
    <a href="/admin/products/{{ $product->id }}">
        <button>Cancel</button>
    </a>
</div>
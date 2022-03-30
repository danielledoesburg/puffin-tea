<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\OnSale;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginateNr = 15;

        if ($request->search) {            
            $products = Product::search($request->search, $request->exact)->paginate($paginateNr);
        } else {
            $products = Product::paginate($paginateNr);
        }

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Validate incoming message update data
     * 
     * @param  array $data
     * @param  int $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator ($data, $id)
    {  dd(gettype($data['sale_date_from']['1']));
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'slug' => ['required', 'string', 'min:1', 'max:255', Rule::unique('products')->ignore($id),],
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'category' => ['required', 'numeric', 'exists:categories,id'],
            'type' => ['required', Rule::in(Product::$typeEnum)],
            'price' => ['required', 'numeric'],
            'vat' => ['required', 'numeric', 'exists:vat,id'],
            'unit_amount' => ['required', 'numeric'],
            'unit' => ['required', 'numeric', 'exists:units,id'],
            'sale_date_from.*' => ['required', 'date'],
            'sale_date_till.*' => ['nullable', 'date', 'after_or_equal:sale_date_from.*'],
            'sale_price.*' => ['required', 'numeric', 'lt:price']
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        return view('admin.products.show', [
            'product' => Product::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all(),
            'types' => Product::$typeEnum,
            'vats' => Vat::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        $this->validator($request->all(), $id)->validate();

        // $message = Message::find($id);
        // $message->name = $request->name;
        // $message->email = $request->email;
        // $message->message = $request->message;

        // if ($message->isDirty()) $message->save();

        // return redirect('/admin/messages/'.$id)->with('success', 'changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

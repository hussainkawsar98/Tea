<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Productname, Product, Quantity, Category, Purchase};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $productnames = Productname::All();
        $quantities = Quantity::All();
        return view('admin.product.create', compact('productnames', 'quantities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = Product::all();
        $validated = $request->validate([
            'productname_id' => 'required',
            'quantity_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $product = Product::insert([
            'productname_id' => $request->productname_id,
            'quantity_id' => $request->quantity_id,
            'quantity' => $request->quantity,
            'price' => $request->price*$request->quantity,
            'add_cost' => $request->add_cost,
            'tax' => (($request->tax*$request->price)/100)*$request->quantity,
            'vat' => (($request->vat*$request->price)/100)*$request->quantity,
        ]);
        $product = Purchase::insert([
            'productname_id' => $request->productname_id,
            'quantity_id' => $request->quantity_id,
            'quantity' => $request->quantity,
            'price' => $request->price*$request->quantity,
            'add_cost' => $request->add_cost,
            'tax' => (($request->tax*$request->price)/100)*$request->quantity,
            'vat' => (($request->vat*$request->price)/100)*$request->quantity,
        ]);

        Session::flash('success', 'Product Created Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productnames = Productname::All();
        $quantities = Quantity::All();
        return view('admin.product.edit', compact('productnames', 'quantities', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->productname_id = $request->productname_id;
        $product->quantity_id = $request->quantity_id;
        $product->quantity = $product->quantity + $request->quantity;
        $product->price = $request->price*$request->quantity;
        $product->add_cost = $request->add_cost;
        $tax = (($request->tax*$request->price)/100)*$request->quantity;
        $product->tax = $product->tax + $tax;
        $vat = (($request->vat*$request->price)/100)*$request->quantity;
        $product->vat = $product->vat + $vat;
        $product->save();

        $product = Purchase::insert([
            'productname_id' => $request->productname_id,
            'quantity_id' => $request->quantity_id,
            'quantity' => $request->quantity,
            'price' => $request->price*$request->quantity,
            'add_cost' => $request->add_cost,
            'tax' => (($request->tax*$request->price)/100)*$request->quantity,
            'vat' => (($request->vat*$request->price)/100)*$request->quantity,
        ]);

        Session::flash('success', 'Product Update Successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       if($product){
            $product->delete();
            Session::flash('success', 'Product Deleted Successfully!');
            return redirect()->route('product.index');
       }
    }
}

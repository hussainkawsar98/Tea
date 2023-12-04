<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\{User,Sale,Product,Productname,Quantity};

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(50);
        return view('admin.sale.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $products = Product::all();
        // return view('admin.sale.create', compact('products'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.sale.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'quantity' => 'required',
            'single_price' => 'required',
        ]);
        
        $product->productname_id = $request->productname_id;
        $product->quantity_id = $request->quantity_id;
        $product->quantity =  $request->quantity;
        $product->price = $request->single_price*$request->quantity;
        $product->add_cost = $request->add_cost;
        $tax = (($request->tax*$request->single_price)/100)*$request->quantity;
        $product->tax = $product->tax + $tax;
        $vat = (($request->vat*$request->single_price)/100)*$request->quantity;
        $product->vat = $product->vat + $vat;
        $product->save();

        $sale = Sale::insert([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'productname_id' => $request->productname_id,
            'quantity' => $request->quantity,
            'single_price' => $request->single_price,
            'add_cost' => $request->add_cost,
            'price' => $request->quantity*$request->single_price,
            'tax' => (($request->tax*$request->price)/100)*$request->quantity,
            'vat' => (($request->vat*$request->price)/100)*$request->quantity,
            'user_id' => Auth()->user()->id,
        ]);

        Session::flash('success', 'Product Sale Successfully!');
        return redirect()->route('sale.index');

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

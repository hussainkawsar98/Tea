<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Sale,Product};

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.sale.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'single_price' => 'required',
        ]);
        
        $sales = Sale::insert([
            'customer_name' => $request->customer_name,
            'productname_id' => $request->productname_id,
            'quantity' => $request->quantity,
            'single_price' => $request->single_price,
            'quantity' => $request->quantity,
            'total_price' => $request->single_price*$request->quantity,
            'vat' => (($request->vat*$request->price)/100)*$request->quantity,
            'tax' => (($request->tax*$request->price)/100)*$request->quantity,
            'user_id' => auth()->user()->id,
        ]);
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
        //
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
        //
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

<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Productname,Quantity};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuantityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quantities = Quantity::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.quantity.index', compact('quantities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.quantity.create');
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
            'name' => 'required|unique:quantities',
        ]);

        $quantity = Quantity::insert([
            'name' => $request->name,
        ]);

        Session::flash('success', 'Quantity Created Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function edit(Quantity $quantity)
    {
        return view('admin.quantity.edit', compact('quantity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quantity  $quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quantity $quantity)
    {
        $validated = $request->validate([
            'name' => 'required|unique:quantities',
        ]);
        $quantity->name = $request->name;
        $quantity->save();

        Session::flash('success', 'Quantity Type Update Successfully!');
        return redirect()->route('quantity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quantity $quantity)
    {
       if($quantity){
            $quantity->delete();
            Session::flash('success', 'Quantity Deleted Successfully!');
            return redirect()->route('quantity.index');
       }
    }
}

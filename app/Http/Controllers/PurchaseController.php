<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Purchase,Productname};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.purchase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:categories|max:255',
        // ]);

        // $category = Purchase::insert([
        //     'name' => $request->name,
        //     'slug' => Str::of($request->name)->slug('-'),
        // ]);
        // Session::flash('success', 'Purchase Created Successfully!');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        // return view('admin.purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        // $validated = $request->validate([
        //     'name' => 'max:255'
        // ]);
        
        // $purchase->name = $request->name;
        // $purchase->slug = Str::of($request->name)->slug('-');
        // $purchase->save();

        // Session::flash('success', 'Purchase Update Successfully!');
        // return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
    //    if($purchase){
    //         $purchase->delete();

    //         Session::flash('success', 'Purchase Deleted Successfully!');
    //         return redirect()->route('purchase.index');
    //    }
    }

    
    // public function filter(Purchase $purchase)
    // {
    //     return view('admin.purchase.filter');
    //     $purchases = Purchase::all();
    //     dd($purchases);
    //     $purchases = Purchase::whereTime('created_at', '=', '$request->filter_date')
    //             ->get();
    //     dd($purchases);
    //     // $purchases = Productname::where('name','LIKE','%'.$request->search."%")->get();
    //     // return view('admin.purchase.search', compact('purchases'));
    // }

    // public function filter(Request $request)
    // {
    //    return view('admin.purchase.filter');
    // }
    // public function search()
    // {
    //    return view('admin.purchase.search');
    // }
}

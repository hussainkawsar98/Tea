<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Productname, Category, Subcategory};
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

        $products = Product::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::All();
        $subcategories = Subcategory::All();
        return view('admin.product.create', compact('categories','subcategories'));
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
            'name' => 'required|unique:productnames',
            'category_id' => 'required',
        ]);

        $productname = Productname::insert([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'slug' => Str::of($request->name)->slug('-'),
        ]);

        Session::flash('success', 'Product Name Created Successfully!');
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
        $categories = Category::all();
        $subcategories = subcategory::all();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
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
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->save();

        Session::flash('success', 'Produtc Name Update Successfully!');
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

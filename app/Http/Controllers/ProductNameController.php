<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Productname, Category, Subcategory};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productnames = Productname::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin.product-name.index', compact('productnames'));
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
        return view('admin.product-name.create', compact('categories','subcategories'));
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function edit(Productname $product_name)
    {
        $categories = Category::all();
        $subcategories = subcategory::all();
        return view('admin.product-name.edit', compact('product_name', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productname $product_name)
    {
        $product_name->name = $request->name;
        $product_name->slug = Str::of($request->name)->slug('-');
        $product_name->category_id = $request->category_id;
        $product_name->subcategory_id = $request->subcategory_id;
        $product_name->save();

        Session::flash('success', 'Produtc Name Update Successfully!');
        return redirect()->route('product-name.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productname  $productname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productname $product_name)
    {
       if($product_name){
            $product_name->delete();
            Session::flash('success', 'Product Deleted Successfully!');
            return redirect()->route('product-name.index');
       }
    }
}

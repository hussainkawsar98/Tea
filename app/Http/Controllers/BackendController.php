<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category,Subcategory,Productname,Contact,User};
class BackendController extends Controller
{
    public function index(){
        $category = Category::all();
        $subcategory = Subcategory::all();
        $productname = Productname::all();
        $message = Contact::all();
        $user = User::all();
        return view('admin.index', compact('category', 'subcategory','productname','message','user')); 
    }
}

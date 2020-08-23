<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$products = Product::all();
    	return view('product/index', compact('products'));
    }

    public function detail($id)
    {
    	$details = Product::where('id', $id)->get();
    	return view('product/detail', compact('details'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\User;
use Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$datas = Transaction::all();
    	return view('transaction/index', compact('datas'));
    }

    public function store(Request $request)
    {
    	Transaction::create([
    		'user_id' => $request->user_id,
    		'product_id' => $request->product_id,
    		'ket' => $request->ket,
    		'tgl' => date('Y-m-d'),
    	]);

    	return redirect()->route('product/detail/$request->product_id');
    }

    public function proses($id)
    {
    	Transaction::where('id', $id)->update([
    		'status' => 'proses',
    	]);

    	return redirect()->route('transaction');
    }

    public function selesai(Request $request ,$id)
    {
    	User::where('id', $request->user_id)->update([
    		'point' => $request->point_product,
    	]);
    	Transaction::where('id', $id)->update(['status' => 'selesai']);

    	return redirect()->route('transaction');
    }
}

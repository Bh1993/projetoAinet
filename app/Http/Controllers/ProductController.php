<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.list', compact('products'));
    }

    public function getCreate()
    {
        return view('products.add');
    }

    //Modificar
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|email',
            'password' => 'required|min:8',
            //'location' => 'required|min:2',
            //'profile_photo' => 'required',
            //'profile_url' => '',
            //'presentation' => 'required',
            //'admin' => 'required',
            //'blocked' => '',
            //'sells_evals' => '',
            //'sells_count' => '',
            //'buys_evals' => '',
            //'buys_count' => '',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.list', compact('products'));
    }

    public function getShow($id)
    {
        // get the nerd
        $product = Product::find($id);

        // show the view and pass the nerd to it
        //return view('products.display-product', compact('product'));
           
    }

    public function getCreate()
    {
        $product = new Product();
        
        return view('products.add', compact('product'));

    }

    public function getEdit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));

    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => 'required',
            'available_until' => 'required',
            'price_cents' => 'required',
            'blocked' => ' required',

        ]);

        $product = new Product($request->all());

        $product->save();
        return redirect('products');
       
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'available_on' => '',
            'available_until' => '',
            'price_cents' => '',
            'blocked' => ' ',

        ]);

        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->available_on = $request->available_on;
        $product->available_until = $request->available_until;
        $product->price_cents = $request->price_cents;
        $product->blocked = $request->blocked;

        $product->save();
        return redirect('products');
    }

    public function postDelete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('products');

    }


}
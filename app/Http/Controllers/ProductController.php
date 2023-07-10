<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'money' => 'required',
            'status' => 'required',
            'purchase_date' => 'required',
            'delivery_date' => 'required',
            'person_delivery_id' => 'required',
            'depreciation_rate' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->money = $request->money;
        $product->status = $request->status;
        $product->purchase_date = $request->purchase_date;
        $product->delivery_date = $request->delivery_date;
        $product->person_delivery_id = $request->person_delivery_id;
        $product->depreciation_rate = $request->depreciation_rate;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Suggest created success');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'money' => 'required',
            'status' => 'required',
            'purchase_date' => 'required',
            'delivery_date' => 'required',
            'person_delivery_id' => 'required',
            'depreciation_rate' => 'required'
        ]);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->money = $request->money;
        $product->status = $request->status;
        $product->purchase_date = $request->purchase_date;
        $product->delivery_date = $request->delivery_date;
        $product->person_delivery_id = $request->person_delivery_id;
        $product->depreciation_rate = $request->depreciation_rate;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated success');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted success');
    }
}

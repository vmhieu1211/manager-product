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
        $validated = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'money' => 'required',
            'purchase_date' => 'required',
            'delivery_date' => 'required',
            'person_delivery_id' => 'required'
        ]);
        $product = Product::create($validated);
        return redirect()->route('product.index')->with('success', 'Product created success');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'purchase_date' => 'required',
            'delivery_date' => 'required',
            'person_delivery_id' => 'required'
        ]);
        $product = Product::finOrFail($id);
        $product->update($validate);
        return redirect()->route('product.index')->with('success', 'Product updated success');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted success');
    }
}

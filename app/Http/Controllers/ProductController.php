<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(4);

        return view('productList')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
        'code'        => 'required|string|unique:products,code',
        'name'        => 'required|string|max:250',
        'quantity'    => 'required|integer|min:1|max:10000',
        'price'       => 'required|numeric|min:0|max_digits:6',
        'description' => 'nullable|string',
    ]);
        Product::create([
            'code'=>$validatedData['code'],
            'name'=>$validatedData['name'],
            'quantity'=>$validatedData['quantity'],
            'price'=>$validatedData['price'],
            'description'=>$validatedData['description'],
        ]);

        return redirect()->route('product.index')->withSuccess('New Product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('productShow')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('productEdit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
      $validatedData = $request->validate([
        // The unique rule here IGNORES the current product's ID so it doesn't fail on save
        'code'        => 'required|string|max:50|unique:products,code,' . $product->product_id . ',product_id',
        'name'        => 'required|string|max:250',
        'quantity'    => 'required|integer|min:1|max:10000',
        'price'       => 'required|min:0|max_digits:6',
        'description' => 'nullable|string',
    ]);

    $product->update($validatedData);

    return redirect()->route('product.index')->withSuccess('Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->withSuccess('Product deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\RedirectResponse;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( String $productId) : View
    {
        $product = Product::findOrFail($productId);
        return view('admin.product.product-size.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'size' =>  ['required' , 'max:255'],
            'price' => ['required' , 'numeric'],
            'product_id' => ['required' , 'integer']
        ]);

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->size = $request->size;
        $size->price = $request->price;
        $size->save();

        toastr()->success('Product Size Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

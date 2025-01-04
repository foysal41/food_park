<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'size' => ['required' , 'max:255'],
            'price' => ['required' , 'numeric'],
            'product_id' => ['required' , 'integer']
           ],[
            'size.required' => 'Please Enter Option Name',
            'size.max' => 'Option Name Must be less than 255 characters',
            'price.required' => 'Please Enter Option Price',
            'price.numeric' => 'Option Price must be numeric',

           ]);

           $option = new ProductOption();
           $option->product_id = $request->product_id;
           $option->size = $request->size;
           $option->price = $request->price;
           $option->save();

           toastr()->success('Product Option Created Successfully');
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

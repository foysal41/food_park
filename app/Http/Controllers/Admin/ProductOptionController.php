<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $image = ProductOption::findOrFail($id);
            $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}

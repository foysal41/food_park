<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\ProductGallery;
use Illuminate\Http\RedirectResponse;
use Str;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(String $productId) : View
    {
        return view('admin.product.gallery.index', compact('productId'));
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
            'image' => ['required', 'image' , 'max:3000'],
            'product_id' => ['required', 'integer'],
        ]);

        $imagePath = $this->uploadImage($request, 'image');
        $gallery = new ProductGallery();
        $gallery->product_id = $request->product_id;
        $gallery->image = $imagePath;
        $gallery->save();

        toastr()->success('Product Gallery Created Successfully');
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
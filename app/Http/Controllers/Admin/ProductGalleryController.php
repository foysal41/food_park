<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\ProductGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Str;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(String $productId) : View
    {
        $images = ProductGallery::where('product_id' , $productId)->get();
        $product = Product::findOrFail($productId);
        return view('admin.product.gallery.index', compact('product', 'images'));
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            $image = ProductGallery::findOrFail($id);

            //এটা existing ইমেজটাকে ডিলিট করবে
            $this->removeImage($image->image);
            $image->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}

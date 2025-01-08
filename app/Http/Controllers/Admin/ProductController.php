<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request) : RedirectResponse
    {

      /* Handle Image File */

      $imagePath = $this->uploadImage($request, 'image');
      if (!$imagePath) {
          return back()->withErrors(['image' => 'Image upload failed!']);
      }
      $product = new Product();
      $product->thumb_image = $imagePath;
      $product->name = $request->name;
      $product->slug = create_unique_slug('Product' , $request->name); //  আমাদের  slug অবশই unique করতে হবে না হলে applicatio এর সমস্যা হবে
      $product->category_id = $request->category;
      $product->price = $request->price;
      $product->offer_price = $request->offer_price;
      $product->short_description = $request->short_description;
      $product->long_description = $request->long_description;
      $product->sku = $request->sku;
      $product->seo_title = $request->seo_title;
      $product->seo_description = $request->seo_description;
      $product->show_at_home = $request->show_at_home;
      $product->status = $request->status;

      //dd($product);
      $product->save();

      toastr()->success('Product Created Successfully');
      return to_route('admin.product.index');


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
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit' , compact('categories' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        //dd($request->all());



        $product = Product::findOrFail($id);
         /* Handle Image File */

      $imagePath = $this->uploadImage($request, 'image' , $product->thumb_image);
      if (!$imagePath) {
          return back()->withErrors(['image' => 'Image upload failed!']);
      }

      $product->thumb_image = !empty($imagePath) ? $imagePath : $product->thumb_image;
      $product->name = $request->name;
     // এই লাইনটি রিমুভ করে দিচ্ছি কারণ যখন আমরা প্রোডাক্ট আপডেট করব তখন আমাদের slug or url এর কোন পরিবর্তন করতে চাচ্ছি না
      $product->category_id = $request->category;
      $product->price = $request->price;
      $product->offer_price = $request->offer_price;
      $product->short_description = $request->short_description;
      $product->long_description = $request->long_description;
      $product->sku = $request->sku;
      $product->seo_title = $request->seo_title;
      $product->seo_description = $request->seo_description;
      $product->show_at_home = $request->show_at_home;
      $product->status = $request->status;

      //dd($product);
      $product->save();

      toastr()->success('Product Update Successfully');
      return to_route('admin.product.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id); // এখানে প্রোডাক্ট ডিফাইন করা হলো
            $this->removeImage($product->thumb_image); // প্রোডাক্টের thumb_image রিমুভ করা হলো
            $product->delete(); // প্রোডাক্ট ডিলিট করা হলো
            return response(['status' => 'success', 'message' => 'Deleted Successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SliderDataTable;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View as ViewView;

class SliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request)
    {
        //dd($request->all());
        /*
         --------|  Home Slider- Create Slider Feature (Part - 3)   |-----------

         1. Traits>FileUploadTrait.php file load করাব এই contorller এর মদ্ধে
         2. সব ডাটা সেভ করলাম
        */

        $imagePath = $this->uploadImage($request, 'image' );
        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();



        //return redirect()->route('admin.slider.index')->with('success' , 'Slider Created Successfully');

        toastr()->success('Slider Created Successfully');
        return to_route('admin.slider.index');


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
    public function edit(string $id) : View
    {
        /*

        --------|  Home Slider- Update Slider Feature (Part - 2)   |-----------
        1. edit.blade.php file load করাব
        2. আমরা findOrFail মেথড ব্যবহার করছি কারণ, এটি একটি নির্দিষ্ট ID দিয়ে ডেটাবেস থেকে রেকর্ড খুঁজে বের করে। ID পাওয়া গেলে: এটি ডেটাবেস থেকে সেই রেকর্ডটি রিটার্ন করবে or 404 page. ফ্রন্টএন্ডে পাঠানোর জন্য compact() মেথড ব্যবহার করা.

        3. now goto edit.blade.php> old value গুলা প্রদর্শন করব

        4. image display করার জন্য admin>profile>index.blade.php থেকে image script টা copy করে নিব।

        5. now সব কাজ শেষ হলে আপডেট করলে কাজ করবে না।  route এ update করতে হবে।

        */


        $slider = Slider::findOrFail($id);
        //dd($slider);
        return view ('admin.slider.edit'  , compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id) : RedirectResponse
    {
        $slider = Slider::findOrFail($id);

        /* Handle Image Upload */
        $imagePath = $this->uploadImage($request, 'image' , $slider->image);

        //এটা basically ternary operator ব্যবহার করা হচ্ছে যাতে চেক করা হয় যে, যদি এই imagePath ভেরিয়েবলটি খালি না থাকে, তবে সেটা আমাদের নতুন পাথ হবে। অথবা, যদি সেটা খালি থাকে, তবে পুরোনো পাথ যোগ করা হবে।
        $slider->image = !empty($imagePath ? $imagePath : $slider->image);
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description ?? 'Default description';
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();
        toastr()->success('Slider Updated Successfully');
        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

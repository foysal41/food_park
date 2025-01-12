<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    function index(): View {

        $sectionTitles =$this->getSectionTitles();
        //dd($sectionTitles);
        $sliders = Slider::where('status' , 1)->get();
        $whyChooseUs = WhyChooseUs::where('status' , 1)->get();
        $categories = Category::where('show_at_home', 1)->where('status', 1)->get();


        return view('frontend.home.index' , compact('sliders' , 'sectionTitles' , 'whyChooseUs' , 'categories' ));

    }

    function getSectionTitles(): Collection{
        $key = [
            'why_choose_top_title' ,
            'why_choose_main_title' ,
            'why_choose_sub_title'
        ];
        return  SectionTitle::WhereIn('key' , $key)->pluck('value', 'key');
    }

    function showProduct(string $slug) : View{
        //$productGalleries = ProductGallery::where('product_id' , 1)->get();
        $product = Product::with(['productGallery' , 'productSizes', 'productOptions'])->where(['slug' =>$slug, 'status' => 1])->firstOrFail();
        $reletedProducts = product::where('category_id' , $product->category_id)->where('id', '!=' , $product->id)->take(8)->latest()->get();

        //dd($categoryProducts);

        return view('frontend.pages.product-View' , compact('product' , 'reletedProducts'));
    }

    function loadProductModal( $productId) {
        //return $productId;

        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);
        //dd($product);

        return view('frontend.layouts.ajax-files.product-popup-modal' )->render();
    }

}

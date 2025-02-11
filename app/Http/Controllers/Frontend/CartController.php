<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        //dd($request->all());
        //এইটা দেখে নিচে option and size এর কাজ করলাম।
        $product = Product::with(['productSizes' , 'productOptions'])->findOrFail($request->product_id);
        //dd($product);
        $productSize = $product->productSizes->where('id',$request->product_size)->first(); //product size তুলে আনার জন্য
        //dd($productSize);
        $productOptions = $product->productOptions->whereIn('id',$request->product_option); //product option তুলে আনার জন্য
        //dd($productOptions);

        $options = [
            'product_size' => [
                'id' => $productSize?->id,
                'name' =>$productSize?->name,
                'price' => $productSize?->price
            ],
            'product_options' => [],
            'product_info' => [
                'image' => $product->thumb_image,
                'slug' => $product->slug
            ]
        ];

        //dd($options);

        foreach($productOptions as $productOption){
            $options['product_options'][] =  [
                'id' => $productOption->id,
                'name' => $productOption->size,
                'price' => $productOption->price
            ];

        }
        //dd($options);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
            'weight' => 0,
            'options' => $options
        ]);

        return response(['status' => 'success' , 'message' => 'Product added to cart successfully!'] , 200);

    }
}

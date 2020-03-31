<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){

        $newProducts = Product::where('publication_status',1)
                                    ->orderBy('id','desc')
                                    ->take(8)
                                    ->get();
        return view('front-end.home.home', [
            'newProducts' => $newProducts
        ]);
    }

    public function categoryProduct($id){
        $categoryProducts = Product::where('category_id', $id)
                                    ->where('publication_status', 1)
                                    ->get();
        return view('front-end.category.category-content', [
            'categoryProducts' => $categoryProducts
        ]);
    }

    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.product.product-details', [
            'product' => $product
        ]);
    }

    public function brandProduct($id){
        $brandProducts = Product::where('brand_id', $id)
            ->where('publication_status', 1)
            ->get();
        return view('front-end.brand.brand-content', [
            'brandProducts' => $brandProducts
        ]);
    }

    public function contactUs(){
        return view('front-end.contact.contact-us');
    }
}

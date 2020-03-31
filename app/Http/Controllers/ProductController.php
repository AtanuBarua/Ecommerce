<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Brand;
use App\Category;
use App\Product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProduct(){

        $categories = Category::where('publication_status',1)->get();
        $brands     = Brand::where('publication_status',1)->get();

        return view('admin.product.add-product', [
            'categories' => $categories,
            'brands'     => $brands
        ]);
    }

    protected function productValidation($request){
        $this->validate($request, [
           'product_name' => 'required'
        ]);
    }



    public function newProduct(Request $request){

        $this->productValidation($request);

        $productImage = $request->file('product_image');
        $fileType     = $productImage->getClientOriginalExtension();
        $imageName    = $request->product_name.'.'.$fileType;
        $directory    = 'product-images/';
        //$productImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);

        $product = new Product();
        $product->category_id        = $request->category_id;
        $product->brand_id           = $request->brand_id;
        $product->product_name       = $request->product_name;
        $product->product_price      = $request->product_price;
        $product->product_quantity   = $request->product_quantity;
        $product->short_description  = $request->short_description;
        $product->long_description   = $request->long_description;
        $product->product_image      = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();

        return redirect('/product/add-product')->with('message','Product created successfully');

    }

    public function manageProduct(){

        $products = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->join('brands','brands.id','=','products.brand_id')
                        ->select('products.*','categories.category_name','brands.brand_name')
                        ->get();

        return view('admin.product.manage-product', [
            'products' => $products
        ]);
    }

    public function editProduct($id){

        return view('admin.product.edit-product',[
            'categories' => Category::where('publication_status',1)->get(),
            'brands' => Brand::where('publication_status',1)->get(),
            'product' => Product::find($id)
        ]);

    }

    public function updateProduct(Request $request){

        $productImage = $request->file('product_image');
        if ($productImage) {
            $product = Product::find($request->id);
            unlink($product->product_image);

            $fileType     = $productImage->getClientOriginalExtension();
            $imageName    = $request->product_name.'.'.$fileType;
            $directory    = 'product-images/';
            $imageUrl     = $directory.$imageName;
            Image::make($productImage)->save($imageUrl);

            $product->category_id        = $request->category_id;
            $product->brand_id           = $request->brand_id;
            $product->product_name       = $request->product_name;
            $product->product_price      = $request->product_price;
            $product->product_quantity   = $request->product_quantity;
            $product->short_description  = $request->short_description;
            $product->long_description   = $request->long_description;
            $product->product_image      = $imageUrl;
            $product->publication_status = $request->publication_status;
            $product->save();
        }

        else{

            $product = Product::find($request->id);
            $product->category_id        = $request->category_id;
            $product->brand_id           = $request->brand_id;
            $product->product_name       = $request->product_name;
            $product->product_price      = $request->product_price;
            $product->product_quantity   = $request->product_quantity;
            $product->short_description  = $request->short_description;
            $product->long_description   = $request->long_description;
            $product->publication_status = $request->publication_status;
            $product->save();

        }

        return redirect('/product/manage-product')->with('message','Product updated successfully');
    }

    public function deleteProduct(Request $request){

        $product = Product::find($request->id);
        unlink($product->product_image);
        $product->delete();
        return redirect('/product/manage-product')->with('message','Product deleted successfully!!');

    }

    public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/product/manage-product')->with('message','Product is now unpublished');
    }

    public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/product/manage-product')->with('message','Product is now published');
    }
}

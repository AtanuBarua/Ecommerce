<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCategory(){

        return view('admin.category.add-category');

    }

    public function newCategory(Request $request){

        //type one(eloquent orm)
        $category = new Category();
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();

        //type two(eloquent orm)
        //Category::create($request->all());

        //query builder
        /*DB::table('categories')->insert([
            'category_name'        => $request->category_name,
            'category_description' => $request->category_description,
            'publication_status'   => $request->publication_status
        ]);*/

        return redirect('/category/manage-category')->with('message','Category added successfully');
    }

    public function manageCategory(){

        return view('admin.category.manage-category',[
            'categories' => Category::all()
        ]);

    }

    public function editCategory($id){

        return view('admin.category.edit-category',[
            'category' => Category::find($id)
        ]);

    }

    public function updateCategory(Request $request){

        $category = Category::find($request->id);
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect('/category/manage-category')->with('message','Category updated successfully');
    }

    public function deleteCategory(Request $request){


            $category = Category::find($request->id);
            $category->delete();
            return redirect('/category/manage-category')->with('message','Category deleted successfully!!');


    }

    public function unpublishedCategory($id){
       $category = Category::find($id);
       $category->publication_status = 0;
       $category->save();
       return redirect('/category/manage-category')->with('message','Category is now unpublished');
    }

    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/category/manage-category')->with('message','Category is now published');
    }


}

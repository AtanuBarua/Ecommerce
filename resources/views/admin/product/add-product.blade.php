@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2 class="text-success text-center">{{Session::get('message')}}</h2>

                {{Form::open(['route'=>'new-product','method'=>'post','class'=>'form-horizontal','enctype' => 'multipart/form-data'])}}

                <div class="form-group">
                    <label class="control-label col-md-3">Category name</label>
                    <div class="col-md-6">
                        <select class="form-control" name="category_id">
                            <option>Select Category Name</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Brand name</label>
                    <div class="col-md-6">
                        <select class="form-control" name="brand_id">
                            <option>Select Brand Name</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_name" class="control-label col-md-3">Product Name</label>
                    <div class="col-md-6">
                        <input id="product_name" type="text" name="product_name" class="form-control">
                        <span class="text-danger">{{$errors->has('product_name') ? $errors->first('product_name') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_price" class="control-label col-md-3">Product Price</label>
                    <div class="col-md-6">
                        <input id="product_price" type="number" step="any" name="product_price" class="form-control">
                        <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_quantity" class="control-label col-md-3">Product Quantity</label>
                    <div class="col-md-6">
                        <input id="product_quantity" type="number" name="product_quantity" class="form-control">
                        <span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="short_description" class="control-label col-md-3">Short description</label>
                    <div class="col-md-6">
                        <textarea id="short_description" name="short_description" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Long description</label>
                    <div class="col-md-12">
                        <textarea id="editor" name="long_description" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_image" class="control-label col-md-3">Product Image</label>
                    <div class="col-md-6">
                        <input id="product_image" type="file" name="product_image" class="form-control">
                        <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Publication status</label>
                    <div class="col-md-9 radio">
                        <label>  <input type="radio" name="publication_status" value="1"> Published </label>
                        <label>  <input type="radio" name="publication_status" value="0"> Unpublished </label><br/>
                        <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3" >
                        <input type="submit" class="btn btn-success btn-block" value="save">
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2 class="text-success text-center">{{Session::get('message')}}</h2>
                <form action="{{route('update-category')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category name</label>
                        <div class="col-md-6">
                            <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                            <input type="hidden" name="id" class="form-control" value="{{$category->id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category description</label>
                        <div class="col-md-6">
                            <textarea name="category_description" class="form-control">{{$category->category_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label>  <input type="radio" {{$category->publication_status==1 ? 'checked' : '' }} name="publication_status" value="1"> Published </label>
                            <label class="ml-2">  <input type="radio" {{$category->publication_status==0 ? 'checked' : '' }} name="publication_status" value="0"> Unpublished </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" >
                            <input type="submit" class="btn btn-success btn-block" value="update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

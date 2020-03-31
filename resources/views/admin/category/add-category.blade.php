@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2 class="text-success text-center">{{Session::get('message')}}</h2>
                <form action="{{route('new-category')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="control-label col-md-3">Category name</label>
                        <div class="col-md-6">
                            <input id="category_name" type="text" name="category_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category_description" class="control-label col-md-3">Category description</label>
                        <div class="col-md-6">
                            <textarea id="category_description" name="category_description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label>  <input type="radio" name="publication_status" value="1"> Published </label>
                            <label>  <input type="radio" name="publication_status" value="0"> Unpublished </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" >
                            <input type="submit" class="btn btn-success btn-block" value="save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

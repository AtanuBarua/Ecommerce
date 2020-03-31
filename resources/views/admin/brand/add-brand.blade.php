@extends('admin.master')

@section('title')
    Add Brand
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2 class="text-success text-center">{{Session::get('message')}}</h2>
                {{Form::open(['route'=>'new-brand','method'=>'post','class'=>'form-horizontal'])}}




                <div class="form-group">
                    <label for="brand_name" class="control-label col-md-3">Brand name</label>
                    <div class="col-md-6">
                        <input id="brand_name" type="text" name="brand_name" class="form-control">
                        <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand_description" class="control-label col-md-3">Brand description</label>
                    <div class="col-md-6">
                        <textarea id="brand_description" name="brand_description" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
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

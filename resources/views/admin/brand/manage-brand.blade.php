@extends ('admin.master')

@section('title')
    Manage Brand
@endsection

@section('body')

    <!-- Begin Page Content -->
    {{--<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>{{$brand->brand_description}}</td>
                            <td>{{$brand->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($brand->publication_status == 1)
                                    <a href="{{route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info btn-xs">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning btn-xs">
                                        <span class="fa fa-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success btn-xs">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="#"  class="btn btn-danger btn-xs"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteBrandForm'+'{{$brand->id}}').submit();
                                       }" >
                                    <span class="fa fa-trash"></span>
                                </a>
                                <form id="deleteBrandForm{{$brand->id}}" action="{{route('delete-brand')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$brand->id}}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--</div>--}}
    <!-- /.container-fluid -->

@endsection

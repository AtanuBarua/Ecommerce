@extends ('admin.master')

@section('title')
    Manage Category
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
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_description}}</td>
                            <td>{{$category->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                @if($category->publication_status == 1)
                                <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info btn-xs">
                                    <span class="fa fa-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning btn-xs">
                                        <span class="fa fa-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success btn-xs">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="#"  class="btn btn-danger btn-xs"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteCategoryForm'+'{{$category->id}}').submit();
                                       }" >
                                    <span class="fa fa-trash"></span>
                                </a>
                                    <form id="deleteCategoryForm{{$category->id}}" action="{{route('delete-category')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$category->id}}">
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

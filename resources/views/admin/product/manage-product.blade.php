@extends ('admin.master')

@section('title')
    Manage Product
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

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @php($i=1)
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td><img src="{{asset($product->product_image)}}" alt="" height="100" width="100"></td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-primary btn-xs " title="See Details">
                                    <span class="fa fa-folder-open"></span>
                                </a>
                                @if($product->publication_status == 1)
                                    <a href="{{route('unpublished-product',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="Unpublish Category">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{route('published-product',['id'=>$product->id])}}" class="btn btn-warning btn-xs" title="Publish Category">
                                        <span class="fa fa-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success btn-xs mt-2" title="Edit">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="#"  class="btn btn-danger btn-xs mt-2" title="Delete"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteProductForm'+'{{$product->id}}').submit();
                                       }" >
                                    <span class="fa fa-trash"></span>
                                </a>
                                <form id="deleteProductForm{{$product->id}}" action="{{route('delete-product')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                </form>
                            </td>
                         @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--</div>--}}
    <!-- /.container-fluid -->

@endsection

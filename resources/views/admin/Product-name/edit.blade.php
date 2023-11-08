@extends('layouts.admin')
@section('title', 'Edit Product Name | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Product Name</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('product-name.index')}}">Product Name List</a></li>
                        <li class="breadcrumb-item active">Update Product Name</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title pt-2">Update Product Name</h3>
                                    <a href="{{route('product-name.index')}}" class="btn btn-primary">Go Back Product Name List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                   <form action="{{route('product-name.update', $product_name->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" id="product-name" placeholder="Product Name" name="name" value="{{$product_name->name}}">
                                            </div>
                                        
                                            <div class="form-group">
                                            <label>Category</label>
                                                <select name="category_id" id="" class="form-control selectpicker" data-live-search="true">
                                                <option selected disabled>Change Category</option>
                                                @foreach($categories as $category)
                                                <option
                                                    {{$category->id == $product_name->category_id ? 'selected' : ''}}
                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                            <label>Sub Category</label>
                                                <select name="subcategory_id" id="" class="form-control selectpicker" data-live-search="true">
                                                <option selected disabled>Change Sub Category</option>
                                                @foreach($subcategories as $subcategory)
                                                <option
                                                    {{$subcategory->id == $product_name->subcategory_id ? 'selected' : ''}}
                                                    value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Product Name</button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection


@section('summernote-style')
<!-- <link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/bootstrap v-3.4.1.min.css"> -->
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('summernote-script')
<!-- <script src="{{asset('public/admin')}}/plugins/summernote/bootstrap v-3.4.1.min.js"></script> -->
<script src="{{asset('public/admin')}}/plugins/summernote/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Write Your Post..',
        tabsize: 2,
        minHeight: 250
    });
</script>
@endsection
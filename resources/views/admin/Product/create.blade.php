@extends('layouts.admin')
@section('title', 'Create Product | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="">Product Name List</a></li> -->
                        <li class="breadcrumb-item active">Add Product</li>
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
                                    <h3 class="card-title pt-2">Create Product</h3>
                                    <a href="{{route('product.index')}}" class="btn btn-primary">Go Back Product List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                    <form action="{{route('product.store')}}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Product</label>
                                                <input type="text" class="form-control" id="product-name" placeholder="Product" name="name">
                                            </div>
                                            <div class="form-group">
                                            <label>Parent</label>
                                                <select name="category_id" id="" class="form-control selectpicker" data-live-search="true">
                                                    <option selected disabled>Choose Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Sub Category</label>
                                                <select name="subcategory_id" id="" class="form-control selectpicker" data-live-search="true">
                                                    <option value="0" selected disabled>Select Sub Category</option>
                                                    @foreach($subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Product Name</button>
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
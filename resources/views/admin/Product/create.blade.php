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
                       <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product List</a></li>
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
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Product Name</label>
                                                    <select name="productname_id" id="" class="form-control selectpicker" data-live-search="true">
                                                        <option selected disabled>Choose Product Name</option>
                                                        @foreach($productnames as $productname)
                                                        <option value="{{$productname->id}}">{{$productname->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Quantity Type</label>
                                                    <select name="quantity_id" id="" class="form-control selectpicker" data-live-search="true">
                                                        <option selected disabled>Choose Quantity Type</option>
                                                        @foreach($quantities as $quantity)
                                                        <option value="{{$quantity->id}}">{{$quantity->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Quantity</label>
                                                    <input type="text" inputmode="decimal" class="form-control" placeholder="Quantity" name="quantity">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Price Per Quanity</label>
                                                    <input type="text" inputmode="decimal" class="form-control" placeholder="Price Per Quantity" name="price">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Additional Cost</label>
                                                    <input type="text" inputmode="decimal" class="form-control" placeholder="Quantity" name="add_cost">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Price Per Quanity</label>
                                                    <input type="text" inputmode="decimal" class="form-control" placeholder="Price Per Quantity" name="tax">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Price Per Quanity</label>
                                                    <input type="text" inputmode="decimal" class="form-control" placeholder="Price Per Quantity" name="vat">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
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
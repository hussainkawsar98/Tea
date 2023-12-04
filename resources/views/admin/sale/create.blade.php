@extends('layouts.admin')
@section('title', 'Product Sale | Develop by Muktar Hussain')

@section('content')
dd($products);
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Sale</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('sale.index')}}">Sale List</a></li>
                        <li class="breadcrumb-item active">Product Sale</li>
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
                                <h3 class="card-title pt-2">Product Sale</h3>
                                <a href="{{route('sale.index')}}" class="btn btn-primary">Go Back sale List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-primary">
                                <!-- Errors List Show -->
                                @include('layouts.errors')
                                <form action="{{route('sale.update')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control"
                                                name="customer_name">
                                                <input type="text" class="form-control"
                                                name="product_id" value="">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Product Name</label>
                                                <select name="product_id" id="" class="form-control selectpicker" data-live-search="true">
                                                <option selected disabled>Choose Product</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->Productname->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control"
                                                name="quantity">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Per KG Price</label>
                                                <input type="text" class="form-control"
                                                name="single_price">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Vat</label>
                                                <input type="text" class="form-control"
                                                name="vat">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Tax</label>
                                                <input type="text" class="form-control"
                                                name="tax">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sale Now</button>
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
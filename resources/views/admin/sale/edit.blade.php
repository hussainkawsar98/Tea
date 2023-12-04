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
                                <form action="{{route('sale.update', $product->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <!-- Hidden Field -->
                                        <p class="form-control">{{$product->id}}</p>
                                        <input type="text" name="productname_id" value="{{$product->productname_id}}" class="form-control">
                                        <input type="text" name="quantity_id" value="{{$product->quantity_id}}" class="form-control">
                                        <!-- Hidden Field -->
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Customer Name <span class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                name="customer_name">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control"
                                                name="" value="{{$product->Productname->name}}" disabled>
                                                <input type="text" class="form-control"
                                                name="product_id" value="{{$product->id}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Quantity<span class="required">*</span></label>
                                                <input type="text" inputmode="decimal" class="form-control"
                                                name="quantity">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Total Stock</label>
                                                <p class="form-control">
                                                {{$product->quantity}}</p>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Per KG Price</label>
                                                <input type="text" inputmode="decimal" class="form-control"
                                                name="single_price" value="{{number_format($product->price / $product->quantity,2)}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label>Additional Cost </label>
                                                <input type="text" inputmode="decimal" class="form-control"
                                                value="" name="add_cost">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Vat</label>
                                                <input type="text" inputmode="decimal" class="form-control"
                                                name="vat">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Tax</label>
                                                <input type="text" inputmode="decimal" class="form-control"
                                                name="tax">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <h5 class="ml-auto my-2 text-primary">Total Price: 3245</h5>
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
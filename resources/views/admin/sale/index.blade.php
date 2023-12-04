@extends('layouts.admin')
@section('title', 'All Product Names | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
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
          <div class="col-md-12 col-lg-12 pb-4">
          <div class="card mb-4">
              <div class="card-header">
              <div class="row justify-content-between">
                  <div class="name col-md-6">
                    <h2 class="card-title btn btn-primary mr-2">Product Search</h2>
                    <form class="d-flex"  action="#" method="GET">
                        <input class="form-control me-2 mr-1" id="searchInput" type="search" placeholder="Search Product.." name="search">
                    </form>
                  </div>
                  <!-- <div class="button col-md-9">
                    <ul class="filter-group d-flex">
                      <li>
                        <form class="d-flex"  action="#" method="GET">
                            <input class="form-control me-2 mr-1" id="searchInput" type="search" placeholder="Search Product.." name="search">
                        </form>
                      </li>
                      <li>
                        <a href="{{route('product.create')}}" class="btn btn-primary ml-2">Add Purchase</a>
                      </li>
                    </ul>
                  </div>   -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Quantity</th>
                      <th>Average Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($products->count())
                    @foreach($products as $product)
                    <tr>
                      <td>{{$product->Productname->name}}</td>
                      <td>{{$product->quantity}}
                        @if($product->Quantity->name == 'KG')
                        KG
                        @elseif($product->Quantity->name == 'Liter')
                        Liter
                        @elseif($product->Quantity->name == 'Piece')
                        Piece
                        @else
                        Other
                        @endif
                      </td>
                      <td>{{number_format($product->price / $product->quantity,2)}}
                      <td class="d-flex">
                      <a href="{{route('sale.edit', $product->id)}}" class="btn btn-sm btn-primary mr-1">Sale Now</a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6">
                        <h5 class="text-center text-danger">No Product Found.</h5>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div class="ml-auto my-3 mr-4">
                {{$products->links()}}
              </div>
              <!-- /.card-body -->
            </div> 
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
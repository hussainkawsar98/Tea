@extends('layouts.admin')
@section('title', 'Product Purchase List | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Purchase List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Purchase List</li>
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
                  <div class="name col-md-3">
                    <h3 class="card-title pt-2">Purchase List</h3>
                  </div>
                  <div class="button col-md-9">
                    <ul class="filter-group d-flex">
                      <li class="mr-2">
                        <!-- <form action="#" method="GET" class="d-flex">
                          <button class="btn btn-primary mr-1">Filter</button>
                          <input type="text" id="dataInput" class="form-control me-2 mr-1" placeholder="01 Jan 2023">
                        </form> -->
                      </li>
                      <li>
                        <form class="d-flex"  action="#" method="GET">
                          <button class="btn btn-primary mr-1">Filter</button>
                            <input class="form-control me-2 mr-1" id="searchInput" type="search" placeholder="Product or Date.." name="search">
                        </form>
                      </li>
                      <li>
                        <!-- <a href="{{route('product.create')}}" class="btn btn-primary ml-2">Add Purchase</a> -->
                      </li>
                    </ul>
                  </div>  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>Serial</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Total Quantity</th>
                      <th>Total Price</th>
                      <th>Per Quantity</th>
                      <th>Entry Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($purchases->count())
                    @foreach($purchases as $purchase)
                  
                    <tr>
                    <td>
                        01
                     </td>
                      <td>{{$purchase->Productname->name}}</td>
                      <td>{{$purchase->Productname->Category->name}}</td>
                      <td>{{$purchase->quantity}}
                        @if($purchase->Quantity->name == 'KG')
                        KG
                        @elseif($purchase->Quantity->name == 'Liter')
                        Liter
                        @elseif($purchase->Quantity->name == 'Piece')
                        Piece
                        @else
                        Other
                        @endif
                      </td>
                      <td>{{$purchase->price}}</td>
                      <td>{{number_format($purchase->price / $purchase->quantity,4)}}</td>
                      <td>{{$purchase->created_at->format('d M Y, H:i:s')}}</td>
                      <td class="d-flex">
                        <!-- <form action="{{route('purchase.destroy', $purchase->id)}}" class="d-inline" method="POST">
                        <input type="hidden" name="_method" value="DELETE"-->
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        @csrf
                          <!--button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></button>
                        </form> -->
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6">
                        <h5 class="text-center text-danger">No Product Names Found.</h5>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div class="ml-auto my-3 mr-4">
                {{$purchases->links()}}
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

@extends('layouts.admin')
@section('title', 'Quantity Type | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Quantity Type</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('quantity.index')}}">Quantities List</a></li>
                        <li class="breadcrumb-item active">Update Quantity Type</li>
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
                                    <h3 class="card-title pt-2">Update Quantity Type</h3>
                                    <a href="{{route('quantity.index')}}" class="btn btn-primary">Go Back Quantities List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                   <form action="{{route('quantity.update',$quantity->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Quantity Type</label>
                                                <input type="text" class="form-control" id="quantity" placeholder="Quantity Type" name="name" value="{{$quantity->name}}">
                                            </div>
                                        
                                            <button type="submit" class="btn btn-primary">Update Quantity Type</button>
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
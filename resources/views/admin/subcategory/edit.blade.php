@extends('layouts.admin')
@section('title', 'Edit Category | Develop by Muktar Hussain')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Sub Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('subcategory.index')}}">Sub Category List</a></li>
                        <li class="breadcrumb-item active">Update Sub Category</li>
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
                                    <h3 class="card-title pt-2">Update Sub Category</h3>
                                    <a href="{{route('subcategory.index')}}" class="btn btn-primary">Go Back Sub Category List</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-primary">
                                    <!-- Errors List Show -->
                                    @include('layouts.errors')
                                    <form action="{{route('subcategory.update', $subcategory->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sub Category Name</label>
                                                <input type="text" class="form-control" id="name" value="{{$subcategory->subcategory_name}}"
                                                    placeholder="Enter Sub Category" name="subcategory_name">
                                            </div>
                                        <div class="form-group">
                                        <label>Parent Category</label>
                                            <select name="category_id" id="" class="form-control selectpicker" data-live-search="true">
                                            <option selected disabled>Choose Category</option>
                                            @foreach($categories as $category)
                                            <option
                                                {{$category->id == $subcategory->category_id ? 'selected' : ''}}
                                                value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                           
                                            <button type="submit" class="btn btn-primary">Save Sub Category</button>
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
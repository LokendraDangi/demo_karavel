@extends('layouts.backend')
@section('title','Edit ProductLine')
@section('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            var  path = "{{route('category.subcategory')}}"
            $('#category_id').change(function(){
                category_id = $(this).val();
                $.ajax({
                    url : path,
                    data:{'category_id':category_id},
                    method:'post',
                    dataType:'text',
                    success:function (resp) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append(resp);
                    }
                });
            });
        });
    </script>
@endsection
@section('content')

    <section class="content-header">
        <h1>
            ProductLine Management
            <small>it all about productline data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit ProductLine
                    <a href="{{route('productline.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('productline.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @include('layouts.includes.error')
                <form action="{{route('productline.update',$data['productline']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option>Select Category</option>
                            @foreach($data['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                        @include('layouts.includes.single_field_validation',['field'=>'category_id'])
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Sub Category Name</label>
                        <select name="subcategory_id" class="form-control" id="subcategory_id">
                            <option>Select Category</option>
                            @foreach($data['subcategories'] as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                        @include('layouts.includes.single_field_validation',['field'=>'subcategory_id'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['productline']->name}}">
                        @include('layouts.includes.single_field_validation',['field'=>'name'])
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['productline']->slug}}"/>
                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="number" name="rank" class="form-control" id="rank" value="{{$data['productline']->rank}}"/>
                        @include('layouts.includes.single_field_validation',['field'=>'rank'])
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        @if($data['productline']->status==1)
                        <input type="radio" name="status" value="1" checked>Active
                            <input type="radio" name="status" value="0">DeActive
                        @else
                            <input type="radio" name="status" value="1">Active
                            <input type="radio" name="status" value="0" checked>DeActive
                        @endif
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update Productline">
                    <input type="submit" name="submit" id="submit" class="btn btn-danger" value="Clear">
                </form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection

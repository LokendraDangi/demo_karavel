@extends('layouts.backend')
@section('title','Edit Slider')

@section('content')

    <section class="content-header">
        <h1>
            Slider Management
            <small>it all about slider data</small>
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
                <h3 class="box-title">Edit Slider
                    <a href="{{route('slider.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>create</a>
                    <a href="{{route('slider.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                <form action="{{route('slider.update',$data['slider']->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$data['slider']->title}}">
                        @include('layouts.includes.single_field_validation',['field'=>'title'])
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['slider']->slug}}">
                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  name="description" class="form-control" id="description">{{$data['slider']->description}}</textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'description'])
                    </div>
                    <div class="form-group">
                        <label for="slider_iamge">Image</label>
                        <img src="{{ asset('images/slider/'. $data['slider']->image )}}" alt={{$data['slider']->image}} height="100px" width="100px" style="cursor:pointer">
                        <input type="file" name="slider_image" class="form-control" id="slider_image">
                        @include('layouts.includes.single_field_validation',['field'=>'slier_image'])
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" id="link" value="{{$data['slider']->link}}">
                        @include('layouts.includes.single_field_validation',['field'=>'link'])
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        @if($data['slider']->status)
                            <input type="radio" name="status" value="1" checked>Active
                            <input type="radio" name="status" value="0">DeActive
                        @else
                            <input type="radio" name="status" value="1">Active
                            <input type="radio" name="status" value="0" checked>DeActive
                        @endif

                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update Slider">
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
@extends('layouts.backend')
@section('title','Create Slider')

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
                <h3 class="box-title">Create Slider
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
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                        @include('layouts.includes.single_field_validation',['field'=>'title'])
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug">
                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  name="description" class="form-control" id="description"></textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'description'])
                    </div>
                    <div class="form-group">
                        <label for="slider_image">Image</label>
                        <input type="file" name="slider_image" class="form-control" id="slider_image">
                        @include('layouts.includes.single_field_validation',['field'=>'slider_image'])
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" id="link">
                        @include('layouts.includes.single_field_validation',['field'=>'link'])
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="radio" name="status" value="1">Active
                        <input type="radio" name="status" value="0" checked>DeActive
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Save Slider">
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
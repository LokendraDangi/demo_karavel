@extends('layouts.backend')
@section('title','Edit Subcategory')

@section('content')

    <section class="content-header">
        <h1>
            Subcategory Management
            <small>it all about subcategory data</small>
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
                <h3 class="box-title">Edit Subcategory
                    <a href="{{route('subcategory.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('subcategory.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                <form action="{{route('subcategory.update',$data['subcategory']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($data['categories'] as $category)
                                @if($data['subcategory']->category_id===$category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @include('layouts.includes.single_field_validation',['field'=>'name'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['subcategory']->name}}">
                        @include('layouts.includes.single_field_validation',['field'=>'name'])
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="number" name="rank" class="form-control" id="rank" value="{{$data['subcategory']->rank}}">
                        @include('layouts.includes.single_field_validation',['field'=>'rank'])
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['subcategory']->slug}}">
                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea  name="meta_keyword" class="form-control" id="meta_keyword">{{$data['subcategory']->meta_keyword}}</textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'meta_keyword'])
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description">{{$data['subcategory']->meta_description}}</textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'meta_description'])
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        @if($data['subcategory']->status==1)
                            <input type="radio" name="status" value="1" checked>Active
                            <input type="radio" name="status" value="0">DeActive
                        @else
                            <input type="radio" name="status" value="1">Active
                            <input type="radio" name="status" value="0" checked>DeActive
                        @endif
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update Subcategory">
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

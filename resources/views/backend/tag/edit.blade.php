@extends('layouts.backend')
@section('title','Edit Tag')

@section('content')

    <section class="content-header">
        <h1>
            Tag Management
            <small>it all about tag data</small>
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
                <h3 class="box-title">Edit Tag
                    <a href="{{route('tag.create')}}" class="btn btn-info"><i class="fa fa-list"></i>Create</a>
                    <a href="{{route('tag.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                <form action="{{route('tag.update',$data['tag']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['tag']->name}}"/>
                        @include('layouts.includes.single_field_validation',['field'=>'name'])
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="number" name="rank" class="form-control" id="rank" value="{{$data['tag']->rank}}"/>
                        @include('layouts.includes.single_field_validation',['field'=>'rank'])
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['tag']->slug}}"/>
                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea  name="meta_keyword" class="form-control" id="meta_keyword">{{$data['tag']->meta_keyword}}</textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'meta_keyword'])
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description">{{$data['tag']->meta_description}}</textarea>
                        @include('layouts.includes.single_field_validation',['field'=>'meta_description'])
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        @if($data['tag']->status==1)
                            <input type="radio" name="status" value="1" checked>Active
                            <input type="radio" name="status" value="0" >DeActive
                        @else
                            <input type="radio" name="status" value="1">Active
                            <input type="radio" name="status" value="0" checked>DeActive
                        @endif
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update Tag">
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
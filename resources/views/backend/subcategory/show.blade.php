
@extends('layouts.backend')
@section('title','Show Subcategory')

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
                <h3 class="box-title">Show Subcategory
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
                @include('layouts.includes.flash')
                <table class="table table-bordered">
                    <tr>
                        <th>Category</th>
                        <td>{{\App\Models\Category::find($data['subcategory']->category_id)->name}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$data['subcategory']->name}}</td>
                    </tr>
                    <tr>
                        <th>Rank</th>
                        <td>{{$data['subcategory']->rank}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['subcategory']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$data['subcategory']->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$data['subcategory']->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data['subcategory']->status==1)
                                <label class="label label-success">Active</label>
                            @else
                                <label class="label label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['subcategory']->created_by)->name}}</td>
                    </tr>
                    <tr>
                        <td>
                        <th>Updated By</th>
                        @if(!empty($data['subcategory']->updated_by))
                        {{\App\User::find($data['subcategory']->updated_by)->name}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['subcategory']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['subcategory']->updated_at}}</td>
                    </tr>
                </table>
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
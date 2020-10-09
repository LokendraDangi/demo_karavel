
@extends('layouts.backend')
@section('title','Show Tag')

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
                <h3 class="box-title">Show Tag
                    <a href="{{route('tag.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('tag.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                       <th>Name</th>
                       <td>{{$data['tag']->name}}</td>
                   </tr>
                    <tr>
                        <th>Rank</th>
                        <td>{{$data['tag']->rank}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['tag']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$data['tag']->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$data['tag']->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data['tag']->status==1)
                                <label class="labell label-success">Active</label>
                            @else
                                <label class="labell label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['tag']->created_by)->name}}</td>
                    </tr>
                    <tr>
                        <td>
                            <th>Updated By</th>
                            @if(!empty($data['tag']->updated_by))
                            {{\App\User::find($data['tag']->updated_by)->name}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['tag']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['tag']->updated_at}}</td>
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
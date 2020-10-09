
@extends('layouts.backend')
@section('title','Show Slider')

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
                <h3 class="box-title">Show Slider
                    <a href="{{route('slider.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
                @include('layouts.includes.flash')
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{$data['slider']->title}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['slider']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$data['slider']->description}}</td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>{{$data['slider']->image}}</td>
                    </tr>
                    <tr>
                        <th>Link</th>
                        <td>{{$data['slider']->link}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data['slider']->status==1)
                                <label class="label label-success">Active</label>
                            @else
                                <label class="label label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['slider']->created_by)->name}}</td>
                    </tr>
                    <tr>
                        <td>
                        <th>Updated By</th>
                        @if(!empty($data['slider']->updated_by))
                        {{\App\User::find($data['slider']->updated_by)->name}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['slider']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['slider']->updated_at}}</td>
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
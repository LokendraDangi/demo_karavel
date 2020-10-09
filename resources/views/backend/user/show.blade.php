
@extends('layouts.backend')
@section('title','Show User')

@section('content')

    <section class="content-header">
        <h1>
            User Management
            <small>it all about user data</small>
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
                <h3 class="box-title">Show User
                    <a href="{{route('user.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('user.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                        <td>{{$data['user']->name}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data['user']->email}}</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>{{$data['user']->password}}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{$data['user']->role->name}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['user']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['user']->updated_at}}</td>
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
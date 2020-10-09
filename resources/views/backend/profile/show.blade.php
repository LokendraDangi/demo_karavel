
@extends('layouts.backend')
@section('title','Show Profile')

@section('content')

    <section class="content-header">
        <h1>
            Profile Management
            <small>it all about profile data</small>
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
                <h3 class="box-title">Show Profile
                    <a href="{{route('profile.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('profile.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                        <td>{{$data['profile']->name}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$data['profile']->phone}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$data['profile']->address}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data['profile']->email}}</td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <td>{{$data['profile']->logo}}</td>
                    </tr>
                    <tr>
                        <th>Map link</th>
                        <td>{{$data['profile']->map_link}}</td>
                    </tr>
                    <tr>
                        <th>Facebook Link</th>
                        <td>{{$data['profile']->facebook_link}}</td>
                    </tr>
                    <tr>
                        <th>Twitter Link</th>
                        <td>{{$data['profile']->twitter_link}}</td>
                    </tr>
                    <tr>
                        <th>Instagram Link</th>
                        <td>{{$data['profile']->instagram_link}}</td>
                    </tr>
                    <tr>
                        <th>Youtube Link</th>
                        <td>{{$data['profile']->youtube_link}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['profile']->created_by)->name}}</td>
                    </tr>
                    <tr>
                        <td>
                        <th>Updated By</th>
                        @if(!empty($data['profile']->updated_by))
                        {{\App\User::find($data['profile']->updated_by)->name}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['profile']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['profile']->updated_at}}</td>
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

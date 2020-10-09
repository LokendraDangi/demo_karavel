
@extends('layouts.backend')
@section('title','List Role')

@section('content')

    <section class="content-header">
        <h1>
            Role Management
            <small>it all about Role data</small>
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
                <h3 class="box-title">List Role
                    <a href="{{route('role.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
               php <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data['roles'] as $role)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                @if($role->status==1)
                                    <label class="label label-success">Active</label>
                                @else
                                    <label class="label label-danger">De Active</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('role.edit',$role->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i>edit</a>
                                <a href="{{route('role.show',$role->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>view</a>
                                <a href="{{route('role.assignpermission',$role->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i>Assign Permission</a>
                                <form action="{{route('role.destroy',$role->id)}}" method="post" onsubmit="return confirm('Are you surer to Delete')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                    <tfoot>
                    <td collspan="">{{$data['roles']->links()}}</td>
                    </tfoot>
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
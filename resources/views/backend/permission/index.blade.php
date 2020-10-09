
@extends('layouts.backend')
@section('title','List Permission')

@section('content')

    <section class="content-header">
        <h1>
            Permission Management
            <small>it all about permission data</small>
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
                <h3 class="box-title">List Permission
                    <a href="{{route('permission.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Module</th>
                        <th>Name</th>
                        <th>Route</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data['permissions'] as $permission)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$permission->module->name}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->route}}</td>
                            <td>
                                @if($permission->status==1)
                                    <label class="label label-success">Active</label>
                                @else
                                    <label class="label label-danger">De Active</label>
                                @endif
                            </td>
                            <td><a href="{{route('permission.edit',$permission->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i>edit</a>
                                <form action="{{route('permission.destroy',$permission->id)}}" method="post" onsubmit="return confirm('Are you surer to Delete')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                                <a href="{{route('permission.show',$permission->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>view</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th width="5%">SN</th>
                        <th>Module</th>
                        <th>Name</th>
                        <th>Route</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
                {{$data['permissions']->links()}}
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
<script>
    $(document).ready( function () {
        $('#').DataTable();
    } );
</script>

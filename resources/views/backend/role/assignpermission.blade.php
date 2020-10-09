@extends('layouts.backend')
@section('title','Assign Permission')

@section('content')

    <section class="content-header">
        <h1>
            Role_Permission Management
            <small>it all about role data</small>
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
                <h3 class="box-title">Create Permission
                    <a href="{{route('role.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>Role List</a>
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
                <form action="{{route('role.savepermission',$data['role']->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="role_id">Role Name</label>
                       {{$data['role']->name}}
                    </div>
                    <div class="form-group">
                      <ul>
                            @foreach($data['modules'] as $module)
                              <li>{{$module->name}}</li>
                                <ul>
                                @foreach($module->permissions as $permission)
                                    <input type="checkbox" name="permission[]" value="{{$permission->id}}" @if(in_array($permission->id,$data['assigned_permission'])) checked @endif>{{$permission->name}}
                                    @endforeach
                                </ul>
                            @endforeach
                      </ul>
                        @include('layouts.includes.single_field_validation',['field'=>''])
                    </div>

                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Asign Permission">
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
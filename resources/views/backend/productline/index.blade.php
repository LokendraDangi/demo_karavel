
@extends('layouts.backend')
@section('title','List ProductLine')

@section('content')

    <section class="content-header">
        <h1>
            ProductLine Management
            <small>it all about productline data</small>
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
                <h3 class="box-title">List ProductLine
                    <a href="{{route('productline.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Rank</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data['productlines'] as $productline)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$productline->category->name}}</td>
                            <td>{{$productline->subcategory->name}}</td>
                            <td>{{$productline->name}}</td>
                            <td>{{$productline->slug}}</td>
                            <td>{{$productline->rank}}</td>
                            <td>
                                @if($productline->status==1)
                                    <label class="labell label-success">Active</label>
                                @else
                                    <label class="labell label-danger">De Active</label>
                                @endif
                            </td>
                            <td><a href="{{route('productline.edit',$productline->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i>edit</a>
                                <form action="{{route('productline.destroy',$productline->id)}}" method="post" onsubmit="return confirm('Are you surer to Delete')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                                <a href="{{route('productline.show',$productline->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>view</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <td collspan="">{{$data['productlines']->links()}}</td>
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

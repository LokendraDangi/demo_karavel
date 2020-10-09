
@extends('layouts.backend')
@section('title','List Slider')

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
                <h3 class="box-title">List Slider
                    <a href="{{route('slider.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data['sliders'] as $slider)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->slug}}</td>
                            <td>{{$slider->description}}</td>
                            <td><img src="{{asset('images/slider/' .$slider->image )}}" width="100" alt=""></td>
                            <td>{{$slider->link}}</td>
                            <td>
                                @if($slider->status==1)
                                    <label class="label label-success">Active</label>
                                @else
                                    <label class="label label-danger">De Active</label>
                                @endif
                            </td>
                            <td><a href="{{route('slider.edit',$slider->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i>edit</a>
                                <form action="{{route('slider.destroy',$slider->id)}}" method="post" onsubmit="return confirm('Are you surer to Delete')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                                <a href="{{route('slider.show',$slider->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>view</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <td collspan="">{{$data['sliders']->links()}}</td>
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
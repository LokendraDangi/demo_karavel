
@extends('layouts.backend')
@section('title','List Product')

@section('content')

    <section class="content-header">
        <h1>
            Product Management
            <small>it all about product data</small>
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
                <h3 class="box-title">List Product
                    <a href="{{route('product.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
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
                        {{--'category_id','subcategory_id','name','slug','price','discount','quantity',
                        'stock','feature_key','discount_key','short_description',
                        'description','meta_keyword','meta_description','status'--}}
                        <th>SN</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product Line</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($data['products'] as $product)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->subcategory->name}}</td>
                            <td>{{$product->productline->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->slug}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                @if($product->status==1)
                                    <label class="labell label-success">Active</label>
                                @else
                                    <label class="labell label-danger">De Active</label>
                                @endif
                            </td>
                            <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i>edit</a>
                                <form action="{{route('product.destroy',$product->id)}}" method="post" onsubmit="return confirm('Are you surer to Delete')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                                <a href="{{route('product.show',$product->id)}}" class="btn btn-info"><i class="fa fa-eye"></i>view</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <td collspan="">{{$data['products']->links()}}</td>
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

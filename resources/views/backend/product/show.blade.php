
@extends('layouts.backend')
@section('title','Show Product')
@section('css')
    <style>
    .img-wrap {
    position: relative;
    display: inline-block;
    border: 1px red solid;
    font-size: 0;
    }
    .img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #FFF;
    padding: 5px 2px 2px;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    opacity: .2;
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
    }
    .img-wrap:hover .close {
    opacity: 1;
    }
    </style>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.img-wrap .close').on('click', function() {
            var id = $(this).closest('.img-wrap').find('img').get(0).id;
            alert('remove picture: ' + id);
            var  path = "{{route('product.deleteimage')}}"
                $.ajax({
                    url : path,
                    data:{'image_id':id},
                    method:'post',
                    dataType:'text',
                    success:function (resp) {
                        if(resp == 'true'){
                            var text = '#' + id;
                            $(text).hide();
                            $(this).hide();
                        }
                    }
                });
        });
    </script>
@endsection

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
                <h3 class="box-title">Show Product
                    <a href="{{route('product.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('product.index')}}" class="btn btn-info"><i class="fa fa-plus"></i>List</a>
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
                        <th>Category</th>
                        <td>{{$data['product']->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Sub category</th>
                        <td>{{$data['product']->subcategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Line</th>
                        <td>{{$data['product']->productline->name}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$data['product']->name}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{$data['product']->slug}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{$data['product']->price}}</td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>{{$data['product']->discount}}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{$data['product']->quantity}}</td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td>{{$data['product']->stock}}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$data['product']->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$data['product']->description}}</td>
                    </tr>
                    <tr>
                        <th>Meta Keyword</th>
                        <td>{{$data['product']->meta_keyword}}</td>
                    </tr>
                    <tr>
                        <th>Meta Description</th>
                        <td>{{$data['product']->meta_description}}</td>
                    </tr>
                    <tr>
                        <th>Feature Key</th>
                        <td>
                            @if($data['product']->feature_key==1)
                                <label class="labell label-success">Active</label>
                            @else
                                <label class="labell label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Discount Key</th>
                        <td>
                            @if($data['product']->discount_key==1)
                                <label class="labell label-success">Active</label>
                            @else
                                <label class="labell label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($data['product']->status==1)
                                <label class="labell label-success">Active</label>
                            @else
                                <label class="labell label-danger">De Active</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td>
                            <ul>
                                @foreach($data['product']->tags as $tag)
                                    <li>{{$tag->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['product']->created_by)->name}}</td>
                    </tr>
                    <tr>
                        <th>Updated By</th>
                        <td>
                        @if(!empty($data['product']->updated_by))
                        {{\App\User::find($data['product']->updated_by)->name}}
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$data['product']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['product']->updated_at}}</td>
                    </tr>
                </table>
                <h2>Attributes Data</h2>
                <table class="table table-bordered">
                    <thead>
                    <th>Attribute</th>
                    <th>Value</th>
                    </thead>
                    <tbody>

                    @foreach($data['product']->attributes as $attribute)
                        <tr>
                            <td>{{$attribute->name}}</td>
                            <td>{{$attribute->value}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <h4>Images</h4>
                    @foreach($data['product']->images as $image)
                        <div class="img-wrap">
                            <span class="close">&times;</span>
                            <img class="remove_image" id="{{$image->id}}" src="{{asset('images/product/'. $image->image )}}" alt={{$image->image}} height="100px" width="100px" style="cursor:pointer">
                        </div>
                    {{--<img src="{{asset('images/product/'. $image->image )}}" alt={{$image->image}} height="100px" width="100px" style="cursor:pointer">
                    --}}
                    @endforeach
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

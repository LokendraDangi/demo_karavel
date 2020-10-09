@extends('layouts.backend')
@section('title','Create Product')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<style>
    input.select2-search__field{
        width: 40em;
    }
    .select2-container--default .select2-search--inline .select2-search__field{
        width: 40em;
    }
</style>
@endsection
@section('js')
    @include('backend.product.includes.add_row')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        CKEDITOR.replace( 'description' );
        $(document).ready(function() {
            $('.tag_id').select2();
            var  path = "{{route('category.subcategory')}}"
            $('#category_id').change(function(){
                category_id = $(this).val();
                $.ajax({
                    url : path,
                    data:{'category_id':category_id},
                    method:'post',
                    dataType:'text',
                    success:function (resp) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append(resp);

                    }
                });
            });
        });
        $(document).ready(function(){
            var  path = "{{route('subcategory.productline')}}"
            $('body').on('change', '#subcategory_id', function() {
                subcategory_id = $(this).val();
                $.ajax({
                    url : path,
                    data:{'subcategory_id':subcategory_id},
                    method:'post',
                    dataType:'text',
                    success:function (resp) {
                        $('#productline_id').empty();
                        $('#productline_id').append(resp);
                    }
                });
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
            <li><a href="#">Product</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Product
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
               @include('layouts.includes.error')
                <h2 class="page-header">AdminLTE Custom Tabs</h2>

                <div class="row">

                        <!-- Custom Tabs -->
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Basic Data</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Meta Data</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Image</a></li>
                                <li><a href="#tab_4" data-toggle="tab">Tag</a></li>
                                <li><a href="#tab_5" data-toggle="tab">Attributes</a></li>
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-group">
                                        <label for="category_id">Category Name</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option>Select Category</option>
                                            @foreach($data['categories'] as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.includes.single_field_validation',['field'=>'category_id'])
                                    </div>
                                    <div class="form-group">
                                        <label for="subcategory_id">Sub Category Name</label>
                                        <select name="subcategory_id" class="form-control" id="subcategory_id">
                                            <option>Select Sub Category</option>
                                        @foreach($data['subcategories'] as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.includes.single_field_validation',['field'=>'subcategory_id'])
                                    </div>
                                    <div class="form-group">
                                        <label for="productline_id">Product Line Name</label>
                                        <select name="productline_id" class="form-control" id="productline_id">
                                            <option>Select ProductLine</option>
                                            @foreach($data['productlines'] as $productline)
                                                <option value="{{$productline->id}}">{{$productline->name}}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.includes.single_field_validation',['field'=>'productline_id'])
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name">
                                        @include('layouts.includes.single_field_validation',['field'=>'name'])
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug">
                                        @include('layouts.includes.single_field_validation',['field'=>'slug'])
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price">
                                        @include('layouts.includes.single_field_validation',['field'=>'price'])
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" class="form-control" id="discount">
                                        @include('layouts.includes.single_field_validation',['field'=>'discount'])
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" id="quantity">
                                        @include('layouts.includes.single_field_validation',['field'=>'quantity'])
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Short Discription</label>
                                        <textarea name="short_description" class="form-control" id="short_description"></textarea>
                                        @include('layouts.includes.single_field_validation',['field'=>'short_description'])
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Discription</label>
                                        <textarea name="description" class="form-control" id="description"></textarea>
                                        @include('layouts.includes.single_field_validation',['field'=>'description'])
                                    </div>
                                    <div class="form-group">
                                        <label for="feature_key">Feature Key</label>
                                        <input type="radio" name="feature_key" value="1" id="feature_active">Active
                                        <input type="radio" name="feature_key" value="0" id="feature_deactive" checked>DeActive
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_key">Discount Key</label>
                                        <input type="radio" name="discount_key" value="1" id="discount_active">Active
                                        <input type="radio" name="discount_key" value="0" id="discount_deactive" checked>DeActive
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="radio" name="status" value="1" id="active">Active
                                        <input type="radio" name="status" value="0" id="deactive" checked>DeActive
                                    </div>

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea  name="meta_keyword" class="form-control" id="meta_keyword"></textarea>
                                        @include('layouts.includes.single_field_validation',['field'=>'meta_keyword'])
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" id="meta_description"></textarea>
                                        @include('layouts.includes.single_field_validation',['field'=>'meta_description'])
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    @include('backend.product.includes.image')
                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <div class="form-group">
                                        <label for="tag_id">Select Tag</label>
                                        <select name="tag_id[]" class="form-control tag_id"  id="tag_id" multiple="multiple">
                                            @foreach($data['tags'] as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                        @include('layouts.includes.single_field_validation',['field'=>'tag_id'])
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_5">
                                    @include('backend.product.includes.attribute')
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                        <button  name="submit" id="submit" class="btn btn-success"><i class=""></i>Save Product</button>

                    </form>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
                <!-- END CUSTOM TABS -->
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

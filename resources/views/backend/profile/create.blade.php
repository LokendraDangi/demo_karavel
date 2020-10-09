@extends('layouts.backend')
@section('title','Create Profile')

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
                <h3 class="box-title">Create Profile
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
               @include('layouts.includes.error')
                <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                       @include('layouts.includes.single_field_validation',['field'=>'name'])
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone">
                        @include('layouts.includes.single_field_validation',['field'=>'phone'])
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address">
                        @include('layouts.includes.single_field_validation',['field'=>'address'])
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                        @include('layouts.includes.single_field_validation',['field'=>'email'])
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" class="form-control" id="logo">
                        @include('layouts.includes.single_field_validation',['field'=>'logo'])
                    </div>
                    <div class="form-group">
                        <label for="map_link">Map Link</label>
                        <input type="text" name="map_link" class="form-control" id="map_link">
                        @include('layouts.includes.single_field_validation',['field'=>'map_link'])
                    </div>
                    <div class="form-group">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" name="facebook_link" class="form-control" id="facebook_link">
                        @include('layouts.includes.single_field_validation',['field'=>'facebook_link'])
                    </div>
                    <div class="form-group">
                        <label for="twitter_link">Twitter Link</label>
                        <input type="text" name="twitter_link" class="form-control" id="twitter_link">
                        @include('layouts.includes.single_field_validation',['field'=>'twitter_link'])
                    </div>
                    <div class="form-group">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" name="instagram_link" class="form-control" id="instagram_link">
                        @include('layouts.includes.single_field_validation',['field'=>'instagram_link'])
                    </div>
                    <div class="form-group">
                        <label for="youtube_link">Youtube Link</label>
                        <input type="text" name="youtube_link" class="form-control" id="youtube_link">
                        @include('layouts.includes.single_field_validation',['field'=>'youtube_link'])
                    </div>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Save Profile">
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

@extends('frontend.layouts.frontend')
@section('title',$data['category'][0]->name)
@section('content')
    <div class="page-heading">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div>
                        <ul>
                            <li class="home"> <a href="{{route('front.index')}}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
                            <li class="category1599"> <a href="{{route('front.category',$data['category'][0]->slug)}}" title="{{$data['category'][0]->name}}">{{$data['category'][0]->name}}</a> <span>&rsaquo; </span> </li>
                        </ul>
                    </div>
                    <!--col-xs-12-->


                    <div class="page-title">
                        <h2>{{$data['category'][0]->name}}</h2>
                    </div>
                    <!--row-->
                </div>
            </div>
            <!--container-->
        </div>
    </div>
    <!--breadcrumbs-->
    <!-- BEGIN Main Container col2-left -->
    <section class="main-container col2-left-layout bounceInUp animated">
        <!-- For version 1, 2, 3, 8 -->
        <!-- For version 1, 2, 3 -->
        <div class="container">
            <div class="row">
                <div class="col-main product-grid">
                    <div class="pro-coloumn">
                        <article class="col-main">
                            <div class="toolbar">
                                <div class="pager">
                                    <div id="sort-by">
                                        <label class="left">Sort By: </label>
                                        <ul>
                                            <li><a href="#">Position<span class="right-arrow"></span></a>
                                                <ul>
                                                    <li><a href="#">Name</a></li>
                                                    <li><a href="#">Price</a></li>
                                                    <li><a href="#">Position</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pages">
                                        {{$data['products']->links()}}

                                    </div>
                                </div>

                            </div>
                            <div class="category-products">
                                <ul class="products-grid">
                                    @foreach($data['products'] as $product)
                                        <li class="item col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image">
                                                            @php($image = $product->images()->limit(1)->get())
                                                            @if(count($image) > 0)
                                                                <img src="{{asset('images/product/' . $image[0]->image)}}" alt="Retis lapen casen" height="221" width="221"></a>
                                                        @else
                                                            <img src="{{asset('frontend/products-images/p1.jpg')}}" alt="Retis lapen casen"></a>

                                                        @endif


                                                        <div class="item-box-hover">
                                                            <div class="box-inner">
                                                                <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick View</span></a></div>
                                                                <div class="actions"><span class="add-to-links"><a href="#" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="#" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"><a href="{{route('front.product',$product->slug)}}" title="Retis lapen casen">{{$product->name}}</a> </div>
                                                        <div class="item-content">
                                                            <div class="rating">
                                                                <div class="ratings">
                                                                    <div class="rating-box">
                                                                        <div class="rating" style="width:80%"></div>
                                                                    </div>
                                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box"><span class="regular-price" ><span class="price">$125</span> </span> </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="toolbar">


                                <div class="pager">

                                    <div class="pages">
                                        {{$data['products']->links()}}
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>

            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--main-container col2-left-layout-->
@endsection

@extends('frontend.layouts.frontend')
@section('title',$data['product'][0]->name)
@section('content')
    <div class="page-heading">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div>
                        <ul>
                            <li class="home"> <a href="{{route('front.index')}}" title="Go to Home Page">Home</a> <span>&rsaquo; </span> </li>
                            <li class="category1599"> <a href="{{route('front.category',\App\Models\Category::find($data['product'][0]->category_id)->slug)}}" title="{{$data['product'][0]->name}}">{{\App\Models\Category::find($data['product'][0]->category_id)->name}}</a> <span>&rsaquo; </span> </li>
                        </ul>
                    </div>
                    <!--col-xs-12-->


                    <div class="page-title">
                        <h2>{{$data['product'][0]->name }}</h2>
                    </div>
                    <!--row-->
                </div>
            </div>
            <!--container-->
        </div>
    </div>
    <!-- BEGIN Main Container -->
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main">
            <div class="col-main">
                <!-- Endif Next Previous Product -->
                <div class="product-view wow bounceInUp animated" itemscope="" itemtype="http://schema.org/Product" itemid="#product_base">
                    <div id="messages_product_view"></div>
                    <!--product-next-prev-->
                    <div class="product-essential container">
                        <div class="row">
                            <div class="product-next-prev"> <a class="product-next" title="Next" href="#"></a> <a class="product-prev" title="Previous" href="#"></a> </div>
                            <form action="{{route('frontend')}}" method="post" id="product_addtocart_form">
                                @csrf
                                <input type="hidden" name="product_slug" value="{{$data['product'][0]->slug}}"/>
                                <input type="hidden" name="product_id" value="{{$data['product'][0]->id}}"/>
                                <input type="hidden" name="product_name" value="{{$data['product'][0]->name}}"/>
                                <input type="hidden" name="price" value="{{$data['product'][0]->price}}"/>
                                <!--End For version 1, 2, 6 -->
                                <!-- For version 3 -->
                                <div class="product-img-box col-sm-6 col-xs-12">
                                    @if($data['product'][0]->feature_key  == 1)

                                        <div class="new-label new-top-left"> Feature </div>
                                    @endif
                                    @if($data['product'][0]->stock > 0)
                                        <p class="availability in-stock">
                                            <link itemprop="availability" href="http://schema.org/InStock">
                                            <span>In stock</span></p>
                                    @else
                                        <p  class="availability in-stock">

                                            <span style="color: red">Out of Stock</span></p>

                                    @endif
                                    @php ($images = $data['product'][0]->images()->get())
                                    <div class="product-image">
                                        <div class="large-image"> <a href="{{asset('images/product/' . $images[0]->image)}}" class="cloud-zoom" id="zoom1"> <img src="{{asset('images/product/' . $images[0]->image)}}" alt="product"> </a> </div>
                                        <div class="flexslider flexslider-thumb">
                                            <ul class="previews-list slides">
                                                @foreach($images as $image)
                                                    <li><a href='{{asset('images/product/' . $image->image)}}' class='cloud-zoom-gallery'><img src="{{asset('images/product/' . $image->image)}}" alt = "Thumbnail 1"/></a></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: more-images -->
                                </div>
                                <!--End For version 1,2,6-->
                                <!-- For version 3 -->
                                <div class="product-shop col-sm-6 col-xs-12">

                                    <div class="product-name">
                                        <h1 itemprop="name">{{$data['product'][0]->name}}</h1>
                                    </div>
                                    <!--product-name-->
                                    @include('layouts.includes.flash')
                                    <div class="price-block">
                                        <div class="price-box"> <span class="regular-price" id="product-price-123"> <span class="price">Rs. {{$data['product'][0]->price}}</span> </span> </div>
                                    </div>
                                    <!--price-block-->
                                    <div class="short-description">
                                        <h2>Quick Overview</h2>
                                        <p>{{$data['product'][0]->short_description}}</p>
                                    </div>
                                    <ul type="none">
                                        @foreach($data['product'][0]->attributes as $attribute)
                                            <li>
                                                {{$attribute->name}}
                                                @php($av = explode(',',$attribute->value))
                                                <select name="attribute_id" id="">
                                                    @foreach($av as $v)
                                                        <option value="{{$v}}">{{$v}}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="add-to-box">
                                        <div class="add-to-cart">
                                            <div class="pull-left">
                                                <div class="custom pull-left">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus"></i></button>
                                                    <input type="text" name="qty" id="qty" min="1" max="{{$data['product'][0]->stock}}" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus"></i></button>
                                                </div>
                                                <!--custom pull-left-->
                                            </div>
                                            <!--pull-left-->
                                            <button type="button" title="Add to Cart" class="button btn-cart" onClick="productAddToCartForm.submit(this)"><span>Add to Cart</span></button>
                                        </div>
                                        <!--add-to-cart-->
                                        <div class="email-addto-box">
                                            <p class="email-friend"><a href="#" title="Email to a Friend"><span>Email to a Friend</span></a></p>
                                            <ul class="add-to-links">
                                                <li> <a class="link-wishlist" href="wishlist.html" onClick="" title="Add To Wishlist"><span>Add To Wishlist</span></a> </li>
                                                <li> <span class="separator">|</span> <a class="link-compare" href="Compare.html" title="Add To Compare"><span>Add To Compare</span></a> </li>
                                            </ul>
                                            <!--add-to-links-->
                                        </div>
                                        <!--email-addto-box-->
                                    </div>
                                    <!--add-to-box-->
                                    <!-- thm-mart Social Share-->
                                    <div class="social">
                                        <ul class="link">
                                            <li class="fb"> <a href="http://www.facebook.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                            <li class="linkedin"> <a href="http://www.linkedin.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                            <li class="tw"> <a href="http://twitter.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                            <li class="pintrest"> <a href="http://pinterest.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                            <li class="googleplus"> <a href="https://plus.google.com/" rel="nofollow" target="_blank" style="text-decoration:none;"> </a> </li>
                                        </ul>
                                    </div>
                                    <!-- thm-mart Social Share Close-->
                                </div>
                                <!--product-shop-->
                                <!--Detail page static block for version 3-->
                            </form>
                        </div>
                    </div>
                    <!--product-essential-->
                    <div class="product-collateral container">
                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                            <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>

                        </ul>
                        <div id="productTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="product_tabs_description">
                                <div class="std">
                                    {!! $data['product'][0]->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product_tabs_tags">
                                <div class="box-collateral box-tags">
                                    <div class="tags">
                                        <ul>
                                            @foreach($data['product'][0]->tags as $tag)
                                                <li>{{$tag->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                    <!--product-collateral-->
                    <div class="box-additional">
                        <!-- BEGIN RELATED PRODUCTS -->
                        <div class="related-pro container">
                            <div class="slider-items-products">
                                <div class="new_title center">
                                    <h2>Related Products</h2>
                                </div>
                                <div id="related-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach($data['related_products'] as $related_product)
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info">
                                                            <a href="#" title="Retis lapen casen" class="product-image">
                                                                @php($image = $related_product->images()->limit(1)->get())
                                                                @if(count($image) > 0)
                                                                    <img src="{{asset('images/product/' . $image[0]->image)}}" alt="Retis lapen casen" height="221" width="221"></a>
                                                            @else
                                                                <img src="{{asset('frontend/products-images/p1.jpg')}}" alt="Retis lapen casen"></a>

                                                                @endif

                                                                </a>

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
                                                            <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">{{$related_product->name}}</a> </div>
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
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end related product -->

                    </div>
                    <!-- end related product -->
                </div>
                <!--box-additional-->
                <!--product-view-->
            </div>
        </div>
        <!--col-main-->
    </div>
    <!--main-container-->
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/cloud-zoom.js')}}"></script>
@endsection

@extends('frontend.layouts.frontend')
@section('title','Home page')
@section('content')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @php($i=0)
            @foreach($data['sliders'] as $slider)
                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" @if ($i == 0)
                class="active" @endif ></li>
                @php($i++)
            @endforeach

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @php($i=0)
            @foreach($data['sliders'] as $slider)
                <div class="item @if($i == 0) active @endif">
                    <img src="{{asset('images/slider/' . $slider->image)}}" alt="...">
                    <div class="carousel-caption">
                        {{$slider->title}}
                    </div>
                </div>
                @php($i++)@endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--Category slider Start-->
    <div class="CollectionGrid-container">
        <div class="CollectionGrid container">
            @foreach($data['topcategories'] as $topcategory)
                <a class="CollectionGrid-tile hover-overlay-light" href="#">
                    <div class="CollectionGrid-tileImage align-center">
                        <img src="{{asset('images/category/'. $topcategory->image )}}" alt="bags">
                    </div>
                    <div class="CollectionGrid-tileName js-dotdotdot">
                        {{$topcategory->name}}
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <!--Category silder End-->
    <!-- best Pro Slider -->
    <section class=" wow bounceInUp animated">
        <div class="best-pro slider-items-products container">
            <div class="new_title">
                <h2>Best Seller</h2>
            </div>

            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p1.jpg')}}" alt="Retis lapen casen"></a>

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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p2.jpg')}}" alt="Retis lapen casen"></a>

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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p3.jpg')}}" alt="Retis lapen casen"></a>
                                    <div class="sale-label sale-top-left">Sale</div>
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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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
                    <!-- End Item -->

                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p4.jpg')}}" alt="Retis lapen casen"></a>

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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p5.jpg')}}" alt="Retis lapen casen"></a>

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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="product-detail.html" title="Retis lapen casen" class="product-image"><img src="{{asset('frontend/products-images/p6.jpg')}}" alt="Retis lapen casen"></a>

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
                                    <div class="item-title"><a href="product-detail.html" title="Retis lapen casen">Retis lapen casen</a> </div>
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
                    <!-- End Item -->
                </div>
            </div>
        </div>
    </section>


    <!-- best Pro Slider -->




    <!-- Home Lastest Blog Block -->
    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->
        <div class="new_title">
            <h2>Latest Blog</h2>
        </div>
        <!--blog-title-->
        <!--For version 1,2,3,4,5,6,8 -->

        <div class="blog_block">
            <div class="blog_block_inner">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img src="{{asset('frontend/images/blog-img1.jpg')}}" alt="blog image"> </a>
                            <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date">
                                <time class="entry-date" datetime="2015-05-11T11:07:27+00:00"><span>19</span> <br> March</time>
                            </div>
                            <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                            <a class="readmore" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <!--col-lg-4 col-md-4 col-xs-12 col-sm-4-->
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img src="{{asset('frontend/images/blog-img2.jpg')}}" alt="blog image"> </a>
                            <div class="mask"> <a class="info" href="blog-detail.html">Read More</a> </div>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date">
                                <time class="entry-date" datetime="2015-05-11T11:07:27+00:00"><span>21</span> <br> March</time>
                            </div>
                            <h3><a href="blog-detail.html">Lorem ipsum dolor sit amet, consectetur adipiscing</a></h3>

                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada ...</p>
                            <a class="readmore" href="blog-detail.html">Read More</a> </div>
                    </div>
                    <!--blog_inner-->
                </div>
            </div>
        </div>



        <!--END For version 1,2,3,4,5,6,8 -->
        <!--exclude For version 6 -->
        <!--container-->
    </div>

    <!-- Logo Brand Block -->
    <div class="brand-logo wow bounceInUp animated">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 testimonials-section">
                    <div class="">
                        <ul class="bxslider">
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member1.png')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe	<span>Abc Company</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member2.png')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith	<span>Datsun & Co</span>	</div>
                            </li>
                            <li>
                                <div class="avatar"><img src="{{asset('frontend/images/member3.png')}}" alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offer-slider">
                    <div class="left-coloum-hot">
                        <div class="deal_img"><img src="{{asset('frontend/images/hot_img.png')}}" alt="">
                        </div>
                        <div class="deal_info">
                            <h2><a href="#">Wall Pendent Lamp</a></h2>
                            <div class="starSeparator"></div>
                            <p>Flipmart lighting store is updated regularly with offers.</p>
                            <div class="rating">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div class="rating" style="width:80%"></div>
                                    </div>
                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="box-timer">
                        <div class="countbox_1 timer-grid"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>
@endsection

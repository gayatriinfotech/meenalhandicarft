@extends('frontend/header')
@section('frontend')

<div class="container">
    <div class="row ">
        <!-- <div class="main">
      <hr id="line2">
      <h5>Shop Category</h5>
      <hr id="line3">
    </div> -->
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>Our Category</span></h2>
        </div>

    </div>
    <br>

    <div class="row">
        @foreach($category as $c)
        <div class="col-md-2">
            <a href="{{route('subcate', $c->id)}}" target="_blank"><img src="images/category/{{$c->image}}" class="rounded-circle" id="image-category" alt="..."></a>
            <h6 class="text-center mt-1 dropbtn">{{$c->name}}</h6>
        </div>
        @endforeach
    </div>
    <br>

</div>
<div class="container">
    <div class="row ">
        <!-- <div class="main">
      <hr id="line4">
      <h5>Product</h5>
      <hr id="line5">
    </div> -->
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>Our Products</span></h2>
        </div>

    </div>
</div>


<div class="container">
    <div class="shop-default shop-cards shop-tech">
        <div class="row">
            @foreach($product as $p)
            <div class="col-md-3 mt-3">
                <div class="block product no-border z-depth-2-top z-depth-2--hover border rounded-3">
                    <div class="block-image">
                        @php
                        $images = explode(',',$p->product_image);
                        $count = 0;
                        @endphp
                        @foreach($images as $image)
                        @if($count == 0)
                        <a href="{{route('singleproduct', $p->pid)}}" target="_blank">
                            <img src="/images/products/{{$image}}" class="img-center">
                        </a>
                        @endif
                        @php $count++; @endphp
                        @endforeach
                        @if($p->stocks == 0)
                        <span class="product-ribbon product-ribbon-right product-ribbon--style-1 bg-red text-uppercase">Out of stock</span>
                        @endif
                    </div>
                    <div class="block-body text-center">
                        <h3 class="heading heading-5 strong-600 text-capitalize">

                            <a href="{{route('singleproduct', $p->pid)}}" target="_blank" class="text-dark">
                                {{ Illuminate\Support\Str::limit($p->product_name, 21) }}
                            </a>
                        </h3>
                        <p class="product-description text-dark">
                            {{$p->wholesale_price}}₹
                        </p>
                        <div class="product-buttons mt-1">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <a href="/addtowishlist/{{$p->pid}}" type="button" class="btn-icon">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </div>
                                <div class="col-8">
                                    @if($p->stocks == 0)
                                    <a href="{{route('addtocart', $p->pid)}}" type="button" class="btn btn-block btn-warning btn-circle btn-icon-left disabled">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </a>
                                    @else
                                    <a href="{{route('addtocart', $p->pid)}}" type="button" class="btn btn-block btn-warning btn-circle btn-icon-left">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </a>
                                    @endif
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




<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>New Arrival</span></h2>
        </div><br>
    </div>
    <div class="row">
        @foreach($product as $p)
        <div class="col-md-3 text-center">
            <div class="product-entry image">
                @php
                $images = explode(',',$p->product_image);
                $count = 0;
                @endphp
                @foreach($images as $image)
                @if($count == 0)
                <div class="product-img" style="background-image: url(/images/products/{{$image}});">
                    @endif
                    @php $count++; @endphp
                    @endforeach
                    @if($p->stocks == 0)
                    <p class="tag"><span class="new">Out of stock</span></p>
                    @else
                    <p class="tag"><span class="new">New</span></p>
                    @endif
                    <div class="cart">
                        <p>
                            @if($p->stocks == 0)
                            @else
                            <span class="addtocart"><a href="{{route('addtocart', $p->pid)}}"><i class="fa fa-shopping-cart"></i></a></span>
                            @endif
                            <span><a href="{{route('singleproduct', $p->pid)}}" target="_blank"><i class="fa fa-eye"></i></a></span>
                            <span><a href="/addtowishlist/{{$p->pid}}"><i class="fa fa-heart"></i></a></span>
                        </p>
                    </div>
                </div>

                <div class="desc">
                    <h3><a href="{{route('singleproduct', $p->pid)}}">{{ Illuminate\Support\Str::limit($p->product_name, 21) }}</a></h3>
                    <p class="price"><span>${{$p->wholesale_price}}</span></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- Testimonials start -->
<swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper" speed="600" parallax="true" pagination="true" pagination-clickable="true" navigation="true">
    <div slot="container-start" class="parallax-bg" data-swiper-parallax="-23%"></div>

    <swiper-slide>
        <div class="title text-center" data-swiper-parallax="-300">
            <h1 class="mb-5 ">Testimonials</h1>
        </div>
        <div class=" text-center" data-swiper-parallax="-200">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
            </p>
        </div>
        <div class=" text-center" data-swiper-parallax="-100">
            <img src="{{asset('frontend/image/paper2.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
            <h5 class="mb-3">Shubham mohite</h5>
            <p class="px-xl-3">
                <i class="fa fa-quote-left pe-2"></i>Fitting is just perfect. If you want clothes with perfect fitting get
                in with no doubts.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
            </ul>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="title text-center" data-swiper-parallax="-300">
            <h1 class="mb-5 ">Testimonials</h1>
        </div>
        <div class=" text-center" data-swiper-parallax="-200">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
            </p>
        </div>
        <div class=" text-center" data-swiper-parallax="-100">
            <img src="{{asset('frontend/image/brass1.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
            <h5 class="mb-3">Shubham mohite</h5>
            <p class="px-xl-3">
                <i class="fa fa-quote-left pe-2"></i>Fitting is just perfect. If you want clothes with perfect fitting get
                in with no doubts.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
            </ul>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="title text-center" data-swiper-parallax="-300">
            <h1 class="mb-5 ">Testimonials</h1>
        </div>
        <div class=" text-center" data-swiper-parallax="-200">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                dictum mattis velit, sit amet faucibus felis iaculis nec. Nulla
                laoreet justo vitae porttitor porttitor. Suspendisse in sem justo.
                Integer laoreet magna nec elit suscipit, ac laoreet nibh euismod.
                Aliquam hendrerit lorem at elit facilisis rutrum. Ut at
                ullamcorper velit. Nulla ligula nisi, imperdiet ut lacinia nec,
                tincidunt ut libero. Aenean feugiat non eros quis feugiat.
            </p>
        </div>
        <div class=" text-center" data-swiper-parallax="-100">
            <img src="{{asset('frontend/image/clay.jpg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
            <h5 class="mb-3">Shubham mohite</h5>
            <p class="px-xl-3">
                <i class="fa fa-quote-left pe-2"></i>Fitting is just perfect. If you want clothes with perfect fitting get
                in with no doubts.
            </p>
            <ul class="list-unstyled d-flex justify-content-center mb-0">
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
                <li>
                    <i class="fa fa-star fa-sm text-warning"></i>
                </li>
            </ul>
        </div>
    </swiper-slide>
</swiper-container>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<!-- Testimonials end -->


@endsection
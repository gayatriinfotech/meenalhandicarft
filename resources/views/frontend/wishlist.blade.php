@extends('frontend/header1')
@section('frontend')
<div class="container">
    <div class="row ">
        <!-- <div class="main">
      <hr id="line4">
      <h5>Product</h5>
      <hr id="line5">
    </div> -->
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>Wishlist</span></h2>
        </div>

    </div>
</div>
@if(count($product) == 0)
<img src="frontend/image/empty_wishlist.webp" class="text-center" style="width: 400px;display:block;margin: 0 auto;" alt="">
@else
<div class="container">
    <div class="shop-default shop-cards shop-tech">
        <div class="row">
            @foreach($product as $p)
            <div class="col-md-3 mt-3 mb-5">
                <div class="block product no-border z-depth-2-top z-depth-2--hover border rounded-3">
                    <div class="block-image">
                        @php
                        $images = explode(',',$p->product_image);
                        $count = 0;
                        @endphp
                        @foreach($images as $image)
                        @if($count == 0)
                        <a href="{{route('singleproduct', $p->pid)}}">
                            <img src="/images/products/{{$image}}" class="img-center">
                        </a>
                        @endif
                        @php $count++; @endphp
                        @endforeach
                    </div>
                    <div class="block-body text-center">
                        <h3 class="heading heading-5 strong-600 text-capitalize">
                            <a href="{{route('singleproduct', $p->pid)}}" class="text-dark">
                                {{ Illuminate\Support\Str::limit($p->product_name, 21) }}
                            </a>
                        </h3>
                        <p class="product-description text-dark">
                            {{$p->wholesale_price}}₹
                        </p>
                        <div class="product-buttons mt-4">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <a href="{{route('addtocart', $p->pid)}}" type="button" class="btn btn-block btn-warning btn-circle btn-icon-left">
                                        <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="/removewishlist/{{$p->wid}}" type="button" class="btn-icon" data-toggle="tooltip" data-placement="top" title data-original-title="Favorite">
                                        remove
                                    </a>
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
@endif
@endsection
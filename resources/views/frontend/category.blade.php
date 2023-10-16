@extends('frontend/header1')
@section('frontend')
<!-- Category start -->
<div class="container">
    <div class="row ">
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>{{$category->name}}</span></h2>
        </div>

    </div>
    <br>

    <div class="row">
        @foreach($subcate as $s)
        <div class="col-md-2">
            <a href="{{route('sub', $s->id)}}"><img src="/images/subcategory/{{$s->image}}" class="rounded-circle" id="image-category" alt="..."></a>
            <h6>{{$s->name}}</h6>
        </div>
        @endforeach

    </div>
    <br>
    <br>

    <br>
</div>
<!-- Category end -->

<!-- New Product start -->

<div class="container">
    <div class="row">

        @foreach($product as $p)
        <div class="col-md-3 text-center">
            <div class="product-entry">
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
                            <span><a href="{{route('singleproduct', $p->pid)}}"><i class="fa fa-eye"></i></a></span>
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

<!-- New Product end -->

@endsection
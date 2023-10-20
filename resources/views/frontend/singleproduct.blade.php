@extends('frontend/header1')
@section('frontend')
<br>
<div class="container mx-auto">
    <div class="row">
        <div class="card-wrapper">
            <div class="card3">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            @php
                            $images = explode(',',$product->product_image);
                            @endphp
                            @foreach($images as $image)
                            <img src="/images/products/{{$image}}" alt="shoe image" id="pro-img">
                            @endforeach

                        </div>
                    </div>
                    <div class="img-select">
                        @php
                        $images = explode(',',$product->product_image);
                        $count = 1;
                        @endphp
                        @foreach($images as $image)
                        <div class="img-item shadow">
                            <a href="#" data-id="{{$count}}">
                                <img src="/images/products/{{$image}}" alt="shoe image" id="pro-img">
                            </a>
                        </div>
                        @php $count++; @endphp
                        @endforeach

                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h2 class="product-title">{{$product->product_name}}</h2>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div>

                    <div class="product-price">
                        <p class="last-price">Old Price: <span>{{$product->mrp}}₹</span></p>
                        <p class="new-price">New Price: <span>{{$product->wholesale_price}}₹ <span style="color: #1ade00;">({{$product->mrp - $product->wholesale_price}}₹ off)</span></span></p>
                    </div>

                    <div class="product-detail">
                        <h3>about this item: </h3>
                        <p>{{$product->description}}</p>
                        <!-- <ul>
                            <li>Color: <span>Black</span></li>
                            <li>Available: <span>in stock</span></li>
                            <li>Category: <span>Shoes</span></li>
                            <li>Shipping Area: <span>All over the world</span></li>
                            <li>Shipping Fee: <span>Free</span></li>
                        </ul> -->
                    </div>

                    <div class="purchase-info">
                        @if($product->stocks == 0)
                        <button type="button" class="btn btn-danger disabled">
                            Out of stock 
                        </button>
                        @else
                        <a type="button" href="{{route('addtocart', $product->pid)}}">
                            <button type="button" class="btn">
                                Add to Cart <i class="fas fa-shopping-cart"></i>
                            </button>
                        </a>
                        @endif
                        <a href="/addtowishlist/{{$product->pid}}" type="button" style="background-color: black;" class="btn"><i class="fas fa-heart"></i></a>
                    </div>

                    <!-- <div class="social-links">
                        <p>Share At: </p>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
</script>
@endsection
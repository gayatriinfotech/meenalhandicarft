@extends('frontend/header1')
@section('frontend')
<section class="h-100 h-custom" style="background-color: #ffe6e6;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;height:auto; background-color: white;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h3 class="fw-bold mb-0 text-black">Shopping Cart</h3>
                                        @php
                                        $stocks = 0;
                                        $subtotal = 0;
                                        $count = count($cart);
                                        @endphp
                                        <h6 class="mb-0 text-muted">{{$count}} items</h6>
                                    </div>
                                    <hr class="my-4">
                                    @if($count <= 0) <h2 class="text-center">Empty Cart</h2>
                                        @else
                                        @foreach($cart as $c)

                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                @php
                                                $images = explode(',',$c->product_image);
                                                $counts = 0;
                                                @endphp
                                                @foreach($images as $image)
                                                @if($counts == 0)
                                                <a href="{{route('singleproduct', $c->pid)}}"><img src="images/products/{{$image}}" class="img-fluid rounded-3" alt="diya"></a>
                                                @endif
                                                @php $counts++; @endphp
                                                @endforeach
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">{{$c->product_name}}</h6>
                                                <h6 class="text-black mb-0">Color : Green</h6><br>
                                                <h6 class="text-black mb-0">Price : {{$c->pprice}}₹</h6>
                                                @if($c->stocks == 0)
                                                @php $stocks = 1; @endphp
                                                <p class="text-center text-danger">Out of stocks</p>
                                                @endif
                                            </div>
                                            <input type="hidden" class="cid" value="{{$c->cid}}">
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                @if($c->quantity >= 2)
                                                <button type="button" class="minus btn btn-link px-2" value="{{$c->cid}}">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                @endif

                                                <input id="form1" id="qty" name="quantity" value="{{$c->quantity}}" type="text" class="form-control form-control-sm" />

                                                @if($c->quantity < $c->stocks)
                                                    <button class="plus btn btn-link px-2" value="{{$c->cid}}">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    @endif

                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                @php
                                                $total = $c->pprice * $c->quantity;
                                                $subtotal = $subtotal + $total;
                                                @endphp
                                                <h6 class="mb-0"> {{$total}}₹ </h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="{{route('removecart', $c->cid)}}" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        @endforeach
                                        @endif


                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="/" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey" style="background-color: #fbfafa;">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items {{$count}}</h5>
                                        <h5>{{$subtotal}}₹</h5>
                                    </div>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Shipping</h5>
                                        @if($subtotal < 1000)
                                        @php $subtotal = $subtotal + 40; @endphp
                                        <h5>40₹</h5>
                                        @else
                                        <h5>0₹</h5>
                                        @endif
                                    </div>

                                    <!-- <h5 class="text-uppercase mb-3">Shipping</h5>

                                    <div class="mb-4 pb-2">
                                        <select class="select">
                                            <option value="1">Standard-Delivery- €5.00</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                        </select>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Give code</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div> -->

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>{{$subtotal}}₹</h5>
                                    </div>
                                    @if($count == 0)
                                    <a href="checkout" class="btn btn-dark btn-block btn-lg disabled" data-mdb-ripple-color="dark">Checkout</a>

                                    @else
                                    @if($stocks == 0)
                                    <a href="checkout" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Checkout</a>

                                    @else
                                    <a href="checkout" class="btn btn-dark btn-block btn-lg disabled" data-mdb-ripple-color="dark">Checkout</a>
                                    @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.minus').on('click', function() {
            // alert($(this).val())
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "api/minusqty/" + id,
                success: function(res) {
                    console.log(res.status);
                    location.reload(true);
                }
            });
        });
        $('.plus').on('click', function() {
            // alert($(this).val())
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: "api/plusqty/" + id,
                success: function(res) {
                    console.log(res.status);
                    location.reload(true);
                }
            });
        });
    });
</script>
@endsection
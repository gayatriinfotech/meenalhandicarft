@extends('frontend/header1')
@section('frontend')
<br>
<div class="container mb-5">
    <div class="row">
        <div class="col-md-6 bg-light">
            <div class="row d-flex justify-content-between align-items-center mt-3  ">
                <div class="col-md-2 ">
                    <h5 class="ms-4">Product</h5>
                </div>
                <div class="col-md-2 ">
                    <h5 class="ms-5">Name</h5>
                </div>
                <div class="col-md-2 ">
                    <h5 class="ms-5">Price</h5>
                </div>
                <div class="col-md-2 ">
                    <h5 class="ms-3">Quantity</h5>
                </div>
                <div class="col-md-2 ">
                    <h5 class="ms-2">Total</h5>
                </div>
            </div>
            @php
            $subtotal = 0;
            @endphp
            @foreach($cart as $c)
            <div class="row">
                <hr class="my-1">
                <div class="col-md-3"><br>
                    @php

                    $images = explode(',',$c->product_image);
                    $counts = 0;
                    @endphp
                    @foreach($images as $image)
                    @if($counts == 0)
                    <a href="{{route('singleproduct', $c->pid)}}"><img src="images/products/{{$image}}" height="50" width="70" class="img-fluid rounded-3 ms-4 " alt="diya"></a>
                    @endif
                    @php $counts++; @endphp
                    @endforeach
                </div>
                <div class="col-md-3"><br>
                    <h6 class="text-muted me-3">{{$c->product_name}}</h6>
                    <h6 class="text-black mb-0 me-3">Color : Green</h6>
                </div>
                <div class="col-md-2"><br>
                    <h6 class="mb-0 mt-2 me-3">Rs.{{$c->pprice}}</h6>
                </div>
                <div class="col-md-2"><br>
                    <h6 class="mb-0 mt-2 me-3">{{$c->quantity}}</h6>
                </div>
                <div class="col-md-2"><br>
                    @php
                    $total = $c->pprice * $c->quantity;
                    $subtotal = $subtotal + $total;
                    @endphp
                    <h6 class="mb-0 mt-2 me-3">Rs.{{$total}}</h6>
                </div>
            </div>
            @endforeach
            <hr class="my-2">



        </div>
        <div class="col-md-6 rounded-2" style="background-color: rgb(245 133 133 / 15%);">
            <form class="mb-4" action="/placeorder" method="POST">
                @csrf
                <h4 class="text-center mt-3">Shopping Details</h4><br>
                <input class="name" name="name" type="text" id="chackout-form1" placeholder="Full Name">
                @error('name')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name" name="email" type="email" id="chackout-form1" placeholder="Email">
                @error('email')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name" name="number" type="number" id="chackout-form1" placeholder="Mobile">
                @error('number')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name" name="address" type="text" id="chackout-form1" placeholder="Address (Street & Area)">
                @error('address')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name" name="landmark" type="text" id="chackout-form1" placeholder="Landmark">
                @error('landmark')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name pincode" name="pincode" type="number" id="chackout-form1" placeholder="Pin Code">
                @error('pincode')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name country" name="country" type="text" id="chackout-form1" placeholder="Country">
                @error('country')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name state" name="state" type="text" id="chackout-form1" placeholder="State">
                @error('state')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input class="name city" name="city" type="text" id="chackout-form1" placeholder="City">
                @error('city')
                <p class="text-center" style="color:red;">{{$message}}</p>
                @enderror
                <br><br>
                <input type="hidden" name="subtotal" value="{{$subtotal}}">
                @if($subtotal < 1000) 
                @php $subtotal=$subtotal + 40; @endphp
                @endif 
                <h6 class="float-start ms-5">Total : Rs. {{$subtotal}}</h6><br>
                    <h6 class="">Payment Mode : Cash on delivery</h6><br>
                    <button type="submit" class="btn btn-danger m-auto mt-3" style="display: block;">Place Order</button>
            </form>
        </div>
    </div>
</div>
<script>
    $('.pincode').keyup(function(e) {
        var pincode = e.target.value;
        if (pincode.length >= 6) {
            $.ajax({
                type: 'GET',
                url: "https://api.postalpincode.in/pincode/" + pincode,
                success: function(res) {
                    console.log(res[0].PostOffice[0].District);
                    $('.city').val(res[0].PostOffice[0].District);
                    $('.state').val(res[0].PostOffice[0].State);
                    $('.country').val(res[0].PostOffice[0].Country);
                }
            })

        } else {
            $('.city').val('');
            $('.state').val('');
            $('.country').val('');
        }
    });
</script>
@endsection
@extends('frontend/header1')
@section('frontend')

<div class="container">
    <h3 class="text-center mb-5">My Orders</h3>
    @if(count($orders) == 0)
    <img src="frontend/image/no_orders.png" class="rounded mx-auto d-block" width="300px" alt="">
    <h6 class="mt-2">You haven't placed any order yet!</h6>
    @else
    <table class="table table-hover shadow rounded-3">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Order ID</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Cancel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $o)
            <tr>
                <td>
                    @php
                    $images = explode(',',$o->product_image);
                    $count = 0;
                    @endphp
                    @foreach($images as $image)
                    @if($count == 0)
                    <img src="images/products/{{$image}}" width="80px" class="img-fluid rounded float-start" alt="">
                    @endif
                    @php $count++; @endphp
                    @endforeach
                    <p class="mt-4">{{$o->product_name}}</p>
                </td>
                <td>
                    {{$o->order_id}}<br>
                    Date : {{$o->date}}<br>
                    Time : {{$o->time}}

                </td>
                <td>{{$o->price}}</td>
                <td>
                    {{$o->quantity}}<br>
                    Shipping : {{$o->shipping}}<br>
                    Total : {{$o->total + $o->shipping}}
                </td>
                <td>{{$o->delivery_status}}</td>
                <td>Cancel</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
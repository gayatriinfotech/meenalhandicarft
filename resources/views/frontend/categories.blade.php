@extends('frontend/header1')
@section('frontend')
<!-- Category start -->
<div class="container">
    <div class="row ">
        <div class="col-md-12 col-md-offset-3 text-center colorlib-heading">
            <h2><span>Our Category</span></h2>
        </div>

    </div>
    <br>

    <div class="row">
        @foreach($category as $c)
        <div class="col-md-2">
            <a href="{{route('subcate', $c->id)}}"><img src="images/category/{{$c->image}}" class="rounded-circle" id="image-category" alt="..."></a>
            <h6>{{$c->name}}</h6>
        </div>
        @endforeach

    </div>
    <br>
    <br>

    <br>
</div>
<!-- Category end -->



@endsection
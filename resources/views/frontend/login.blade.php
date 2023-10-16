@extends('frontend/header1')
@section('frontend')
<div class="container "><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-light mb-4 rounded-3" style="height:350px;">
            <form class="sign-form" action="login" method="post">
                @csrf
                <h4 class="text-center mt-4">Sign In</h4>
                <i class="fa-regular fa-user" id="icon-form"></i><br><br>
                <input type="text" class="name" name="email" placeholder="Email"><br><br>
                <input type="password" class="name" name="password" placeholder="Password"><br>

                <button class="but-form rounded-3" type="submit">Login</button>
                <a style="text-decoration: none;color: white;cursor: pointer;" href="/register" class="but-form rounded-3">Sign Up</a>

            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
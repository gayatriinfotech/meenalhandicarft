@extends('frontend/header1')
@section('frontend')

<div class="container"><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-light min-vh-75 rounded-3">
            <form class="sign-form" action="{{route('register.store')}}" method="post">
                @csrf
                <h4 class="text-center mt-4">Sign Up</h4>
                <i class="fa-regular fa-user" id="icon-form"></i><br><br>
                <input type="text" class="name" name="fname" placeholder="Firstname">
                @error('fname')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <br><br>

                <input type="text" class="name" name="lname" placeholder="Lastname">
                @error('lname')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <br><br>

                <input type="email" class="name" name="email" placeholder="Email">
                @error('email')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <br><br>

                <input type="number" class="name" name="phoneno" placeholder="Mobile No">
                @error('phoneno')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <br><br>

                <input type="password" class="name" name="password" placeholder="Password">
                @error('password')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <br><br>

                <input type="password" class="name" name="cpassword" placeholder="Renter Password"><br>
                <button class="but-form rounded-3" type="submit">Sign Up</button>
                <a style="text-decoration: none;color: white;cursor: pointer;" href="/login" class="but-form rounded-3">Login</a>
                <br>
                <br>

                <br>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@endsection
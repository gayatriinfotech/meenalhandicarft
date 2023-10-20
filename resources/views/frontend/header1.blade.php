<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meenal Handicraft</title>
    <link rel="icon" href="{{asset('frontend/image/favicon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/product.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        // autocomplete
        $(document).ready(function() {
            $("#search_text").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: 'searchproduct',
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            response(data);
                            console.log(data);
                        },
                    });
                },
                minLenght: 1,
            });

            $(document).on('click', '.ui-menu-item', function() {
                $('#search_form').submit();
            });

        });



        //sweetalert function
        function showSweetAlert(t, e, i) {
            Swal.fire({
                title: title,
                text: text,
                icon: type
            })
        }
        //sweetalert toast
        function toast(e, t) {
            const i = Swal.mixin({
                toast: !0,
                position: "top-end",
                showConfirmButton: !1,
                timer: 2e3,
                timerProgressBar: !0,
                didOpen: e => {
                    e.addEventListener("mouseenter", Swal.stopTimer), e.addEventListener("mouseleave", Swal.resumeTimer)
                }
            });
            i.fire({
                icon: e,
                title: t
            })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .ui-widget {
        z-index: 2024;
        /* display: block; */
        width: 350px !important;
    }

    .ui-menu-item {
        /* display: block; */
        width: 100%;
    }
</style>


<body>
    @if(Session::has('success'))
    <script>
        toast('success', '{{session("success")}}');
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toast('error', '{{session("error")}}');
    </script>
    @endif
    @if(Session::has('warning'))
    <script>
        toast('warning', '{{session("warning")}}');
    </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="/"><img src="{{asset('frontend/image/meenal_handicraft_logo-removebg-preview.png')}}" height="80" width="150"></a>
            </div>
            <div class="col-md-6 p-4">
                <form id="search_form" action="{{ url('/searching') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="search_product" id="search_text" placeholder="Search Product here..." required>
                        <button type="submit" name="searchbtn" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 p-4 mt-2 ">
                <i class="fas fa-heart"></i>
                <a href="/wishlist" id="icon2">Wishlist</a>&nbsp
                <img src="/frontend/image/order-icon.png" width="25px" alt="">
                <a href="/myorders" id="icon2">My Orders</a>&nbsp
                <a href="/cart" class="text-decoration-none text-dark"><i class="fa-solid fa-cart-shopping"></i> {{session('cart')}}</a>
            </div>
        </div>
    </div>

    <hr id="line1">

    <nav class="navbar navbar-expand-lg navbar-light " id="nav1">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/categories">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/contact">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if(session('userid'))
                        <li class="nav-item">
                            <a href="/profile" class="nav-link text-dark" aria-current="page"><i class="fa fa-user"></i> {{session('username')}} &nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="/logout">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" aria-current="page" href="/register">|&nbsp;&nbsp;&nbsp;&nbsp; Register</a>
                        </li>
                        @endif
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <hr id="line1">
    <!-- <hr id="line1"> -->
    @yield('frontend')
    <br>
    <!-- Footer Start -->
    <div class="site-footer ">
        <div class="container p-5 mt-5">
            <div class="row gx-5">
                <div class="col-lg-4">
                    <div class="widget">
                        <img src="{{asset('frontend/image/meenal_handicraft_logo-removebg-preview.png')}}" height="80" width="150">
                        <p>meenal is a global online marketplace, where people<br> come together to make, sell, buy and collect<br> unique items.</p>
                    </div>
                    <div class="widget">
                        <!-- <h3>Follow us on:</h3> -->
                        <ul class="list-unstyled social">
                            <li><a href="#"><span><i class="fa-brands fa-instagram"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-facebook-f"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="widget">
                        <h3>Category</h3>
                        <ul class="list-unstyled float-left links">
                            @php
                            use App\Models\category;
                            $cate = category::where([
                            ['parent_id', '=', 0],
                            ])->get();
                            @endphp
                            @foreach($cate as $c)
                            <li><a href="{{route('subcate', $c->id)}}">{{$c->name}}</a></li><br>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 ml-auto">
                    <div class="widget">
                        <h3>Link</h3>
                        <ul class="list-unstyled float-left links">
                            <li><a href="/">Home</a></li><br>
                            <li><a href="/about">About Us</a></li><br>
                            <li><a href="/categories">Category</a></li><br>
                            <li><a href="/contact">Contact Us</a></li><br>


                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Contact</h3>
                        <form action="/subscribe" method="POST">
                            @csrf
                            <input class="form-control me-2" type="email" id="search1" name="email" placeholder="Enter Email">
                            <input type="submit" value="Subscribe" id="icon5">
                        </form>
                        <br>
                        <i class="fa-solid fa-location-dot"></i>
                        <span> &nbsp &nbsp 44, Jamna Dairy, Ajmer RoadSodala,<br> &nbsp &nbsp &nbsp &nbsp Jaipur-302006Rajasthan, India</span><br>
                        <ul class="list-unstyled links mb-4">
                            <li><i class="fa-solid fa-envelope"></i><a href="tel://11234567890"> &nbsp &nbsp +91 9404301367</a></li>
                            <li><i class="fa-solid fa-phone"></i><a href="mailto:info@mydomain.com">&nbsp &nbsp svvidap19@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 text-center">
                    <hr>
                    <p>
                        © 2023 www.meenal.com. All rights reserved. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
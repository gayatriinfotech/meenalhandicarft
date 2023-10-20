<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/images/logo/favicon.ico')}}" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
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
                timer: 3e3,
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

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-4">
                        <div class="card mb-0">
                            <div class="card-body border border-primary rounded-2">
                                <a href="/adminlogin" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <!-- <img src="{{asset('frontend/images/logo/vishakatextlogo.jpg')}}" width="80" alt=""> -->
                                    <h3>Retailer Login</h3>
                                </a>
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
                                <form action="/adminlogin" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username">
                                        @error('username')
                                        <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        @error('password')
                                        <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // alert 
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
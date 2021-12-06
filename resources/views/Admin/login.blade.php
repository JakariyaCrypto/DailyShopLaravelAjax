<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces css-->
    <link href="{{ asset('Admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap css-->
    <link href="{{ asset('Admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor css-->
    <link href="{{ asset('Admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main css-->
    <link href="{{ asset('Admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                               <h2 class="logo">Daily <span>Shop</span></h2>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{Route('admin.auth')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>

                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                    @if(session()->has('error'))
                                    <div class="alert alert-danger" role="alert">
                                         {{session('error')}}
                                    </div>
                                    @endif
										
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery -->
    <script src="{{ asset('Admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('Admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor       -->
    <script src="{{ asset('Admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('Admin_assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('Admin_assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main -->
    <script src="{{ asset('Admin_assets/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

    <meta name="author" content="themefisher.com">

    <title>@yield('title')</title>

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">

</head>

<body>


    <!-- Header Start -->

    <header class="navigation">
        <div class="header-top ">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-2 col-md-4">
                        <div class="header-top-socials text-center text-lg-left text-md-left">
                            <a href="https://www.facebook.com/themefisher" target="_blank"><i
                                    class="ti-facebook"></i></a>
                            <a href="https://twitter.com/themefisher" target="_blank"><i class="ti-twitter"></i></a>
                            <a href="https://github.com/themefisher/" target="_blank"><i class="ti-github"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
                        <div class="header-top-info">
                            <a href="tel:+23-345-67890">Call Us : <span>+977 9813834870</span></a>
                            <a href="mailto:support@gmail.com"><i
                                    class="fa fa-envelope mr-2"></i><span>thenepalitimes@gmail.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg  py-4" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    The Nepali <span>Times</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link " href="{{ route('front.logout') }}">Logout</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="contact.html">Register</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('admin.login') }}">Login</a></li>
                        @endif

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <!-- Header Close -->

    <div class="main-wrapper ">

        @yield('content')

        <!-- footer Start -->
        <footer class="footer section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget">
                            <h4 class="text-capitalize mb-4">Company</h4>

                            <ul class="list-unstyled footer-menu lh-35">
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget">
                            <h4 class="text-capitalize mb-4">Quick Links</h4>

                            <ul class="list-unstyled footer-menu lh-35">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget">
                            <h4 class="text-capitalize mb-4">Subscribe Us</h4>
                            <p>Subscribe to get latest news article and resources </p>

                            <form action="#" class="sub-form">
                                <input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
                                <a href="#" class="btn btn-main btn-small">subscribe</a>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3 ml-auto col-sm-6">
                        <div class="widget">
                            <div class="logo mb-4">
                                <h3>The Nepali<span>Times</span></h3>
                            </div>
                            <h6><a href="tel:+977-9813834870">thenepalitimes@gmail.com</a></h6>
                            <a href="thenepalitimes@gmail.com"><span class="text-color h4">+977-9813834870</span></a>
                        </div>
                    </div>
                </div>

                <div class="footer-btm pt-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="copyright">
                                &copy; Copyright Reserved to <span class="text-color">TheNepaliTimes.</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="copyright">
                                Distributed by <a href="https://bipintiwari.com.np/" target="_blank">Bipin Tiwari</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 text-left text-lg-left">
                            <ul class="list-inline footer-socials">
                                <li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i
                                            class="ti-facebook mr-2"></i>Facebook</a></li>
                                <li class="list-inline-item"><a href="https://twitter.com/themefisher"><i
                                            class="ti-twitter mr-2"></i>Twitter</a></li>
                                <li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i
                                            class="ti-linkedin mr-2 "></i>Linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('assets/front/plugins/jquery/jquery.js') }}"></script>

    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('assets/front/plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/front/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/front/js/script.js') }}"></script>

</body>

</html>

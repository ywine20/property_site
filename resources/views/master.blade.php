<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <!-- <link rel="icon" href="../../images/smtlogo.png" type="image/png"> -->
    <link rel="icon" href="{{ asset('image/smtlogo.png') }}" type="image/png">

    <title>@yield('title')</title>


    <!-- Primary Meta Tags -->
    <!-- <title>Sun Myat Tun Construction Co.,Ltd.</title> -->
    <meta name="title" content="Sun Myat Tun Construction Co.,Ltd.">
    <meta name="description"
        content="Sun Myat Tun Construction: We are here to stay - Inspire Better Living with Humility and Affordabilit">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sunmyattunmm.com">
    <meta property="og:title" content="Sun Myat Tun Construction Co.,Ltd.">
    <meta property="og:description"
        content="Sun Myat Tun Construction: We are here to stay - Inspire Better Living with Humility and Affordabilit">
    <meta property="og:image" content="{{ asset('image/smtlogoLarge.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://sunmyattunmm.com">
    <meta property="twitter:title" content="Sun Myat Tun Construction Co.,Ltd.">
    <meta property="twitter:description"
        content="Sun Myat Tun Construction: We are here to stay - Inspire Better Living with Humility and Affordabilit">
    <meta property="twitter:image" content="{{ asset('image/smtlogoLarge.png') }}">



    <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- animate.style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async></script>
    @yield('css')
    <style>
        .slick-dots {
            background-color: white;
        }

        .slick-next {
            width: auto !important;
            right: 0%;
            /* background-color: ; */
        }

        .slick-prev {
            z-index: 100 !important;
            width: auto !important;
            left: -0%;
        }

        .slick-prev:before,
        .slick-next:before {
            /* font-family: 'slick'; */
            font-size: 60px;
            line-height: 1;
            opacity: 1;
            color: rgb(255, 255, 255);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-shadow: -1px 1px 10px rgba(0, 0, 0, 0.178);
        }

        .slick-next:before {
            content: '→' !important;
            /* content: '👉'; */
        }

        .slick-prev:before {
            /* content: '→'; */
            content: '←' !important;

        }


        /* for profile dropdown */
        .profile-dropdown-content {
            position: absolute;
            right: 0;
            margin-top: 5px;
            display: none;
            transition: all 1s;
            backdrop-filter: blur(10px);
            /* display: nonw; */
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        #email-send-success-alert {
            display: none;
        }
    </style>

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136018131-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-136018131-1');
</script>

<body>
    <!--Start Messenger -->

    <!-- Messenger Chat Plugin Code -->

    <!-- Messenger Chat plugin Code -->
    <!-- <div id="fb-root"></div>
  <div id="fb-customer-chat" class="fb-customerchat"> </div>
  <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "353690388313896");
      chatbox.setAttribute("attribution", "biz_inbox");
  </script>
   -->
    <!-- Your SDK code -->
    <!-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> -->

    <!-- End Messenger -->


    <div class="container-fluid p-0">
        <!-- nav -->
        <!-- offcanvas -->
        <!-- offcanvas offcanvas-start -->
        <div class="offcanvas-backdrop fixed-top  backdropHide"></div>
        <div class="side-nav leftMinus " id="sideNav">
            <div class="offcanvas-body ">
                <div class="offcanvas-header">
                    <div class="d-flex justify-content-between align-items-center w-100 bg-secondary">
                        <img src="{{ asset('image/smtlogo.png') }}" alt="" style="width:50px;height:auto">
                        <button class="btn btn-link py-0 px-2" id="slideClose">
                            <i class="bi bi-x fs-2 text-primary"></i>
                        </button>
                    </div>
                    <!--
                <a class="logo-div text-decoration-none fs-1 text-gold bg-primary d-flex justify-content-center align-items-center" href="#" style="height: auto;">
                  <img src="./image/smtlogo.png" alt="" style="width:100%;height:100%">
                </a> -->
                </div>
                <ul class="side-nav-ul list-group me-auto mb-2 mb-lg-0">
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('/') }}">@lang('public.home')</a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('projectlist') }}">@lang('public.project')</a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('aboutus') }}">@lang('public.about')
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('contactus') }}">@lang('public.contact')</a>
                    </li>
                </ul>

            </div>
            <div class="px-2 py-2 d-lg-none position-absolute bottom-0 w-100">
                <div class="d-flex justify-content-start align-items-center">

                    @if (auth()->guard('user')->check())

                        <div class="d-flex flex-column w-100">
                            <a href="{{ route('profile', Auth::guard('user')->user()->id) }}"
                                class="text-decoration-none w-100">
                                <div class="rounded px-3 py-3 text-primary w-100 d-flex justify-content-center align-items-center"
                                    style="    box-shadow: inset 0px 1px 0px #f5cc7a47;">
                                    <div class="rounded rounded-circle border border-primary shadow overflow-hidden me-2"
                                        style="width:40px;height:40px">
                                        @if (isset(Auth::guard('user')->user()->profile_img))
                                            <img src="{{ asset('storage/images/client-profile/' . Auth::guard('user')->user()->profile_img) }}"
                                                alt="" class="w-100 h-100 user-profile"
                                                style="object-fit:cover;" style="object-fit:cover;">
                                        @else
                                            <img src="{{ asset('images/user.png') }}" alt="..."
                                                class="w-100 h-100" style="object-fit:cover;"
                                                style="object-fit:cover;">
                                        @endif
                                    </div>
                                    <span
                                        class="text-primary usernameSmallDevice usernameToShort">{{ Auth::guard('user')->user()->name }}</span>
                                </div>
                            </a>
                            <div class="rounded px-3 py-3 text-primary w-100 text-center"
                                style="box-shadow: inset 0px 1px 0px #f5cc7a47;">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link text-decoration-none text-primary">@lang('public.logout')
                                    </button>
                                </form>
                            </div>

                        </div>
                    @else
                        <button class="btn btn-link text-decoration-none w-100 px-0"
                            onclick="openLoginModalInSmallDevice()">
                            <div class="rounded px-3 py-3 text-primary w-100 text-center"
                                style="box-shadow: inset 0px 1px 0px #f5cc7a47;">
                                @lang('public.login')
                            </div>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <!-- end offcanvas -->

        <nav class="navbar navbar-expand-lg px-2 px-md-0 py-0 fixed-top">
            <div class="container d-flex align-item-center px-0 py-md-1 py-lg-0">
                <a href="{{ url('/') }}"
                    class="logo-div text-decoration-none fs-1 text-gold bg-secondary d-flex justify-content-center align-items-center"
                    style="height: auto;">
                    <img src="{{ asset('image/smtlogo_copy.png') }}" alt="" style="width:100%;height:100%">
                </a>

                <div class="pe-md-0 d-lg-none text-primary" id="sideNavButton">
                    <i class="bi bi-list fs-3 text-primary"></i>
                </div>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <div class="d-none d-lg-inline-flex align-items-center py-1" tabindex="-1" id="offcanvasNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link pe-0 ps-4 py-3 " aria-current="page"
                                href="{{ url('/') }}">@lang('public.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                                href="{{ url('projectlist') }}">@lang('public.project')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                                href="{{ url('aboutus') }}">@lang('public.about')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                                href="{{ url('contactus') }}">@lang('public.contact')</a>
                        </li>
                    </ul>
                    <div class="bg-primary mx-4 opacity-50" style="width:.1px; height:50px;"></div>
                    <div class="">
                        @if (auth()->guard('user')->check())

                            <div class="profile-dropdown position-relative">

                                <div class="profile-dropdown position-relative">
                                    <a href="{{ route('profile', Auth::guard('user')->user()->id) }}"
                                        class="text-decoration-none  d-flex justify-content-center align-items-center nav-profile ">
                                        <span
                                            class="text-primary me-2 usernameLargeDevice usernameToShort">{{ Auth::guard('user')->user()->name }}</span>
                                        <div class="rounded rounded-circle border border-primary shadow overflow-hidden"
                                            style="width:40px;height:40px">
                                            @if (isset(Auth::guard('user')->user()->profile_img))
                                                <img src="{{ asset('storage/images/client-profile/' . Auth::guard('user')->user()->profile_img) }}"
                                                    alt="" class="w-100 h-100 user-profile"
                                                    style="object-fit:cover;">
                                            @else
                                                <img src="{{ asset('images/user.png') }}" alt="..."
                                                    class="w-100 h-100" style="object-fit:cover;">
                                            @endif
                                        </div>
                                    </a>

                                    <div
                                        class="profile-dropdown-content card bg-secondary bg-opacity-75 border border-1 border-opacity-25 border-primary">
                                        <div class="card-body">
                                            <div class="d-flex flex-row align-items-center gap-3">
                                                <div class="rounded rounded-circle border border-primary shadow overflow-hidden"
                                                    style="width:40px;height:40px">
                                                    @if (isset(Auth::guard('user')->user()->profile_img))
                                                        <img src="{{ asset('storage/images/client-profile/' . Auth::guard('user')->user()->profile_img) }}"
                                                            alt="" class="w-100 h-100 user-profile"
                                                            style="object-fit:cover;">
                                                    @else
                                                        <img src="{{ asset('images/user.png') }}" alt="..."
                                                            class="w-100 h-100" style="object-fit:cover;">
                                                    @endif
                                                </div>
                                                <div class="">
                                                    @if (isset(Auth::guard('user')->user()->profile_img))
                                                        <p>shi tal image</p>
                                                    @endif
                                                    <a href="{{ route('profile', Auth::guard('user')->user()->id) }}"
                                                        class="text-primary text-decoration-none"><span
                                                            class="d-block fw-bold usernameLargeDevice usernameToShort text-primary">{{ Auth::guard('user')->user()->name }}</span></a>
                                                    <a href="{{ route('profile', Auth::guard('user')->user()->id) }}"
                                                        class="text-primary text-decoration-none"><span
                                                            class="text-primary emailToShort">{{ Auth::guard('user')->user()->email }}</span></a>
                                                </div>
                                            </div>
                                            <div class="w-100 bg-primary text-secondary text-center py-2 mt-3">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit"
                                                        class="text-secondary btn btn-link text-decoration-none px-0 py-0">@lang('public.logout')
                                                    </button>
                                                    <!-- <a href="{{ route('logout') }}" class="text-secondary text-decoration-none">LOG OUT</a> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <button class="btn btn-link text-decoration-none"
                                onclick="openLoginModal()">@lang('public.login')</button>
                        @endif
                    </div>
                </div>
        </nav>
        <!-- end nav -->

        @yield('content')

        <!-- footer -->
        <section id="footer" class="bg-secondary">
            <div class="container-fluid bg-secondary py-3 overflow-hidden">
                <div class="container">
                    <div
                        class="row px-0 py-0 flex-row  text-start justify-content-around justify-content-md-between align-items-center">
                        <div class="col-12 col-md-7 col-lg-6 col-xl-5 text-center text-md-start">
                            <h5 class="fw-bold text-gold text-uppercase">@lang('public.contactus')</h5>
                            <div
                                class="d-flex flex-column-reverse flex-md-row justify-content-center align-items-center justify-content-md-start align-items-md-center">
                                <div class="">
                                    <ul class="list-group">
                                        <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                            <a href="tel:+959777700111" class="text-decoration-none text-nowrap ">
                                                <i class="bi bi-telephone-fill"></i>
                                                09777700111,
                                            </a>
                                            &nbsp;
                                            <a href="tel:+959777700222" class="text-decoration-none text-nowrap ">
                                                09777700222
                                            </a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                            <a href="mailto:sales@sunmyattun.com" target="_blank"
                                                class="text-decoration-none text-nowrap">
                                                <i class="bi bi-envelope"></i>
                                                sales@sunmyattun.com
                                            </a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                            <a href="https://www.facebook.com/Sunmyattun" target="_blank"
                                                class="text-decoration-none text-nowrap ">
                                                <i class="bi bi-facebook"></i>
                                                @lang('public.company')
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class=" ms-md-4">
                                    <div class="d-flex ">
                                        <div class="d-none d-md-block"
                                            style="width: 1px;height: 80px;background-color: var(--gold);opacity: .3;">
                                        </div>
                                        <div class="ms-md-3">
                                            <ul class="list-group">
                                                <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                                    <a href="{{ url('faq') }}" class="text-decoration-none ">
                                                        @lang('public.faqs')
                                                    </a>
                                                </li>
                                                <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                                    <a href="{{ url('termcondition') }}"
                                                        class="text-decoration-none text-nowrap ">
                                                        @lang('public.termsandcon')
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3  col-lg-2 col-xl-2 bg-danger px-0 footer-logo">
                            <img src="/image/smtlogoLarge.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div
                    class="col-12 text-center bg-white bg-opacity-10 py-3 d-flex justify-content-center align-items-center">
                    <div class="pointer mx-2">
                        <a href="locale/en"> <img src="{{ asset('image/EnglishFlag.jpg') }}" alt=""
                                class="rounded" style="width:40px;height:30px">
                            <span class="text-primary d-none d-md-inline">English</span></a>

                    </div>
                    <div class="pointer mx-2">
                        <a href="locale/my">
                            <img src="{{ asset('image/BurmaFlag.jpg') }}" alt="" class="rounded"
                                style="width:40px;height:30px">
                            <span class="text-primary d-none d-md-inline">Myanmar</span>
                        </a>

                    </div>
                </div>
            </div>
    </div>
    </div>

    </div>
    </section>
    <!-- end footer -->
    </div>




    <!--Customer LOG IN -->
    <div id="loginModal" class="custom-modal ">
        <div class="login d-flex justify-content-center w-100 bg-secondary bg-opacity-10 vh-100 py-5">
            <div class="card  border-0 bg-white shadow px-2 py-2 animate__animated animate__fadeIn"
                style="width:400px;height:fit-content">
                <span class="close fs-5 me-2 end-0 position-absolute pointer loginClose"
                    onclick="closeLoginModal()">&times;</span>
                <div class="card-body">
                    <h4 class="mb-4">Log In To Sun Myat Tun</h4>
                    <form enctype="multipart/form-data" class="login-form">
                        <!-- email -->
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control form-control-border-bottom"
                                id="floatingInputLoginEmail" placeholder="name@example.com">
                            <label for="floatingInputLoginEmail">Email</label>
                            <small class="error-text login_email_error text-danger"></small>

                        </div>
                        <!-- password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password"
                                class="form-control form-control-border-bottom @error('email') is-invalid @enderror"
                                id="floatingInputLoginPassword" placeholder="name@example.com">
                            <label for="floatingInputLoginPassword">Password</label>
                            <small class="error-text login_password_error text-danger"></small>

                        </div>

                        <!-- login Button -->
                        <button type="submit"
                            class="btn btn-secondary btn-lg rounded-2 w-100 text-primary fw-bolder text-uppercase mt-2">LOG
                            IN</button>

                    </form>
                    <!-- forgot password -->
                    <div class="w-100 text-end mb-3">
                        <button class=" btn btn-link text-decoration-none " onclick="openForgotPasswordModal()"><span
                                class="text-primary">Forgot Password?</span></buttonhref=>
                    </div>
                    <!-- login with social app -->
                    <div class="text-center w-100 pt-1 d-none">
                        <button class="btn rounded-circle border border-secondary mx-1 social-icon">
                            <i class="bi bi-google fa-fw text-secondary fs-5"></i>
                        </button>
                        <button class="btn rounded-circle border border-secondary social-icon">
                            <i class="bi bi-facebook fa-fw text-secondary fs-5"></i>
                        </button>
                    </div>
                    <!-- don't have an account -->
                    <div class="text-center w-100 my-3">
                        <small class="d-flex justify-content-center align-items-center">Don't have an account?
                            <button class="btn btn-link text-primary" onclick="openRegisterModal()">Register</button>
                            Now!
                        </small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Customer Register -->
    <div id="registerModal" class="custom-modal">
        <div class="register d-flex justify-content-center w-100 bg-secondary bg-opacity-10 py-5 ">
            <div class="card bg-white shadow px-2 py-2 animate__animated animate__fadeIn"
                style="width:400px;height:fit-content">
                <span class="close fs-5 me-2 end-0 position-absolute pointer registerClose"
                    onclick="closeRegisterModal()">&times;</span>
                <div class="card-body">
                    <h4 class="mb-4">Register To Sun Myat Tun</h4>
                    <form action="{{ route('register') }}" method="POST" class="register-form">
                        @csrf
                        <!-- user name -->
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control form-control-border-bottom"
                                id="floatingInputName" placeholder="JohnDoe" />
                            <label for="floatingInputName">User Name</label>
                            <small class="error-text register_name_error text-danger"></small>
                        </div>
                        <!-- email -->
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control form-control-border-bottom"
                                id="floatingInputEmail" placeholder="name@example.com" />
                            <label for="floatingInputEmail">Email</label>
                            <small class="error-text register_email_error text-danger"></small>
                        </div>
                        <!-- password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control form-control-border-bottom"
                                id="floatingInputPassword" placeholder="name@example.com" />
                            <label for="floatingInputPassword">Password</label>
                            <small class="error-text register_password_error text-danger"></small>
                        </div>
                        <!-- confirm password -->
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-border-bottom" id="floatingInputConfirmPassword"
                                placeholder="name@example.com" />
                            <label for="floatingInputConfirmPassword">Confirm Password</label>
                            <small class="error-text register_passwordConfirm_error text-danger"></small>
                        </div>
                        <!-- registere Button -->
                        <button type="submit"
                            class="btn btn-secondary btn-lg rounded-2 w-100 text-primary fw-bolder text-uppercase my-5">Register</button>
                    </form>
                    <!-- register with social app -->
                    <div class="text-center w-100 d-none">
                        <button class="btn rounded-circle border border-secondary mx-1 social-icon">
                            <i class="bi bi-google fa-fw text-secondary fs-5"></i>
                        </button>
                        <button class="btn rounded-circle border border-secondary social-icon">
                            <i class="bi bi-facebook fa-fw text-secondary fs-5"></i>
                        </button>
                    </div>
                    <!-- Already have an account -->
                    <div class="text-center w-100 my-3">
                        <small class="d-flex justify-content-center align-items-center">Don't have an account?
                            <button class="btn btn-link text-primary" onclick="openLoginModal()">Log in</button> Now!
                        </small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Customer forgot password -->
    <div id="forgotPasswordModal" class="custom-modal ">
        <div class="forgotPassword d-flex justify-content-center w-100 bg-secondary bg-opacity-10 vh-100 py-5">
            <div class="card  border-0 bg-white shadow px-2 py-2 animate__animated animate__fadeIn"
                style="width:400px;height:fit-content">
                <span class="close fs-5 me-2 end-0 position-absolute pointer forgoPasswordCloseButton"
                    onclick="closeforgotPasswordModal()">&times;</span>
                <div class="card-body">
                    <h5 class="mb-4 fw-bolder">Forgot Password?</h5>
                    <span class="text-black-50 mb-5" style="font-size: .9rem;">Please Enter Your Email Address To
                        Receive A New Password</span>
                    <form action="{{ route('forgotPassword') }}" id="forgot_password_form" method="POST">
                        @csrf
                        <!-- email -->
                        <div class="form-floating mb-5">
                            @if (auth()->guard('user')->check())
                                <input type="email" name="email"
                                    value="{{ Auth::guard('user')->user()->email }}"
                                    class="form-control form-control-border-bottom" id="floatingInput"
                                    placeholder="name@example.com" />
                            @else
                                <input type="email" name="email" value=""
                                    class="form-control form-control-border-bottom" id="floatingInput"
                                    placeholder="name@example.com" />
                            @endif
                            <label for="floatingInput">Vertify Email Address</label>
                            <small class="text-danger forgotPasswordError"></small>
                        </div>
                        <button type="submit" id="send-email-btn"
                            class="btn btn-secondary btn-lg rounded-2 w-100 text-primary fw-bolder text-uppercase">SEND</button>
                        <div id="email-send-success-alert"
                            class="alert alert-success my-3 text-center animate__animated animate__slideInDown">
                            Vertify Email Send Successfully.<br> Check Your Email. <br>
                            @if (!auth()->guard('user')->check())
                                <button class="btn btn-link text-success" onclick="openLoginModal()">Log in</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/counter_up.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <!-- <script src="../js/script.js"></script> -->


    <script>
        //send message
        let input = document.querySelector('.send-input-tag');
        let sendBtn = document.getElementById('sendBtn');
        let sendMail = document.getElementById('sendMail');

        if (sendBtn) {
            sendBtn.addEventListener('click', (e) => {
                e.preventDefault();
                let send = e.target.href;
                // mailto:test@example.com?subject=SMT Information Website!&body=This is only a test!
                send = `mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=${input.value}`;
                sendMail.action = send;
                sendMail.submit();
                // console.log(sendMail.action);
            })
        }

        //end send message
    </script>
    <script>
        // LOGIN AND REGISTER
        let loginModal = document.getElementById("loginModal");
        let registerModal = document.getElementById("registerModal");
        let forgotPasswordModal = document.getElementById("forgotPasswordModal");
        let loginCloseButton = document.getElementsByClassName("loginClose")[0];
        let registerCloseButton = document.getElementsByClassName("registerClose")[0];
        let forgoPasswordCloseButton = document.getElementsByClassName("forgoPasswordCloseButton")[0];

        function openLoginModal() {
            registerModal.style.display = "none";
            forgotPasswordModal.style.display = "none";
            loginModal.style.display = "block";
            document.body.classList.add('backdropShow');

        }

        function openRegisterModal() {
            loginModal.style.display = "none";
            registerModal.style.display = "block";
            document.body.classList.add('backdropShow');

        }

        function openForgotPasswordModal() {
            loginModal.style.display = "none";
            registerModal.style.display = "none";
            forgotPasswordModal.style.display = "block";
            document.body.classList.add('backdropShow');

        }

        function openLoginModalInSmallDevice() {
            sideBarCloseOpen();
            loginModal.style.display = "block";
            document.body.classList.add('backdropShow');
        }

        loginCloseButton.onclick = function() {
            loginModal.style.display = "none";
            document.body.classList.remove('backdropShow');
        }
        registerCloseButton.onclick = function() {
            registerModal.style.display = "none";
            document.body.classList.remove('backdropShow');
        }
        forgoPasswordCloseButton.onclick = function() {
            forgotPasswordModal.style.display = "none";
            document.body.classList.remove('backdropShow');
            emailSendSuccessAlert.style.display = 'none';
            forgotPasswordForm.reset();
        }


        //limit username
        function subName(text, maxLength) {
            return text.substring(0, maxLength) + "...";
        }

        let userNameLong = document.querySelectorAll(".usernameToShort");


        // Username Short
        for (let i = 0; i < userNameLong.length; i++) {
            if (userNameLong[i].innerText.length > 15) {
                let changeName = subName(userNameLong[i].innerText, 15);
                userNameLong[i].innerText = changeName;
            }
        }
    </script>
    <script>
        // Email Short
        let emailToShort = document.querySelectorAll(".emailToShort");
        for (let i = 0; i < emailToShort.length; i++) {
            if (emailToShort[i].innerText.length > 25) {
                let changeEmail = subName(emailToShort[i].innerText, 25);
                emailToShort[i].innerText = changeEmail;
            }
        }
    </script>
    <script>
        //login form with axios
        const loginForm = document.querySelector('.login-form');
        loginForm.addEventListener('submit', e => {
            e.preventDefault();

            const email = loginForm.elements.email.value;
            const password = loginForm.elements.password.value;


            axios.post('/login', {
                    email: email,
                    password: password
                })
                .then(response => {

                    localStorage.setItem('token', JSON.stringify(response.data.access_token));
                    window.location.reload();
                    // // console.log(response.data);
                    // loginModal.style.display = "none";
                    // document.body.classList.remove('backdropShow');

                    // Redirect to dashboard or home page
                })
                .catch(err => {

                    // handle the error response
                    // console.log(err.response.data);

                    document.querySelector('.login_email_error').innerText = '';
                    document.querySelector('.login_password_error').innerText = '';
                    if (err.response) {
                        let {
                            error
                        } = err.response.data;
                        const emailError = error.email ? error.email[0] : '';
                        const passwordError = error.password ? error.password[0] : '';
                        document.querySelector('.login_email_error').innerText = emailError;
                        document.querySelector('.login_password_error').innerText = passwordError;
                    } else if (err.request) {
                        console.log('request error', err.request)
                    } else {
                        // Anything else
                        console.log('Error', err.message);
                    }
                });
        });

        //register form with axios
        const registerForm = document.querySelector('.register-form');
        registerForm.addEventListener('submit', e => {
            e.preventDefault();
            const name = registerForm.elements.name.value;
            const email = registerForm.elements.email.value;
            const password = registerForm.elements.password.value;
            const password_confirmation = registerForm.elements.password_confirmation.value;


            axios.post('/register', {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                })
                .then(response => {
                    localStorage.setItem('token', JSON.stringify(response.data.access_token));
                    window.location.reload();
                    // // console.log(response.data);
                    // loginModal.style.display = "none";
                    // document.body.classList.remove('backdropShow');          console.log(response.data);
                    // localStorage.setItem('token', JSON.stringify(response.data.token));

                })
                .catch(err => {

                    // handle the error response
                    console.log(err.response.data);

                    document.querySelector('.register_name_error').innerText = '';
                    document.querySelector('.register_email_error').innerText = '';
                    document.querySelector('.register_password_error').innerText = '';
                    document.querySelector('.register_passwordConfirm_error').innerText = '';

                    if (err.response) {
                        const {
                            error
                        } = err.response.data;
                        const nameError = error.name ? error.name[0] : '';
                        const emailError = error.email ? error.email[0] : '';
                        const passwordError = error.password ? error.password[0] : '';
                        const passwordConfirmError = error.password_confirmation ? error.password_confirmation[
                            0] : '';

                        document.querySelector('.register_name_error').innerText = nameError;
                        document.querySelector('.register_email_error').innerText = emailError;
                        document.querySelector('.register_password_error').innerText = passwordError;
                        document.querySelector('.register_passwordConfirm_error').innerText =
                            passwordConfirmError;

                    } else if (err.request) {
                        console.log('request error', err.request)
                    } else {
                        // Anything else
                        console.log('Error', err.message);
                    }
                });
        });



        //forgot password form with axios
        const forgotPasswordForm = document.querySelector('#forgot_password_form');
        const emailSendSuccessAlert = document.querySelector('#email-send-success-alert');
        forgotPasswordForm.addEventListener('submit', (e) => {
            e.preventDefault();

            let sendEmailBtn = document.querySelector('#send-email-btn');
            // update button appearance to show loading state
            sendEmailBtn.innerHTML = "Sending...";
            sendEmailBtn.disabled = true;

            const email = forgotPasswordForm.elements.email.value;


            //end send message
            // if (!email) {
            //   console.log('Email is required');
            //   return;
            // }

            const forgotPasswordFormData = new FormData();
            // forgotPasswordFormData.append('email',email)
            // let userId = document.querySelector('.userId').value;

            axios.post(`/forgotpassword`, {
                    email: email,
                })
                .then(response => {
                    console.log(response.data);
                    document.querySelector('.forgotPasswordError').innerText = '';
                    sendEmailBtn.innerHTML = "Send";
                    sendEmailBtn.style.display = 'none';
                    emailSendSuccessAlert.style.display = 'block';
                    // sendEmailBtn.disabled = ;
                }).catch(error => {
                    let passwordError = error.response.data.error;
                    console.log(error.response);
                    document.querySelector('.forgotPasswordError').innerText = passwordError.email ?
                        passwordError.email[0] : '';
                    sendEmailBtn.innerHTML = "Send";
                    sendEmailBtn.disabled = false;
                })

        })
    </script>


    @yield('script')
    @stack('clientScript')


</body>

</html>

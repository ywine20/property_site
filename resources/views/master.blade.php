<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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





    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--      <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css "> --}}
    <link rel="stylesheet" href="css/animate.css">

    <!-- animate.style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div id="fb-root"></div> <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat"> </div>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "353690388313896");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script> <!-- Your SDK code -->
    <script>
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
    </script>

    <!-- End Messenger -->


    <div class="container-fluid p-0">
        <!-- nav -->
        <!-- offcanvas -->
        <!-- offcanvas offcanvas-start -->
        <div class="offcanvas-backdrop fixed-top  backdropHide"></div>
        <div class="side-nav leftMinus" id="sideNav">
            <div class="offcanvas-body">
                <div class="offcanvas-header">
                    <div class="d-flex justify-content-between align-items-center w-100 bg-secondary">
                        <img src="./image/smtlogo.png" alt="" style="width:50px;height:auto">
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
                            href="{{ url('/') }}">{{ __('master.home') }}</a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('projectlist') }}">{{ __('master.project') }}</a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('aboutus') }}">{{ __('master.about') }}</a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link nav-link px-2 py-3" aria-current="page"
                            href="{{ url('contactus') }}">{{ __('master.contact') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end offcanvas -->

        <!----language--->
        {{-- <div class="container">
            <h1>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</h1>
            <div class="row">
                <div class="col-md-2 col-md-offset-6 text-right">
                    <strong>Select Language: </strong>
                </div>
                <div class="col-md-4">
                    <select class="form-control changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English
                        </option>
                        <option value="fr" {{ session()->get('locale') == 'mm' ? 'selected' : '' }}>Myanmar
                        </option>
                        </option>
                    </select>
                </div>
            </div>
            <h1>{{ __('master.home') }}</h1>
            <!--language--> --}}

    </div>
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
            <div class="d-none d-lg-block py-1" tabindex="-1" id="offcanvasNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link pe-0 ps-4 py-3 " aria-current="page"
                            href="{{ url('/') }}">{{ __('master.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                            href="{{ url('projectlist') }}">{{ __('master.project') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                            href="{{ url('aboutus') }}">{{ __('master.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 ps-4 py-3" aria-current="page"
                            href="{{ url('contactus') }}">{{ __('master.contact') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->


    @yield('content')

    <!-- footer -->
    <section id="footer">
        <div class="container-fluid bg-secondary py-3 overflow-hidden">
            <div class="container">
                <div
                    class="row px-0 py-0 flex-row  text-start justify-content-around justify-content-md-between align-items-center">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5 text-center text-md-start">
                        <h5 class="fw-bold text-gold text-uppercase">Contact Us</h5>
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
                                            Sun Myat Tun Construction Co.,Ltd
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
                                                    FAQs
                                                </a>
                                            </li>
                                            <li class="list-group-item bg-transparent border-0 text-gold px-0">
                                                <a href="{{ url('termcondition') }}"
                                                    class="text-decoration-none text-nowrap ">
                                                    Terms And Conditions
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
    </section>
    <!-- end footer -->

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./js/jquery.waypoints.js"></script>
    <script src="./js/counter_up.js"></script>
    <script src="../js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.fb-slider').slick({
                dots: false,
                arrows: true,
                infinite: false,
                autoplay: false,
                autoplaySpeed: 2000,

                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 2,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        });



        //facebook post slider
        let disable = 'slick-disabled'

        let slickFun = () => {
            let slickNext = document.querySelector('.slick-next');
            let hasDisable = slickNext.classList.contains("slick-disabled");
            let seeMoreButton = document.querySelector('.seemore-fb');

            // console.log('hie sem more')
            if (hasDisable) {
                // console.log('show see more button')
                seeMoreButton.classList.add('show');
            } else {
                // console.log('hide see more')
                seeMoreButton.classList.remove('show');

            }

        }

        setInterval(slickFun, 500)
        //end facebook post slider
    </script>
    <script>
        //counterUp
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });


        //send message
        let input = document.querySelector('.send-input-tag');
        let sendBtn = document.getElementById('sendBtn');
        let sendMail = document.getElementById('sendMail');

        sendBtn.addEventListener('click', (e) => {
                e.preventDefault();
                let send = e.target.href;
                // mailto:test@example.com?subject=SMT Information Website!&body=This is only a test!
                send = `mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=${input.value}`;
                sendMail.action = send;
                sendMail.submit();
                console.log(sendMail.action);
            })

            //end send message


            <
            script type = "text/javascript" >
            var url = "{{ route('changeLang') }}";
        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        }); <
        />
        @yield('script')

        @stack('clientScript')

            <
            /body>

            <
            /html>

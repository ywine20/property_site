<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMT</title>
    <link rel="icon" href="{{asset('image/smtlogo.png')}}" type="image/png">


    {{-- <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/layout.css"> --}}
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/contact-us.css')}}">



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../css/datatable.css">

    <!--    sweetalert2-->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @yield('head')

    @yield('style')
</head>
<body>

<!--            backdrop-->
<div class="w-100 vh-100 bg-black opacity-50 position-absolute top-0 d-none" id="backdrop"></div>
<!-- backdrop-->


<section id="app">
    <div class="row justify-content-start align-items-center g-0">
        <!--            start Aside-->
        <!--            col-4 col-md-3 col-lg-2-->
        <aside class="vh-100 bg-secondary aside-hide ">
            <div class="d-flex justify-content-end">
                <button class="btn btn-link " id="close-aside">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <div class="header justify-content-center align-items-center">
                <img src="{{asset('image/smtlogo.png')}}" alt="">
            </div>
            <div id="side"  class="bg-secondary w-100 my-3">
                <ul class="list-unstyled">
                    <a class="side-link w-100 {{ Request::is('admin') ? 'active': '' }}" href="{{url('/admin')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3 ">
                            Dashboard
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/contact*') ? 'active': '' }}" href="{{url('admin/contact')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Contact Us
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/project*') ? 'active': '' }}" href="{{url('admin/project')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Projects
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/category*') ? 'active': '' }}" href="{{url('admin/category')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Cateogries
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/amenity*') ? 'active': '' }}" href="{{url('admin/amenity')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Amenities
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/address*') ? 'active': '' }}" href="{{url('admin/address')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Address
                        </li>
                    </a>
                    <a class="side-link   w-100 {{ Request::is('admin/facebooklink*') ? 'active': '' }}" href="{{url('admin/facebooklink')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Facebook Link
                        </li>
                    </a>
                    <a class="side-link  w-100 {{ Request::is('admin/slider*') ? 'active': '' }}" href="{{url('admin/slider')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Slider Images
                        </li>
                    </a>
                    @if(Auth()->guard('admin')->user()->id == 1)
                    <a class="side-link  w-100 {{ Request::is('admin/setting*') ? 'active': '' }}" href="{{url('admin/setting')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Setting
                        </li>
                    </a>
                    @endif
                </ul>
            </div>
        </aside>
        <!--            end Aside-->
        <!--            col-12 col-md-12 col-lg-10-->
        <div class=" min-vh-100 px-0 g-0 right">
            <!--                start Nav-->
            <nav class="navbar position-sticky top-0">
                <div class="container-fluid">
                    <button class="btn btn-link fs-3 text-primary menu-list">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="d-flex flex-row justify-content-end  align-items-center">
                        <div class="contact-noti position-relative me-3 ">
                            <a href="{{route('welcome')}}" class="p-1" target="_blank">
                                <i class="bi bi-box-arrow-up-right fs-3 fa-fw "></i>
                                <div class="position-absolute d-none p-1 rounded-circle top-0 end-0" style="width: 10px;height:10px;">
                                </div>
                            </a>
                        </div>
                        {{-- <div class="contact-noti position-relative me-3 ">
                            <a href="{{route('contact.index')}}" class="p-1">
                                <i class="bi bi-bell-fill fs-3 fa-fw "></i>
                                <div class="position-absolute bg-danger p-1 rounded-circle top-0 end-0" style="width: 10px;height:10px;">
                                </div>
                            </a>
                        </div> --}}
                        <div class="dropdown">
                            @if(Auth::guard('admin')->check())
                            <div class="profile d-flex align-items-center pe-2 text-primary" style="min-width: max-content;">
                                <div class="overflow-hidden rounded rounded-circle  dropdown-toggle border border-primary border-opacity-50" data-bs-toggle="dropdown" data-bs-offset="20,20" style="width:50px;height:50px">
                                    @auth('admin')
                                    <img src="{{ url('images/admin/' . Auth::guard('admin')->user()->image ?? '../no_image.jpg') }}" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                    @endauth
                                </div>
                                <div class="dropdown-menu dropdown-menu-end bg-secondary text-primary py-0">
                                    <!--                                    profile hover card-->
                                    <div class="profile-hover-card">
                                        <div class="card bg-secondary text-primary px-2 py-2" style="max-width: 500px" >
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-light px-3"> SMT Dashboard </span>
                                                <form action="{{ url('/admin/logout') }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-link fw-light">LogOut</button>
                                                </form>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center my-3 px-3">
                                                <div class="overflow-hidden rounded rounded-circle border border-primary " style="width:100px;height:100px">
                                                    @auth('admin')
                                                    <a href="">
                                                        <img src="{{ url('images/admin/' . Auth::guard('admin')->user()->image ?? '../no_image.jpg') }}" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                                    </a>
                                                    @endauth
                                                </div>
                                                <div class="ps-3">
                                                    @endif
                                                    <span class="fs-5 fw-bold">{{Auth::guard('admin')->user()->name}}</span>
                                                    <span class="fw-light d-block mb-3">{{Auth::guard('admin')->user()->email}}</span>
                                                    <a href="{{url('/admin/user')}}" class="text-decoration-underline fw-light">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    end profile card-->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
            <!--                end Nav-->
            {{-- content start --}}
            @yield('content')
            {{-- end content --}}
        </div>
        <!--            end Nav-->
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="../node_modules/bootstrap/dist/js/bootstrap.js "></script>
<!--<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js "></script>-->
<script src="{{asset('js/layout.js')}}"></script>
<script src="../../js/app.js"></script>
{{--<script src="{{asset('js/appp.js')}}"></script>--}}
{{--<script src="../../js/layout.js"></script>--}}
@yield('script')
@stack('customScript')

@if(session('status'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            showConfirmButton: false,
            showCloseButton:true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            background:'#423e3d',
            color:'#fff',
            position: 'top',
            title: '{{ session('status') }}'
        })
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            background:'#423e3d',
            confirmButtonColor: '#F5CC7A',
            cancelButtonColor: '#f36565',
            color:'#fff',
            // title: 'Oops...',
            text: "{{session('error')}}",
{{--            text: JSON.stringify({{session('error')}}),--}}
        })

    </script>
@endif

@if(session('null'))
    <script>
        Swal.fire({
            icon: 'warning',
            // title: 'Oops...',
            text: '{{session('null')}}',
            // footer: '<a href="">Why do I have this issue?</a>'
        })

    </script>
@endif
</body>
</html>


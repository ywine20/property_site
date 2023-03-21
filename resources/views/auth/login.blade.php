<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In - SMT</title>
    <link rel="icon" href="../images/smtlogo.png" type="image/png">


    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <div class="container-fluid px-0 ">
        <div class="bg-secondary w-100 min-vh-100 overflow-hidden d-flex justify-content-center align-items-center">
<!--            <div class="d-flex justify-content-center align-items-center w-100 h-100">-->
<!--                <div class="row justify-content-center align-items-center w-100 h-100 mx-auto">-->
<!--                    <div class="col-4">-->
<!--                        <div class="d-flex justify-content-end align-items-center">-->
<!--                            <div class="w-75 ">-->
<!--                                <img src="../../images/smtlogoLarge.png " alt="" class="w-100 h-100 " style="object-fit: contain">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-6">-->
<!--                        <div class="">-->
<!--                            <form action="" class="login-form">-->
<!--                                <div class="row gx-1 d-flex justify-content-start align-items-center ">-->
<!--                                    <div class="col-12 col-md-8">-->
<!--                                        <label for="userName" class="form-label">User Name :</label>-->
<!--                                        <input type="text" id="userName" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-3">-->
<!--                                    </div>-->
<!--                                    <div class="col-12 col-md-8">-->
<!--                                        <label for="password" class="form-label">Password :</label>-->
<!--                                        <input type="password" id="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-3">-->
<!--                                    </div>-->
<!--                                    <div class="col-12 col-md-8 d-flex justify-content-start align-items-center my-2">-->
<!--                                        <button class="logInBtn btn btn-primary btn-lg text-white rounded rounded-1 fw-bold  ">LogIn</button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                </div>-->


<!--            <div class="row bg-black mx-auto">-->
<!--                <div class="col-12">-->
                    <div class="w-100">
                        <div class="row mx-auto g-0 d-flex flex-lg-row flex-column justify-content-center align-items-center">
                            <div class="col-lg-1"></div>
                            <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center">
                                <div class="w-100">
                                    <img src="{{asset('image/smtlogoLarge.png')}} " alt="" class="w-100 h-100 " style="object-fit: contain">
                                </div>
                            </div>
                            <div class="col-8 col-md-6 col-lg-5">
                                <div class="">
                                    <form action="{{ url('login') }}" method="POST" enctype="multipart/form-data" class="login-form">
                                    @csrf
                                    {{ \Session::forget('success') }}
                                    @if(\Session::get('sorry'))
                                        <p class="text-warning">{{ \Session::get('sorry')}}</p>
{{--                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                        {{ \Session::get('sorry') }}--}}
{{--                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                                        <span aria-hidden="true"></span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    @endif
                                        <div class="row gx-1 d-flex justify-content-lg-start align-items-center justify-content-center ">
                                            <div class="col-12 col-md-8">
                                                <label for="userName" class="form-label text-white">Email :</label>
                                                <input type="email" name="email" class="create-input form-control @error('email') is-invalid @enderror form-control-lg rounded rounded-1  text-dark mb-2 mb-md-3">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <label for="password" class="form-label text-white">Password :</label>
                                                <input type="password" name="password" class="create-input form-control @error('password') is-invalid @enderror form-control-lg rounded rounded-1  text-dark mb-2 mb-md-3">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-8 d-flex justify-content-center justify-content-lg-start align-items-center my-2">
                                                <button class="logInBtn btn btn-primary btn-lg text-white rounded rounded-1 fw-bold  ">LogIn</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<!--                    </div>-->
<!--                </div>-->
            </div>

        </div>



    </div>

    </div>
</body>
</html>

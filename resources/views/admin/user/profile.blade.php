@extends('admin.master')

@section('content')
            <!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
<!--                        Profile Card -->
                        <div class="w-100 ">
                            <div class="py-3 px-3">
                                <div class="row create">
<!--                                    <div class="col-12">-->
<!--                                        <h4 class="mb-3 text-primary header">Moderator Edit</h4>-->
<!--                                    </div>-->
                                    <div class="col-12 col-md-12 col-lg-12 ">
                                        <form action="" id="" class="create-form user-form">
                                            <div class="row gx-1 d-flex flex-column flex-lg-row justify-content-center align-items-center mx-auto py-5">
                                                <div class="col-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center align-items-center justify-content-lg-start">
                                                    <div class="user-img-div d-flex justify-content-center align-items-center rounded-circle border border-primary overflow-hidden shadow " >
                                                        <input type="file" class="form-control d-none" id="user_input">
                                                        <img src="{{Auth::guard('admin')->user()->image ?  asset('storage/images/admin/'.Auth::guard('admin')->user()->image) :  asset('/images/user.png')  }}" alt="" style="width: 400px;height: 300px;">
                                                        <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-10 col-lg-7">
                                                    <div class="row row-cols-1 row-cols-lg-2">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="userName" class="form-label">User Name :</label>
                                                                <input type="text" disabled id="userName" name="" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin" value="{{Auth::guard('admin')->user()->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">Role :</label>
                                                                <input id="role"  disabled name="" type="text" value="{{Auth::guard('admin')->user()->role}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email :</label>
                                                                <input id="email" disabled name="" type="email" value="{{Auth::guard('admin')->user()->email}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="admin@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="phone" class="form-label">Phone :</label>
                                                                <input id="phone" disabled name="" type="number" value="{{Auth::guard('admin')->user()->phone}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                            </div>
                                                        </div>
{{--                                                        <div class="col">--}}
{{--                                                            <div class="mb-3">--}}
{{--                                                                <label for="password" class="form-label">Password :</label>--}}
{{--                                                                {{Auth::guard('admin')->user()->password}}--}}
{{--                                                                <input id="password" name="" value="" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="mb-3">--}}
{{--                                                                <label for="confirmPassword" class="form-label">Confirm Password :</label>--}}
{{--                                                                {{Auth::guard('admin')->user()->password}}--}}
{{--                                                                <input id="confirmPassword" name="" value="" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                    </div>
                                                    {{-- <div class="row">
                                                        <div class="col-12">
                                                            <div class="my-3">
                                                                <div class="d-flex justify-content-end align-items-center">
<!--                                                                    <button onclick="formReset()" class="form-reset-btn btn btn-lg text-white fw-light rounded rounded-1 me-3">Reset</button>-->
                                                                    <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mb-5">
                            <form action="{{ url('/admin/logout') }}" method="POST">
                                @csrf
                                <div class="logout my-5">
                                    <button class="btn btn-danger" >Log Out</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--                end content -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var t = $('#table_moderator').DataTable({
                scrollX: true,
                responsive: true,
                order: [[1, 'asc']],
            });
        });
    </script>

    <script>



        //logoutt From Page
        let logOutFromPage = document.querySelector('#logoutFromPage');
        logOutFromPage.addEventListener('click',(e)=>{
            e.preventDefault();
            logout();
        })

        //logoutt
        let logOut = document.querySelector('#logout');
        logOut.addEventListener('click',(e)=>{
            e.preventDefault();
            logout();
        })

    </script>
@endsection

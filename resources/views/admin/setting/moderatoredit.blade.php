@extends('admin.master')
@section('content')
<!--                start content-->
<div class="content">
    <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
        <!-- breadcrumb -->
        <div class="bg-secondary bg-opacity-50 px-2 py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{url('admin/setting')}}">setting</a></li>
                    <li class="breadcrumb-item active">Moderator Edit</li>
                    <!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                </ol>
            </nav>
        </div>
        <!-- end breadcrumb -->
        <div class="w-100 ">
            <div class="py-3 px-3">
                <div class="row create">
                    <div class="col-12">
                        <h4 class="mb-3 text-primary header">Moderator Edit</h4>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <form action="{{route('setting.update',$admin->id)}}" method="POST" enctype="multipart/form-data" id="moderator-form" class="create-form moderator-form">
                            @csrf
                            @method('PUT')
                            <div class="row gx-1 d-flex flex-column flex-lg-row justify-content-center align-items-start mx-auto py-5">
                                <div class="col-12 col-md-4 col-lg-4 col-xl-3 d-flex flex-column justify-content-center align-items-center justify-content-lg-start">
                                    <div class="user-img-div d-flex justify-content-center align-items-center rounded-circle border border-primary overflow-hidden @error('image') border border-danger @enderror">
                                        <input type="file" name="image" class="form-control d-none" accept="image/*" value="{{old('image',$admin->image)}}" id="user_input">
                                        <img src="{{$admin->image ?  asset('storage/images/admin/'.$admin->image) :  asset('/images/user.png')  }}" id="user-img" alt="" style="height:300px; width:300px;">
                                        <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                    </div>
                                    @error('image')
                                    <div class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-10 col-lg-7">
                                    <div class="row row-cols-1 row-cols-lg-2">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="userName" class="form-label">User Name :</label>
                                                <input type="text" required id="userName" name="name" value="{{old('name',$admin->name)}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('name') is-invalid @enderror" placeholder="Name">
                                                @error('name')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role :</label>
                                                <input id="role" required name="role" type="text" value="{{old('role',$admin->role)}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('role') is-invalid @enderror" placeholder="Role">
                                                @error('role')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email :</label>
                                                <input id="email" required name="email" type="email" value="{{old('email',$admin->email)}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('email') is-invalid @enderror" placeholder="Email">
                                                @error('email')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone :</label>
                                                <input id="phone" required name="phone" type="number" value="{{old('phone',$admin->phone)}}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('phone') is-invalid @enderror" placeholder="Phone">
                                                @error('phone')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password :</label>
                                                <input id="password" name="password" value="{{old('password')}}" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('password') is-invalid @enderror" placeholder="Password">
                                                @error('password')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password :</label>
                                                <input id="confirmPassword" name="confirm-password" value="" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('password') is-invalid @enderror" placeholder="confirmPassword">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="my-3">
                                                <div class="d-flex justify-content-end align-items-center">
                                                    {{-- <button onclick="formReset()" class="form-reset-btn btn btn-lg text-white fw-light rounded rounded-1 me-3">Reset</button>--}}
                                                    <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                end content-->
@endsection

@section('script')
<script>
    //<!--    FOR COVER IMAGE-->
    let userImage = document.getElementById('user-img');
    let userInput = document.getElementById('user_input');

    userImage.addEventListener('click', _ => userInput.click());

    userInput.addEventListener("change", _ => {
        let file = userInput.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            userImage.src = reader.result;
        }
        reader.readAsDataURL(file);
    })

    function formReset() {
        let formEle = document.getElementById('moderator-form');
        formEle.reset();
    }
</script>
<script>
    //logoutt
    let logOut = document.querySelector('#logout');
    if (logOut) {
        logOut.addEventListener('click', (e) => {
            e.preventDefault();
            logout();
        })
    }
</script>
@endsection
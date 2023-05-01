@extends('master')

@section('title', 'Setting - SMT')
@section('css')
<style>
    #password-change-success,
    #info-change-success {
        display: none;
        justify-content: space-between;
        align-items: center;
    }
</style>
@endsection
@section('content')

<!-- main -->
<main class="main">
    <x-profile :user='$user' />

    <section id="setting">

        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  text-secondary" href="{{route('profile',Auth::guard('user')->user()->id)}}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="{{route('profile.setting',Auth::guard('user')->user()->id)}}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('profile.redeem',Auth::guard('user')->user()->id)}}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->

            <!-- profile edit -->
            <div class="py-4 px-3 p-md-5  mx-lg-3 mx-xl-5 text-start  setting-card">
                <h4 class="head-title mb-2 mb-md-3 mb-xl-3">Profile Setting</h4>


                <div class="">
                    <!-- Change Image -->
                    <div class="mb-3">
                        <label for="" class="mb-2">Photo</label>
                        <form action="" id="profile_image_form" enctype="multipart/form-data">
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="text" name="userId" class="d-none userId" value="{{$user->id}}" />
                                <input type="file" name="profile_img" class="d-none" id="profileImageInput" />
                                <div class=" overflow-hidden rounded rounded-circle bg-black bg-opacity-10 shadow-sm" style="width:100px;height:100px;">
                                    <img id="setting-profile-img" src="{{asset('storage/images/client-profile/'.Auth::guard('user')->user()->profile_img)}}" alt="" class="w-100 h-100 shadow" style="object-fit:cover;">
                                </div>
                                <button id="uploadBtn" class="btn btn-md bg-black bg-opacity-10 text-black ms-4">Change</button>
                            </div>
                            <small class="error-text profileImgError text-danger"></small>

                        </form>
                    </div>
                    <form action="{{route('profile.changeInfo',$user->id)}}" method="post" id="change_info_form">
                        @csrf
                        @method('PATCH')
                        <div class="alert alert-success animate__animated animate__slideInDown justify-content-between align-items-center" id="info-change-success" role="alert">
                            <span>Profile Info Updated Successfully.</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Username</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="text" onkeydown="checkChanges()" onkeyup="checkChanges()" id="username-input" name="username" class="form-control" placeholder="John Doe" value="{{$user->name}}" require />
                            </div>
                            <small class="error-text usernameError text-danger"></small>

                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror


                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Email</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="email" onkeydown="checkChanges()" onkeyup="checkChanges()" id="email-input" name="email" class="form-control" placeholder="johndoe@gmail.com" value="{{$user->email}}" />
                            </div>
                            <small class="error-text emailError text-danger"></small>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Phone</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="text" onkeydown="checkChanges()" onkeyup="checkChanges()" id="phone-input" name="phone" class="form-control" placeholder="09xxxxxxxxx" value="{{$user->phone}}" />
                            </div>
                            <small class="error-text phoneError text-danger"></small>
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Button -->
                        <div class="mt-4 mt-md-5 mb-3 mb-md-2 mb-lg-0">
                            <button type="submit" id="save-btn" class="btn btn-secondary btn-lg rounded rounded-1 text-primary fw-bold w-100 saveBtn">Save</button>
                        </div>

                    </form>
                    <hr class=" my-5">

                    <!-- action="{{route('profile.changePassword',$user->id)}}" -->
                    <form action="" id="change_password_form">
                        @csrf
                        @method('PATCH')

                        <!-- @method('PATCH') -->

                        <div class="">
                            <h5 class="head-title mb-2 mb-md-3 mb-xl-3">Change Password</h5>
                        </div>
                        <!-- @if(Session::has('client-success'))
                        <div class="alert alert-success d-flex justify-content-between align-items-center">
                            {{ Session::get('client-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                            @php
                            Session::forget('client-success');
                            @endphp
                        </div>
                        @endif -->

                        <div class="alert alert-success justify-content-between align-items-center animate__animated animate__slideInDown" id="password-change-success" role="alert">
                            <span>Password updated successfully.</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- old password -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Current Password</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="password" onkeydown="checkChanges()" onkeyup="checkChanges()" id="current-password-input" name="currentPassword" class="form-control" value="{{old('current-password')}}" require />
                            </div>
                            <small class="error-text currentPasswordError text-danger"></small>
                        </div>
                        <!-- new password -->
                        <div class="mb-3">
                            <label for="" class="mb-2">New Password</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="password" onkeydown="checkChanges()" onkeyup="checkChanges()" id="new-password-input" name="newPassword" class="form-control" value="{{old('new-password')}}" require />
                            </div>
                            <small class="error-text newPasswordError text-danger"></small>
                            <!-- @error('newPassword')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror -->
                        </div>
                        <!-- confirm password -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="password" onkeydown="checkChanges()" onkeyup="checkChanges()" id="confirm-password-input" name="confirmPassword" class="form-control" value="{{old('confirm-password')}}" require />
                            </div>
                            <small class="error-text confirmPasswordError text-danger"></small>
                            <!-- @error('confirmPassword')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror -->
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class=" btn btn-link text-decoration-none " onclick="openForgotPasswordModal()"><span class="text-primary">Forgot Password?</span></buttonhref=>
                        </div>
                        <!-- Button -->
                        <div class="mt-4 mt-md-5 mb-3 mb-md-2 mb-lg-0">
                            <button type="submit" class="btn btn-secondary btn-lg rounded rounded-1 text-primary fw-bold  w-100 changePassBtn">Save</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
        <hr class=" divided">
        <!-- logout -->
        <div class="d-none py-2 px-3 px-md-5 ms-lg-3 ms-xl-5 my-5 d-flex justify-content-start align-item-center">
            <form action="">
                <button class="btn btn-danger btn-lg logoutBtn">LOG OUT</button>
            </form>
        </div>
        </div>





    </section>
</main>
@endsection
@push('clientScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Change Profile Image
    const profileImageInput = document.getElementById('profileImageInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const profileImage = document.getElementById('setting-profile-img');
    let userId = document.querySelector('.userId').value;

    uploadBtn.addEventListener('click', (e) => {
        e.preventDefault();
        profileImageInput.click();
    });

    profileImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            profileImage.src = reader.result;
            const formData = new FormData();
            formData.append('profile_img', file);



            axios.post(`/profile/${userId}/changeProfile`, formData)
                .then(response => {
                    document.querySelector('.profileImgError').innerText = '';

                    let userProfile = document.querySelectorAll('.user-profile');
                    for (let i = 0; i < userProfile.length; i++) {
                        userProfile[i].src = profileImage.src;
                    }
                    document.querySelector('#profile_img_large').src = profileImage.src;
                    //sweetalert box show if success
                    if (response.data.status == '1') {
                        const Toast = Swal.mixin({
                            toast: true,
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            background: 'white',
                            color: 'green',
                            position: 'top',
                            title: response.data.message,
                        })
                    }
                })
                .catch(error => {
                    if (error.response) {
                        let profileImgError = error.response.data.error;
                        console.log(error.response);
                        console.log(profileImgError);
                        document.querySelector('.profileImgError').innerText = profileImgError.profile_img ? profileImgError.profile_img : '';
                    }
                });
        }
        reader.readAsDataURL(file);
    });

    //change user Data
    let originUserName = "<?php echo $user->name; ?>";
    let originEmail = "<?php echo $user->email; ?>";
    let originPhone = "<?php echo $user->phone; ?>";

    let saveBtn = document.getElementById("save-btn");


    function checkChanges() {
        let currenUserName = document.getElementById("username-input").value;
        let currentEmail = document.getElementById("email-input").value;
        let currentPhone = document.getElementById("phone-input").value;

        if (currenUserName !== originUserName || currentEmail !== originEmail || currentPhone !== originPhone) {
            saveBtn.disabled = false
        } else {
            saveBtn.disabled = true;
        }
    }
    checkChanges();

    //change info with axios
    let changeInfoForm = document.querySelector('#change_info_form');

    changeInfoForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const changeInfoFormData = new FormData();
        const username = changeInfoForm.elements.username.value;
        const email = changeInfoForm.elements.email.value;
        const phone = changeInfoForm.elements.phone.value;

        document.querySelector('#info-change-success').style.display = 'none';


        axios.patch(`/profile/${userId}/changeProfileInfo`, {
                username: username,
                email: email,
                phone: phone,
            })
            .then(response => {
                document.querySelector('.usernameError').innerText = '';
                document.querySelector('.emailError').innerText = '';
                document.querySelector('.phoneError').innerText = '';
                saveBtn.disabled = true;
                // document.querySelector('#info-change-success').style.display = 'flex';

                //sweetalert box show if success
                if (response.data.status == '1') {
                    const Toast = Swal.mixin({
                        toast: true,
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        background: 'white',
                        color: 'green',
                        position: 'top',
                        title: response.data.message,
                    });

                    console.log(response.data.userInfo['name']);
                    document.querySelector('.name').innerHTML = response.data.userInfo['name'];
                    document.querySelector('.email').innerHTML = response.data.userInfo['email'];
                    document.querySelector('.phone').innerHTML = response.data.userInfo['phone'];
                }

            }).catch(error => {
                document.querySelector('.usernameError').innerText = '';
                document.querySelector('.emailError').innerText = '';
                document.querySelector('.phoneError').innerText = '';
                if (error.response) {
                    let infoError = error.response.data.error;
                    document.querySelector('.usernameError').innerText = infoError.username ? infoError.username : '';
                    document.querySelector('.emailError').innerText = infoError.email ? infoError.email : '';
                    document.querySelector('.phoneError').innerText = infoError.phone ? infoError.phone : '';
                }

            })

    })



    //change password with axios
    let changePasswordForm = document.querySelector('#change_password_form');
    let changePassBtn = document.querySelector('.changePassBtn');

    changePasswordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const changePasswordFormData = new FormData();
            const currentPassword = changePasswordForm.elements.currentPassword.value;
            const newPassword = changePasswordForm.elements.newPassword.value;
            const confirmPassword = changePasswordForm.elements.confirmPassword.value;

            // document.querySelector('#password-change-success').style.display = 'none';


            axios.patch(`/profile/${userId}/changePassword`, {
                    currentPassword: currentPassword,
                    newPassword: newPassword,
                    confirmPassword: confirmPassword,
                })
                .then(response => {
                    document.querySelector('.currentPasswordError').innerText = '';
                    document.querySelector('.newPasswordError').innerText = '';
                    document.querySelector('.confirmPasswordError').innerText = '';

                    // document.querySelector('#password-change-success').innerText = response.data.message;
                    // document.querySelector('#password-change-success').style.display = 'flex';

                    changePasswordForm.reset();
                    //sweetalert box show if success
                    if (response.data.status == '1') {
                        const Toast = Swal.mixin({
                            toast: true,
                            showConfirmButton: false,
                            showCloseButton: true,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            background: 'white',
                            color: 'green',
                            position: 'top',
                            title: response.data.message,
                        })
                    }
                })
                .catch(error => {

                    if (error.response) {
                        const {
                            passwordError
                        } = error.response.data.error;
                        // console.log('passwordError', error.response.data.error);
                        const currentPasswordError = error.response.data.error.currentPassword ? error.response.data.error.currentPassword[0] : '';
                        const newPasswordError = error.response.data.error.newPassword ? error.response.data.error.newPassword[0] : '';
                        const confirmPasswordError = error.response.data.error.confirmPassword ? error.response.data.error.confirmPassword[0] : '';


                        document.querySelector('.currentPasswordError').innerText = currentPasswordError;
                        document.querySelector('.newPasswordError').innerText = newPasswordError;
                        document.querySelector('.confirmPasswordError').innerText = confirmPasswordError;

                    }

                });
        }

    )
</script>
@endpush
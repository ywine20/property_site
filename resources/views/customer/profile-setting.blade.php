@extends('master')

@section('title', 'Setting - SMT')
@section('content')

<!-- main -->
<main class="main">
    <section id="profile">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center py-5">
            <div class="row d-flex justify-content-center align-items-center w-100 gap-4 gap-md-2">
                <div class="col-9  col-md-4 col-lg-3 d-flex justify-content-center justify-content-md-end align-items-center">
                    <div class="overflow-hidden rounded rounded-circle border border-4 border-primary profile-image">
                        <img src="{{asset('/image/smtlogoLarge.png')}}" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-9 col-md-4 col-lg-3 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="text-center text-md-start  profile-info">
                        <span class="fw-bold text-primary name">Mr.John Doe</span><br>
                        <span class=" text-black-50 email">johndoe@gmail.com</span><br>
                        <span class=" text-black-50 phone">09876543211</span>
                    </div>
                </div>
            </div>
            <div class="row w-100 py-5 d-flex justify-content-center ">
                <div class="col-10 col-md-8 col-lg-6 bg-light d-flex justify-content-center align-items-center px-0">
                    <div id="tier" class="position-relative w-100">
                        <div class="bg-black bg-opacity-10 w-100 progress-bg"></div>
                        <div class="bg-primary position-absolute start-0 top-0 progress-percent-bar "></div>
                        <div class="overflow-hidden my-1 tier bronze">
                            <img src="{{asset('/image/tier/bronze.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier silver">
                            <img src="{{asset('/image/tier/silver.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier gold">
                            <img src="{{asset('/image/tier/gold.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier platinum">
                            <img src="{{asset('/image/tier/platinum.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier diamond">
                            <img src="{{asset('/image/tier/diamond.png')}}" alt="" class="w-100 h-100" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="setting">
      
        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  text-secondary"  href="{{route('profile')}}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="{{route('profile-setting')}}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('profile-redeem')}}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->

              <!-- profile edit -->
            <div class="py-4 px-3 p-md-5  mx-lg-3 mx-xl-5 text-start  setting-card">
                <h4 class="head-title mb-2 mb-md-3 mb-xl-3">Profile Setting</h4>

                <form action="">
                <div class="" >
                    <!-- Change Image -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Photo</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="file" class="d-none" id="profileImageInput" >
                                <div   class=" overflow-hidden rounded rounded-circle bg-black bg-opacity-10" style="width:100px;height:100px;">
                                    <img id="setting-profile-img" src="{{asset('image/smtlogo.png')}}" alt=""  class="w-100 h-100" >
                                </div>
                                <button id="uploadBtn" class="btn btn-md bg-black bg-opacity-10 text-black ms-4" >Change</button>
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Username</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="text" name="username" class="form-control" placeholder="John Doe" value="Win Win Maw" require>
                            </div>
                        </div>
                         <!-- Email -->
                         <div class="mb-3">
                            <label for="" class="mb-2">Email</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="email" name="email" class="form-control" placeholder="johndoe@gmail.com" value="win@gmail.com">
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="" class="mb-2">Phone</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="text" name="phone" class="form-control" placeholder="09xxxxxxxxx" value="09960269033">
                            </div>
                        </div>
                         <!-- Password -->
                         <div class="mb-3">
                            <label for="" class="mb-2">Password</label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="password" name="phone" class="form-control" placeholder="" value="password">
                            </div>
                        </div>

                         <!-- Button -->
                         <div class="mt-4 mt-md-5 mb-3 mb-md-2 mb-lg-0">
                            <button type="submit" class="btn btn-secondary btn-lg rounded rounded-1 text-primary fw-bold  form-control saveBtn">Save</button>
                        </div>

                </div>  
                </form>
            </div>

            <hr class=" divided d-none">
            <!-- logout -->
            <div class="d-none py-2 px-3 px-md-5 ms-lg-3 ms-xl-5 my-5 d-flex justify-content-start align-item-center">
                <form action="">
                <button class="btn btn-danger btn-lg logoutBtn" >LOG OUT</button>
                </form>
            </div>
        </div>
        




    </section>
</main>
@endsection
@push('clientScript')
<script>
   const profileImageInput = document.getElementById('profileImageInput');
   const uploadBtn = document.getElementById('uploadBtn');
   const profileImage= document.getElementById('setting-profile-img');

   uploadBtn.addEventListener('click', (e) => {
    e.preventDefault();
    profileImageInput.click();
});


profileImageInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const reader = new FileReader();
    reader.onload = function (){
        profileImage.src = reader.result;
        }
        reader.readAsDataURL(file);

});

  
</script>

</script>
@endpush
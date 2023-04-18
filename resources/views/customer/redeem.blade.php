@extends('master')

@section('title', 'redeem code - SMT')
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
    <section id="redeem">

        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  text-secondary" href="{{route('profile',Auth::guard('user')->user()->id)}}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-secondary" href="{{route('profile.setting',Auth::guard('user')->user()->id)}}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="{{route('profile.redeem',Auth::guard('user')->user()->id)}}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->

            <!-- redeem code -->
            <div class="py-2 px-3 p-md-5 mx-lg-3 mx-xl-5 my-2 text-start">
                <!-- <h4>Redeem</h4> -->

                <div class="">

                    <div class="">
                        <p class="mb-3 mb-md-5 redeem-explain text-black-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid non perferendis consequuntur, et impedit officia. Sit fugit commodi labore perferendis ipsa debitis culpa nam, asperiores odit quibusdam neque possimus vero! </p>
                    </div>
                    <form action="{{ route('profile.customerRedeemCodes') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="" class="mb-2 text-secondary">Enter Your Redeem Code</label>
                            <div class="d-flex flex-column flex-md-row justify-content-center align-items-baseline ">
                                <div class="w-100" id="redeemInput">
                                    <input type="text" name="code" maxlength="50" class="form-control form-control-lg @if(session('InvalidCode')) is-invalid @endif" placeholder="S34DFGH5HJ77YHFG" require>
                                    @if(session('InvalidCode'))
                                        <div class="text-danger invalid-feedback">
                                            {{ session('InvalidCode') }}
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-secondary btn-lg rounded rounded-1 text-primary fw-bold ms-0 ms-md-3 mt-3 mt-md-0 redeemSubmitBtn">Submit</button>
                            </div>
                        </div>
                    </form>

                    @if(session('redeemSuccess'))
                        <div class="alert alert-success alert-dismissible show mt-3 mt-md-5 animate__animated animate__fadeInDown" role="alert">
                            <div class="d-flex flex-column flex-md-row justify-content-start align-items-center text-center text-md-start">
                                <i class="bi bi-check2 h3 text-success mb-0 fs-bolder d-none d-md-flex me-3"></i>
                                {{ session('redeemSuccess') }}
                            </div>
                        </div>
                    @endif
                   
                </div>
            </div>

        </div>





    </section>
</main>
@endsection
@push('clientScript')
<script>
    const profileImageInput = document.getElementById('profileImageInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const profileImage = document.getElementById('setting-profile-img');

    uploadBtn.addEventListener('click', (e) => {
        e.preventDefault();
        profileImageInput.click();
    });


    profileImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            profileImage.src = reader.result;
        }
        reader.readAsDataURL(file);

    });
</script>

@endpush
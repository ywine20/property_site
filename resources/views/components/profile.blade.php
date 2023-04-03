
<section id="profile">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center py-5">
            <div class="row d-flex justify-content-center align-items-center w-100 gap-4 gap-md-2">
                <div class="col-9  col-md-4 col-lg-3 d-flex justify-content-center justify-content-md-end align-items-center">
                    <div class="overflow-hidden rounded rounded-circle border border-4 border-primary profile-image">
                    @if( isset(Auth::guard('user')->user()->profile_img))
                    <img src="{{asset('storage/images/client-profile/'.Auth::guard('user')->user()->profile_img)}}" alt="" class="w-100 h-100" id='profile_img_large' style="object-fit:cover;" >
                    @else
                    <img src="{{asset('storage/images/client-profile/user.png')}}" alt="" class="w-100 h-100 " style="object-fit:cover;">
                    @endif
                    </div>
                </div>
                <div class="col-9 col-md-4 col-lg-3 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="text-center text-md-start  profile-info">
                        <span class="fw-bold text-primary name">{{$user->name}}</span><br>
                        <span class=" text-black-50 email">{{$user->email}}</span><br>
                        <span class=" text-black-50 phone">{{$user->phone}}</span>
                    </div>
                </div>
            </div>
            <div class="row w-100 py-5 d-flex justify-content-center ">
                <div class="col-10 col-md-8 col-lg-6 bg-light d-flex justify-content-center align-items-center px-0">
                    <div id="tier" class="position-relative w-100">
                        <div class="bg-black bg-opacity-10 w-100 progress-bg"></div>
                        <div class="bg-primary position-absolute start-0 top-0 progress-percent-bar {{$user->tier}}  "></div>
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
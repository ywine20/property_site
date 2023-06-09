@extends('master')

@section('title', 'redeem code - SMT')
@section('content')

<!-- main -->
<main class="main">
    <x-profile :user='$user' />
    <section id="redeem">

        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link  text-secondary" href="{{ route('profile', Auth::guard('user')->user()->id) }}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-secondary" href="{{ route('profile.setting', Auth::guard('user')->user()->id) }}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="{{ route('profile.redeem', Auth::guard('user')->user()->id) }}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->

            <!-- redeem code -->
            <div class="py-2 px-3 p-md-5 mx-lg-3 mx-xl-5 my-2 text-start">
                <!-- <h4>Redeem</h4> -->

                <div class="">

                    <div class="">
                        <p class="mb-3 mb-md-5 redeem-explain text-black-50 d-none">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Aliquid non perferendis consequuntur, et impedit officia. Sit
                            fugit commodi labore perferendis ipsa debitis culpa nam, asperiores odit quibusdam neque
                            possimus vero! </p>
                    </div>
                    <form action="{{ route('profile.customerRedeemCodes') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="" class="mb-2 text-secondary">Enter Your Redeem Code</label>
                            <div class="d-flex flex-column flex-md-row justify-content-center ">
                                <div class="w-100" id="redeemInput">
                                    <input type="text" name="code" maxlength="50" class="form-control form-control-lg @if (session('InvalidCode')) is-invalid @endif" placeholder="S34DFGH5HJ77YHFG" require>
                                    @if (session('InvalidCode'))
                                    <div class="text-danger invalid-feedback">
                                        {{ session('InvalidCode') }}
                                    </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-secondary btn-lg rounded rounded-1 text-primary fw-bold ms-0 ms-md-3 mt-3 mt-md-0 redeemSubmitBtn">Submit</button>
                            </div>
                        </div>
                    </form>

                    @if (session('redeemSuccess'))
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

@endpush
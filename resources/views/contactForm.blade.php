@extends('master')

@section('title', 'Contact Us - SMT')
@section('content')
    <!-- main -->
    <main class="main position-relative">
        <!-- Our reach out to us -->
        <div class="container-fluid px-0 bg-secondary reach-out-container">
            <div id="reach"
                class="w-100 reach-out overflow-hidden d-flex justify-content-center align-items-center position-relative">
                <div class="text-center text-primary reach-out-text position-absolute">
                    <span class="h4 text-primary">@lang('public.reachcontact')</span>
                    <p class="fw-light mt-3 text-primary">@lang('public.get') </p>
                </div>
            </div>
        </div>
        <!-- end reach out to us -->

        <!-- Contact Us -->
        <div class="container-fluid  bg-secondary">
            <section id="contact" class="container pt-5 pb-5 pb-lg-0 px-0">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-lg-5 col-xl-5 d-flex justify-content-center justify-content-xl-end mb-3 mb-md-0">
                        <div
                            class=" d-flex flex-column flex-md-row flex-lg-column justify-content-center align-items-center contact-static">
                            <div class="overflow-hidden mb-3 mb-lg-3 mb-xl-5 mt-3 contact-static-img">
                                <img src="./image/smtlogoLarge.png" alt="" style="width: 100%;height:100%;">
                            </div>
                            <div class="contact-static-card">
                                <div class="card mb-3">
                                    <i class="bi bi-geo-alt-fill me-2"></i>
                                    @lang('public.address')
                                </div>
                                <div class="card mb-3">
                                    <i class="bi bi-envelope me-2"></i>
                                    sales@sunmyattun.com
                                </div>
                                <div class="card  mb-3">
                                    <i class="bi bi-facebook me-2"></i>
                                    @lang('public.company')
                                </div>
                                <div class="card  mb-3">
                                    <i class="bi bi-telephone-fill me-2"></i>
                                    09777700111, 09777700222
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-lg-7 col-xl-6 d-flex justify-content-center align-items-center justify-content-xl-start">
                        <div class="contact-form-div ">
                            @if (Session::has('success'))
                                <div
                                    class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
                                    {{ Session::get('success') }}
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <form class="row contact-form gx-2 " method="POST" action="{{ route('contact-form.store') }}">
                                {{ csrf_field() }}
                                <div class="col-12 mb-2">
                                    <!-- Error -->
                                    {{--                          @if ($errors->has('name')) --}}
                                    {{--                          <div class="error text-danger"> --}}
                                    {{--                              {{ $errors->first('name') }} --}}
                                    {{--                          </div> --}}
                                    {{--                          @endif --}}
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror " name="name"
                                        id="name" placeholder="Enter your name">
                                </div>
                                <div class="col-12 col-md-7 mb-2">
                                    {{--                          @if ($errors->has('email')) --}}
                                    {{--                          <div class="error text-danger"> --}}
                                    {{--                              {{ $errors->first('email') }} --}}
                                    {{--                          </div> --}}
                                    {{--                          @endif --}}
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror " name="email"
                                        id="email" placeholder="Enter your email">
                                </div>
                                <div class="col-12 col-md-5 mb-2">
                                    {{--                          @if ($errors->has('phone')) --}}
                                    {{--                          <div class="error text-danger"> --}}
                                    {{--                              {{ $errors->first('phone') }} --}}
                                    {{--                          </div> --}}
                                    {{--                          @endif --}}
                                    <input type="text" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        id="phone" placeholder="Enter your phone">
                                </div>
                                <div class="col-12 mb-2">
                                    {{--                          @if ($errors->has('subject')) --}}
                                    {{--                          <div class="error text-danger"> --}}
                                    {{--                              {{ $errors->first('subject') }} --}}
                                    {{--                          </div> --}}
                                    {{--                          @endif --}}
                                    <input type="text" value="{{ old('subject') }}"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        id="subject" placeholder="Enter subject">
                                </div>
                                <div class="col-12 mb-2">
                                    {{--                          @if ($errors->has('message')) --}}
                                    {{--                          <div class="error text-danger"> --}}
                                    {{--                              {{ $errors->first('message') }} --}}
                                    {{--                          </div> --}}
                                    {{--                          @endif --}}
                                    <textarea name="message" id="" cols="30" rows="5"
                                        class="form-control @error('message') is-invalid @enderror " placeholder="Please Fill Your Message">{{ old('message') }}</textarea>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                                    @if (Session::has('g-recaptcha-response'))
                                        <i class="{{ Session::get('alert-info') }} text-danger">
                                            {{ Session::get('g-recaptcha-response') }}
                                        </i>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <input type="submit" name="send" value="Submit"
                                        class="btn btn-primary btn-md rounded rounded-2 submitBtn text-secondary fw-bold">
                                    <!-- <button type="submit" name="send" class="btn btn-primary btn-lg rounded rounded-2 submitBtn text-secondary fw-bold">SEND</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- end Contact Us -->

        <!-- Map -->
        <div class="container-fluid">
            <div id="map">
                <div class="row">
                    <div class="col-12 map-div p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7640.165413485923!2d96.16759259999999!3d16.772560300000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec8944b0cec7%3A0xb9ac46d1e81aa262!2s45th%20St%2C%20Yangon!5e0!3m2!1sen!2smm!4v1676004639196!5m2!1sen!2smm"
                            class="w-100 iframe-map" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map -->

    </main>
    <!-- end main -->
@endsection

<!-- <script>
    let reachOutText = document.querySelector('.reach-out-text');

    window.addEventListener('scroll', () => {
        let value = window.scrollY;

    })
</script> -->

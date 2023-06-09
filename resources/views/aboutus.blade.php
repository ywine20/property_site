@extends('master')

@section('title', 'About Us - SMT')
@section('content')
<!-- main -->
<main class="main">
    <!-- Our Story -->
    <div class="container px-4 px-md-2">
        <section id="our-story" class="">
            <div class="row py-4 py-md-5 py-lg-5 gx-1 justify-content-center align-items-center">
                <div class="col-md-9 col-lg-5 col-xl-5 d-flex justify-content-center align-items-center">
                    <div class="w-100 group-image">
                        <img src="./image/aboutus/group.jpg" alt="" class="w-100 shadow">
                    </div>
                </div>
                <div class="col-md-11 col-lg-7 col-xl-7 py-3 pt-md-4 pb-md-0 py-lg-0">
                    <div class="text-center ourStory-text">
                        <div class="ourStory-Title">
                            <div>
                                <img src="./image/aboutus/Group 883.png" class="w-100 h-100" alt="">
                            </div>
                            <!-- <span class="fw-bold title">OUR STORY</span> -->
                        </div>
                        <div class="text mt-1 mt-md-3 px-0 px-md-2 px-lg-5">
                            <p>
                                @lang('public.aboutsmt1')
                            </p>
                            <p>
                                @lang('public.aboutsmt2')
                            </p>
                            <p>
                                @lang('public.aboutsmt3')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end Our Story -->

    <!-- Our Vision -->
    <div class="container-fluid px-0 bg-secondary">
        <div class="container">
            <section id="our-vision-mission">
                <div class="row py-5 gx-0 gx-md-5  gx-lg-1 gx-xl-5">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="our-vision">
                            <div class="card">
                                <h4 class="mb-2 mb-md-3 fw-bold">@lang('public.ourvision')</h4>
                                <p>
                                    @lang('public.visionp1')
                                </p>
                                <p class="mb-0">
                                    @lang('public.visionp2')
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="our-mission">
                            <div class="card">
                                <h4 class="mb-2 mb-md-3 fw-bold">@lang('public.ourmission')</h4>
                                <p>
                                    @lang('public.missionp1')

                                </p>
                                <p class="mb-0">
                                    @lang('public.missionp2')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end Our Vision -->

    <!-- Our core value -->
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <section id="core-value" class="">
                <div class="row py-3 py-lg-4 py-xl-5 gx-0">
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
                        <div class="w-75  px-2">
                            <img src="./image/aboutus/coreValue/coreValue.png" alt="" class="w-100" style="filter: drop-shadow(-5px 5px 6px rgba(0, 0, 0, 0.129));
                              ;">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start align-items-center ps-0 ps-md-5">
                        <div class="w-75  px-2 pt-3 pb-0 py-md-5">
                            <img src="./image/aboutus/coreValue/coreValueList.png" alt="" class="w-100">
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- end core value -->

    <!-- Company TimeLine -->
    <div class="container px-0">
        <section id="company-timeLine" class="">
            <div class="row pt-3 pt-md-5 pb-3 gx-0">
                <div class="col-12">
                    <h3 class="text-center fw-bold mb-2 mb-md-4 mb-xl-2 title">@lang('public.companytime')</h3>
                </div>
                <div class="col-12">
                    <div class="w-100 px-2">
                        <a href="./image/aboutus/Roadmap.jpg" class="text-decoration-none ">
                            <img src="./image/aboutus/Roadmap.jpg" alt="" class="w-100">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end Company TimeLine -->

    <!-- Achievement and awards -->
    <div class="container-fluid bg-primary">
        <div class="container px-0 overflow-hidden">
            <section class="achievement-awards ">
                <div class="row py-3 px-2 px-md-5 pb-md-5 ">
                    <div class="col-12">
                        <h3 class="text-center fw-bold mt-3 mb-3 mb-md-5 title">@lang('public.achiveandaward')</h3>
                    </div>
                    <div class="col-12 second-col mb-4">
                        <div class="row row-cols-2 row-cols-md-3 g-2 gx-md-3 gy-3 awards-row">
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/Best Commercial Developer.png" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/MM Best Mix Used Developer .png" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/MM Best Retail Development.png" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/SMT Best Marketing Campaign.png" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/SMT Best Mixed Use Developer.png" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden">
                                    <img src="./image/aboutus/smtAward/Special Recognition for Building Communitues.png" class="w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end achievement and awards -->

    <!-- U Nay Lin Tun -->
    <div class="container-fluid py-4 px-0 bg-primary d-none">
        <div class="container">
            <section id="uNayLinTun">
                <div class="row pt-3 pt-md-3 pb-3 gx-0 d-flex justify-content-center align-items-center">
                    <div class="col-9 col-md-5 col-lg-4 col-xl-3 d-flex justify-content-center align-items-center">
                        <div class="w-75 overflow-hidden mb-4 mb-md-0">
                            <img src="./image/aboutus/unaylintun/unaylintunwithshadow.png" alt="" class="w-100 h-100">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 ps-0 ps-md-3 text-center text-md-start text">
                        <h1 class="fw-bolder">U NAY LIN TUN</h1>
                        <span class="fw-normal fs-2 mb-3"><i>Managing Director</i></span>
                        <span class="d-block mb-3 fs-5">Yangon University of Medicine (1) <br> (M.B.B.S Holder) in
                            2006</span>
                        <div class="mb-3 fs-6">
                            <span class="d-block">
                                <i class="bi bi-telephone"></i> 09420888888
                            </span>
                            <span class="d-block">
                                <i class="bi bi-link"></i> www.sunmyattun.com
                            </span class="d-block">
                            <span class="d-block">
                                <i class="bi bi-envelope"></i> naylintun@sunmyattun.com
                            </span>
                        </div>
                        <a href="{{ url('dprofile') }}" class="btn btn-secondary text-primary fw-bold" role="button">
                            Read More
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end U Nay Lin Tun -->

    <!-- Organization Map -->
    <div class="container px-0">
        <section id="organization-chart" class="">
            <div class="row py-3 py-md-5 gx-0">
                <div class="col-12">
                    <h3 class="text-center fw-bold mb-3 mb-md-5 title">@lang('public.org')</h3>
                </div>
                <div class="col-12">
                    <div class="w-100 px-2">
                        <a href="./image/aboutus/organization-structure.jpg" class="text-decoration-none ">
                            <img src="./image/aboutus/organization-structure2.jpg" alt="" class="w-100">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end Company TimeLine -->

    <!-- event and activities -->
    <div class="container-fluid bg-light">
        <div class="container px-0 overflow-hidden">
            <section id="event-activities">
                <div class="row py-3 px-2 px-md-0 py-md-5 ">
                    <div class="col-12">
                        <h3 class="text-center fw-bold mb-3 mb-md-5 title">@lang('public.evenandachive')</h3>
                    </div>
                    <div class="col-12 second-col">
                        <div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 g-2 mb-3">
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded ">
                                    <a href="./image/aboutus/eventActivities/Picture1.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <!-- <img src="./image/gallery/g10.jpg" style="width: 100%;height:100%;object-fit:cover;" alt=""> -->
                                        <img src="./image/aboutus/eventActivities/Picture1.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture2.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture2.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture3.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture3.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture4.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture4.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture5.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture5.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture6.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture6.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture7.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture7.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture8.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture8.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture9.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture9.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture10.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture10.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture11.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture11.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture12.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture12.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture13.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture13.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture14.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture14.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100 h-100 overflow-hidden rounded">
                                    <a href="./image/aboutus/eventActivities/Picture3.jpg" class="event" data-gall="myevent" data-maxwidth="800px" data-overlay="#423e3ddf">
                                        <img src="./image/aboutus/eventActivities/Picture3.jpg" alt="" class="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- end event and activities -->

    <!-- brand partnership -->
    <div class="container px-0 overflow-hidden">
        <section id="brand-partnership">
            <div class="row py-3 px-2 px-md-0  py-md-5  ">
                <div class="col-12">
                    <h3 class="text-center fw-bold mb-2 mb-md-4 title">@lang('public.brand')</h3>
                </div>
                <div class="col-12 second-col">
                    <div class="row row-cols-3 row-cols-md-4 row-cols-xl-6 g-3 d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/kbzbank.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/ayabank.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/cbbank.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/cotto.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/builk.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/taiSin.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/inppon.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/Hyundai_logo_2-700x102.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/zwareGroup.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/liveLife.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/deArch.png" alt="" class="">
                            </div>
                        </div>
                        <div class="col d-none">
                            <div class="overflow-hidden">
                                <img src="./image/aboutus/brandPartnership/schindler.png" alt="" class="">
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!-- end brand partnership -->

</main>
<!-- end main -->
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
@endsection

<!-- <script src="./node_modules/venobox/dist/venobox.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
    integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script>
    new VenoBox({
        selector: '.event',
        numeration: true,
        spinner: 'grid',
        spinColor: '#F5CC7A',
        share: false,
    });
</script> -->
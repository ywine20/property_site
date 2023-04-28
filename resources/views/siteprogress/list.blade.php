@extends('master')

@section('title', 'Director profile - SMT')
@section('content')
<!-- main -->
<main class="main bg-black bg-opacity-10">
    <div class="container-fluid px-0 px-md-2 back ">
        <!-- back -->
        <div class="container py-2 py-md-3 px-0">
            <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                <i class="bi bi-chevron-left"></i><i>Back</i>
            </span>
        </div>
        <!-- end back -->
    </div>
    <div class="container py-4 px-0 ">
        <div class="row site-progress-detail">
            <!-- Site Progress -->
            <div class="col-12">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h5 class="text-secondary">Site Progress</h5>
                </div>

                @foreach($siteProgresses as $siteProgress)
                <div class="row row-cols-auto g-1 g-md-3  mb-3">
                    <div class="col-12 px-0 px-md-3 px-lg-5">
                        <div class="row bg-white progressCard d-flex flex-row rounded rounded-3 overflow-hidden shadow-sm border" style="height:150px;">
                            <div class="col-4 col-md-3 col-lg-2 p-1 p-md-2">
                                <div id="siteprogressId" class="siteprogressImage1 bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center overflow-hidden position-relative h-100 rounded rounded-2 " style="width:100%;cursor:pointer">

                                    @foreach ($siteProgress->images as $key => $image)
                                    @if ($key == 0)
                                    <img src="{{ asset('storage/images/siteimages/' . $image->image) }}" alt="" class="w-100 h-100">
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-8 col-md-9 col-lg-10 d-flex align-items-baseline justify-content-start py-2">

                                <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                    <div class="w-100 align-self-end ">
                                        <div class="time  text-muted mb-1 ">
                                            <small class="">
                                                <i class="bi bi-clock"></i>
                                                {{ $siteProgress->created_at->format('j F, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="card-title fw-bold text-primary mb-3" style="min-height:50px;max-height:100px;">
                                        {{ $siteProgress->title }}
                                    </div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <a href="{{ route('client-siteProgress.show', ['id' => $siteProgress->id]) }}" class="btn btn-sm btn-outline-secondary me-2">
                                            <i class="bi bi-eye text-primary "></i>
                                            Show Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>

</main>
<!-- end main -->
@endsection
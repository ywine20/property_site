@extends('master')

@section('title', 'Siteprogress - SMT')
@section('content')
<!-- main -->
<main class="main">
    <div class="container-fluid px-0 px-md-2 back ">
        <!-- back -->
        <div class="container py-2 py-md-3 px-2 px-md-1">
            <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                <i class="bi bi-chevron-left"></i><i>Back</i>
            </span>
        </div>
        <!-- end back -->
    </div>
    <div class="container py-4 px-md-0 ">
        <div class="row ">
            <!-- Site Progress -->
            <div class="col-12 siteprogress">
                <div class="">
                    <h3 class="text-primary mb-5 title"> {{ $siteProgress->title }}</h3>
                </div>
                <div class="row row-cols-3 row-cols-md-4 px-2 px-md-4 px-lg-5 g-2 text-center">
                    @if (count($siteProgress->images) > 0)
                    @foreach ($siteProgress->images as $img)
                    <div class="col overflow-hidden img-col rounded ">
                        <a href="{{ asset('storage/images/siteimages/' . $img->image) }}" class="mysiteProgressImg w-100" data-gall="mysiteProgressImg" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/siteimages/' . $img->image) }}" alt="" class="w-100 h-100" style="object-fit:cover">
                        </a>
                    </div>
                    @endforeach
                    @else
                    <p class="py-5 text-center">No Images</p>
                    @endif
                </div>
                <div class="my-2 py-4">
                    <div class="text-secondary lead lh-large description" style="white-space:pre-wrap;">
                        {{ $siteProgress->description }}
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>
<!-- end main -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
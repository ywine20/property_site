@extends('master')

@section('title', 'Director profile - SMT')
@section('content')
<!-- main -->
<main class="main">
    <div class="container-fluid px-4 px-md-2">
        <!-- back -->
        <div class="back py-2 py-md-3">
            <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                <i class="bi bi-chevron-left"></i><i>Back</i>
            </span>
        </div>
        <!-- end back -->
    </div>
    <!-- U Nay Lin Tun -->
    <div class="container py-4 px-0 ">
        <div class="row ">
            <!-- Site Progress -->
            <div class="col-12">
                <div class="">
                    <h3 class="text-primary mb-5"> {{$siteProgress->title}}</h3>
                </div>
                <div class="row row-cols-4 px-5 g-2 text-center">
                    @if (count($siteProgress->images) > 0)
                    @foreach ($siteProgress->images as $img)
                    <div class="col overflow-hidden" style="height:180px">
                        <img src="{{ asset('storage/images/siteimages/' . $img->image) }}" alt="" class="w-100 h-100"
                            style="object-fit: fill;">
                    </div>
                    @endforeach
                    @else
                    <p>No Images</p>
                    @endif
                </div>
                <div class="my-2 py-4">
                    <div class="text-secondary lead fs-6 lh-large" style="white-space:pre-wrap;">
                        {{ $siteProgress->description }}
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- end U Nay Lin Tun -->
</main>
<!-- end main -->
@endsection
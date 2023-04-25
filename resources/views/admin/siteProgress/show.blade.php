@extends('admin.master')
@section('content')
    <!--                start content-->
    <div class="content">
        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
            <!-- breadcrumb -->
            <div class="bg-secondary bg-opacity-50 px-2 py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('project.detail', $siteProgress->project_id) }}">
                                <i class="bi bi-arrow-left me-1"></i>Back
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- end breadcrumb -->
            <div class="w-100 ">
                <div class="py-3 px-3">
                    <div class="row detail px-5">
                        <!-- <div class="col-12">
                                                                                                            <h4 class="mb-3 text-primary header">Site Progress</h4>
                                                                                                        </div> -->
                        <div class="col-12 text-end mb-4">
                            <span class="text-white opacity-50">
                                <i class="bi bi-clock-fill"></i>
                                {{ $siteProgress->created_at->format('j F, Y') }}
                            </span>
                        </div>
                        <div class="col-12">
                            <h5 class="text-primary mb-4 lh-base">{{ $siteProgress->title }}</h5>
                        </div>

                        <div class="col-12">
                            <div class="row row-cols-4 px-5 g-2 text-center">
                                @if (count($siteProgress->images) > 0)
                                    @foreach ($siteProgress->images as $img)
                                        <div class="col overflow-hidden" style="height:180px">
                                            <img src="{{ asset('storage/images/siteimages/' . $img->image) }}"
                                                alt=""class="w-100 h-100" style="object-fit: fill;">
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Images</p>
                                @endif

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="my-2 py-4">
                                <div class="text-primary lead fs-6 lh-large" style="white-space:pre-wrap;">
                                    {{ $siteProgress->description }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--                end content-->
@endsection

@section('script')
    <script></script>
    <script></script>
@endsection

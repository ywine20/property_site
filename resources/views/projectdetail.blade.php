@extends('master')

@section('title', 'Project Detail - SMT')
@section('css')
<!-- Pannellum library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
    integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- End Pannellum library -->

<link rel="stylesheet" href="{{ asset('css/project-detail.css') }}">
@endsection


@section('content')
<!-- main -->
<main class="main">
    <!-- back -->
    <div class="back py-2 py-md-3">
        <span class="backBtn" onclick="history.back()">
            <i class="bi bi-chevron-left"></i><i>Back</i>
        </span>
    </div>
    <!-- end back -->

    <div class="container px-4 px-md-0 px-xl-2">

        <!-- project-detail first section -->
        <div class="pb-4 pt-3 py-md-5 project-detail-card overflow-hidden">
            <div
                class="row gy-4 gx-0 gy-md-0 gx-lg-3 gy-lg-0 flex-column flex-md-row justify-content-center align-content-center">
                <div
                    class="col-7 col-md-5 col-lg-4 d-flex justify-content-center justify-content-lg-end mx-auto main-image">
                    <div class="main-image-div bg-red rounded rounded-2 overflow-hidden shadow">
                        <!-- https://source.unsplash.com/random/300x400/?building,project,apartments -->
                        <img src="{{ asset('storage/images/cover/'.$project->cover) }}" class="" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 ps-0 ps-md-3 ps-lg-4 pe-0">
                    <div class="detail-text-div">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="category">
                                <i class="bi bi-building"></i>
                                @foreach ($category as $c)
                                @if ($c->category_id == $project->category_id)
                                <span class="text-uppercase ">{{ $c->category_name }}</span>
                                @endif
                                @endforeach
                            </div>
                            <div class="finished-badge pe-lg-2">
                                <div
                                    class="badge {{ $project->progress >= '80' ? 'bg-success' : 'bg-warning' }} text-uppercase shadow-sm py-2 py-md-2 px-md-2 px-lg-2 py-lg-2 rounded rounded-2">
                                    {{ $project->progress }}% Finished
                                </div>
                            </div>
                        </div>

                        <div class="pe-lg-5">
                            <div class="price-range my-3 my-md-4 my-lg-4 my-xl-5">
                                <span class="">{{ $project->lower_price }} - {{ $project->upper_price }}
                                    Lakhs</span>
                            </div>
                            <div class="address mb-3 mb-md-4 mb-lg-4 mb-xl-5">
                                <div class="fw-bold">
                                    No({{ $project->hou_no }}), {{ $project->street }} Street, {{ $project->ward }}
                                    Ward,

                                    @foreach ($town as $t)
                                    @if ($t->id == $project->township_id)
                                    {{ $t->name }} Township,
                                    @endif
                                    @endforeach

                                    @foreach ($city as $c)
                                    @if ($c->id == $project->city_id)
                                    {{ $c->name }}.
                                    @endif
                                    @endforeach
                                    <!-- No(19/21), 45<sup>th</sup> Street (lower block), Bothtaung TownShip, Yangon, Myanmar -->
                                </div>
                            </div>
                            <div class=" facts mt-4 mt-lg-3 mb-3 mb-md-3 mb-lg-4 mb-xl-5">
                                <table class="table tb-sm project-card-table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="w-25 text-nowrap pe-2">ID No</td>
                                            <td>: {{ $project->project_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25 text-nowrap pe-2">No. of Units</td>
                                            <td>: {{ $project->layer }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25 text-nowrap pe-2">Est.Sq Feet </td>
                                            <td>: {{ $project->squre_feet }} ft<sup>2</sup></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="entity mb-4 d-flex flex-column ">
                                <span class="amenity-head my-0 my-lg-0 my-xl-1 text-nowrap fw-bold">Amenities :
                                </span>
                                <span class="card-text d-block my-0 my-lg-0 my-xl-1 entity">


                                    @foreach ($amenity as $am)
                                    @foreach ($project->amenity as $pm)
                                    @if ($pm->id == $am->id)
                                    <span class="bg-primary mx-1 px-2 rounded">
                                        {{ $am->amenity }}
                                    </span>
                                    @endif
                                    @endforeach
                                    @endforeach

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Price Image -->
    </div>

    <div class="container-fluid  bg-secondary">
        <!-- Site Progress  -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-item-price mt-5">
            <div class="siteProgress">
                <div class="row py-3">
                    <div class="col-12 py-5">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h5 class="text-primary">Site Progress</h5>
                            <a href="{{ route('siteProgress.create', $project->id) }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-plus "></i>
                                Create Progress
                            </a>
                        </div>

                        <div class="row row-cols-auto g-5  mb-3 ">
                            <div class="col-12 px-5">
                                <div class="row progressCard bg-secondary d-flex flex-row rounded rounded-3 overflow-hidden"
                                    style="height:150px;">
                                    <div class="col-2 px-0">
                                        <div id="siteprogressId"
                                            class="siteprogressImage1 bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center overflow-hidden position-relative h-100 "
                                            style="width:100%;cursor:pointer">

                                            <img src="{{ asset('/images/smtlogoLarge.png') }}" alt=""
                                                class="w-100 h-100">

                                        </div>
                                    </div>

                                    <div class="col-10 d-flex align-items-baseline justify-content-start py-2">

                                        <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                            <div class="W-100 align-self-end">
                                                <div class="time  text-muted mb-1 ">
                                                    <small>
                                                        <i class="bi bi-clock"></i>
                                                        23/33/3000
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="card-title fw-bold text-primary mb-3"
                                                style="min-height:50px;max-height:50px;">
                                                this is title
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <a href="" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="bi bi-eye"></i>
                                                    Show Detail
                                                </a>
                                                <a href="" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="bi bi-pencil "></i>
                                                    Edit
                                                </a>
                                                <form method="post" action="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash "></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid  bg-secondary ">
        <!-- Price Image  -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-item-price mt-5">
            <div class="priceImage">
                <div class="row py-3">
                    <div class="col-12 py-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/itemPrice.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- gallery  -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-gallery ">
            <div class="gallery">
                <h3 class="text-uppercase">Gallery</h3>

                <div class="row row-cols-2 row-cols-md-5 row-cols-xl-5 g-lg-3 g-md-2 g-1">


                    <!-- 360* images -->
                    @if ($project->three_sixty_image != '')
                    <div class="col" style="aspect-ratio: 1;">
                        <a data-vbtype="iframe" href="{{ url('panorama/' . $project->id) }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="1000px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/360Images/' . $project->three_sixty_image) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    <!-- 360* images -->

                    <!-- preview Image -->
                    @if($project->previewimages->small_img1)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img1 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img1) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img2)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img2 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img2) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img3)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img3 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img3) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img4)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img4 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img4) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img5)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img5 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img5) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img6)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img6 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img6) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img7)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img7 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img7) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img8)
                    <div class="col" style="aspect-ratio: 1;">

                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img8 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img8) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img9)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img9 }}" class="myGallery"
                            data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img9) }}"
                                style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- end preview gallery -->


        <!-- Map -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-map">
            <div class="map">
                <div class="row">
                    <div class="col-12">
                        <iframe src="{{ $project->gmlink }}" class="w-100 h-100 iframe-map" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Map -->
        <!-- Project Detail -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-about">
            <div class="row">
                <div class="col-12 text-start text-md-start">
                    <h3 class="text-uppercase">Project Details</h3>
                    <small class=" lh-lg" style="white-space:pre-wrap">{{ $project->description }}</small>
                </div>
            </div>
        </div>
        <!-- End Project Detail -->
    </div>

    </div>







    </div>
</main>
<!-- end main -->
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
    integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection


<!-- <script>
    new VenoBox({
        selector: '.myGallery',
        numeration: true,
        spinner: 'grid',
        spinColor: '#F5CC7A',
        share: false,
    });

    pannellum.viewer('panorama-360-view', {
        "type": "equirectangular",
        "panorama": "http://127.0.0.1:5500/image/gallery/360img.jpeg",
        "autoLoad": true
    })
</script> -->
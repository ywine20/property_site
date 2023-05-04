@extends('master')

@section('title', 'Project Detail - SMT')
@section('css')
<!-- Pannellum library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css" integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- End Pannellum library -->

<link rel="stylesheet" href="{{ asset('css/project-detail.css') }}">
<style>
    .album {
        transition: .5s;
    }


    .album-action {
        height: fit-content;
        bottom: -50%;
        position: absolute;
        transition: all .5s;

    }

    .album:hover {
        transition: all .5s;
        transform: scale(1.05);

    }

    .album:hover .album-action {
        bottom: 0%;
    }
</style>

@endsection @section('content')
<!-- main -->
<main class="main">
    <div class="container-fluid px-0 px-md-2 back ">
        <!-- back -->
        <div class="container py-2 py-md-3 px-2 px-md-0">
            <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                <i class="bi bi-chevron-left"></i><i>Back</i>
            </span>
        </div>
        <!-- end back -->
    </div>

    <div class="container px-4 px-md-0 px-xl-2">

        <!-- project-detail first section -->
        <div class="pb-4 pt-3 py-md-5 project-detail-card overflow-hidden">
            <div class="row gy-4 gx-0 gy-md-0 gx-lg-3 gy-lg-0 flex-column flex-md-row justify-content-center align-content-center">

                <div class="col-7 col-md-5 col-lg-4 col-xl-4 col-xxl-3 d-flex justify-content-center justify-content-lg-end mx-auto main-image">
                    <div class="main-image-div bg-red rounded rounded-2 overflow-hidden shadow">
                        <!-- https://source.unsplash.com/random/300x400/?building,project,apartments -->
                        <img src="{{ asset('storage/images/cover/'.$project->cover) }}" class="" alt="" style="" />
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
                                <div class="badge {{ $project->progress >= '80' ? 'bg-success' : 'bg-warning' }} text-uppercase shadow-sm py-2 py-md-2 px-md-2 px-lg-2 py-lg-2 rounded rounded-2">
                                    {{ $project->progress }}% Finished
                                </div>
                            </div>
                        </div>

                        <div class="pe-lg-4 pe-xl-5">
                            <div class="price-range my-3 my-md-3">
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
                            <div class=" facts mt-4 mt-lg-3 mb-4 mb-md-3 mb-lg-4 mb-xl-5">
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

                            <div class="entity mb-2 d-flex flex-column ">
                                <span class="amenity-head my-0 my-lg-0 my-xl-1 text-nowrap fw-bold">Amenities :
                                </span>
                                <div class="card-text d-block my-0 my-lg-0 my-xl-1 entity">


                                    @foreach ($amenity as $am)
                                    @foreach ($project->amenity as $pm)
                                    @if ($pm->id == $am->id)
                                    <span class="bg-primary mx-1 my-1 px-2 rounded d-inline-block">
                                        {{ $am->amenity }}
                                    </span>
                                    @endif
                                    @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Price Image  -->
    <div class="container-fluid  bg-secondary bg-opacity-10 ">
        <div class="pb-3 pb-md-4 pb-lg-5 project-item-price mt-5">
            <div class="priceImage">
                <div class="row py-3">
                    <div class="col-5 col-md-4 col-lg-3 col-xl-2 pt-2 pt-md-3 pt-lg-5 mx-auto">
                        <div class="d-flex justify-content-center align-items-center w-100 h-100 overflow-hidden">
                            <img src="{{ asset('images/itemPrice.png') }}" alt="" class="w-100 h-100" style="object-fit:contain" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Site Progress  -->
    <div class="container-fluid  bg-secondary position-relative">
        <div class="container latest-site-progress px-0">
            <div class="siteProgress">
                <div class="row py-3 ">
                    <div class="col-12 py-3 px-3  px-md-4 px-lg-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-uppercase text-primary">Site Progress</h4>
                            <a href="{{route('siteProgressList',$project->id)}}">ALL</a>
                        </div>
                        <div class="mx-auto mt-4 my-md-5 px-2 px-md-0 siteProgressAlert">
                            @if($siteProgress)
                            <div class="row progressCard bg-secondary d-flex rounded rounded-3 overflow-hidden " style="box-shadow:1px 1px 6px #eac376;">
                                <div class=" col-4 col-md-3 col-xxl-2 p-1 p-md-2 overflow-hidden img-col">
                                    <div id=" siteprogressId{{$siteProgress->id}}" class="siteprogressImage bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center overflow-hidden position-relative h-100  rounded rounded-3" style="width:100%;cursor:pointer">
                                        @foreach ($siteProgress->images as $key => $image)
                                        @if ($key == 0)
                                        <img src="{{ asset('storage/images/siteimages/' . $image->image) }}" alt="" class="w-100 h-100" />
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-8 col-md-9 col-xxl-10  d-flex align-items-baseline justify-content-start py-2">

                                    <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                        <div class="w-100 align-self-baseline align-self-md-end ">
                                            <div class="time mb-1 text-end ">
                                                <small class="text-white-50">
                                                    <i class="bi bi-clock text-white-50"></i>
                                                    {{ $siteProgress->created_at->format('j F, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-title  fw-bold text-primary mb-3 overflow-hidden">
                                            {{$siteProgress->title}}
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center">
                                            @if($assets == null || $assets->site_progress != '1')
                                            <a href="{{ route('client-siteProgress.show', ['id' => $siteProgress->id]) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-eye text-primary"></i>
                                                Show Detail
                                            </a>
                                            @else
                                            <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bi bi-eye text-primary"></i>
                                                Show Detail
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col py-5 my-3"></div>
                            </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if($assets == null || $assets->site_progress != '1')
        <div id="progressLock" class="lockSection px-0 w-100 h-100 position-absolute bg-black bg-opacity-50 start-0 top-0 text-center d-flex align-items-center justify-content-center" style="backdrop-filter:blur(10px)">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img src="{{asset('images/lock.png')}}" alt="">
                <div class="text-primary my-3">
                    Upgrade your account for <a href="{{route('contact-form')}}" target="_blank" class="fw-bold text-decoration-none">Progress</a> section
                </div>
                <a href="{{route('contact-form')}}" target="_blank">
                    <button class="btn btn-outline-primary">Contact Us</button>
                </a>
            </div>
        </div>
        @endif
        <!-- @if (!auth()->guard('user')->check()) -->

        <!-- @if($assets && $assets->site_progress == '1')
        allowed
        @else -->

        <!-- @endif -->

        <!-- @endif -->
    </div>


    <!-- gallery  -->
    <div class="container">
        <div class="pb-3 pb-md-4 pb-lg-5 project-gallery ">
            <div class="gallery py-3 py-md-5">
                <h3 class="text-uppercase my-3 mb-4 mb-md-5 text-center text-md-start">GALLERY</h3>

                <div class="row row-cols-2 row-cols-md-5 row-cols-xl-5 g-lg-3 g-md-2 g-1">


                    <!-- 360* images -->
                    @if ($project->three_sixty_image != '')
                    <div class="col" style="aspect-ratio: 1;">
                        <a data-vbtype="iframe" href="{{ url('panorama/' . $project->id) }}" class="myGallery" data-gall="myGallery" data-maxwidth="1000px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/360Images/' . $project->three_sixty_image) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    <!-- 360* images -->

                    <!-- preview Image -->
                    @if($project->previewimages->small_img1)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img1 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img1) }}" style="width: 100%;height:100%;object-fit:cover;" alt="" />
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img2)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img2 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img2) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img3)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img3 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img3) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img4)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img4 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img4) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img5)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img5 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img5) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img6)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img6 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img6) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img7)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img7 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img7) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img8)
                    <div class="col" style="aspect-ratio: 1;">

                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img8 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img8) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif
                    @if($project->previewimages->small_img9)
                    <div class="col" style="aspect-ratio: 1;">
                        <a href="/storage/images/gallery/{{ $project->previewimages->small_img9 }}" class="myGallery" data-gall="myGallery" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <img src="{{ asset('storage/images/gallery/' . $project->previewimages->small_img9) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                        </a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- end preview gallery -->

    <!-- Album  -->
    <div class="container-fluid  bg-secondary bg-opacity-10 position-relative">
        <div class="">
            <div class=" legal-document container">
                <div class="row py-3 py-md-5">
                    <div class="col-12 py-3">
                        <div class="d-flex justify-content-center justify-content-md-between align-items-center">
                            <h4 class="text-secondary text-uppercase">
                                Legal Document
                            </h4>
                            <!-- <a href="" class="text-secondary">ALL</a> -->
                        </div>
                    </div>
                    @if(count($albums) > 0)

                    <div class="col-12">
                        <div class="mx-auto py-3">
                            <div class="row row-cols-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 g-2 gy-3 g-md-3 g-lg-5">
                                @foreach($albums as $album)
                                <div class="col text-center">
                                    @if($assets == null || $assets->legal_document != '1')
                                    <a href="{{ route('client-album.show', ['id' => $album->id]) }}" title="Detail" class="text-decoration-none">
                                        @else
                                        <a href="#" title="Detail" class="text-decoration-none">
                                            @endif
                                            <div id="album{{$album->id}}" class="album bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded overflow-hidden rounded-4 position-relative shadow-lg mb-3" style="cursor:pointer">
                                                @if(count($album->albumTestImages) > 0)
                                                @php
                                                $lastImage = $album->albumTestImages->last();
                                                $extension = pathinfo($lastImage->image, PATHINFO_EXTENSION);
                                                @endphp
                                                @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'
                                                ||
                                                $extension == 'gif')
                                                <img src="{{ asset('storage/images/album/'.$lastImage->image) }}" id="" alt="" class="w-100 h-100" style="object-fit: cover">
                                                @elseif ($extension == 'pdf')

                                                <canvas class="thumbnail pdf-canvas" data-pdf-url="{{ asset('storage/images/album/'.$lastImage->image) }}"></canvas>

                                                @endif
                                                @else
                                                <img src="{{asset('images/photoPlaceholderWhite.png') }}" id="" alt="" class="w-100 h-100 bg-black bg-opacity-25" style="object-fit: cover">
                                                @endif


                                            </div>
                                            <span class="text-black album-title">{{ $album->title }}</span>
                                        </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-12 w-100">
                        <div class="py-5 my-2"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if($assets == null || $assets->legal_document != '1')
        <div id="albumLock" class="lockSection  px-0 w-100 h-100 position-absolute bg-black bg-opacity-50 start-0 top-0 text-center d-flex align-items-center justify-content-center" style="backdrop-filter:blur(10px)">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img src="{{asset('images/lock.png')}}" alt="">
                <div class="text-primary my-3   ">
                    Upgrade your account for <a href="{{route('contact-form')}}" target="_blank" class="fw-bold text-decoration-none">Legal Documents</a> section
                </div>
                <a href="{{route('contact-form')}}" target="_blank">
                    <button class="btn btn-outline-primary">Contact Us</button>
                </a>
            </div>
        </div>
        @endif
    </div>


    <!-- Map -->
    <div class="container">
        <div class="pb-3 pb-md-4 pb-lg-5 project-map">
            <div class="map py-3">
                <h4 class="text-uppercase my-4 mb-md-5 text-center text-md-start">MAP</h4>

                <div class="row">
                    <div class="col-12">
                        <iframe src="{{ $project->gmlink }}" class="w-100 h-100 iframe-map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Map -->
        <!-- Project Detail -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-about">
            <div class="row">
                <div class="col-12 text-center text-md-start">
                    <h3 class="text-uppercase mb-3 mb-md-4">Project Details</h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js" integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/app.js') }}"></script>



<script>
    const canvases = document.querySelectorAll('.pdf-canvas');


    for (let i = 0; i < canvases.length; i++) {
        const canvas = canvases[i];
        const pdfUrl = canvas.dataset.pdfUrl;

        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                const viewport = page.getViewport({
                    scale: 0.2
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                page.render({
                    canvasContext: canvas.getContext('2d'),
                    viewport: viewport
                }).promise.then(function() {
                    const imgDataUrl = canvas.toDataURL();
                    const img = new Image();
                    img.src = imgDataUrl;
                    img.classList = "w-100 h-100"

                    canvas.parentNode.replaceChild(img, canvas);
                });
            });
        });
    }
</script>
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
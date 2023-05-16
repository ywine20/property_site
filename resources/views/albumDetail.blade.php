@extends('master')

@section('title', 'Album - SMT')

@section('css')

<style>
    .img-div {
        overflow: hidden;
        height: 80px;
    }

    .thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all .6s;
        box-shadow: 1px 1px 6px gray
    }

    img {
        position: relative;
    }
</style>
@endsection

@section('content')
<!-- main -->
<main class="main">
    <div class="container-fluid px-0 px-md-2 back">
        <!-- back -->
        <div class="container py-2 py-md-3">
            <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                <i class="bi bi-chevron-left"></i><i>Back</i>
            </span>
        </div>
        <!-- end back -->
    </div>
    <!-- Album Detail -->
    <div class="container py-4 px-2 px-md-4 album-detail">
        <div class="row ">
            <div class="col-12">
                <div class="">
                    <h3 class="text-primary mb-3 mb-lg-3 album-head">{{$album->title}}</h3>
                </div>
            </div>

            <div class="col-12">
                <div class="row row-cols-4 row-cols-md-5 row-cols-lg-5 g-3">
                    @foreach($album->albumTestImages as $album)
                    <div class=" col img-div position-relative mb-2 px-1">
                        @if (strpos($album->image, '.jpg') !== false || strpos($album->image, '.jpeg')
                        !== false || strpos($album->image, '.png') !== false || strpos($album->image,
                        '.gif') !== false)
                        <a href="/storage/images/album/{{$album->image }}" class="myAlbum w-100" title='{{$album->imageName}}' data-gall="myAlbum" data-maxwidth="600px" data-overlay="#423e3ddf">
                            <div class="w-100 h-100 position-relative">
                                <img class="thumbnail" src="{{ asset('storage/images/album/'.$album->image) }}">
                                <div class="bg-black bg-opacity-50 text-white position-absolute bottom-0 py-1 w-100">
                                    <span class="text-truncate text-white ps-1 ps-md-2 album-image-name ">
                                        {{$album->imageName}}
                                    </span>
                                </div>
                            </div>
                        </a>

                        @elseif (strpos($album->image, '.pdf') !== false)
                        <a href="{{ asset('storage/images/album/'.$album->image) }}" data-gall="myAlbum" data-overlay="#423e3ddf" data-vbtype="iframe" class="myAlbum">

                            <div class="w-100 h-100">
                                <canvas class="thumbnail pdf-canvas" data-pdf-url="{{ asset('storage/images/album/'.$album->image) }}"></canvas>

                                <div class="bg-black bg-opacity-50 text-white position-absolute bottom-0 py-1 w-100">
                                    <span class="text-truncate text-white  ps-1 ps-md-2 album-image-name">
                                        {{$album->imageName}}
                                    </span>
                                </div>
                                <div class="position-absolute top-0 me-1 pointer delImg w-100 d-flex justify-content-between align-items-center">
                                    <i class="bi bi-file-pdf-fill fa-fw text-danger fs-4"></i>
                                </div>
                            </div>
                        </a>

                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</main>
<!-- end main -->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
@endsection
@push('clientScript')
<script>
    const canvases = document.querySelectorAll('.pdf-canvas');


    for (let i = 0; i < canvases.length; i++) {
        const canvas = canvases[i];
        const pdfUrl = canvas.dataset.pdfUrl;
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                const
                    viewport = page.getViewport({
                        scale: 0.2
                    });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                page.render({
                    canvasContext: canvas.getContext('2d'),
                    viewport: viewport
                }).promise.then(function() {
                    const
                        imgDataUrl = canvas.toDataURL();
                    const img = new Image();
                    img.src = imgDataUrl;
                    img.classList = "w-100 h-100"
                    canvas.parentNode.replaceChild(img, canvas);
                });
            });
        });
    }
</script>
@endpush
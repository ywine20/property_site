@extends('admin.master')

@section('style')
    <style>
        #output {
            display: flex;
        }

        .img-div {
            overflow: hidden;
            height: 180px;
        }

        .thumbnail {
            width: 100%;
            height: 100%;
            object-fit: fill;
            transition: all .6s;
            box-shadow: 1px 1px 6px gray
        }

        img {
            position: relative;
        }

        .removeBtn {
            position: absolute;
            width: 150px;
            height: 50px;
            z-index: 10000;
            top: 0;
            right: 0;
            background-color: red;

        }
    </style>
@endsection

@section('content')
    <!--                start content-->
    <div class="content">
        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
            <!-- breadcrumb -->
            <div class="bg-secondary bg-opacity-50 px-2 py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('project.detail', $albums->project_id) }}">
                                <i class="bi bi-arrow-left me-1"></i>Back
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- end breadcrumb -->
            <div class="w-100 ">
                <div class="pb-3 px-3">
                    <div class="row create">
                        <div class="col-12 px-0">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> something went wrong <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div
                                    class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown my-2">
                                    {{ Session::get('success') }}
                                    <div class="text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-4 bg-white bg-opacity-10 vh-100">
                                    <div class="p-2">
                                        <h4 class="text-primary header">Edit Album</h4>
                                    </div>
                                    <div class="px-3 py-3">
                                        <form method="POST"
                                            action="{{ route('albumTest.update', ['projectId' => $albums->project_id, 'id' => $albums->id]) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="text" name="project_id" value="{{ $albums->project_id }}"
                                                hidden>
                                            <div class="form-group mb-3">
                                                <label for="album" class="form-label text-white-50">Album Name :</label>
                                                <input type="text" name="albumName"
                                                    class="create-input form-control @error('albumName') is-invalid @enderror"
                                                    id="album" value="{{ old('album', $albums->title) }}" required>
                                                @error('albumName')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form- mb-3">
                                                <label for="uploadFile" class="form-label text-white-50">Upload
                                                    File:</label>
                                                <input id="files" type="file" name="uploadFile[]"
                                                    class="create-file form-control " multiple>
                                                @error('uploadFile')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div id="output2" class="row row-cols-4 g-2 py-2">

                                            </div>

                                            <button type="submit"
                                                class="btn btn-outline-primary btn-lg w-100 my-5">Save</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div id="output" class="row row-cols-4 g-1 py-2">
                                        @foreach ($albums->albumTestImages as $album)
                                            <div class="col img-div position-relative">
                                                @if (strpos($album->image, '.jpg') !== false ||
                                                        strpos($album->image, '.jpeg') !== false ||
                                                        strpos($album->image, '.png') !== false ||
                                                        strpos($album->image, '.gif') !== false)
                                                    <img class="thumbnail"
                                                        src="{{ asset('storage/images/album/' . $album->image) }}">
                                                    <div
                                                        class="bg-black bg-opacity-50 text-white w-100 position-absolute bottom-0 py-1 px-1 d-flex justify-content-between align-items-center">
                                                        <span class="text-truncate pe-2">
                                                            {{ $album->imageName }}
                                                        </span>

                                                        <a href="{{ asset('storage/images/album/' . $album->image) }}"
                                                            download class="me-2" title="download">
                                                            <i class="bi bi-download fw-bold"></i>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="position-absolute top-0 me-1 pointer delImg w-100 d-flex justify-content-end align-items-center">
                                                        <form
                                                            action="{{ route('albumImage.delete', ['albumId' => $albums->id, 'imageName' => $album->image]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link btn-sm text-danger"
                                                                id="delImageBtn{{ $album->image }}">
                                                                <!-- del -->
                                                                <i class="bi bi-x-circle-fill fw-bolder  fs-4 pe-1"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @elseif (strpos($album->image, '.pdf') !== false)
                                                    <canvas class="thumbnail pdf-canvas"
                                                        data-pdf-url="{{ asset('storage/images/album/' . $album->image) }}"></canvas>

                                                    <div
                                                        class="bg-black bg-opacity-50 text-white w-100 position-absolute bottom-0 py-1 px-1 d-flex justify-content-between align-items-center">
                                                        <span class="text-truncate pe-2">
                                                            {{ $album->imageName }}
                                                        </span>

                                                        <a href="{{ asset('storage/images/album/' . $album->image) }}"
                                                            download class="me-2" title="download">
                                                            <i class="bi bi-download fw-bold"></i>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="position-absolute top-0 me-1 pointer delImg w-100 d-flex justify-content-between align-items-center">
                                                        <i class="bi bi-file-pdf-fill fa-fw text-danger fs-4"></i>

                                                        <form
                                                            action="{{ route('albumImage.delete', ['albumId' => $albums->id, 'imageName' => $album->image]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link btn-sm text-danger"
                                                                id="delImageBtn{{ $album->image }}">
                                                                <!-- del -->
                                                                <i class="bi bi-x-circle-fill fw-bolder fs-4"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div id="output3" class="row row-cols-4 g-2 py-2">

                                    </div>
                                </div>
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.5.141/pdf.min.js"
        integrity="sha512-BagCUdQjQ2Ncd42n5GGuXQn1qwkHL2jCSkxN5+ot9076d5wAI8bcciSooQaI3OG3YLj6L97dKAFaRvhSXVO0/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script>
        // preview PDF files
        let fileInput = document.querySelector("#files");
        fileInput.addEventListener("change", (e) => {
            if (window.File && window.FileReader && window.FileList && window.Blob) {
                const files = e.target.files;
                const limit = 30;

                if (files.length > limit) {
                    alert("You can select max " + limit + " files");
                    fileInput.value = null;
                } else {
                    const output2 = document.querySelector("#output2");
                    output2.innerHTML = "";
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const fileName = file.name;
                        const fileType = file.type;
                        const fileSize = file.size;

                        if (fileType.match("image")) {


                            // preview image
                            const imgReader = new FileReader();
                            imgReader.onload = function(e) {
                                output2.innerHTML += `
                                <div class="col file-div">
                                    <a class="thumbnail" href="#" onclick="return false;">
                                        <img src="${e.target.result}" style="width:100%;height:auto;max-height:100px">

                                    </a>
                                </div>
                                `;
                                // <
                                // div class = "file-name" > $ {
                                //         fileName
                                //     } < /div> <
                                //     div class = "file-size" > $ {
                                //         (fileSize / 1024).toFixed(2)
                                //     }
                                // KB < /div>
                            };
                            imgReader.readAsDataURL(file);


                        } else if (fileType.match("pdf")) {


                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const pdf = new Uint8Array(e.target.result);
                                // CODE TO PREVIEW FIRST PAGE OF PDF
                                pdfjsLib.getDocument(pdf).promise.then(function(pdfDoc) {
                                    pdfDoc.getPage(1).then(function(page) {
                                        const viewport = page.getViewport({
                                            scale: 1
                                        });
                                        const canvas = document.createElement("canvas");
                                        const ctx = canvas.getContext("2d");
                                        const renderContext = {
                                            canvasContext: ctx,
                                            viewport: viewport
                                        };
                                        canvas.height = viewport.height;
                                        canvas.width = viewport.width;
                                        page.render(renderContext).promise.then(function() {
                                            output2.innerHTML += `
                                <div class="col file-div">
                                    <a class="thumbnail" href="#" onclick="return false;">
                                        <img src="${canvas.toDataURL()}" style="width:100%;height:auto">
                                    </a>
                                </div>
                                `;
                                            // <
                                            // div class = "file-name" > $ {
                                            //     fileName
                                            // } < /div> <
                                            // div class = "file-size" > $ {
                                            //     (fileSize / 1024).toFixed(2)
                                            // }
                                            // KB < /div>
                                        });
                                    });
                                });
                            };
                            reader.readAsArrayBuffer(file);




                        }


                    }
                }
            } else {
                alert("Your browser does not support File API");
            }
        });
    </script>
@endsection

@push('customScript')
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
@endpush

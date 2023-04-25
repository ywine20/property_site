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
                        <a href="#" onclick="window.history.back()">
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

                        @if(Session::has('success'))
                        <div class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
                            {{Session::get('success')}}
                            <div class="text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-4 bg-white bg-opacity-10 vh-100">
                                <div class="p-2">
                                    <h4 class="text-primary header">Create Album</h4>
                                </div>
                                <div class="px-3 py-3">
                                    <form method="POST" action="{{ route('albumTest.store','$porjectId') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="project_id" value="{{$projectId}}" hidden>
                                        <div class="form-group mb-3">
                                            <label for="album" class="form-label text-white-50">Album Name :</label>
                                            <input type="text" name="albumName" class="create-input form-control @error('albumName') is-invalid @enderror" id="album" value="{{ old('album') }}" required>
                                            @error('albumName')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form- mb-3">
                                            <label for="uploadFile" class="form-label text-white-50">Upload
                                                File:</label>
                                            <input id="files" type="file" name="uploadFile[]" class="create-file form-control " accept=".pdf, .jpg, .jpeg, .png, .gif" multiple>
                                            @error('uploadFile')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-lg w-100 my-5">Create</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-8">
                                <div id="output" class="row row-cols-4 g-2">
                                    <!-- <embed src="http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" frameBorder="0" scrolling="auto" height="100%" width="100%"></embed> -->
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
<!-- <script>
// preview images
let fileInput = document.querySelector("#files");
fileInput.addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        // CODE TO PREVIEW IMAGE
        const files = e.target.files;
        const limit = 30;

        if (files.length > limit) {
            alert("you can select max " + limit + " images");
            fileInput.value = null;
        } else {
            const output = document.querySelector("#output");
            output.innerHTML = "";
            for (let i = 0; i < files.length; i++) {
                if (!files[i].type.match("image")) continue;
                const imgReader = new FileReader();
                imgReader.addEventListener("load", function(event) {
                    const imgFile = event.target;
                    output.innerHTML += `
                    <div class="col img-div">
                        <img class="thumbnail" src="${imgFile.result}">
                        
                    </div>
                    `;
                });

                imgReader.readAsDataURL(files[i]);
            }
        }
    } else {
        alert("Your browser does not support File API");
    }
});
</script> -->


//pdf preview
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.640/pdf.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.5.141/pdf.min.js" integrity="sha512-BagCUdQjQ2Ncd42n5GGuXQn1qwkHL2jCSkxN5+ot9076d5wAI8bcciSooQaI3OG3YLj6L97dKAFaRvhSXVO0/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                const output = document.querySelector("#output");
                output.innerHTML = "";
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const fileName = file.name;
                    const fileType = file.type;
                    const fileSize = file.size;

                    if (fileType.match("image")) {


                        // preview image
                        const imgReader = new FileReader();
                        imgReader.onload = function(e) {
                            output.innerHTML += `
                                <div class="col file-div">
                                    <a class="thumbnail" href="#" onclick="return false;">
                                        <img src="${e.target.result}" style="width:100px;height:auto" class="w-100 h-100">
                                    </a>
                                </div>
                                `;
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
                                        output.innerHTML += `
                                <div class="col file-div overflow-hidden">
                                    <a class="thumbnail" href="#" onclick="return false;">
                                        <img src="${canvas.toDataURL()}" style="width:100%;height:100%;object-fit:contain;">
                                      
                                    </a>
                                </div>
                                `;
                                        // <
                                        // div class = "file-name" > $ {
                                        //     fileName
                                        // } < /div>
                                        // <div class="file-size">${(fileSize/1024).toFixed(2)} KB</div>
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
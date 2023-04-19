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
            <div class="py-3 px-3">
                <div class="row create">
                    <div class="col-12">
                        <h4 class="mb-3 text-primary header">Create Site Progress</h4>
                    </div>

                    <div class="col-12">
                        <!-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error!</strong> something went wrong <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif -->

                        @if(Session::has('success'))
                        <div class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
                            {{Session::get('success')}}
                            <div class="text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('siteProgress.store','$porjectId') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="text" name="project_id" value="{{$projectId}}" hidden>
                            <div class="form-group mb-3">
                                <label for="title" class="form-label text-white-50">Title :</label>
                                <input type="text" name="title" class="create-input form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form- mb-3">
                                <label for="description" class="form-label text-white-50">Description :</label>
                                <textarea type="text" name="description" rows="20" class="create-input form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" required></textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="images" class="form-label text-white-50">Images</label>
                                <input type="file" name="images[]" class="create-input form-control mb-3 @error('images.*') is-invalid @enderror @error('images') is-invalid @enderror" id="images" value="{{ old('images') }}" multiple>
                                @error('images')
                                <div class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                                @error('images.*')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                                <div id="output" class="row row-cols-4 g-2">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Post</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--                end content-->
@endsection

@section('script')
<script>
    // preview images
    let fileInput = document.querySelector("#images");
    fileInput.addEventListener("change", (e) => {
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            // CODE TO PREVIEW IMAGE
            const files = e.target.files;
            const limit = 9;

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
                        const div = document.createElement("div");
                        div.className = "col img-div";
                        const img = document.createElement("img");
                        img.className = "thumbnail";
                        img.src = imgFile.result;
                        div.appendChild(img);
                        output.appendChild(div);
                    });

                    imgReader.readAsDataURL(files[i]);
                }
            }
        } else {
            alert("Your browser does not support File API");
        }
    });
</script>


<!-- With local storage -->
<script>
    //  function previewImages() {
    //         var preview = document.querySelector('#preview');
    //         var files = document.querySelector('input[type=file]').files;

    //         function readAndPreview(file) {
    //   // Make sure `file.type` matches the desired image types
    //   if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
    //     var reader = new FileReader();

    //     reader.addEventListener("load", function () {
    //       var image = new Image();
    //       image.height = 200;
    //       image.title = file.name;
    //       image.src = this.result;

    //       var removeButton = document.createElement("button");
    //       removeButton.textContent = "Remove";
    //       removeButton.type = "button";
    //       removeButton.className = 'removeBtn'
    //       removeButton.addEventListener("click", function() {
    //         var index = Array.from(preview.childNodes).indexOf(image);
    //         removeImage(index);
    //       });

    //       var preview = document.querySelector('#preview');
    //       preview.appendChild(image);
    //       preview.appendChild(removeButton);

    //       // Store the uploaded images in localStorage
    //       var storedImages = localStorage.getItem('uploadedImages') ? JSON.parse(localStorage.getItem('uploadedImages')) : [];
    //       storedImages.push(this.result);
    //       localStorage.setItem('uploadedImages', JSON.stringify(storedImages));
    //     }, false);

    //     reader.readAsDataURL(file);
    //   }
    // }

    //         if (files) {
    //             [].forEach.call(files, readAndPreview);
    //         }
    //     }

    //     // Check if there are any stored images in localStorage and display them on page load
    //     window.onload = function() {
    //         var storedImages = localStorage.getItem('uploadedImages') ? JSON.parse(localStorage.getItem('uploadedImages')) : [];
    //         var preview = document.querySelector('#preview');
    //         storedImages.forEach(function(imageSrc) {
    //             var image = new Image();
    //             image.height = 200;
    //             image.src = imageSrc;
    //             preview.appendChild(image);
    //         });
    //     }

    //     document.querySelector('input[type=file]').addEventListener("change", previewImages);

    // function removeImage(index) {
    //   var images = JSON.parse(localStorage.getItem("images"));
    //   images.splice(index, 1);
    //   localStorage.setItem("images", JSON.stringify(images));
    //   document.getElementById("output").innerHTML = generateImages(images);
    // }
</script>
@endsection
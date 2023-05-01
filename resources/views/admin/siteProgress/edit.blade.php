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
                <div class="row create">
                    <div class="col-12">
                        <h4 class="mb-3 text-primary header">Edit Site Progress</h4>
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

                        @if (Session::has('success'))
                        <div
                            class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
                            {{ Session::get('success') }}
                            <div class="text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <form method="POST"
                            action="{{ route('siteProgress.update', ['projectId' => $siteProgress->project_id, 'id' => $siteProgress->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')


                            <input type="number" name="project_id" value="{{ $siteProgress->project_id }}" hidden>
                            <div class="form-group mb-3">
                                <label for="title" class="form-label text-white-50">Title :</label>
                                <input type="text" name="title"
                                    class="create-input form-control @error('title') is-invalid @enderror" id="title"
                                    value="{{ old('title', $siteProgress->title) }}" required>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form- mb-3">
                                <label for="description" class="form-label text-white-50">Description :</label>
                                <textarea type="text" name="description" rows="10"
                                    class="create-input form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    required>{{ old('description', $siteProgress->description) }}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3" id="imagesDiv">

                                {{-- <input type="file" hidden name="PreviousImages[]"
                                        class="create-input form-control mb-3" value="{{ old('PreviousImages') }}"
                                multiple> --}}




                                <label for="images" class="form-label text-white-50">Images</label>
                                <input type="file" name="images[]" accept="image/*"
                                    class="create-input form-control mb-3 @error('images.*') is-invalid @enderror @error('images') is-invalid @enderror"
                                    id="images" value="{{ old('images') }}" multiple>
                                @error('images')
                                <div class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                @error('images.*')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                                <div id="output1" class="row row-cols-4 g-2">
                                    @foreach ($siteProgress->images as $img)
                                    <div class="col overflow-hidden position-relative" style="height:180px">
                                        <img src="{{ asset('storage/images/siteimages/' . $img->image) }}" alt=""
                                            class="w-100 h-100" style="object-fit: fill;">
                                        <button type="submit" form="delImag{{ $img->id }}" class=""
                                            id="delImageBtn{{ $img->id }}">
                                            <!-- del -->
                                            <i
                                                class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg fs-4"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="output" class="row row-cols-4 g-2 my-2"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Post</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--end content-->

<!-- Images delete form -->
<div class="">

    @foreach ($siteProgress->images as $img)
    <form method="post"
        action="{{ route('siteProgressImage.destory', ['siteProgressId' => $siteProgress->id, 'id' => $img->id]) }}"
        id="delImag{{ $img->id }}">
        @csrf
        @method('DELETE')
    </form>
    @endforeach
</div>


@endsection
@section('script')
<script>
// preview images
let fileInput = document.querySelector("#images");
fileInput.addEventListener("change", (e) => {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        // CODE TO PREVIEW IMAGE
        const files = e.target.files;
        const limit = 8;

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
@endsection
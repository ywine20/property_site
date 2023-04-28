@extends('admin.master')

@section('style')
<style>
.image-preview {
    display: inline-block;
    position: relative;
    margin-right: 10px;
}

.image-preview img {
    width: 100px;
    height: 100px;
}

.image-preview button {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 50%;
    padding: 5px;
    cursor: pointer;
}



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
                        <div
                            class="alert alert-success d-flex justify-content-between align-items-center animate__animated animate__fadeInDown">
                            {{Session::get('success')}}
                            <div class="text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-8 bg-white bg-opacity-10 vh-100">
                                <div class="p-2">
                                    <h4 class="text-primary header">Test</h4>
                                </div>
                                <div class="px-3 py-3">
                                    <form id="uploadForm" method="POST" action="{{ route('test.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="title" placeholder="Title" class="form-control">
                                        <input type="file" name="files[]" id="imageUpload" multiple
                                            class="form-control">
                                        <div class="preview-container"></div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
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
<script>
const input = document.querySelector('#imageUpload');
input.addEventListener('change', handleImageUpload);

function handleImageUpload(e) {
    const files = e.target.files;
    const previewContainer = document.querySelector('.preview-container');
    // previewContainer.innerHTML = '';

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.readAsDataURL(file);

        const img = document.createElement('img');
        img.src = window.URL.createObjectURL(file);

        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Delete';
        deleteBtn.addEventListener('click', (e) => {
            e.target.parentNode.remove();
            // input.value = null;
        });

        const preview = document.createElement('div');
        preview.classList.add('image-preview');
        preview.appendChild(img);
        preview.appendChild(deleteBtn);
        previewContainer.appendChild(preview);
    }
}

const form = document.querySelector('#uploadForm');
form.addEventListener('submit', handleFormSubmit);

function handleFormSubmit(e) {
    e.preventDefault();

    const formData = new FormData(form);
    const imageFiles = input.files;
    // formData.append('image', imageFile);

    for (let i = 0; i < imageFiles.length; i++) {
        formData.append('image[]', imageFiles[i]);
        console.log(imageFiles[i]);
    }



}
</script>

@endsection
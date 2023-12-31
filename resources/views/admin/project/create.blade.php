@extends('admin.master')

@section('style')
<!--select2 cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #output {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px 0;
    }

    .img-div {
        width: 100px;
        height: 100px;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        transition: .4s;
        position: relative;
    }

    .img-div:hover {
        transform: scale(1.09);
        box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.256);
    }


    .thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /*    select 2 style*/

    .select2-container--default .select2-selection--multiple {
        background-color: #7A757491;
        border: none;
        border-radius: 5px;
        cursor: text;
        color: white;
        /*width: 100%;*/
        min-height: 100px;
        max-height: 180px;
        overflow-y: auto;
    }

    .selection:focus-visible,
    .select2-selection--multiple:focus-visible {
        outline: none;
        border: 0;
    }

    .select2-container--focus {
        border: white !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        /*border: solid black 1px;*/
        outline: 0;
        border: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #F5CC7A;
        border: none;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }
</style>
<style>
    #output {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px 0;
    }

    .img-div {
        width: 100px;
        height: 100px;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        transition: .4s;
        position: relative;
    }

    .img-div:hover {
        transform: scale(1.09);
        box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.256);
    }


    .thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /*    select 2 style*/

    .select2-container--default .select2-selection--multiple {
        background-color: #7A757491;
        border: none;
        border-radius: 5px;
        cursor: text;
        color: white;
        /*width: 100%;*/
        min-height: 100px;
        max-height: 180px;
        overflow-y: auto;
    }

    .selection:focus-visible,
    .select2-selection--multiple:focus-visible {
        outline: none;
        border: 0;
    }

    .select2-container--focus {
        border: white !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        /*border: solid black 1px;*/
        outline: 0;
        border: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #F5CC7A;
        border: none;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }
</style>
<style>
    #output {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 10px;
        padding: 10px 0;
    }

    .img-div {
        width: 100px;
        height: 100px;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        transition: .4s;
        position: relative;
    }

    .img-div:hover {
        transform: scale(1.09);
        box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.256);
    }


    .thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /*    select 2 style*/

    .select2-container--default .select2-selection--multiple {
        background-color: #7A757491;
        border: none;
        border-radius: 5px;
        cursor: text;
        color: white;
        /*width: 100%;*/
        min-height: 100px;
        max-height: 180px;
        overflow-y: auto;
    }

    .selection:focus-visible,
    .select2-selection--multiple:focus-visible {
        outline: none;
        border: 0;
    }

    .select2-container--focus {
        border: white !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        /*border: solid black 1px;*/
        outline: 0;
        border: none;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #F5CC7A;
        border: none;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
    }

    .none {
        display: none;
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
                        <a href="#" onclick="history.back()">
                            <i class="bi bi-arrow-left me-1"></i>Back
                        </a>
                    </li>
                    {{-- <li class="breadcrumb-item"><a href="{{ url('admin/project') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Create</li> --}}
                    <!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                </ol>
            </nav>
        </div>
        <!-- end breadcrumb -->
        <div class="w-100 ">
            <div class="py-3 px-3">
                <div class="row create">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-3 text-primary header">Project Create</h4>
                            <a href="{{ route('project.index') }}">
                                <i class="bi bi-list fs-3 "></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12 ">

                        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
                            @csrf
                            <div class="row gx-3 d-flex flex-column flex-md-row justify-content-start align-items-start">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="project_id" class="form-label">Project ID :</label>
                                        <input id="project_id" name="project_Id" value="{{ old('project_Id') }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('project_Id') is-invalid @enderror" placeholder="ProjectID">
                                        @error('project_Id')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_category" class="form-label">Category :</label>
                                        <select name="category" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="project_category">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $c)
                                            <option {{ $c->id == old('category') ? 'selected' : '' }} value="{{ $c->id }}"> {{ $c->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <div class=" text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror

                                        <!--                                                    <input id="project_category" name="" type="text" class="create-input form-control form-control-lg rounded rounded-1 c mb-2 mb-md-0 fs-6" placeholder="Apartment">-->
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_range_max" class="form-label">Range :</label>
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <input id="project_range_min" name="lower_price" value="{{ old('lower_price') }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('lower_price') is-invalid @enderror" placeholder="Min">
                                                @error('lower_price')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <input id="project_range_max" name="upper_price" type="number" value="{{ old('upper_price') }}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('upper_price') is-invalid @enderror" placeholder="Max">
                                                @error('upper_price')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <label for="project_floor" class="form-label">No. of Units :</label>
                                                <input id="project_floor" name="layer" value="{{ old('layer') }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('layer') is-invalid @enderror" placeholder="12">
                                                @error('layer')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="project_squreFeet" class="form-label">Squre Feet :</label>
                                                <input id="project_squreFeet" name="squre_feet" value="{{ old('squre_feet') }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('squre_feet') is-invalid @enderror" placeholder="652">
                                                @error('squre_feet')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address :</label>
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col">
                                                <select name="city_slug" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="project_city">
                                                    <option value=" ">Choose City</option>
                                                    @foreach ($cities as $c)
                                                    <option value="{{ $c->slug }}" {{ $c->slug == old('city_slug') ? 'selected' : '' }}>
                                                        {{ $c->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('city_slug')
                                                <div class="text-danger fs-6" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <select name="town_slug" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="project-township">
                                                    <option value="">Choose Township</option>
                                                    @foreach ($towns as $t)
                                                    <option value="{{ $t->slug }}" {{ $t->slug == old('town_slug') ? 'selected' : '' }}>
                                                        {{ $t->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('town_slug')
                                                <div class="text-danger fs-6" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_ward" class="form-label">Ward :</label>
                                        <input id="project_ward" name="ward" value="{{ old('ward') }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('ward') is-invalid @enderror" placeholder="ward">
                                        @error('ward')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_street" class="form-label">Street :</label>
                                        <input id="project_street" name="street" value="{{ old('street') }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('street') is-invalid @enderror" placeholder="street">
                                        @error('street')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_houseNo" class="form-label">House No :</label>
                                        <input id="project_houseNo" name="hou_no" value="{{ old('hou_no') }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('hou_no') is-invalid @enderror" placeholder="No">
                                        @error('hou_no')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_progress" class="form-label">Progress :</label>
                                        <input id="project_houseNo" name="progress" value="{{ old('progress') }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('progress') is-invalid @enderror" placeholder="%">
                                        @error('progress')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <!--                                                    <label for="project_amenities" class="text-white">Amenities :</label>-->
                                        <!--                                                    <input id="project_amenities" name="" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="No">-->
                                        <!--                                                    -->
                                        <div class="w-100">

                                            <label for="amenity" class="form-label w-100">
                                                Amenities :
                                                <select id="amenity" class="amenity-multiple form-select create-select w-100" name="amenity[]" multiple="multiple" style="width: 100%" required>
                                                    @foreach ($amenities as $am)
                                                    <option value="{{ $am->id }}" {{ collect(old('amenity'))->contains($am->id) ? 'selected' : '' }}>
                                                        {{ $am->amenity }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                            @error('amenity')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="w-100">
                                            <div class="project-cover-preview w-100 overflow-hidden">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label for="price_img_input" class="form-label">Unit Price Image
                                                        :</label>
                                                    <small class="text-warning fw-light">
                                                        max : 2 MB
                                                    </small>
                                                </div>
                                                <input type="file" id="price_img_input" name="priceImage" class="create-input form-control @error('priceImage') is-invalid @enderror">

                                                @error('priceImage')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="priceImagePreview">
                                                <div class=" bg-white overflow-hidden w-auto py-2 mt-2" style="height:250px;max-width:70%;display:none;">
                                                    <img id="price_img" src="" alt="" class="w-100 h-100" style="object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="map_link" class="form-label">Map Link :</label>
                                            <!--                                                    <span class="text-danger error-text fw-light fs-6"><sub>limit text only 300!</sub></span>-->
                                        </div>
                                        <textarea id="map_link" value="{{ old('map_link') }}" class="form-control create-textarea text-white fs-6 is-invalid" name="map_link" id="" cols="30" rows="6" style="" placeholder="Map Link">{{ old('map_link') }}</textarea>
                                        @error('map_link')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="project_description" class="form-label">Description :</label>
                                        </div>
                                        <textarea id="project_description" class="form-control create-textarea text-white fs-6 @error('description') is-invalid @enderror" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="project-cover-preview w-100 overflow-hidden">
                                                    <label for="project_cover_input" class="form-label">Cover Image
                                                        :</label>
                                                    <input type="file" name="cover" class="form-control d-none" id="project_cover_input">
                                                    <div id="cover-preview" class="bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview" style="height:300px;">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="cover_img" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                    </div>
                                                    <small class="text-warning fw-light">
                                                        max : 2 MB | width=600 | height=900
                                                    </small>
                                                    @error('cover')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="project-360-preview w-100 overflow-hidden">
                                                    <label for="project_360_input" class="form-label">360 Image
                                                        :</label>
                                                    <input type="file" name="threeSixtyImage" class="form-control d-none" id="project_360_input">
                                                    <div id="360-preview" class="three-preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview " style="height:300px;">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="360_img" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                    </div>
                                                    <small class="text-warning fw-light">
                                                        max : 2.5 MB
                                                    </small>
                                                    @error('threeSixtyImage')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- new 9 images -->
                                    <div class="mb-3">
                                        <div class="mt-5">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="gallery_image_files" class="form-label">Gallery Images
                                                    :</label>
                                                <small class="text-warning fw-light">
                                                    max : 1 MB | width=800 | height=800
                                                </small>
                                            </div>
                                            @if (
                                            $errors->has('small_img_1') ||
                                            $errors->has('small_img_2') ||
                                            $errors->has('small_img_3') ||
                                            $errors->has('small_img_4') ||
                                            $errors->has('small_img_5') ||
                                            $errors->has('small_img_6') ||
                                            $errors->has('small_img_7') ||
                                            $errors->has('small_img_8') ||
                                            $errors->has('small_img_9'))
                                            <div class="text-danger fs-6 mt-2 alert alert-danger d-flex flex-column" role="alert">
                                                @error('small_img_1')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_2')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_3')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_4')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_5')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_6')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_7')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_8')
                                                <span>{{ $message }}</span>
                                                @enderror
                                                @error('small_img_9')
                                                <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @endif
                                            <div class="row row-cols-5 g-2 my-3">
                                                <div class="col">
                                                    <input type="file" name="small_img_1" class="form-control d-none small_file" id="small_img_input_1" value="{{ old('small_img_1') }}">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg1" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn1"></i>
                                                    </div>
                                                    <p class="text-danger">{{ old('small_img_1') }}</p>
                                                    <!-- @error('small_img_1')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_2" class="form-control d-none small_file" id="small_img_input_2">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg2" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn2"></i>
                                                    </div>
                                                    <!-- @error('small_img_2')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_3" class="form-control d-none small_file" id="small_img_input_3">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg3" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn3"></i>
                                                    </div>
                                                    <!-- @error('small_img_3')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_4" class="form-control d-none small_file" id="small_img_input_4">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg4" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn4"></i>
                                                    </div>
                                                    <!-- @error('small_img_4')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_5" class="form-control d-none small_file" id="small_img_input_5">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg5" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn5"></i>
                                                    </div>
                                                    <!-- @error('small_img_5')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_6" class="form-control d-none small_file" id="small_img_input_6">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg6" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn6"></i>
                                                    </div>
                                                    <!-- @error('small_img_6')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_7" class="form-control d-none small_file" id="small_img_input_7">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg7" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn7"></i>
                                                    </div>
                                                    <!-- @error('small_img_7')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_8" class="form-control d-none small_file" id="small_img_input_8">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg8" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn8"></i>
                                                    </div>
                                                    <!-- @error('small_img_8')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                                <div class="col">
                                                    <input type="file" name="small_img_9" class="form-control d-none small_file" id="small_img_input_9">
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px;cursor:pointer">
                                                        <img src="{{ asset('/images/photoPlaceholderWhite.png') }}" id="sImg9" alt="" class="w-100 h-100 pointer small_img " style="object-fit: cover">
                                                        <i class="bi bi-x-circle-fill text-danger fw-bolder position-absolute top-0 end-0 me-1 pointer delImg none" id="delBtn9"></i>
                                                    </div>
                                                    <!-- @error('small_img_9')
        <div class="invalid-feedback " role="alert">
                                                                                                                        <strong>{{ $message }}</strong>
                                                                                                                    </div>
    @enderror -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end align-items-center justify-content-md-start justify-content-lg-end">
                                    <div class="my-5 d-flex justify-content-end align-items-center">
                                        <!-- <button onclick="this.form.reset()" class="form-reset-btn btn btn-lg text-white fw-light rounded rounded-1 me-3">Reset</button> -->
                                        <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Create</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                end content-->
@endsection

@push('customScript')
<script></script>
@endpush

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let smallImgInput = document.getElementById('small_img_input_1');
        let oldSmallImgValue = document.querySelector('input[name="old_small_img_1"]').value;

        if (oldSmallImgValue) {
            smallImgInput.nextElementSibling.children[0].src = oldSmallImgValue;
        }

        console.log('hello');
    });










    //<!--    FOR COVER IMAGE-->
    let coverImage = document.getElementById('cover_img');
    let projectCoverInput = document.getElementById('project_cover_input');

    coverImage.addEventListener('click', _ => projectCoverInput.click());

    projectCoverInput.addEventListener("change", _ => {
        let file = projectCoverInput.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            coverImage.src = reader.result;
        }
        reader.readAsDataURL(file);
    })
    //<!-- For Pricec Image -->
    let priceImg = document.getElementById('price_img');
    let priceImgInput = document.getElementById('price_img_input');
    let priceImagePreview = document.querySelector('.priceImagePreview > div')

    // priceImgInput.addEventListener('click', _ => projectCoverInput.click());

    priceImgInput.addEventListener("change", _ => {
        let file = priceImgInput.files[0];
        let reader2 = new FileReader();
        reader2.onload = function() {
            priceImg.src = reader2.result;
        }
        priceImagePreview.style.display = 'block';
        reader2.readAsDataURL(file);
    })

    //<!-- FOR 360 IMAGE   -->
    let three60Img = document.getElementById('360_img');
    let project360Input = document.getElementById('project_360_input');

    three60Img.addEventListener('click', _ => project360Input.click());

    project360Input.addEventListener("change", _ => {
        let file = project360Input.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            three60Img.src = reader.result;
        }
        reader.readAsDataURL(file);
    })



    // For new small image (9 images)
    let small_img_input_1 = document.getElementById('small_img_input_1');
    let small_img_input_2 = document.getElementById('small_img_input_2');
    let small_img_input_3 = document.getElementById('small_img_input_3');
    let small_img_input_4 = document.getElementById('small_img_input_4');
    let small_img_input_5 = document.getElementById('small_img_input_5');
    let small_img_input_6 = document.getElementById('small_img_input_6');
    let small_img_input_7 = document.getElementById('small_img_input_7');
    let small_img_input_8 = document.getElementById('small_img_input_8');
    let small_img_input_9 = document.getElementById('small_img_input_9');

    let sImg1 = document.getElementById('sImg1');
    let sImg2 = document.getElementById('sImg2');
    let sImg3 = document.getElementById('sImg3');
    let sImg4 = document.getElementById('sImg4');
    let sImg5 = document.getElementById('sImg5');
    let sImg6 = document.getElementById('sImg6');
    let sImg7 = document.getElementById('sImg7');
    let sImg8 = document.getElementById('sImg8');
    let sImg9 = document.getElementById('sImg9');

    sImg1.addEventListener('click', _ => small_img_input_1.click());
    sImg2.addEventListener('click', _ => small_img_input_2.click());
    sImg3.addEventListener('click', _ => small_img_input_3.click());
    sImg4.addEventListener('click', _ => small_img_input_4.click());
    sImg5.addEventListener('click', _ => small_img_input_5.click());
    sImg6.addEventListener('click', _ => small_img_input_6.click());
    sImg7.addEventListener('click', _ => small_img_input_7.click());
    sImg8.addEventListener('click', _ => small_img_input_8.click());
    sImg9.addEventListener('click', _ => small_img_input_9.click());


    small_img_input_1.addEventListener("change", _ => {
        let file = small_img_input_1.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg1.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn1').classList.remove('none');
    })
    small_img_input_2.addEventListener("change", _ => {
        let file = small_img_input_2.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg2.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn2').classList.remove('none');

    })
    small_img_input_3.addEventListener("change", _ => {
        let file = small_img_input_3.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg3.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn3').classList.remove('none');

    })
    small_img_input_4.addEventListener("change", _ => {
        let file = small_img_input_4.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg4.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn4').classList.remove('none');

    })
    small_img_input_5.addEventListener("change", _ => {
        let file = small_img_input_5.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg5.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn5').classList.remove('none');

    })
    small_img_input_6.addEventListener("change", _ => {
        let file = small_img_input_6.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg6.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn6').classList.remove('none');

    })
    small_img_input_7.addEventListener("change", _ => {
        let file = small_img_input_7.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg7.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn7').classList.remove('none');

    })
    small_img_input_8.addEventListener("change", _ => {
        let file = small_img_input_8.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg8.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn8').classList.remove('none');

    })
    small_img_input_9.addEventListener("change", _ => {
        let file = small_img_input_9.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            sImg9.src = reader.result;
        }
        reader.readAsDataURL(file);
        document.getElementById('delBtn9').classList.remove('none');

    })
    //for delete
    let delImgBtn = document.querySelectorAll('.delImg');
    let small_file = document.querySelectorAll('.small_file');
    let small_img = document.querySelectorAll('.small_img');

    for (let d = 0; d < delImgBtn.length; d++) {
        delImgBtn[d].addEventListener('click', () => {
            small_file[d].value = '';
            small_img[d].src = '{{ asset(' / images / photoPlaceholderWhite.png ') }}';
            delImgBtn[d].classList.add('none');
        })
    }
    //    end for delete
</script>

<script>
    $(document).ready(function() {
        $('.amenity-multiple').select2({
            width: 'resolve', // need to override the changed default
            // placeholder:"Amenities choose",
            allowClear: true,
        });
    });
</script>
@endsection
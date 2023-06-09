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

    .select2-container--default.select2-container--disabled .select2-selection--multiple {
        background-color: #7A757491;
        cursor: default;
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
    }

    .album:hover .album-action {
        bottom: 0%;
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
                    {{-- <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
                    <li class="breadcrumb-item active">Detail</li> --}}
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
                            <h4 class="mb-3 text-primary header">Project Detail</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('project.edit', $project->id) }}" title="edit" class="me-3">
                                    <i class="bi bi-pencil-square fs-4 text-primary fa-fw "></i>
                                </a>
                                <a href="{{ route('project.index') }}" title="project list">
                                    <i class="bi bi-list fs-3 fa-fw"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 ">
                        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="create-form">
                            @csrf
                            @method('PATCH')
                            <div class="row gx-3 d-flex flex-column flex-md-row justify-content-start align-items-start">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="project_Id" class="form-label">Project ID : </label>
                                        <input id="project_Id" name="project_Id" type="text" value="{{ $project->project_name }}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" disabled>

                                    </div>
                                    <div class="mb-3">
                                        <label for="project_category" class="form-label">Category :</label>
                                        <select name="category_id" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="project_category" disabled>
                                            @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">
                                                {{ $c->category_name }}
                                            </option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="project_range_max" class="form-label">Range :</label>
                                        <div class="row row-cols-2">
                                            <div class="col">
                                                <input id="project_range_min" name="lower_price" value="{{ old('lower_price', $project->lower_price) }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Min" disabled>
                                            </div>
                                            <div class="col">
                                                <input id="project_range_max" name="upper_price" value="{{ old('upper_price', $project->upper_price) }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Max" disabled>
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
                                                <input id="project_floor" name="layer" type="number" value="{{ old('layer', $project->layer) }}" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="12" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="project_squreFeet" class="form-label">Square Feet :</label>
                                                <input id="project_squreFeet" name="squre_feet" value="{{ old('squre_feet', $project->square_feet) }}" type="number" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="652" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address :</label>
                                        <div class="row row-cols-1 row-cols-md-2">
                                            <div class="col">
                                                <select name="city" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0 text-capitalize " id="project_city" disabled>
                                                    <option value=" ">Choose City</option>
                                                    @foreach ($cities as $c)
                                                    <option value="{{ $c->id }}" {{ $c->id == old('city', $project->city_id) ? 'selected' : '' }}>
                                                        {{ $c->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col">
                                                <select name="town" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0 text-capitalize " id="project-township" disabled>
                                                    <option value="">Choose Township</option>
                                                    @foreach ($towns as $t)
                                                    <option value="{{ $t->id }}" {{ $t->id == old('town', $project->township_id) ? 'selected' : '' }}>
                                                        {{ $t->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_ward" class="form-label">Ward :</label>
                                        <input id="project_ward" name="ward" value="{{ old('ward', $project->ward) }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('ward') is-invalid @enderror" placeholder="ward" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_street" class="form-label">Street :</label>
                                        <input id="project_street" name="street" value="{{ old('street', $project->street) }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('street') is-invalid @enderror" placeholder="street" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_houseNo" class="form-label">House No :</label>
                                        <input id="project_houseNo" name="hou_no" value="{{ old('hou_no', $project->hou_no) }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('hou_no') is-invalid @enderror" placeholder="No" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="project_houseNo" class="form-label">Progress :</label>
                                        <input id="project_progress" name="progress" value="{{ old('progress', $project->progress) }}" type="text" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6 @error('progress') is-invalid @enderror" placeholder="No" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <div class="w-100">
                                            <label for="amenity" class="form-label w-100">
                                                Amenities :
                                                <select id="amenity" class="amenity-multiple form-select create-select w-100" name="amenity[]" multiple="multiple" style="width: 100%" disabled>
                                                    @foreach ($amenity as $key => $am)
                                                    <option value="{{ $am->id }}" @if (old('amenity')) {{ collect(old('amenity'))->contains($am->id) ? 'selected' : '' }}>
                                                        {{ $am->amenity }}
                                                    </option>
                                                    @else
                                                    @foreach ($project->amenity as $pm)
                                                    @if ($pm->id == $am->id)
                                                    selected @endif
                                                    @endforeach
                                                    >{{ $am->amenity }}
                                                    @endif
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>


                                    </div>
                                    <!-- price img -->
                                    <div class="mb-3">
                                        <div class="w-100">
                                            <div class="project-cover-preview w-100 overflow-hidden">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label for="price_img_input" class="form-label">Unit Price Image
                                                        :</label>
                                                </div>
                                            </div>
                                            <div class="priceImagePreview">
                                                <div class=" bg-white overflow-hidden w-auto py-2 mt-2" style="height:250px;max-width:70%;{{ $project->priceImg ? 'display:block' : 'display:none' }}">
                                                    <img id="price_img" src="{{ asset('storage/images/priceImg/' . $project->priceImg) }}" alt="" class="w-100 h-100" style="object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- map link -->
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="map_link" class="form-label">Map Link :</label>
                                        </div>
                                        <textarea id="map_link" maxlength="300" class="form-control create-textarea text-white fs-6 fw-light is-invalid" name="map_link" id="" cols="30" rows="6" placeholder="Map Link" disabled>{{ old('map_link', $project->gmlink) }}</textarea>
                                    </div>
                                    <!-- description -->
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="project_description" class="form-label">Description :</label>
                                        </div>
                                        <textarea id="project_description" class="form-control create-textarea text-white fs-6 fw-light" name="description" cols="30" rows="10" style="white-space: normal" disabled>{{ old('description', $project->description) }}</textarea>
                                    </div>
                                    <!-- cover image & 360 image -->
                                    <div class="mb-3">
                                        <div class="row">

                                            <div class="col-5">
                                                <div class="project-cover-preview w-100 overflow-hidden">
                                                    <label for="project_cover_input" class="form-label">Cover Image
                                                        :</label>
                                                    <input type="file" name="cover" class="form-control d-none" value="{{ $project->cover }}" id="project_cover_input" disabled>
                                                    <div id="cover-preview" class="bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview " style="height:300px;">
                                                        <img src="{{ asset('storage/images/cover/' . $project->cover) }}" id="cover_img" alt="" class="w-100 h-100" style="object-fit: cover">
                                                    </div>
                                                    <small class="text-warning fw-light d-none">
                                                        max : 2 MB | width=600 | height=900
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="project-cover-preview w-100 overflow-hidden">
                                                    <label for="project_360_input" class="form-label">360 Image
                                                        :</label>
                                                    <input type="file" class="form-control d-none" value="{{ $project->threeSixtyImage }}" name="threeSixtyImage" id="project_360_input" disabled>
                                                    <div id="360-preview" class="three-preview bg-secondary bg-opacity-50 cursor-pointer d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview  " style="height:300px;">
                                                        <img src="{{ $project->three_sixty_image ? asset('storage/images/360Images/' . $project->three_sixty_image) : asset('/images/photoPlaceholderWhite.png') }}" id="360_img" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                    </div>
                                                    <small class="text-warning fw-light d-none">
                                                        max : 2.5 MB
                                                    </small>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- start new images -->
                                    <!-- new 9 images -->
                                    <div class="mb-3">
                                        <div class="mt-5">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="gallery_image_files" class="form-label">Gallery Images
                                                    :</label>
                                                <small class="text-warning fw-light d-none">
                                                    max : 1 MB | width=800 | height=800
                                                </small>

                                            </div>
                                            <div class="row row-cols-auto g-2 my-3">
                                                <!-- small image 1 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_1" class="form-control d-none small_file" id="small_img_input_1" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img1 ? asset('storage/images/gallery/' . $project->previewimages->small_img1) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg1" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 2 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_2" class="form-control d-none small_file" id="small_img_input_2" value="{{ $project->previewimages->small_img2 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img2 ? asset('storage/images/gallery/' . $project->previewimages->small_img2) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg2" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 3 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_3" class="form-control d-none small_file" id="small_img_input_3" value="{{ $project->previewimages->small_img3 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img3 ? asset('storage/images/gallery/' . $project->previewimages->small_img3) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg3" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 4 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_4" class="form-control d-none small_file" id="small_img_input_4" value="{{ $project->previewimages->small_img4 }}" / disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img4 ? asset('storage/images/gallery/' . $project->previewimages->small_img4) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg4" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 5 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_5" class="form-control d-none small_file" id="small_img_input_5" value="{{ $project->previewimages->small_img3 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img5 ? asset('storage/images/gallery/' . $project->previewimages->small_img5) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg5" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 6  -->
                                                <div class="col">
                                                    <input type="file" name="small_img_6" class="form-control d-none small_file" id="small_img_input_6" value="{{ $project->previewimages->small_img6 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img6 ? asset('storage/images/gallery/' . $project->previewimages->small_img6) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg6" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 7 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_7" class="form-control d-none small_file" id="small_img_input_7" value="{{ $project->previewimages->small_img7 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img7 ? asset('storage/images/gallery/' . $project->previewimages->small_img7) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg7" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 8 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_8" class="form-control d-none small_file" id="small_img_input_8" value="{{ $project->previewimages->small_img8 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img8 ? asset('storage/images/gallery/' . $project->previewimages->small_img8) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg8" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                                <!-- small image 9 -->
                                                <div class="col">
                                                    <input type="file" name="small_img_9" class="form-control d-none small_file" id="small_img_input_9" value="{{ $project->previewimages->small_img9 }}" disabled>
                                                    <div id="" class="small_img_preview bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid overflow-hidden image-preview position-relative" style="width:100px;height:100px">
                                                        <img src="{{ $project->previewimages->small_img9 ? asset('storage/images/gallery/' . $project->previewimages->small_img9) : asset('/images/photoPlaceholderWhite.png') }}" id="sImg9" alt="" class="w-100 h-100 pointer small_img" style="object-fit: cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end new images -->
                                </div>

                            </div>
                        </form>
                    </div>

                    <hr class="my-4 text-white">

                    <!-- Legal Doucment -->
                    <div class="col-12">
                        <h5 class="text-primary mb-4">Legal Document</h5>

                        <div class="row row-cols-auto g-4 ">
                            <!-- <div class="col text-center ">
                                        <a href="{{ route('albumTest.create', $project->id) }}">
                                            <div id="album_create" class="album bg-white bg-opacity-10 d-flex justify-content-center align-items-center rounded overflow-hidden rounded-4 position-relative shadow-lg" style="width:150px;height:150px;cursor:pointer;">
                                                <img src="{{ asset('/images/addPlaceholder.png') }}" id="" alt="" class="w-100 h-100" style="object-fit: cover;filter:invert(1)">
                                            </div>
                                            <span class="text-white">Create Album</span>
                                        </a>
                                    </div> -->
                            @foreach ($project->albumTests as $album)

                            <div class="col text-center">
                                <a href="{{ route('albumTest.show', ['projectId' => $project->id, 'id' => $album->id]) }}" title="Detail">
                                    <div id="album1" class="album bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded overflow-hidden rounded-4 position-relative shadow-lg" style="width:150px;height:150px;cursor:pointer">
                                        @if (count($album->albumTestImages) > 0)
                                        @php
                                        $lastImage = $album->albumTestImages->last();
                                        $extension = pathinfo($lastImage->image, PATHINFO_EXTENSION);
                                        @endphp
                                        @if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif')
                                        <img src="{{ asset('storage/images/album/' . $lastImage->image) }}" id="" alt="" class="w-100 h-100" style="object-fit: cover">
                                        @elseif ($extension == 'pdf')
                                        <!-- <i class="fas fa-file-pdf fa-4x"></i>
                                                <img src="{{ asset('images/pdf.png') }}" id="" alt=""
                                                    class="w-100 h-100 bg-white" style="object-fit: cover"> -->
                                        <canvas class="thumbnail pdf-canvas" data-pdf-url="{{ asset('storage/images/album/' . $lastImage->image) }}"></canvas>

                                        @endif
                                        @else
                                        <img src="{{ asset('images/photoPlaceholderWhite.png') }}" id="" alt="" class="w-100 h-100 bg-black bg-opacity-25" style="object-fit: cover">
                                        @endif

                                        <div class="album-action  w-100 bg-black bg-opacity-50 pt-1 d-none">
                                            <form action="{{ route('album.delete', $album->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-sm text-danger" id="delImageBtn{{ $album->image }}">
                                                    <i class="bi bi-trash-fill fw-bolder fs-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <span class="text-white">{{ $album->title }}</span>
                                </a>

                            </div>
                            @endforeach

                        </div>
                    </div>
                    <hr class="my-4 text-white">

                    <!-- Site Progress -->
                    <div class="col-12">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h5 class="text-primary">Site Progress</h5>
                            <span class="text-primary">Total : {{ count($project->siteProgresses) }}</span>
                            <!-- <a href="{{ route('siteProgress.create', $project->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-plus "></i>
                                        Create Progress
                                    </a> -->
                        </div>

                        @foreach ($project->siteProgresses as $siteProgress)
                        <div class="row row-cols-auto g-5  mb-3 ">
                            <div class="col-12 px-5">
                                <div class="row progressCard bg-secondary d-flex flex-row rounded rounded-3 overflow-hidden" style="height:150px;">
                                    <div class="col-2 px-0  overflow-hidden " style="max-height:200px;">
                                        <div id="siteprogressId{{ $siteProgress->id }}" class="siteprogressImage bg-white bg-opacity-50 d-flex justify-content-center align-items-center overflow-hidden position-relative w-100 h-100 " style="cursor:pointer;">

                                            @foreach ($siteProgress->images as $key => $image)
                                            @if ($key == 0)
                                            <img src="{{ asset('storage/images/siteimages/' . $image->image) }}" alt="" class="w-100 h-100" style="object-fit:cover" />
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-10 d-flex align-items-baseline justify-content-start py-2">

                                        <div class="d-flex flex-column justify-content-center align-items-start w-100">
                                            <div class="W-100 align-self-end">
                                                <div class="time  text-muted mb-1 ">
                                                    <small>
                                                        <i class="bi bi-clock"></i>
                                                        {{ $siteProgress->created_at->format('j F, Y') }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="card-title fw-bold text-primary mb-3" style="min-height:50px;max-height:50px;">
                                                {{ $siteProgress->title }}
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <a href="{{ route('siteProgress.show', ['projectId' => $siteProgress->project_id, 'id' => $siteProgress->id]) }}" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="bi bi-eye"></i>
                                                    Show Detail
                                                </a>
                                                <a href="{{ route('siteProgress.edit', ['projectId' => $siteProgress->project_id, 'id' => $siteProgress->id]) }}" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="bi bi-pencil "></i>
                                                    Edit
                                                </a>
                                                <form method="post" action="{{ route('siteProgress.destory', ['projectId' => $siteProgress->project_id, 'id' => $siteProgress->id]) }}">
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
                        @endforeach
                    </div>

                    <div class="py-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                end content-->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script></script>

<script>
    $(document).ready(function() {
        $('.amenity-multiple').select2({
            width: 'resolve', // need to override the changed default
            // placeholder:"Amenities choose",
            allowClear: true,
        });
    });
</script>
<script></script>
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
@extends('admin.master')
@section('head')
{{--    <link rel="stylesheet" href="{{asset('css/facebookLink.css')}}">--}}
@endsection
@section('style')
    <style>

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
                                <li class="breadcrumb-item"><a href="{{route('facebooklink.index')}}">Facebook_Link</a></li>
                                <li class="breadcrumb-item active">Edit</li>
<!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="w-100 facebook ">
                        <div class="py-3 px-3">
                            <div class="row create">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-3 text-primary header">Facebook Link Edit</h4>
                                    <a href="{{route('facebooklink.index')}}" title="Facebook Link List">
                                        <i class="bi bi-list fs-3 "></i>
                                    </a>
                                </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    <form action="{{ route('facebooklink.update',$facebooklink->id) }}" method="POST" enctype="multipart/form-data" class="facebook-create-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="row gx-4 d-flex flex-column flex-md-row justify-content-start align-items-center">
                                            <div class="col-12 col-md-8 col-lg-6">
                                                <div class="row">
                                                   <div class="col-12">
                                                      <div class="mb-3">
                                                          <label for="facebook_Link" class="form-label text-white">Facebook Link  :</label>
                                                          <input type="text"  id="facebook_Link" name="project_post_link" class="create-input form-control form-control-lg rounded rounded-1 text-white mb-2 mb-md-0 fs-6 @error('project_post_link') is-invalid @enderror" placeholder="https://www.facebook.com/2345678" value="{{old('project_post_link',$facebooklink->project_post_link)}}">
                                                          @error('project_post_link')
                                                            <div class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                          @enderror
                                                      </div>
                                                   </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <label for="facebook_description" class="form-label text-white">Description  :</label>
                                                                <span class="text-danger fw-light fs-6"><sub>limit text only 300 !</sub></span>
                                                            </div>
                                                            <textarea id="facebook_description" maxlength="300" class="form-control create-textarea text-white fs-6 @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="6">{{old('description',$facebooklink->description)}}</textarea>
                                                            @error('description')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8 col-lg-6">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-12 d-flex justify-content-center align-items-center  ps-lg-5">
                                                    <div class="facebook-preview w-100 overflow-hidden">
                                                        <label for="facebook_description" class="form-label text-white">Facebook Preview Image  :</label>
                                                        <input type="file" value="{{$facebooklink->picture}}" accept="image/png, image/gif, image/jpeg" name="picture" class="form-control d-none" id="facebook-image-input">
                                                        <div id="facebook-image-preview" class="bg-secondary bg-opacity-50 d-flex justify-content-center align-items-center rounded is-invalid " style="">
                                                            <img src="{{asset('storage/images/fbImages/'.$facebooklink->picture)}}" id="fb-img"  alt="" >
                                                            <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                        </div>
                                                        <small class="text-warning fw-light">
                                                            max : 1 MB | ratio : 1/1
                                                        </small>
                                                        @error('picture')
                                                        <div class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror

                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8 col-lg-11 d-flex justify-content-start justify-content-lg-end align-items-baseline">
                                                <div class="my-5 d-flex justify-content-end align-items-center">
{{--                                                    <button onclick="this.form.reset()" class="form-reset-btn btn btn-lg text-white fw-light border rounded rounded-1 me-3">Reset</button>--}}
                                                    <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Save</button>
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

@section('script')
<script>

    let imagePreview = document.getElementById('fb-img');
    let facebookImageInput = document.getElementById('facebook-image-input');

    imagePreview.addEventListener('click',_=>facebookImageInput.click());

    facebookImageInput.addEventListener("change",_=>{
        let file = facebookImageInput.files[0];
        let reader = new FileReader();
        reader.onload = function (){
            imagePreview.src = reader.result;
        }
        reader.readAsDataURL(file);
    })
</script>
<script>
    //logoutt
    let logOut = document.querySelector('#logout');
    if(logOut){
        logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
    }
</script>
@endsection

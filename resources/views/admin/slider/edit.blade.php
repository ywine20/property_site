@extends('admin.master')
@section('content')
            <!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('slider.index')}}">Slider Image</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-3 text-primary header">Slider Image Edit</h4>
                                <a href="{{route('slider.index')}}" title="Slider Image List">
                                    <i class="bi bi-list fs-3 "></i>
                                </a>
                            </div>
<!--                            <h3 class="col-12 text-primary mb-3">Slider Image Edit</h3>-->
                            <div class="col-12 col-lg-8 col-xl-7">
                                <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data" id="slider-image-edit-form" class="slider-image-edit-form"  >
                                    @csrf
                                    @method('PUT')
                                    <label for="slider-image-input" class="form-label text-white-50 d-flex justify-content-between align-items-center">
                                        Slider Image :

                                        <small class="text-warning fw-light">
                                            max: 2 MB | width=1280 | height=500
                                        </small>
                                    </label>

                                   
                                    <input  id="slider-image-input" name="image" class="d-none form-control" type="file" accept="image/png,image/gif,image/jpeg" value="{{$slider->image}}" >
                                    <div id="slider-image-preview" class=" rounded overflow-hidden pointer " >
                                        <img  id="slider-image"  src="{{asset('uploads/slider/'.$slider->image)}}" alt="">
                                    </div>
                                    @error('image')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </form>
                            </div>
                            <div class="col-12 col-lg-8 col-xl-7">
                                <div class="w-100 d-flex justify-content-start justify-content-xl-end my-3 my-xl-5">
                                    <button type="submit" class="btn btn-primary btn-lg text-white" form="slider-image-edit-form">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                end content -->
@endsection

@section('script')
<script>
    let imagePreview = document.getElementById('slider-image');
    let sliderImageInput = document.getElementById('slider-image-input');
    imagePreview.addEventListener('click',_=>sliderImageInput.click());

    sliderImageInput.addEventListener("change",_=>{
        let file = sliderImageInput.files[0];
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
    logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
</script>
@endsection

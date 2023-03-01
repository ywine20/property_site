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
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-3 text-primary header">Slider Image Create</h4>
                                <a href="{{route('slider.index')}}" title="Slider Image List">
                                    <i class="bi bi-list fs-3 "></i>
                                </a>
                            </div>
<!--                            <h3 class="col-12 text-primary mb-3">Slider Image Edit</h3>-->
                            <div class="col-12 col-lg-8 col-xl-7">
                                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data" class="slider-image-edit-form"  >
                                    @csrf
                                    <label for="slider-image-input" class="form-label text-white-50">Slider Image:</label>
                                    <input  id="slider-image-input" required name="image" accept="image/*" class="d-none form-control" type="file" >
                                    <div id="slider-image-preview" class=" rounded overflow-hidden pointer shadow" >
                                        <img  id="slider-image"  src="../../images/photoPlaceholderWhite.png" alt="">
                                    </div>

                                    <div class="col-12 col-lg-8 col-xl-7">
                                        <div class="w-100 d-flex justify-content-start justify-content-xl-end my-3 my-xl-5">
                                            <button class="btn btn-primary btn-lg text-white">Save</button>
                                        </div>
                                    </div>
                                </form>
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

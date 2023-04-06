@extends('admin.master')

@section('style')
<style>
    table>tbody>tr {
        background-color: transparent !important;
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
        <div class="w-100 facebook ">
            <div class="py-3 px-3">
                <div class="row create project-detail-dashboard">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-3 text-primary header">Project Detail</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('project.edit', $project->slug) }}" class="btn  edit-icon px-2 py-1 fs-4">
                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                </a>
                                {{-- <form action="">
                                               <button type="button" onclick="deleteConfirm(1)" class="btn trash-icon px-2 py-1 fs-4">
                                                   <i class="bi bi-trash text-danger fa-fw"></i>
                                               </button>
                                           </form> --}}
                                <!--                                           <a href="facebookLink.html" title="Facebook Link List">-->
                                <!--                                               <i class="bi bi-list fs-3 "></i>-->
                                <!--                                           </a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="row py-3 flex-column flex-lg-row">
                            <div class="col-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="d-flex justify-content-center justify-content-lg-end">
                                    <div class="w-100 overflow-hidden rounded coverImage">
                                        <img src="{{ asset('images/projects/' . $project->cover) }}" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-12 col-xl-9">
                                <div class="">
                                    <table class="table table-borderless project-detail-table">
                                        <tbody class="">
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Project ID </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        {{ $project->project_name }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Category </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        @foreach ($categories as $c)
                                                        @if ($c->category_id == $project->category_id)
                                                        {{ $c->category_name }}
                                                        @endif
                                                        @endforeach
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Address </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        No({{ $project->hou_no }}), {{ $project->street }} Street,
                                                        {{ $project->ward }} Ward,
                                                        @foreach ($towns as $t)
                                                        @if ($t->id == $project->township_id)
                                                        {{ $t->name }} TownShip,
                                                        @endif
                                                        @endforeach

                                                        @foreach ($cities as $c)
                                                        @if ($c->id == $project->city_id)
                                                        {{ $c->name }},
                                                        @endif
                                                        @endforeach
                                                        <Korea></Korea>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">No. of Units </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        {{ $project->layer }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Est.Sq Feet </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        {{ $project->squre_feet }} ft<sup>2</sup>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Amenities </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white d-flex align-items-center justify-content-start flex-wrap">
                                                        <!--                                                                 <div class="bg-primary px-3 py-1 rounded me-1 mb-1 mb-1">-->
                                                        <!--                                                                     lift-->
                                                        <!--                                                                 </div>-->
                                                        @foreach ($amenities as $am)
                                                        @foreach ($project->amenity as $pm)
                                                        @if ($pm->id == $am->id)
                                                        {{ $am->amenity }} ,
                                                        @endif
                                                        @endforeach
                                                        @endforeach
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Map Link </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3 " style="max-width:150px">
                                                    <div class="text-white text-break">
                                                        <small>
                                                            {{ $project->gmlink }}
                                                        </small>
                                                        <div class="overflow-hidden bg-black rounded mt-2" style="width: 400px;height: 300px;">
                                                            <iframe src="{{ $project->gmlink }}" style="width:100%;height:100%;"></iframe>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">360 Image </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <div class="text-white text-break">
                                                        <div class="">
                                                            <div class="overflow-hidden bg-black rounded" style="width: 400px;height: 300px;">
                                                                <img src="/images/360images/{{ $project->gallery }}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Gallery </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <div class="d-flex flex-wrap">
                                                                                                         
                                                        @if($project->previewimages->small_img1)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img1)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img2)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img2)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img3)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img3)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img4)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img4)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img5)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img5)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img6)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img6)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img7)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img7)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img8)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img8)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif

                                                        @if($project->previewimages->small_img9)
                                                        <div class="overflow-hidden bg-black rounded me-1 mb-1" style="width: 150px;height: 150px;">
                                                            <img src="{{asset('storage/images/gallery/'.$project->previewimages->small_img9)}}" alt="" class="w-100 h-100" style="object-fit: cover">
                                                        </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Description </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3" style="max-width:150px">
                                                    <div class="text-white"><small>
                                                            <pre>{{ $project->description }}</pre><small>

                                                    </div>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
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
    //logoutt
    let logOut = document.querySelector('#logout');
    logOut.addEventListener('click', (e) => {
        e.preventDefault();
        logout();
    })
</script>
@endsection
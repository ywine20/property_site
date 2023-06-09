@extends('admin.master')
@section('style')
<style>
    tr>td {
        color: #fff !important;
    }
</style>
@endsection
@section('content')
<!--start content-->
<div class="content ">
    <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start">
        <!-- breadcrumb -->
        <div class="bg-secondary bg-opacity-50 px-2 py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="#" onclick="history.back()">
                            <i class="bi bi-arrow-left me-1"></i>Back
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- end breadcrumb -->
        <div class="col-12 my-3">
            <div class="px-3">
                <div class="card bg-black bg-opacity-25">
                    <div class="card-body d-flex justify-content-start align-items-start p-0">
                        <div class="bg-balck rounded overflow-hidden" style="width:150px;height:150px;">
                            @if( isset($customer->profile_img))
                            <img src="{{asset('storage/images/client-profile/'.$customer->profile_img)}}" alt="" class="w-100 h-100" id='profile_img_large' style="object-fit:cover;">
                            @else
                            <img src="{{asset('images/user.png')}}" alt="" class="w-100 h-100 " style="object-fit:cover;">
                            @endif
                        </div>
                        <div class="ps-3 py-2">
                            <div class="d-flex flex-column">
                                <div class="mb-2"><label for="" class="text-white-50">Tier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label><span class="text-white ms-2 text-capitalize">{{$customer->tier}}</span></div>
                                <div class="mb-2"><label for="" class="text-white-50">Name&nbsp;&nbsp;: </label><span class="text-white ms-2">{{$customer->name}}</span></div>
                                <div class="mb-2"><label for="" class="text-white-50">Email&nbsp;&nbsp;&nbsp;: </label><span class="text-white ms-2">{{$customer->email}}</span></div>
                                <div class="mb-2"><label for="" class="text-white-50">Phone : </label><span class="text-white ms-2">{{$customer->phone}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="px-3 my-3 table-responsive">
                <h5 class="text-primary">Authorize Assets</h5>
                <table class="table  table-striped table-hover">
                    <thead class="">
                        <tr class="bg-primary">
                            <th scope="col">#</th>
                            <th scope="col" style="min-width:150px">ProjectID</th>
                            <th scope="col" style="min-width:180px;">Address</th>
                            <th scope="col" class="text-center text-nowrap">Lastest Progress</th>
                            <th scope="col" class="text-center text-nowrap">Legal Document</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">


                        @if (count($assets) > 0)
                        @foreach ($assets as $asset)
                        <tr>
                            <td> {{$asset->project->project_name}}</td>
                            <td>No ({{$asset->project->hou_no}}), {{$asset->project->street}} Street,
                                {{$asset->project->ward}} Ward, {{$asset->project->town->name}} Township,
                                {{$asset->project->city->name}}.
                            </td>
                            <td class="">
                                @if ($asset->site_progress == 1)
                                <i class="bi bi-check2 fs-3 text-success "></i>
                                @else
                                <i class="bi bi-x-lg fs-3 text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($asset->legal_document == 1)
                                <i class="bi bi-check2 fs-3 text-success "></i>
                                @else
                                <i class="bi bi-x-lg fs-3 text-danger"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('detail/' . $asset->project_id) }}" target="_blank">
                                    <i class="bi bi-eye fs-4 text-primary"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan='5'>No projects found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!--                end content -->
@endsection

@section('script')

@endsection
@push('customScript')

@endpush
@extends('admin.master')

@section('style')
<!--select2 cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"> -->

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
                    <li class="breadcrumb-item active">
                        <!-- <a href="{{ url('admin/project') }}"> -->
                        Redeem_Code
                        <!-- </a> -->
                    </li>
                    <!-- <li class="breadcrumb-item active">Create</li> -->
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
                            <h4 class="mb-3 text-primary header">Redeem Code Create</h4>
                            <a href="{{ route('project.index') }}">
                                <i class="bi bi-list fs-3 "></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12 ">

                        <form action="{{route('profile.code')}}" method="POST" enctype="multipart/form-data" class="create-form">
                            @csrf
                            <div class="row flex-column">
                                <!--Choose Tier -->
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="tier" class="form-label">Tier :</label>
                                        <select name="tier" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="tier">
                                            <option value="">Choose Tier</option>
                                            <option value="bronze">Bronze</option>
                                            <option value="sliver">Sliver</option>
                                            <option value="gold">Gold</option>
                                            <option value="platinum">Platinum</option>
                                            <option value="diamond">Diamond</option>
                                        </select>
                                        @error('tier')
                                        <div class=" text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Choose Project Name -->
                                <div class="col-4">
                                    <div class="mb-3">
                                        <!-- <label for="projectName" class="form-label">Project Name :</label>
                                        <select id="projectName" name="projectName" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0 selectpicker" multiple >
                                            <option value="">Choose Project Name</option>
                                            <option value="firstProject">First Project</option>
                                            <option value="secondProject">Second Project</option>
                                            <option value="thirdProject">Third Project</option>
                                        </select>
                                        @error('tier')
                                        <div class=" text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror -->

                                        <!-- <select name="project[]" class="form-control" multiple="multiple" require>
                                            <option value="">Select Person</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="user">User</option>
                                        </select> -->

                                          <select name="project[]" class="form-control">
                                            <option value="">Select Person</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="user">User</option>
                                        </select>



                                    </div>
                                </div>
                                <!-- Choose Progress -->
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label for="progress" class="form-label">Progress :</label>
                                        <div class="row my-3 ms-0">
                                            <div class="col-3 form-check ">
                                                <input id="progressAllowed" type="radio" value="progressAllowed" name="progress" class="form-check-input">
                                                <label for="progressAllowed" class="form-check-label">Allowed</label>
                                            </div>
                                            <div class="col-4 form-check ">
                                                <input id="progressNotAllowed" type="radio" value="progressNotAllowed" name="progress" class="form-check-input">
                                                <label for="progressNotAllowed" class="form-check-label">Not Allowed</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Choose Legal Document -->
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label for="legalDocument" class="form-label">Legal Document :</label>
                                        <div class="row my-3 ms-0">
                                            <div class="col-3 form-check ">
                                                <input id="LDallowed" type="radio" value="LDallowed" name="legalDocument" class="form-check-input">
                                                <label for="LDallowed" class="form-check-label">Allowed</label>
                                            </div>
                                            <div class="col-4 form-check ">
                                                <input id="LDnotAllowed" type="radio" value="LDnotAllowed" name="legalDocument" class="form-check-input">
                                                <label for="LDnotAllowed" class="form-check-label">Not Allowed</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Generate Code Button -->

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary w-100" data-toggle="modal" data-target="#redeem-modal">Generate</button>
                                </div>
                            </div>

                        </form>

                        <!-- send successful Modal Box -->
                        <div class="modal fade" id="redeem-modal" tabindex="-1" role="dialog" aria-labelledby="redeem-modal-label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="redeem-modal-label">Generated Redeem Code</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="redeem-code"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end send successful Modal Box -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                end content-->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> -->
@endsection

@push('customScript')
<script>


</script>
@endpush
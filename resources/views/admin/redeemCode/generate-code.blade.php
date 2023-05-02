@extends('admin.master')

@section('style')
<!--select2 cdn-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"> -->
<link rel="stylesheet" href="{{asset('css/multipleSelect.css')}}">
<style>
    .none {
        display: none;
    }

    select::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-top: 6px solid #999;
        border-right: 6px solid transparent;
        border-left: 6px solid transparent;
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

                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12 ">

                        <form action="{{ route("admin.generateRedeemCode") }}" method="POST" enctype="multipart/form-data" class="create-form" id="redeem-code-form">
                            @csrf
                            <div class="row flex-column">
                                <!--Choose Tier -->
                                <div class="col-12 col-lg-4">
                                    <div class="mb-3">
                                        <label for="tier" class="form-label">Tier :</label>
                                        <div class="position-relative">
                                            <select name="tier" class="create-select form-select form-select-lg fs-6 text-white rounded rounded-1 c mb-2 mb-md-0" id="tier" require>
                                                <option value="">Choose Tier</option>
                                                <option value="bronze">Bronze</option>
                                                <option value="silver">Silver</option>
                                                <option value="gold">Gold</option>
                                                <option value="platinum">Platinum</option>
                                                <option value="diamond">Diamond</option>
                                            </select>
                                            <i class="bi bi-caret-down-fill text-white opacity-25 position-absolute m-2 top-0 end-0"></i>
                                        </div>
                                        @error('tier')
                                        <div class=" text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Choose Project Name -->
                                <div class="col-12 col-lg-4">
                                    <div class="mb-3">
                                        <div class="wrapper position-relative">
                                            <label for="tier" class="form-label">Projects :</label>
                                            <button type="button" class="create-select form-control toggle-next ellipsis d-flex justify-content-between align-items-center">
                                                Choose Projects
                                                <i class="bi bi-caret-down-fill opacity-25"></i>
                                            </button>

                                            <div class="checkboxes create-select bg-opacity-100" id="projectName">
                                                <div class="inner-wrap d-flex flex-column">
                                                    <input type="text" id="search" placeholder="Search..." class="form-control d-block w-100 mb-2 " autocomplete="off">

                                                    <label>
                                                        <input type="checkbox" name="projectIds[]" value="allProjects" class="ckkBox all form-check-input" />
                                                        <span class="text-white">All Project</span>
                                                    </label>

                                                    @foreach ($projects as $project)
                                                    <label>
                                                        <input type="checkbox" name="projectIds[]" value="{{ $project->id }}" class="ckkBox val form-check-input " />
                                                        <span class="text-white">{{ $project->project_name }} - {{$project->town->name}}, {{$project->city->name}}</span>
                                                    </label>
                                                    @endforeach

                                                    <label class="notFound none text-white-50">Not found result</label>

                                                    <div class="py-2"></div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!-- Choose Progress -->
                                <div class="col-12 col-lg-4">
                                    <div class="mb-4">
                                        <label for="progress" class="form-label">Progress :</label>
                                        <div class="my-3 ms-0 d-flex">
                                            <div class="form-check me-3">
                                                <input id="progressAllowed" type="radio" value="progressAllowed" name="progress" class="form-check-input">
                                                <label for="progressAllowed" class="form-check-label">Allowed</label>
                                            </div>
                                            <div class="form-check ">
                                                <input id="progressNotAllowed" type="radio" value="progressNotAllowed" name="progress" class="form-check-input">
                                                <label for="progressNotAllowed" class="form-check-label">Not Allowed</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Choose Legal Document -->
                                <div class="col-12 col-lg-4">
                                    <div class="mb-4">
                                        <label for="legalDocument" class="form-label">Legal Document :</label>
                                        <div class="my-3 ms-0 d-flex">
                                            <div class="form-check me-3">
                                                <input id="LDallowed" type="radio" value="LDallowed" name="legalDocument" class="form-check-input">
                                                <label for="LDallowed" class="form-check-label">Allowed</label>
                                            </div>
                                            <div class="form-check ">
                                                <input id="LDnotAllowed" type="radio" value="LDnotAllowed" name="legalDocument" class="form-check-input">
                                                <label for="LDnotAllowed" class="form-check-label">Not Allowed</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div id="error-message" class="text-danger"></div>

                                <!-- Generate Code Button -->
                                <div class="col-12 col-lg-4 ">
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
                                    <div class="modal-body d-flex justify-content-between">
                                        <p id="redeem-code"></p>
                                        <button class="btn btn-secondary" onclick="copyCode()"><i class="bi bi-clipboard"></i></button>
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
<!--end content-->
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script> -->
@endsection

@push('customScript')

<!-- this is for multiple select -->
<script>
    //generate redeem code with modal
    $(document).ready(function() {
        $('#redeem-code-form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var formData = form.serialize(); // serialize the form data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: 'POST',
                url: 'http://127.0.0.1:8000/admin/redeemCodes',
                data: formData,
                success: function(data) {
                    $('#redeem-code').text(data.code);
                    $('#redeem-modal').modal('show');
                },

                error: function(xhr, status, error) {
                    $('#error-message').text(xhr.responseJSON.error);
                }
            });
        });
    });

    //copy code
    function copyCode() {
        var code = $('#redeem-code').text();
        navigator.clipboard.writeText(code);
    }


    const toggleNext = document.querySelector('.toggle-next');
    const checkBoxesContainer = document.querySelector('.checkboxes');
    const checkAll = document.querySelector('.all');
    const checkboxes = document.querySelectorAll('.val');
    const countSpan = document.querySelector('#count');

    function dropdownShow() {
        checkBoxesContainer.classList.toggle('show');
    }

    //Check All 
    checkAll.addEventListener('click', () => {
        checkboxes.forEach((checkbox) => {
            checkbox.checked = checkAll.checked;
        });
        updateCount();
    });

    // Add event listeners to each checkbox
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('click', (e) => {
            updateCount();
            const checkText = checkbox.nextElementSibling.textContent;
        });
    });

    function updateCount() {
        // Count the number of checked checkboxes
        const count = document.querySelectorAll('.val:checked').length;
        console.log(count);

        if (count > 0) {
            toggleNext.innerText = count + ' selected';
        } else {
            toggleNext.innerText = 'Choose Projects'
        }


        if (count != checkboxes.length) {
            checkAll.checked = false;
        } else {
            checkAll.checked = true;
        }

    }


    // searching dropdown input
    const allCheckboxLabel = checkAll.closest('label');
    const notFoundLabel = document.querySelector('.notFound');
    const searchInput = document.querySelector('#search');

    searchInput.addEventListener('input', () => {
        let countChecked = 0;
        const searchValue = searchInput.value.toLowerCase();

        if (searchValue.length > 0) {
            allCheckboxLabel.style.display = 'none';
        } else {
            allCheckboxLabel.style.display = 'inline-block';
        }

        checkboxes.forEach((checkbox) => {
            const checkboxLabel = checkbox.nextElementSibling.textContent.toLowerCase();
            if (checkboxLabel.includes(searchValue)) {
                checkbox.closest('label').style.display = 'inline-block';
                countChecked++;
            } else {
                checkbox.closest('label').style.display = 'none';
            }
        });

        if (countChecked === 0) {
            notFoundLabel.classList.remove('none');
            notFoundLabel.textContent = "No results found for '" + searchValue + "'";
        } else {
            notFoundLabel.classList.add('none');
        }
    });


    //close dropdown outer click
    const dropdown = document.querySelector('.checkboxes');
    const dropdownToggle = document.querySelector('.toggle-next');

    // Add a click event listener to the document object
    document.addEventListener('click', function(event) {

        if (event.target.closest('.toggle-next') == toggleNext) {
            checkBoxesContainer.classList.toggle('show');
        } else {
            if (event.target.closest('.checkboxes') !== dropdown) {
                dropdown.classList.remove('show');
            }
        }

    });
</script>
@endpush
@extends('master')

@section('title', 'Project List - SMT')
@section('css')
{{-- <link rel="stylesheet" href="{{asset('css/project-list.css')}}">--}}
/*
<link rel="stylesheet" href="/sass/project-list.scss">*/
/*
<link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css ">*/
@endsection

@section('content')

    <div class="container p-5">
        <form action="{{ route("admin.generateRedeemCode") }}" method="POST" id="redeem-code-form">
            @csrf
            <div id="tier">
                <label for="">Tier :</label>
                <select name="tier" id="">
                    <option value="bronze">Bronze</option>
                    <option value="silver">Silver</option>
                    <option value="gold">Gold</option>
                    <option value="platinum">Platinum</option>
                    <option value="diamond">Diamond</option>
                </select>
            </div>

            <div id="projects" >
                <label for="">Project Name :</label>
                <select name="projectIds[]" id="projectNames" multiple>
                    <option value="allProjects">All Projects</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>

            <div  id="progresses">
                <div>Progress :</div>
                <div class="row w-25 ms-1">
                    <div class="form-check col" >
                        <input class="form-check-input" value="progressAllowed" type="radio" name="progress" id="progress">
                        <label class="form-check-label" for="progress">
                          Allowed
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input"  value="progressNotAllowed" type="radio" name="progress" id="progress">
                        <label class="form-check-label" for="progress">
                            Not Allowed
                        </label>
                    </div>
                </div>
            </div>

            <div  id="legalDocuments">
                <div>Legal Document :</div>
                <div class="row w-25 ms-1">
                    <div class="form-check col" >
                        <input class="form-check-input" value="LDallowed" type="radio" name="legalDocument" id="legalDocument">
                        <label class="form-check-label" for="legalDocument">
                          Allowed
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input"  value="LDnotAllowed" type="radio" name="legalDocument" id="legalDocument" >
                        <label class="form-check-label" for="legalDocument">
                            Not Allowed
                        </label>
                    </div>
                </div>
            </div>

            <div id="error-message" class="text-danger"></div>


            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#redeem-modal">Generate</button>

        </form>

        <div class="modal fade" id="redeem-modal" tabindex="-1" role="dialog" aria-labelledby="redeem-modal-label">
            <div class="modal-dialog"  role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="redeem-modal-label">Generated Redeem Code</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="redeem-code"></p>
                    <button class="btn btn-secondary" onclick="copyCode()"><i class="bi bi-clipboard"></i></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
        
        
        

    </div>

@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function copyCode() {
        var code = $('#redeem-code').text();
        navigator.clipboard.writeText(code);
    }

    $(document).ready(function () {
        $('#redeem-code-form').submit(function (event) {
            event.preventDefault();
            var form = $(this);
            var formData = form.serialize(); // serialize the form data
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType : 'json',
                type: 'POST',
                url: 'http://127.0.0.1:8000/admin/redeemCodes',
                data : formData,
                success: function (data) {
                    $('#redeem-code').text(data.code);
                    $('#redeem-modal').modal('show');
                },
                
                error: function (xhr, status, error) {
                    $('#error-message').text(xhr.responseJSON.error);
                }
            });
        });
    });

</script>

@endsection
@push('clientScript')

@endpush
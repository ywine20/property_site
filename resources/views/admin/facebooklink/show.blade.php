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
                        <a href="facebookLink.html" onclick="window.history.back()">
                            <i class="bi bi-arrow-left"></i>Back
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- end breadcrumb -->
        <div class="w-100 facebook ">
            <div class="py-3 px-3">
                <div class="row create">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-3 text-primary header">Facebook Link Detail</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('facebooklink.edit',$facebooklink->id) }}" class="btn  edit-icon px-2 py-1 fs-4">
                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                </a>
                                {{-- <button type="button" onclick="deleteConfirm(1)" class="btn trash-icon px-2 py-1 fs-4">
                                                <i class="bi bi-trash text-danger fa-fw"></i>
                                            </button> --}}
                                {{-- <form action="">
                                               <button type="button" onclick="delConfirm({{$facebooklink->id}})" class="btn trash-icon px-2 py-1 fs-4">
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
                            <div class="col-8 col-md-6 col-lg-4">
                                <div class="d-flex justify-content-center justify-content-lg-center">
                                    <div class="overflow-hidden rounded " style="height: 250px;width:250px">
                                        <img src="{{asset('storage/images/fbImages/'.$facebooklink->picture)}}" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="mb-5" style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3 bg-transparent">
                                                    <span class="fs-6">Facebook Link </span>
                                                </td>
                                                <td class="py-3">:</td>
                                                <td class="text-white py-3">
                                                    <span class="text-white text-wrap">
                                                        {{ $facebooklink->project_post_link }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr style="background-color: transparent !important;">
                                                <td class="text-white-50 text-nowrap py-3">
                                                    <span class="fs-6">Description </span>
                                                </td>
                                                <td class="py-3">:</td>

                                                <td class="py-3">
                                                    <span>
                                                        {{ $facebooklink->description }}
                                                    </span>
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
    if (logOut) {
        logOut.addEventListener('click', (e) => {
            e.preventDefault();
            logout();
        })
    }
</script>
<script>
    function delConfirm(id) {

        Swal.fire({
            title: `Are you sure?`,
            text: "You won't be able to revert this!",
            color: 'yellow',
            icon: 'warning',
            backdrop: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            background: '#423e3d',
            showCancelButton: true,
            confirmButtonColor: '#F5CC7A',
            cancelButtonColor: '#f36565',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('facebooklink/' + id).then(function(response) {
                    // console.log(response.data);
                    if (response.data.status == 'success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            background: '#423e3d',
                            position: 'top',
                            icon: 'success',
                            title: 'Deleted Successfully',
                        })

                        //ui ကနေပါ တစ်ခါတည်းဖြတ်တာ
                        document.getElementById('row' + id).remove();
                    } else {
                        Swal.fire({
                            background: '#423e3d',
                            position: 'top',
                            icon: 'error',
                            title: 'Something error',
                        })
                    }
                })

            }

        })
    }
</script>
@endsection
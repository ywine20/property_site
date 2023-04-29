@extends('admin.master')
@section('content')
<!--start content-->
<div class="content ">
    <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
        <!-- breadcrumb -->
        <div class="bg-secondary bg-opacity-50 px-2 py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Customers</li>
                </ol>
            </nav>
        </div>
        <!-- end breadcrumb -->
        <div class="py-3 px-3">
            <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                <h3 class="col-12 text-primary mb-3">Customers</h3>
                <div class="col-12 d-none">
                    <div
                        class="d-flex justify-content-start align-items-center bg-secondary bg-opacity-50 rounded px-3 py-1 ">
                        <ul class="d-flex justify-content-start text-primary align-items-center mt-3"
                            style="list-style: none">
                            <li class="me-5">All</li>
                            <li class="me-5">Bronze</li>
                            <li class="me-5">Silver</li>
                            <li class="me-5">Gold</li>
                            <li class="me-5">Platinum</li>
                            <li class="me-5">Diamond</li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="my-3">
                        <div class="card bg-secondary table-card">
                            <div class="card-body">
                                <div class="w-100">
                                    <table id="table_Project"
                                        class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                        <thead class="">
                                            <tr class="bg-primary text-secondary">

                                                <th class="text-center" data-orderable="false">
                                                    <input type="checkbox" id="allSelect" name="allSelect"
                                                        class="form-check-input border-secondary">
                                                </th>
                                                <th class="text-center">No.</th>
                                                <th class="">Profile</th>
                                                <th class="" style="max-width: 300px">Name</th>
                                                <th class="">Email</th>
                                                <th class="">Phone</th>
                                                <th class="text-center">Tier</th>
                                                <th class="text-center" data-orderable="false">Action</th>
                                                <th class="text-nowrap text-center">Modify Date</th>

                                            </tr>
                                        </thead>

                                        <tbody class="bg-secondary text-white">
                                            @foreach($customers as $keys => $customer)
                                            <tr id="row{{$customer->id}}">
                                                <td class="text-center">
                                                    <input type="checkbox" name="chk[]" value="{{$customer->id}}"
                                                        id="{{$customer->id}}" form="multiForm"
                                                        class="form-check-input checkbox">
                                                </td>
                                                <th scope="row" class="text-center">{{++$keys}}</th>
                                                <td class="text-start text-nowrap text-uppercase">
                                                    <div class="rounded rounded-circle overflow-hidden shadow"
                                                        style="width:45px;height:45px;">
                                                        @if($customer->profile_img)
                                                        <img src="{{asset('storage/images/client-profile/'.$customer->profile_img)}}"
                                                            alt="" class="w-100 h-100" style="object-fit:cover">
                                                        @else
                                                        <img src="{{asset('/images/user.png')}}" alt=""
                                                            class="w-100 h-100" style="object-fit:cover">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-start text-capitalize overflow-hidden"
                                                    style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                    {{$customer->name}}
                                                </td>
                                                <td class="text-start text-nowrap">{{$customer->email}}</td>
                                                <td class="text-start text-nowrap text-capitalize">
                                                    {{$customer->phone}}
                                                </td>
                                                <td class="text-center text-nowrap ">
                                                    {{$customer->tier}}
                                                </td>


                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="mx-1">
                                                            <a href="{{ route('project.detail',$customer->id) }}"
                                                                class="  info-icon px-2 py-1">
                                                                <i class="bi bi-info-circle text-info fa-fw"></i>
                                                            </a>
                                                        </div>
                                                        {{-- <div class="mx-1">
                                                                    <a href="{{ route('project.edit',$customer->slug) }}"
                                                        class="btn edit-icon px-2 py-1">
                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                        </a>
                                                    </div>
                                                    <div class="mx-1 text-nowrap">
                                                        <button type="button" onclick="deleteConfirm({{$p->id}})"
                                                            class="btn trash-icon px-2 py-1">
                                                            <i class="bi bi-trash text-danger fa-fw"></i>
                                                        </button>
                                                    </div> --}}
                                </div>
                                </td>
                                <td>
                                    <div class="fs-6 text-center text-nowrap">
                                        {{$customer->updated_at->format('d-M-Y')}} <br />
                                        <small>{{$customer->updated_at->diffForHumans()}}</small>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
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
<!--                end content -->
@endsection

@section('script')
<script>
// <!--  start  aside and nav responsive design-->
let aside = document.querySelector('aside');
let menuList = document.querySelector('.menu-list');
let backdrop = document.querySelector('#backdrop');
let closeAside = document.querySelector('#close-aside');

closeAside.addEventListener('click', (e) => {
    aside.classList.toggle('aside-hide');
    aside.classList.toggle('aside-show');
    backdrop.classList.toggle('d-none');

})
menuList.addEventListener('click', (e) => {
    aside.classList.toggle('aside-hide');
    aside.classList.toggle('aside-show');
    backdrop.classList.toggle('d-none');

})
//end aside and nav responsive design
//start add/remove active
let sideLink = document.querySelectorAll('.side-link');
for (let i = 0; i <= sideLink.length; i++) {
    sideLink[i].addEventListener('click', (e) => {
        let currentClick = e.currentTarget;
        sideLink.forEach(function(link) {
            link.classList.remove('active');
        });
        currentClick.classList.add('active');
    })
}
//end add/remove active
</script>
<script>
//    $(document).ready(function () {
//        $('#table_Project').DataTable();
//    });
$(document).ready(function() {
    var t = $('#table_Project').DataTable({
        scrollX: true,
        responsive: true,
        // order: [[1, 'asc']],
    });
});
</script>

<script>
//logoutt
let logOut = document.querySelector('#logout');
logOut.addEventListener('click', (e) => {
    e.preventDefault();
    logout();
})
</script>

<script>
function deleteConfirm(id) {

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
            axios.delete('project/' + id).then(function(response) {
                console.log(response.data);
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
                    console.log(response);
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
@push('customScript')
<script>
let multiForm = document.querySelector('#multiForm');
let multiDeleteBtn = document.getElementById('multiDeleteBtn');
let checkBoxes = document.querySelectorAll('.checkbox');
let allSelect = document.querySelector('#allSelect');
let checkCount = document.querySelector('#checkedCount');

let count = 0;
//FOR INDIVIDUAL SELECT CHECKBOX COUNT
for (let i = 0; i < checkBoxes.length; i++) {
    checkBoxes[i].addEventListener('click', () => {
        //make sure if checkBoxes is checked or not
        if (checkBoxes[i].checked) {
            count++;
        } else {
            count--;
        }

        multipleDeleteBtn(count);
        checkCount.innerHTML = count;

    })
}

//FOR All SELECT CHECKBOX COUNT
allSelect.onclick = function() {
    count = 0;

    for (let checkbox of checkBoxes) {
        checkbox.checked = this.checked;

        if (checkbox.checked == true) {
            count++;

            checkCount.innerHTML = count;
        } else {
            count = 0;
            checkCount.innerHTML = count;
        }
        multipleDeleteBtn(count);
    }
}

function multipleDeleteBtn(count) {
    if (count > 0) {
        multiDeleteBtn.classList.remove('trash-icon-disable')
        checkCount.classList.remove('d-none')
        multiDeleteBtn.disabled = false;
    } else {
        multiDeleteBtn.classList.add('trash-icon-disable')
        checkCount.classList.add('d-none')
        multiDeleteBtn.setAttribute("disabled", "");
    }
}
multipleDeleteBtn(count);




multiDeleteBtn.addEventListener('click', (e) => {
    e.preventDefault();
    multiForm.setAttribute('action', "{{route('project.multi-delete')}}");
    Swal.fire({
        title: `Are you sure?`,
        text: "You won't be able to revert this!",
        color: '#fff',
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
            multiForm.submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            // Swal.fire(
            //     'Cancelled',
            //     'Your imaginary file is safe :)',
            //     'error'
            // )
        }
    })



})
</script>
@endpush
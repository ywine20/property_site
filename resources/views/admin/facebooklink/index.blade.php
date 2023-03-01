@extends('admin.master')
@section('content')
<!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Facebook_Link</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                            <h3 class="col-12 text-primary mb-3">Facebook Link</h3>
                            <div class="col-12">
                                <div class="d-flex justify-content-end align-items-center bg-secondary bg-opacity-50 rounded px-3 py-1 ">
                                    <form method="post" id="multiForm">
                                        @csrf
                                        <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiDeleteBtn">
                                            <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                            <span id="checkedCount" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                        </button>
                                    </form>
                                    <a href="{{route('facebooklink.create')}}" class="mx-1 create-btn px-2 py-2 rounded">
                                        <i class="bi bi-plus-circle"></i>
                                        Create Facebook Link
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="my-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_facebookLink" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">
                                                        <th class="text-center" data-orderable="false">
                                                            <input type="checkbox" id="allSelect" name="allSelect" class="form-check-input border-secondary">
                                                        </th>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center" data-orderable="false">Photo</th>
                                                        <th class="">Description</th>
                                                        <th class="">Link</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>

                                                    </tr>
                                                    </thead>
                                                    @foreach ($facebooklinks as $keys=>$f)
                                                    <tbody class="bg-secondary text-white">
                                                    <tr id="row{{$f->id}}">
                                                        <td class="text-center">
                                                            <input type="checkbox" name="chk[]" value="{{$f->id}}" id="{{$f->id}}" form="multiForm" class="form-check-input checkbox">
                                                        </td>
                                                        <th scope="row" class="text-center">{{++$keys}}</th>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <div class="facebook-photo">
                                                                <img src="{{asset('images/fb-images/'.$f->picture)}}" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="">
                                                           <div class=" overflow-hidden" style="white-space:normal;min-width:300px;max-width: 360px;height: 3em !important;    text-overflow: ellipsis;">
                                                              <small class="">
                                                                {{ $f->description }}
                                                              </small>...
                                                           </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-truncate" style="max-width: 280px">
                                                                {{ $f->project_post_link }}
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <a href="{{ route('facebooklink.show',$f->id) }}"  class="btn info-icon px-2 py-1" >
                                                                        <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="mx-1">
                                                                        <a href="{{ route('facebooklink.edit',$f->id) }}" class="btn  edit-icon px-2 py-1">
                                                                            <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                        </a>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                    <button type="button" onclick="deleteConfirm({{$f->id}})" class="btn trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </button>
                                                                    {{-- <form action="">
                                                                        <button type="button" onclick="deleteConfirm(1)" class="btn trash-icon px-2 py-1">
                                                                            <i class="bi bi-trash text-danger fa-fw"></i>
                                                                        </button>
                                                                    </form> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fs-6 text-center text-nowrap">
                                                                {{$f->updated_at->format('d-M-Y')}}<br>
                                                                <small>{{$f->updated_at->diffForHumans()}}</small>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
    //    $(document).ready(function () {
    //        $('#table_Cat').DataTable();
    //    });
    $(document).ready(function () {
        var t = $('#table_facebookLink').DataTable({
            scrollX: true,
            responsive: true,
            order: [[1, 'asc']],
        });
    });
</script>
<script>
    //logoutt
    let logOut = document.querySelector('#logout');
    logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
</script>

<script>
    function  deleteConfirm(id){

Swal.fire({
            title: `Are you sure?` ,
            text: "You won't be able to revert this!",
            color:'yellow',
            icon: 'warning',
            backdrop: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            background:'#423e3d',
            showCancelButton: true,
            confirmButtonColor: '#F5CC7A',
            cancelButtonColor: '#f36565',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
            axios.delete('facebooklink/'+id).then(function (response) {
                // console.log(response.data);
                if(response.data.status=='success'){
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
                    background:'#423e3d',
                    position: 'top',
                    icon: 'success',
                    title: 'Deleted Successfully',
                })

                //ui ကနေပါ တစ်ခါတည်းဖြတ်တာ
                document.getElementById('row'+id).remove();
                }
                else{
                    Swal.fire({
                    background:'#423e3d',
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

        let count  = 0;
        //FOR INDIVIDUAL SELECT CHECKBOX COUNT
        for(let i=0; i < checkBoxes.length;i++){
            checkBoxes[i].addEventListener('click',()=>{
                //make sure if checkBoxes is checked or not
                if(checkBoxes[i].checked){
                    count++;
                }else{
                    count--;
                }

                multipleDeleteBtn(count);
                checkCount.innerHTML = count;

            })
        }

        //FOR All SELECT CHECKBOX COUNT
        allSelect.onclick = function (){
            count = 0;

            for(let checkbox of checkBoxes){
                checkbox.checked = this.checked;

                if(checkbox.checked == true){
                    count++;

                    checkCount.innerHTML = count ;
                }else{
                    count = 0;
                    checkCount.innerHTML = count;
                }
                multipleDeleteBtn(count);
            }
        }

        function multipleDeleteBtn(count){
            if(count > 0){
                multiDeleteBtn.classList.remove('trash-icon-disable')
                checkCount.classList.remove('d-none')
                multiDeleteBtn.disabled = false;
            }else{
                multiDeleteBtn.classList.add('trash-icon-disable')
                checkCount.classList.add('d-none')
                multiDeleteBtn.setAttribute("disabled", "");
            }
        }
        multipleDeleteBtn(count);




        multiDeleteBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            multiForm.setAttribute('action',"{{route('facebookLink.multi-delete')}}");
            Swal.fire({
                title: `Are you sure?` ,
                text: "You won't be able to revert this!",
                color:'#fff',
                icon: 'warning',
                backdrop: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                background:'#423e3d',
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


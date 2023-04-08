@extends('admin.master')
@section('content')
<!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Project</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                            <h3 class="col-12 text-primary mb-3">Project</h3>
                            <div class="col-12">
                                <div class="d-flex justify-content-end align-items-center bg-secondary bg-opacity-50 rounded px-3 py-1 ">
                                    <form method="post" id="multiForm">
                                        @csrf
                                        <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiDeleteBtn">
                                            <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                            <span id="checkedCount" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                        </button>
                                    </form>
                                    <a href="{{route('project.create')}}" class="mx-1 create-btn px-2 py-2 rounded">
                                        <i class="bi bi-plus-circle"></i>
                                        Create Project
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="my-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_Project" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">

                                                        <th class="text-center" data-orderable="false">
                                                            <input type="checkbox" id="allSelect" name="allSelect" class="form-check-input border-secondary">
                                                        </th>
                                                        <th class="text-center">No.</th>
                                                        <th class="">Name</th>
                                                        <th class="" style="max-width: 300px">Address</th>
                                                        <th class="">Range</th>
                                                        <th class="">Category</th>
                                                        <th class="text-center">Viewer</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody class="bg-secondary text-white">
                                                    @foreach($projects as  $keys=>$p)
                                                    <tr id="row{{$p->id}}">
                                                        <td class="text-center">
                                                            <input type="checkbox" name="chk[]" value="{{$p->id}}" id="{{$p->id}}" form="multiForm" class="form-check-input checkbox">
                                                        </td>
                                                        <th scope="row" class="text-center">{{++$keys}}</th>
                                                        <td class="text-start text-nowrap text-uppercase">{{$p->project_name}}</td>
                                                        <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                            <small>
                                                                No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward,
                                                                @foreach ($towns as $t)
                                                                    @if($t->id==$p->township_id)
                                                                    {{$t->name}} TownShip,
                                                                    @endif
                                                                @endforeach

                                                                @foreach ($cities as $c)
                                                                    @if($c->id==$p->city_id)
                                                                    {{$c->name}},
                                                                    @endif
                                                                @endforeach
                                                            </small>
                                                        </td>
                                                        <td class="text-start text-nowrap">{{ $p->lower_price }} - {{ $p->upper_price }}</td>
                                                        <td class="text-start text-nowrap text-capitalize">
                                                            @foreach ($categories as $c)
                                                                @if($c->category_id==$p->category_id)
                                                                    {{$c->category_name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center text-nowrap ">
                                                            {{$p->viewer}}
                                                        </td>


                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <a href="{{ route('project.show',$p->slug) }}"  class="  info-icon px-2 py-1">
                                                                        <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="mx-1">
                                                                    <a href="{{ route('project.edit',$p->slug) }}"  class="btn  edit-icon px-2 py-1">
                                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                        <button type="button" onclick="deleteConfirm({{$p->id}})" class="btn trash-icon px-2 py-1" >
                                                                            <i class="bi bi-trash text-danger fa-fw"></i>
                                                                        </button>
                                                                        {{-- <form action="{{ route('project.destroy',$p->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE') --}}
                                                                        {{-- </form> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fs-6 text-center text-nowrap">
                                                                {{$p->updated_at->format('d-M-Y')}} <br/>
                                                                <small>{{$p->updated_at->diffForHumans()}}</small>
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


{{-- <!--Edit Modal-->
<!-- Modal -->
    <div class="modal fade " id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content text-primary">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Category Edit</h1>
                    <button type="button" class="btn-close text-primary d-flex justify-content-center align-items-center" data-bs-dismiss="modal">
                        <i class="bi bi-x fa-fw fs-3"></i>
                    </button>
                </div>
                <div class="modal-body  border-0">
                    <form action="" method="post" id="editForm">
                        <label class="mb-1 text-white fs-6">Category Name</label>
                        <input type="text" value="Home" class="form-control bg-secondary bg-opacity-50 border-0 text-white py-3">
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
<!--End Edit Modal--> --}}

@section('script')
<script>
    // <!--  start  aside and nav responsive design-->
    let aside = document.querySelector('aside');
    let menuList = document.querySelector('.menu-list');
    let backdrop = document.querySelector('#backdrop');
    let closeAside = document.querySelector('#close-aside');

    closeAside.addEventListener('click',(e)=>{
        aside.classList.toggle('aside-hide');
        aside.classList.toggle('aside-show');
        backdrop.classList.toggle('d-none');

    })
    menuList.addEventListener('click',(e)=>{
        aside.classList.toggle('aside-hide');
        aside.classList.toggle('aside-show');
        backdrop.classList.toggle('d-none');

    })
    //end aside and nav responsive design
    //start add/remove active
    let sideLink = document.querySelectorAll('.side-link');
    for(let i=0;i <= sideLink.length; i++){
        sideLink[i].addEventListener('click',(e)=>{
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
    $(document).ready(function () {
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
            axios.delete('project/'+id).then(function (response) {
                console.log(response.data);
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
                    console.log(response);
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
            multiForm.setAttribute('action',"{{route('project.multi-delete')}}");
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


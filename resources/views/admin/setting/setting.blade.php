@extends('admin.master')
@section('content')
            <!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <!--                        Setting -->
                        <div class="row g-0">
                            <div class="col-12 mt-4 mb-3">
                                <h5 class="text-white-50">Setting</h5>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center rounded py-2 px-3 mb-3 bg-secondary bg-opacity-50">
                                    <div class="">
                                        <h5 class="text-primary mb-0">Admin/Moderator List</h5>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center ">
                                        <!-- <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiple_deletion_moderator">
                                            <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                            <span id="checkedCount" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                        </button> -->
                                        <a href="{{route('setting.create')}}" class="mx-1 create-btn px-2 py-1 rounded">
                                            <i class="bi bi-plus-circle"></i>
                                            Create Moderator
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-1 mb-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_moderator" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">
                                                        <!-- <th class="text-center" data-orderable="false">
                                                            <input type="checkbox" id="allSelectModerator" name="allSelectModerator" class="form-check-input border-secondary">
                                                        </th> -->
                                                        <th class="text-center">No.</th>
                                                        <th class="text-center" data-orderable="false" style="max-width:130px;">Photo</th>
                                                        <th class="">Name</th>
                                                        <th>Role</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-secondary text-white">
                                                    @foreach($data as $keys=>$data)
                                                    <tr id="row{{$data->id}}">
                                                        <!-- <td class="text-center">
                                                            <input type="checkbox" name="chk[]" class="form-check-input checkboxModerator">
                                                        </td> -->
                                                        <th scope="row" class="text-center">{{++$keys}}</th>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <div class="user-photo">
                                                                <div class="border border-secondary rounded-circle">
                                                                    <img src="{{$data->image ? asset('storage/images/admin/'.$data->image) : asset('/images/user.png') }}" alt="" class="border rounded-circle">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-start text-nowrap text-capitalize">{{$data->name}}</td>
                                                        <td class="text-start text-nowrap text-capitalize">{{$data->role}}</td>
                                                        <td class="text-start text-nowrap ">{{$data->phone}}</td>
                                                        <td class="text-start text-nowrap ">{{$data->email}}</td>
                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <a href="{{route('setting.edit',$data->id)}}"  class="btn  edit-icon px-2 py-1" >

                                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                    <button type="button" onclick="deleteConfirm({{$data->id}})" class="btn trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </button>
                                                                    {{-- <form action="">
                                                                        <button type="button" onclick="deleteConfirm({{$data->id}})" class="btn trash-icon px-2 py-1">
                                                                            <i class="bi bi-trash text-danger fa-fw"></i>
                                                                        </button>
                                                                    </form> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fs-6 text-center text-nowrap">
                                                                {{$data->updated_at->format('d-M-Y')}} <br/>
                                                                <small>{{$data->updated_at->diffForHumans()}}</small>
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
        $(document).ready(function () {
            var t = $('#table_moderator').DataTable({
                scrollX: true,
                responsive: true,
                order: [[1, 'asc']],
            });
        });
    </script>

    <script>
        let allSelect = document.getElementById('allSelectModerator');
        let checkboxes = document.getElementsByClassName('checkboxModerator');
        let checkCount = document.getElementById('checkedCount');

        let count  = 0;

        //FOR All SELECT CHECKBOX COUNT
        allSelect.onclick = function (){
            count = 0;

            for(let checkbox of checkboxes){
                checkbox.checked = this.checked;
                if(checkbox.checked == true){
                    count++;
                    checkCount.innerHTML = count;
                }else{
                    count = 0;
                    checkCount.innerHTML = count;
                }
                multipleDeleteBtn(count);
            }
        }

        //FOR INDIVIDUAL SELECT CHECKBOX COUNT
        for(let i=0; i < checkboxes.length;i++){
            checkboxes[i].addEventListener('click',()=>{
                //make sure if checkbox is checked or not
                if(checkboxes[i].checked){
                    count++;
                }else{
                    count--;
                }

                multipleDeleteBtn(count);
                checkCount.innerHTML = count;

            })
        }

        //  multiple deletion
        let multipleDeletion = document.getElementById('multiple_deletion_moderator');
        function multipleDeleteBtn(count){
            if(count > 0){
                multipleDeletion.classList.remove('trash-icon-disable')
                checkCount.classList.remove('d-none')
                multipleDeletion.disabled = false;

            }else{
                multipleDeletion.classList.add('trash-icon-disable')
                checkCount.classList.add('d-none')
                multipleDeletion.setAttribute("disabled", "");

            }
        }
        multipleDeleteBtn(count);

        multipleDeletion.addEventListener('click',()=>{
            if(count>1){
                multipleDeleteConfirm();
            }else{
                alert(' please check at least minimum one row');
            }
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
            axios.delete('setting/'+id).then(function (response) {
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

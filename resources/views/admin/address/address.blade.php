@extends('admin.master')

@section('content')
            <!--                start content-->
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Address</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
<!--                    Start City/State-->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                            <h3 class="col-12 text-primary mb-3">Address</h3>
                            <div class="col-12">

                                <div class="d-flex justify-content-between align-items-center rounded ps-0 pe-3 py-1">
                                    <div class="">
                                        <h5 class="text-white">City/State</h5>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form method="post" id="multiCityForm">
                                            @csrf
                                            <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiDeleteCityBtn">
                                                <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                                <span id="checkedCountCity" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                            </button>
                                        </form>
                                        <a href="{{url('admin/add-city')}}" class="mx-1 create-btn px-2 py-1 rounded">
                                            <i class="bi bi-plus-circle"></i>
                                            Create City/State
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-1 mb-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_City" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">
                                                        <th class="text-center" data-orderable="false">
                                                            <input type="checkbox"  id="allSelectCity" name="allSelectCity" class="form-check-input border-secondary">
                                                        </th>
                                                        <th class="text-center">No.</th>
                                                        <th class="">Name</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-secondary text-white">
                                                    @foreach ($city as $keys=>$c)
                                                    <tr id="row{{$c->id}}">
                                                        <td class="text-center">
                                                            <input type="checkbox" name="chkCity[]" form="multiCityForm" value="{{$c->id}}" class="form-check-input checkboxCity">
                                                        </td>
                                                        <th scope="row" class="text-center">{{++$keys}}</th>
                                                        <td class="text-start text-nowrap ">{{$c->name}}</td>
                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#editCityModal{{$c->id}}" >
                                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                    <button type="button" onclick="deleteConfirm({{$c->id}})" class="btn trash-icon px-2 py-1">
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
                                                                {{$c->updated_at->format('d-M-Y')}}<br>
                                                                <small>{{$c->updated_at->diffForHumans()}}</small>
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
<!--                    end City/State-->
                    <div class="w-100 d-flex justify-content-center align-items-center">
                        <hr class="w-50 text-white" />
                    </div>

                    <!--                    Start TownShip-->
                    <div class="py-3 px-3">
                        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
<!--                            <h3 class="col-12 text-primary mb-3">Address</h3>-->
                            <div class="col-12">

                                <div class="d-flex justify-content-between align-items-center rounded ps-0 pe-3 py-1">
                                    <div class="">
                                        <h5 class="text-white">Township</h5>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form method="post" id="multiTownForm">
                                            @csrf
                                            <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiDeleteTownBtn">
                                                <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                                <span id="checkedCountTown" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                            </button>
                                        </form>
                                        <a href="{{url('admin/add-town')}}" class="mx-1 create-btn px-2 py-1 rounded">
                                            <i class="bi bi-plus-circle"></i>
                                            Create TownShip
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-1 mb-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_townShip" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">
                                                        <th class="text-center" data-orderable="false">
                                                            <input type="checkbox"  id="allSelectTown" form="multiTownForm" name="allSelectTown" class="form-check-input border-secondary">
                                                        </th>
                                                        <th class="text-center">No.</th>
                                                        <th class="">Name</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-secondary text-white">
                                                    @foreach ($town as $keys=>$t)
                                                    <tr id="rownew{{$t->id}}">
                                                        <td class="text-center">
                                                            <input type="checkbox" name="chkTown[]" form="multiTownForm" value="{{$t->id}}" class="form-check-input checkboxTown">
                                                        </td>
                                                        <th scope="row" class="text-center">{{++$keys}}</th>
                                                        <td class="text-start text-nowrap ">{{$t->name}}</td></td>
                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#editTownModal{{$t->id}}" >
                                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                    <button type="button" onclick="delConfirm({{$t->id}})" class="btn trash-icon px-2 py-1">
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
                                                                {{$t->updated_at->format('d-M-Y')}}<br>
                                                                <small>{{$t->updated_at->diffForHumans()}}</small>
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
                    <!--                    end TownShip-->

<!--Edit Modal-->
<!-- City Edit Modal -->
    @foreach($city as $c)
        <div class="modal fade " id="editCityModal{{$c->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content text-primary">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">City Edit</h1>
                        <button type="button" class="btn-close text-primary d-flex justify-content-center align-items-center" data-bs-dismiss="modal">
                            <i class="bi bi-x fa-fw fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body  border-0">
                        <form action="{{route('address.cityUpdate',$c->id)}}" id="cityEditForm{{$c->id}}" method="post">
                            @csrf
                            @method('put')
{{--                            <a href="">{{route('address.cityUpdate',$c->id)}}{{$c->name}}</a>--}}
                            <input type="text" id="cityEditId" name="city_id" value="{{$c->id}}" class="d-none" >
                            <label class="mb-1 text-white fs-6">City Name</label>
                            <input type="text" id="cityEditInput" name="city_name" value="{{$c->name}}" class="form-control bg-secondary bg-opacity-50 border-0 text-white py-3">
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button form="cityEditForm{{$c->id}}" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!--City Edit Modal-->

<!-- TownShip Edit Modal -->
@foreach($town as $t)
    <div class="modal fade " id="editTownModal{{$t->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content text-primary">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Township Edit</h1>
                    <button type="button" class="btn-close text-primary d-flex justify-content-center align-items-center" data-bs-dismiss="modal">
                        <i class="bi bi-x fa-fw fs-3"></i>
                    </button>
                </div>
                <div class="modal-body  border-0">
                    <form action="{{route('address.townUpdate',$t->id)}}" id="townEditModal{{$t->id}}" method="post">
                        @csrf
                        @method('put')
{{--                        <a href="">{{route('address.cityUpdate',$t->id)}}{{$t->name}}</a>--}}
                        <input type="text" id="cityEditId" name="town_id" value="{{$t->id}}" class="d-none" >
                        <label class="mb-1 text-white fs-6">Town Name</label>
                        <input type="text" id="cityEditInput" name="town_name" value="{{$t->name}}" class="form-control bg-secondary bg-opacity-50 border-0 text-white py-3">
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="townEditModal{{$t->id}}" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!--End Edit Modal-->
@endsection

@section('script')
<script>

    //    $(document).ready(function () {
    //        $('#table_Cat').DataTable();
    //    });
    $(document).ready(function () {
        var city = $('#table_City').DataTable({
            scrollX: true,
            responsive: true,
            order: [[1, 'asc']],
        });

    //    for township
        var townShip = $('#table_townShip').DataTable({
            scrollX: true,
            responsive: true,
            order: [[1, 'asc']],
        });
    });
</script>

<!-- All Select/ Multiple Select-->
{{--<script type="text/javascript">--}}
{{--    let allSelectCity = document.getElementById('allSelectCity');--}}
{{--    let allSelectTownShip = document.getElementById('allSelectTownShip');--}}

{{--    let checkboxesCity = document.getElementsByClassName('checkboxCity');--}}
{{--    let checkboxesTownship = document.getElementsByClassName('checkboxTownship');--}}

{{--    let checkCountCity = document.getElementById('checkCountCity');--}}
{{--    let checkCountTownship = document.getElementById('checkedCountTownship');--}}
{{--    let multipleDeletionCity = document.getElementById('multiple_deletion_city');--}}
{{--    let multipleDeletionTownship = document.getElementById('multiple_deletion_township');--}}

{{--    let cityCount  = 0;--}}
{{--    let townShipCount = 0;--}}


{{--    ///City/////////////////////////////////--}}

{{--    //FOR City All SELECT CHECKBOX COUNT--}}
{{--    allSelectCity.onclick = function (){--}}
{{--        cityCount = 0;--}}

{{--        for(let checkbox of checkboxesCity){--}}
{{--            checkbox.checked = this.checked;--}}
{{--            if(checkbox.checked == true){--}}
{{--                cityCount++;--}}
{{--                checkCountCity.innerHTML = cityCount;--}}
{{--            }else{--}}
{{--                cityCount = 0;--}}
{{--                checkCountCity.innerHTML = cityCount;--}}
{{--            }--}}
{{--            multipleDeleteBtnForCity(cityCount);--}}
{{--        }--}}
{{--    }--}}

{{--    //FOR City INDIVIDUAL SELECT CHECKBOX COUNT--}}
{{--    for(let i=0; i < checkboxesCity.length;i++){--}}
{{--        checkboxesCity[i].addEventListener('click',()=>{--}}
{{--            //make sure if checkbox is checked or not--}}
{{--            if(checkboxesCity[i].checked){--}}
{{--                cityCount++;--}}
{{--            }else{--}}
{{--                cityCount--;--}}
{{--            }--}}

{{--            multipleDeleteBtnForCity(cityCount);--}}
{{--            checkCountCity.innerHTML = cityCount;--}}

{{--        })--}}
{{--    }--}}

{{--    //  multiple deletion for City--}}
{{--    function multipleDeleteBtnForCity(cityCount){--}}
{{--        if(cityCount > 0){--}}
{{--            multipleDeletionCity.classList.remove('trash-icon-disable')--}}
{{--            checkCountCity.classList.remove('d-none')--}}
{{--            multipleDeletionCity.disabled = false;--}}

{{--        }else{--}}
{{--            multipleDeletionCity.classList.add('trash-icon-disable')--}}
{{--            checkCountCity.classList.add('d-none')--}}
{{--            multipleDeletionCity.setAttribute("disabled", "");--}}

{{--        }--}}
{{--    }--}}
{{--    multipleDeleteBtnForCity(cityCount);--}}

{{--    multipleDeletionCity.addEventListener('click',()=>{--}}
{{--        if(cityCount>1){--}}
{{--            multipleDeleteConfirm();--}}
{{--        }else{--}}
{{--            alert(' please check at least minimum one row');--}}
{{--        }--}}
{{--    });--}}

{{--    ////END CITY///////////////////////////////////--}}



{{--//////TOWNSHIP//////////////////////////--}}
{{--    //FOR TOWNSHIP All SELECT CHECKBOX COUNT--}}
{{--    allSelectTownShip.onclick = function (){--}}
{{--        townShipCount = 0;--}}

{{--        for(let checkbox of checkboxesTownship){--}}
{{--            checkbox.checked = this.checked;--}}
{{--            if(checkbox.checked == true){--}}
{{--                townShipCount++;--}}
{{--                checkCountTownship.innerHTML = townShipCount;--}}
{{--            }else{--}}
{{--                townShipCount = 0;--}}
{{--                checkCountTownship.innerHTML = townShipCount;--}}
{{--            }--}}
{{--            multipleDeleteBtnForTownShip(townShipCount);--}}
{{--        }--}}
{{--    }--}}

{{--    //FOR township INDIVIDUAL SELECT CHECKBOX COUNT--}}
{{--    for(let i=0; i < checkboxesTownship.length;i++){--}}
{{--        checkboxesTownship[i].addEventListener('click',()=>{--}}
{{--            //make sure if checkbox is checked or not--}}
{{--            if(checkboxesTownship[i].checked){--}}
{{--                townShipCount++;--}}
{{--            }else{--}}
{{--                townShipCount--;--}}
{{--            }--}}

{{--            multipleDeleteBtnForTownShip(townShipCount);--}}
{{--            checkCountTownship.innerHTML = townShipCount;--}}

{{--        })--}}
{{--    }--}}

{{--    //  multiple deletion for township--}}
{{--    function multipleDeleteBtnForTownShip(townShipCount){--}}
{{--        if(townShipCount > 0){--}}
{{--            multipleDeletionTownship.classList.remove('trash-icon-disable')--}}
{{--            checkCountTownship.classList.remove('d-none')--}}
{{--            multipleDeletionTownship.disabled = false;--}}
{{--        }else{--}}
{{--            multipleDeletionTownship.classList.add('trash-icon-disable')--}}
{{--            checkCountTownship.classList.add('d-none')--}}
{{--            multipleDeletionTownship.setAttribute("disabled", "");--}}

{{--        }--}}
{{--    }--}}
{{--    multipleDeleteBtnForTownShip(townShipCount);--}}

{{--    multipleDeletionTownship.addEventListener('click',()=>{--}}
{{--        if(townShipCount>1){--}}
{{--            multipleDeleteConfirm();--}}
{{--        }else{--}}
{{--            alert(' please check at least minimum one row');--}}
{{--        }--}}
{{--    });--}}
{{--////END TOWNSHIP////////////////////////////////--}}
{{--</script>--}}

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
        axios.delete('delete-city/'+id).then(function (response) {
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

function  delConfirm(id){

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
        axios.delete('delete-town/'+id).then(function (response) {
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
            document.getElementById('rownew'+id).remove();
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
{{--    City MultiDelete--}}
<script>
    let multiCityForm = document.querySelector('#multiCityForm');
    let multiDeleteCityBtn = document.getElementById('multiDeleteCityBtn');
    let checkBoxesCity = document.querySelectorAll('.checkboxCity');
    let allSelectCity = document.querySelector('#allSelectCity');
    let checkCountCity = document.querySelector('#checkedCountCity');

    let cityCount  = 0;
    //FOR INDIVIDUAL SELECT CHECKBOX COUNT
    for(let i=0; i < checkBoxesCity.length;i++){
        checkBoxesCity[i].addEventListener('click',()=>{
            //make sure if checkBoxesCity is checked or not
            if(checkBoxesCity[i].checked){
                cityCount++;
            }else{
                cityCount--;
            }

            multipleDeleteCityBtn(cityCount);
            checkCountCity.innerHTML = cityCount;

        })
    }

    //FOR All SELECT CHECKBOX COUNT
    allSelectCity.onclick = function (){
        cityCount = 0;

        for(let checkbox of checkBoxesCity){
            checkbox.checked = this.checked;

            if(checkbox.checked == true){
                cityCount++;

                checkCountCity.innerHTML = cityCount ;
            }else{
                cityCount = 0;
                checkCountCity.innerHTML = cityCount;
            }
            multipleDeleteCityBtn(cityCount);
        }
    }

    function multipleDeleteCityBtn(cityCount){
        if(cityCount > 0){
            multiDeleteCityBtn.classList.remove('trash-icon-disable')
            checkCountCity.classList.remove('d-none')
            multiDeleteCityBtn.disabled = false;
        }else{
            multiDeleteCityBtn.classList.add('trash-icon-disable')
            checkCountCity.classList.add('d-none')
            multiDeleteCityBtn.setAttribute("disabled", "");
        }
    }
    multipleDeleteCityBtn(cityCount);


    multiDeleteCityBtn.addEventListener('click',(e)=>{
        e.preventDefault();
        multiCityForm.setAttribute('action',"{{route('city.multi-delete')}}");
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
                multiCityForm.submit();
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

{{--    Multi Delete Township--}}
                        <script>
                            let multiTownForm = document.querySelector('#multiTownForm');
                            let multiDeleteTownBtn = document.getElementById('multiDeleteTownBtn');
                            let checkBoxesTown = document.querySelectorAll('.checkboxTown');
                            let allSelectTown = document.querySelector('#allSelectTown');
                            let checkCountTown = document.querySelector('#checkedCountTown');

                            let townCount  = 0;
                            //FOR INDIVIDUAL SELECT CHECKBOX COUNT
                            for(let i=0; i < checkBoxesTown.length;i++){
                                checkBoxesTown[i].addEventListener('click',()=>{
                                    //make sure if checkBoxesTown is checked or not
                                    if(checkBoxesTown[i].checked){
                                        townCount++;
                                    }else{
                                        townCount--;
                                    }

                                    multipleDeleteBtn(townCount);
                                    checkCountTown.innerHTML = townCount;

                                })
                            }

                            //FOR All SELECT CHECKBOX COUNT
                            allSelectTown.onclick = function (){
                                townCount = 0;

                                for(let checkbox of checkBoxesTown){
                                    checkbox.checked = this.checked;

                                    if(checkbox.checked == true){
                                        townCount++;

                                        checkCountTown.innerHTML = townCount ;
                                    }else{
                                        townCount = 0;
                                        checkCountTown.innerHTML = townCount;
                                    }
                                    multipleDeleteBtn(townCount);
                                }
                            }

                            function multipleDeleteBtn(townCount){
                                if(townCount > 0){
                                    multiDeleteTownBtn.classList.remove('trash-icon-disable')
                                    checkCountTown.classList.remove('d-none')
                                    multiDeleteTownBtn.disabled = false;
                                }else{
                                    multiDeleteTownBtn.classList.add('trash-icon-disable')
                                    checkCountTown.classList.add('d-none')
                                    multiDeleteTownBtn.setAttribute("disabled", "");
                                }
                            }
                            multipleDeleteBtn(townCount);


                            multiDeleteTownBtn.addEventListener('click',(e)=>{
                                e.preventDefault();
                                multiTownForm.setAttribute('action',"{{route('town.multi-delete')}}");
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
                                        multiTownForm.submit();
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

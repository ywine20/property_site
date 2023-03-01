@extends('admin.master')
@section('content')
    <!--                start content-->
            <div class="content">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <div class="w-100 ">
                        <div class="contact_us">
                            <div class="row g-0 d-flex justify-content-center align-items-start">
                                <div class="col-3 d-none d-lg-flex side-contact px-0 overflow-auto" style="">
                                    <nav class="w-100">
                                        <div class="d-flex justify-content-between align-items-center text-white py-3 px-2 te">
                                            <h5>Contact Us</h5>
                                            <span class="fs-6 fw-light">Total :  {{$contacts->count()}}</span>
                                        </div>
                                        <div class="bg-secondary w-100">

                                            <ul class="list-unstyled contact-nav mb-0">
                                                @forelse  ($contacts as $c)
                                                    <a class="contact-link w-100 " href="{{url('admin/cont-show/'.$c->id)}}" >
                                                        <li class="py-2 px-2 contact-item text-white {{ Request::is('admin/cont-show/'.$c->id) ? 'active': '' }} border border-1 border-secondary border-opacity-25" id="del{{$c->id}}">
                                                            <div id="col{{$c->id}}" class="d-flex justify-content-between align-items-start position-relative">
                                                                <div class="fw-light me-2 text-truncate">
                                                                    <span class="sender">{{$c->email}}</span><br>
                                                                    <span class="subject">{{$c->subject}}</span>
                                                                </div>
                                                                <span class="text-nowrap fw-light show-time mt-2">{{$c->updated_at->diffForHumans()}}</span>
                                                                <div class="noti-ball d-none" ></div>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="py-5" style="background-color: rgba(122,117,116,0.34)"></div>

                                    </nav>
                                </div>
                                <div class="col-10 col-lg-9 contact-detail px-0 ">
                                   <div class="w-100 position-relative d-flex justify-content-center pt-3 pb-5 mb-5">
                                    @if ($contact != Null)
                                    <div id="row{{$contact->id}}" class="contact-detail-paper pb-5 rounded rounded-2 rounded overflow-hidden text-white position-relative">
                                        <div class="datetime bg-secondary py-2 px-2 d-flex justify-content-between align-items-center">

                                            <div class="fw-light" >
                                                <span>{{$contact->updated_at->format('d-M-Y')}}</span>
                                                <i>{{$contact->updated_at->format('D')}}</i>
                                            </div>

                                             <button type="button" onclick="delConfirm({{$contact->id}})" class="btn trash-icon px-2 py-1 fs-5 rounded-circle">
                                                 <i class="bi bi-trash text-danger fa-fw"></i>
                                             </button>
                                            {{-- <form action="">
                                                <button type="button" onclick="deleConfirm({{$contact->id}})" class="btn trash-icon px-2 py-1 fs-5 rounded-circle">
                                                    <i class="bi bi-trash text-danger fa-fw"></i>
                                                </button>
                                            </form> --}}

                                        </div>
                                       <div class="px-3">
                                           <div class="subject my-4">
                                               <h5 class="text-wrap">{{$contact->subject}}</h5>
                                               <div class="">
                                                   <span></span>
                                               </div>
                                           </div>
                                           <div class="user-info-table">
                                               <div class="">
                                                   <table class="table table-borderless">
                                                       <tbody>
                                                       <tr class="" style="background-color: transparent !important;">
                                                           <td class="text-white-50 text-nowrap bg-transparent" style="max-width: 70px;min-width: content-box;">
                                                               <span class="">User Name </span>
                                                           </td>
                                                           <td class="" style="width: 10px">:</td>
                                                           <td class="text-white">
                                                          <span class="text-white text-wrap">
                                                              {{$contact->name}}
                                                          </span>

                                                           </td>
                                                       </tr>
                                                       <tr class="" style="background-color: transparent !important;">
                                                           <td class="text-white-50 text-nowrap bg-transparent" style="max-width: 70px;min-width: content-box;">
                                                               <span class="">Email </span>
                                                           </td>
                                                           <td class="" style="width: 10px">:</td>
                                                           <td class="text-white">
                                                          <span class="text-white text-wrap">
                                                              {{$contact->email}}
                                                          </span>

                                                           </td>
                                                       </tr>
                                                       <tr class="" style="background-color: transparent !important;">
                                                           <td class="text-white-50 text-nowrap bg-transparent" style="max-width: 70px;min-width: content-box;">
                                                               <span class="">Phone</span>
                                                           </td>
                                                           <td class="" style="width: 10px">:</td>
                                                           <td class="text-white">
                                                          <span class="text-white text-wrap">
                                                              {{$contact->phone}}
                                                          </span>

                                                           </td>
                                                       </tr>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                           <div class="message ps-2 my-2">
                                               <label class="text-white-50">Message :</label>
                                               <div class="fw-light">
                                                   {{$contact->message}}
                                               </div>
                                           </div>
                                           <div class="bottom-0 end-0 position-absolute py-3 px-3">
                                               <span class="text-primary fw-bold">From SMT Website</span>
                                           </div>
                                       </div>
                                    </div>
                                    @else

                                    @endif

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
    logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
</script>


    <script>
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
                axios.delete('cont-delete/'+id).then(function (response) {
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
                    document.getElementById('col'+id).remove();
                    document.getElementById('row'+id).remove();
                    document.getElementById('del'+id).remove();
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

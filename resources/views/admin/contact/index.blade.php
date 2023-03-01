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
                                            <span class="fs-6 fw-light">Total :  {{$contact->count()}}</span>
                                        </div>
                                        @foreach($contact as $contact)
                                        <div class="bg-secondary w-100">
                                            <ul class="list-unstyled contact-nav mb-0">
                                                <a class="contact-link w-100 " href="{{url('admin/cont-show/'.$contact->id)}}" >
                                                    <li class="py-2 px-2 contact-item  text-white border border-1 border-secondary border-opacity-25">
                                                        <div class="d-flex justify-content-between align-items-start position-relative">
                                                            <div class="fw-light me-2 text-truncate">
                                                                <span class="sender">{{$contact->email}}</span><br>
                                                                <span class="subject">{{$contact->subject}}</span>
                                                            </div>
                                                            <span class="text-nowrap fw-light show-time mt-2">{{$contact->updated_at->diffForHumans()}}</span>
                                                            <div class="noti-ball d-none" ></div>
                                                        </div>
                                                    </li>
                                                </a>
                                            </ul>
                                        </div>
                                        @endforeach
                                        <div class="py-5" style="background-color: rgba(122,117,116,0.34)"></div>
                                    </nav>
                                </div>
                                <div class="col-10 col-lg-9 contact-detail px-0 ">
                                    <div class="w-100 position-relative d-flex justify-content-center py-3 ">
                                        <div class="contact-detail-paper pb-5 rounded rounded-2 rounded overflow-hidden text-white position-relative" style="min-height: 80vh;">
                                            <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center  opacity-50">
                                                <i class="bi bi-envelope-fill fs-1"></i>
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <span>Select an item to read</span>
                                                    <span class="fw-light">Nothing is selected</span>
                                                </div>
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
    logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
</script>
@endsection

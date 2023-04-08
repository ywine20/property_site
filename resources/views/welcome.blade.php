@extends('master')

@section('title', 'Home - SMT')
@section('content')
<!-- main -->
            <main class="main">
    <!-- slider -->
              <section id="slider bg-success">
                  <div class="slider-first-div overflow-hidden bg-secondary">
                    <div class="container-fluid px-0 h-100">
                      <div id="carouselExampleInterval" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                          @foreach($slider as $sl)
                                <div class="carousel-item h-100 @if($loop->first) active @endif" data-bs-interval="4000">
{{--                                    <div class="slider-image text-center">--}}
                                        <img src="{{  asset('storage/images/slider/'.$sl->image) }}" class="d-block w-100 h-100" alt="{{ $sl->image }}">
{{--                                    </div>--}}
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                  </div>

              </section>
    <!-- end slider -->
    <!-- counting -->
              <section id="counting">
                <div class="bg-secondary text-gold py-2 py-lg-0 shadow">
                 <div class="row row-cols-1 justify-content-between align-items-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto py-2 py-md-3 py-lg-4">
                    <table class="table counting-table table-borderless mb-0">
                      <tbody>
                        <tr>
                          <td class="counting-title">Happy Customer</td>
                          <td class="counting-title">Complete Projects</td>
                          <td class="counting-title">Strong Workforce</td>
                        </tr>
                        <tr>
                          <td class="fw-bold counting-number ">
                            <span class="counter text-primary">1400</span>+
                          </td>
                          <td class="fw-bold counting-number">
                            <span class="counter text-primary">150</span>+
                          </td>
                          <td class="fw-bold counting-number">
                            <span class="counter text-primary">300</span>+
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                 </div>
                </div>

              </section>
    <!-- end counting -->

    <!-- facebook post -->
        <section id="facebook-post">
            <div class="container p-1 pt-0 pb-0 pt-md-5 pb-md-3 p-md-2 p-lg-2 p-xl-5 position-relative" >
              <div class="row px-1 px-md-2 px-lg-5 pt-5 pb-0 py-md-3 pt-lg-5 pb-lg-3 fb-slider ">
                      @foreach($facebooklinks as $f)
                      <div class="col mb-3 mb-md-0 mx-1">
                          <div class="card fb-card border-0 shadow-sm">
                              <a href="{{$f->project_post_link}}" target="_blank">
                                  <img src="{{asset('storage/images/fbImages/'.$f->picture)}}" class="card-img-top" alt="..." style="object-fit:contain;">
                              </a>
                              <div class="card-body overflow-hidden" style="max-height:80px;" >
                            <span class= "fb-card-text card-text overflow-hidden">
                              <small>
                                  <a href="{{$f->project_post_link}}" target="_blank" class="text-decoration-none">
                                      {{$f->description}}
                                  </a>
                              </small>
                            </span>
                              </div>
                              <span class="fw-light w-100 px-2 py-2">
{{--                                <a href="#" class="text-white-50 text-decoration-none text-truncate page-link"><small> Sun Myat Tun Construction Co.,Ltd Jobs in Myanmar </small></a>--}}
                                  {{--                                  </a>--}}
                            </span>
                              <div class="position-absolute px-1 bg-secondary shadow" style="border-radius: 0 0 60% 0%;">
                                  <a href="{{$f->project_post_link}}" target="_blank" >
                                      <i class="bi bi-facebook fa-2x text-primary"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                    <div class="seemore-fb justify-content-center align-items-center px-2 px-xl-3 py-1 py-xl-2 rounded rounded-pill" >
                      <a href="https://www.facebook.com/Sunmyattun" target="_blank" class="text-decoration-none text-black-50 ">
                          See More &nbsp;<i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                    <div class="text-end px-3 d-md-none">
                      <a href="https://www.facebook.com/Sunmyattun" target="_blank">
                        <span class="text-secondary go-to-arrow">
                            Go To Facebook Page
                        </span>
                      </a>
                    </div>
                </div>


              </section>
    <!-- end facebook post -->
    <!-- project -->
              <section id="project">
                <div class="container d-flex flex-column justify-content-center align-items-center mx-auto px-0 pb-2 pb-lg-4 pb-xl-0">
                    <!-- <div class="row  text-center px-2 py-1 pt-2 pt-md-3 pt-xl-0 py-md-2 pb-md-4 py-lg-0">
                      <div class="col-12 mx-auto project-heading">
                        <span class="fs-1 fw-bold text-secondary">Our Running Projects</span>
                        <p class="text-black-50 pt-2 pt-lg-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam fugiat ipsam sequi ipsa deleniti necessitatibus, vero, totam ut quasi porro illo doloremque quidem eligendi minima quaerat veritatis tempore, error ducimus.</p>
                      </div>
                    </div> -->
                    <div class="row row-cols-1 row-cols-md-2 g-2 g-md-3 g-lg-4 mb-0 mb-lg-3 mb-xl-5 pb-4 pb-md-5  pb-lg-3 pb-xl-5 px-3 px-lg-0">


                @foreach($projects as $p)
                  <div class="col">
                    <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
                    <div class="project-card card mb-2 mb-md-3 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                      <div class="row row-cols-1 h-100 w-100 g-0">
                        <div class="col-5 ">
                          <img src="{{ asset('storage/images/cover/'.$p->cover) }}" class="rounded-start project-img" alt="..." style="width:100%;height:100%;">
                        </div>
                        <div class="col-7 bg-secondary">
                          <div class="card-body  text-primary px-2 px-md-2 px-lg-4 my-0 my-lg-4" >
                            <h5 class="card-title text-primary addressTitle">
                              No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward,

                              @foreach ($towns as $t)
                                @if($t->id==$p->township_id)
                                  {{$t->name}} TownShip,
                                @endif
                              @endforeach

                              @foreach ($cities as $c)
                                @if($c->id==$p->city_id)
                                  {{$c->name}}
                                @endif
                              @endforeach
                            </h5>
                            <h3 class="fw-bold my-1 my-md-3 range text-primary">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</h3>
                            <table class="table tb-sm project-card-table table-borderless mb-1">
                              <tbody>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">ID No</td>
                                  <td>: {{ $p->project_name }}</td>
                                </tr>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">No. of Units</td>
                                  <td>: {{ $p->layer }}</td>
                                </tr>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">Est.Sq Feet </td>
                                  <td>: {{ $p->squre_feet }} ft<sup class="text-primary">2</sup></td>
                                </tr>
                              </tbody>
                            </table>
{{--                            <p class="p-1 m-1 text-primary"> hello</p>--}}
                              <span class="card-text d-block my-0 my-lg-0 my-xl-3 entity text-primary fw-light">

                             @foreach ($amenities as $am)
                              @foreach($p->amenity as $pm)
                                        @if($pm->id==$am->id)
                                            {{ $am->amenity }},
                                        @endif
                              @endforeach
                            @endforeach
                              </span>

                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>
             @endforeach
            </section>
    <!-- end project -->
    <!-- about -->
              <section id="about">
                <div class="container-fluid bg-transparent px-0" >
                  <div class="container bg-transparent px-0 overflow-hidden">
                     <div class="row row-cols-1 row-cols-md-2 p-0 p-md-2 p-lg-3 p-xl-5">
                      <div class="col px-0 d-flex d-md-none">
                        <img src="./image/Subtraction 2.png" alt="" class="img-fluid" style="margin-top:-6px;">
                      </div>
                      <div class="col px-0 d-none d-md-none d-lg-none" style="min-height:200px;">
                        <!-- <img src="./image/about-tablet.png" alt="" class="img-fluid" style="margin-top:-4px;"> -->
                      </div>
                      <!-- px-0 px-md-2 px-lg-3 py-0 py-md-2 py-lg-3 -->
                      <div class="col  px-4 px-xl-5 text-center text-md-start text-lg-start ">
                        <h4 class="text-uppercase fw-bold text-gold about-heading mt-md-3 mt-2 mt-lg-2 mb-4">About Our Organization</h4>
                        <div class="text-gold overflow-hidden">
                          <p class="about-text text-gold">
                              Sun Myat Tun, popularly known as SMT, was establish in 2009. SMT mainly focus on started building infrastructure projects for roads, bridges and power lines.
                          </p>
                          <p class="about-text  text-gold">
                              In 2011, SMT entered the building of accommodation housing for government institutions. In 2013, SMT initiated the development of Low-Cost Housing by joint development with landowners.
                          </p>
                          <p class="about-text  text-gold">
                              In 2020, Estate Owl has 155 joint development projects and providing thousands of homes to local people within ten years from 2013 up to 2023. SMT successfully handled many Turnkey Projects by government in 2018 and 2019.
                          </p>
                        </div>
                      </div>
                     </div>
                  </div>
                </div>

              </section>
    <!-- end about -->
    <!-- contact -->
              <section id="contact">
                  <div class="container pt-3 py-lg-3">
                    <div class="row p-2 p-lg-5 flex-column  text-center justify-content-center align-items-center">
                      <div class="col-12">
                          <h5 class="fw-bold text-grey send-message-heading">Send Message For More Information</h5>
                          <span class="text-black-50 fs-6 send-message-heading-small">Our team will response as soon as possible</span>
                      </div>
                      <div class="col-12">
                        <div class="my-4 send-message-input mx-auto">
                          <div class="input-group input-group-lg mb-3">

                            <input type="text" class="form-control bg-primary bg-opacity-25 rounded send-input-tag" value="" placeholder="Freely Contact Our Team" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary text-gold fw-bold rounded rounded-start" type="button" id="button-addon2">
                              <form id="sendMail" method="post" action="mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=This is only a test!">
                                <a href="mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=This is only a test!" class="text-decoration-none" id="sendBtn">SEND</a>
                              </form>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
    <!-- end contact -->
            </main>
<!-- end main -->

@endsection
@section('script')

@endsection
@push('clientScript')
    <script>
        //small function
        let entity = document.querySelectorAll('.entity');
        const subText = (text) =>{
            return text.substring(0, 60) + '...';
        }
        for(let i=0; i<= entity.length;i++){
            let realText = entity[i].innerText;
            let changeText = subText(realText);
            entity[i].innerText = changeText;
        }

    </script>
@endpush
@push('clientScript')
    <script>
        let address = document.querySelectorAll('.addressTitle') ;
        const addressSubText = (text) =>{
            return text.substring(0, 65) + '...';
        }
        for(let i=0; i<= address.length;i++){
            let realAddress = address[i].innerText;
            if(realAddress.length > 65){
                let changeAddress = addressSubText(realAddress);
                address[i].innerText = changeAddress;

            }else{
                let changeAddress = realAddress;
                address[i].innerText = changeAddress;

            }
        }
    </script>
@endpush

@extends('admin.master')

@section('content')
            <!--                start content-->
            <div class="content">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="address.html">Address</a></li>
                                <li class="breadcrumb-item active">Create</li>
                                <!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="w-100 ">
                        <div class="py-3 px-3">
                            <div class="row create flex-column">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="mb-3 text-primary header">Address Create</h4>
                                        <a href="address.html">
                                            <i class="bi bi-list fs-3 "></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 col-lg-6 ">
                                  <div class="mb-5">
                                      <form action="" class="create-form">
                                          <div class="row gx-1 d-flex flex-column flex-md-row justify-content-start align-items-end">
                                              <div class="col-12 col-md-8">
                                                  <label for="cityORState" class="form-label">City/State :</label>
                                                  <input type="text" id="cityORState" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Mandalay">
                                              </div>
                                              <div class="col-12 col-md-4 d-flex justify-content-end align-items-center justify-content-md-start">
                                                  <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1 ms-2 px-4">Create</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                </div>
                                <div class="col-12 col-md-8 col-lg-6 ">
                                   <div class="mb-5">
                                       <form action="" class="create-form">
                                           <div class="row gx-1 d-flex flex-column flex-md-row justify-content-start align-items-end">
                                               <div class="col-12 col-md-8">
                                                   <label for="townShip" class="form-label">Township :</label>
                                                   <input type="text" id="townShip" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Yangon">
                                               </div>
                                               <div class="col-12 col-md-4 d-flex justify-content-end align-items-center justify-content-md-start">
                                                   <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1 ms-2 px-4">Create</button>
                                               </div>
                                           </div>
                                       </form>
                                   </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                end content-->
        </div>
        <!--            end Nav-->
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

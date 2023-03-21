@extends('master')

@section('title', 'Profile - SMT')
@section('content')

<!-- main -->
<main class="main">
    <section id="profile">
        <div class="w-100 d-flex flex-column align-items-center justify-content-center py-5">
            <div class="row d-flex justify-content-center align-items-center w-100 gap-4 gap-md-2">
                <div class="col-9  col-md-4 col-lg-3 d-flex justify-content-center justify-content-md-end align-items-center">
                    <div class="overflow-hidden rounded rounded-circle border border-4 border-primary profile-image">
                        <img src="{{asset('/image/smtlogoLarge.png')}}" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-9 col-md-4 col-lg-3 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="text-center text-md-start  profile-info">
                        <span class="fw-bold text-primary name">Mr.John Doe</span><br>
                        <span class=" text-black-50 email">johndoe@gmail.com</span><br>
                        <span class=" text-black-50 phone">09876543211</span>
                    </div>
                </div>
            </div>
            <div class="row w-100 py-5 d-flex justify-content-center ">
                <div class="col-10 col-md-8 col-lg-6 bg-light d-flex justify-content-center align-items-center px-0">
                    <div id="tier" class="position-relative w-100">
                        <div class="bg-black bg-opacity-10 w-100 progress-bg"></div>
                        <div class="bg-primary position-absolute start-0 top-0 progress-percent-bar "></div>
                        <div class="overflow-hidden my-1 tier bronze">
                            <img src="{{asset('/image/tier/bronze.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier silver">
                            <img src="{{asset('/image/tier/silver.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier gold">
                            <img src="{{asset('/image/tier/gold.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier platinum">
                            <img src="{{asset('/image/tier/platinum.png')}}" alt="" class="w-100 h-100" />
                        </div>
                        <div class="overflow-hidden my-1 tier diamond">
                            <img src="{{asset('/image/tier/diamond.png')}}" alt="" class="w-100 h-100" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="authorize">
        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active  text-secondary"  href="{{route('profile')}}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('profile-setting')}}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{route('profile-redeem')}}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->
            <div class="py-2 px-3 p-md-5 my-3  mx-lg-3 mx-xl-5 text-center">
                <div class="text-black-50 text-center table-explain">
                    Lorem ipsum dolor sit aloremmet consectetur adipisicing e
                    lit. Soluta, ab ad. A quam officiis error hic odi
                    t reprehenderit quod quisquam, quae, laudantium non v
                    eniam dolore dignissimos eius, esse saepe et! Lorem ip
                    sum dolor sit amet consectetur adipisicing elit. Voluptates vit
                    ae, alias enim eum ipsa repellendus accusamus veritatis nostrum cupi
                    ditate earum fuga, quasi explicabo iure esse possimus libero eius minus nisi.
                </div>
            </div>

            <div class="authorized-assets-table px-2 px-md-5 mb-5  mx-lg-3 mx-xl-5">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-secndary text-primary">
                            <tr class="bg-secondary text-primary">
                                <th scope="col" class="text-primary text-nowrap">Project ID</th>
                                <th scope="col" class="text-primary text-nowrap w-25">Address</th>
                                <th scope="col" class="text-primary text-nowrap w-25">Lastest Progress</th>
                                <th scope="col" class="text-primary text-center text-nowrap">Legal Document</th>
                                <th scope="col" class="text-primary text-center text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P0031</td>
                                <td>No(19/21) lower block, 45 st, Botahtaung Township, Yangon</td>
                                <td class="site-progress">Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti</td>
                                <td class="text-center">
                                    <i class="bi bi-check2 fs-3 text-success "></i>
                                </td>
                                <td class="text-center">
                                    <a href="">
                                        <i class="bi bi-eye fs-4 text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>P0031</td>
                                <td>No(19/21) lower block, 45 st, Botahtaung Township, Yangon</td>
                                <td class="site-progress">Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti</td>
                                <td class="text-center">
                                    <i class="bi bi-x  fs-3 text-danger"></i>
                                </td>
                                <td class="text-center">
                                    <a href="#">
                                        <i class="bi bi-eye fs-4 text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                             <tr>
                                <td>P0031</td>
                                <td>No(19/21) lower block, 45 st, Botahtaung Township, Yangon</td>
                                <td class="site-progress">Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti Lorem ipsum dolor sit amet consectetur adipisicing elit. Disti</td>
                                <td class="text-center">
                                <i class="bi bi-check2 fs-3 text-success "></i>
                                </td>
                                <td class="text-center">
                                    <a href="#">
                                        <i class="bi bi-eye fs-4 text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </section>
</main>
@endsection
@push('clientScript')
<script>
    //small function
    let siteProgress = document.querySelectorAll('.site-progress');
    const subText = (text) => {
        return text.substring(0, 80) + '...';
    }
    for (let i = 0; i <= siteProgress.length; i++) {
        let realText = siteProgress[i].innerText;
        let changeText = subText(realText);
        siteProgress[i].innerText = changeText;
    }
  
</script>

</script>
@endpush
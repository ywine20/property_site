@extends('master')

@section('title', 'Profile- SMT')
@section('content')

<!-- main -->
<main class="main">

    <x-profile :user='$user' />
    <section id="authorize">
        <div class="w-100 bg-white">
            <!-- SUB NAV -->
            <div class="px-1 px-md-2 px-lg-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active  text-secondary" href="{{ route('profile', Auth::guard('user')->user()->id) }}">Authorize Asset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('profile.setting', Auth::guard('user')->user()->id) }}">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('profile.redeem', Auth::guard('user')->user()->id) }}">Redeem</a>
                    </li>
                </ul>
            </div>
            <!-- END SUB NAV -->
            <div class="py-2 px-3 p-md-5 my-3  mx-lg-3 mx-xl-5 text-center d-none">
                <div class="text-black-50 text-center table-explain">
                    lit. Soluta, ab ad. A quam officiis error hic odi
                    t reprehenderit quod quisquam, quae, laudantium non v
                    eniam dolore dignissimos eius, esse saepe et! Lorem ip
                    sum dolor sit amet consectetur adipisicing elit. Voluptates vit
                    ae, alias enim eum ipsa repellendus accusamus veritatis nostrum cupi
                    ditate earum fuga, quasi explicabo iure esse possimus libero eius minus nisi. Lorem ipsum dolor sit
                    aloremmet consectetur adipisicing e

                </div>
            </div>

            <div class="authorized-assets-table px-2 px-md-5 mb-5  mx-lg-3 mx-xl-5 py-4 py-md-5 ">
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



                            @if (count($assets) > 0)
                            @foreach ($assets as $asset)
                            <tr>
                                <td> {{$asset->project->project_name}}</td>
                                <td>No ({{$asset->project->hou_no}}), {{$asset->project->street}} Street,
                                    {{$asset->project->ward}} Ward, {{$asset->project->town->name}} Township,
                                    {{$asset->project->city->name}}.
                                </td>
                                <td class="">
                                    @if ($asset->site_progress == 1)
                                    @php
                                    $latestSiteProgressTitle = $asset->project->siteProgresses()->latest()->pluck('title')->first();
                                    @endphp
                                    @if($latestSiteProgressTitle)
                                    {{$latestSiteProgressTitle}}
                                    @else
                                    -
                                    @endif
                                    @else
                                    <i class="bi bi-x-lg fs-3 text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($asset->legal_document == 1)
                                    <i class="bi bi-check2 fs-3 text-success "></i>
                                    @else
                                    <i class="bi bi-x-lg fs-3 text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('detail/' . $asset->project_id) }}" target="_blank">
                                        <i class="bi bi-eye fs-4 text-primary"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td colspan='5'>No projects found.</td>
                            </tr>
                            @endif
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

    for (let i = 0; i < siteProgress.length; i++) {
        let realText = siteProgress[i].innerText;
        if (realText.length > 80) {
            let changeText = subText(realText);
            siteProgress[i].innerText = changeText;
        } else {
            siteProgress[i].innerText = realText;
        }
    }
</script>
@endpush
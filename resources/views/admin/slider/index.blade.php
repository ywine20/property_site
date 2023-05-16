@extends('admin.master')

@section('content')
    <!-- start content -->
    <div class="content">
        <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
            <!-- breadcrumb -->
            <div class="bg-secondary bg-opacity-50 px-2 py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active">Slider_Image</li>
                    </ol>
                </nav>
            </div>
            <!-- end breadcrumb -->
            <div class="py-3 px-3">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <h3 class="col-12 text-primary mb-3">Slider Image</h3>
                    <div class="col-12 d-none">
                        <div
                            class="d-flex justify-content-end align-items-center bg-secondary bg-opacity-50 rounded px-3 py-1 ">
                            <a href="#" class="mx-1 trash-icon px-2 py-1 d-none" id="multiple_deletion">
                                <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                            </a>
                            <a href="{{ route('slider.create') }}" class="mx-1 create-btn px-2 py-2 rounded">
                                <i class="bi bi-plus-circle"></i>
                                Create Slider Image
                            </a>
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <div class="my-3">
                            <div class="card bg-secondary table-card">
                                <div class="card-body">
                                    <div class="w-100 table-responsive-sm">
                                        <table id="table_SliderImage"
                                            class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                            <thead class="">
                                                <tr class="bg-primary text-secondary">
                                                    <!--                                                        <th class="text-center" data-orderable="false">-->
                                                    <!--                                                            <input type="checkbox" id="allSelect" name="allSelect" class="form-check-input border-secondary">-->
                                                    <!--                                                        </th>-->
                                                    <th class="text-center" style="max-width:80px;">No.</th>
                                                    <th class="text-center" data-orderable="false">Photo</th>
                                                    <th class="text-center" data-orderable="false">Action</th>
                                                    <th class="text-nowrap text-center">Modify Date</th>

                                                </tr>
                                            </thead>
                                            <tbody class="bg-secondary text-white">
                                                @foreach ($slider as $item)
                                                    <tr>
                                                        <!--                                                        <td class="text-center">-->
                                                        <!--                                                            <input type="checkbox" name="chk" class="form-check-input">-->
                                                        <!--                                                        </td>-->
                                                        <th scope="row" class="text-center">{{ $item->id }}</th>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <div class="slider-photo rounded overflow-hidden">
                                                                @if (isset($item->image))
                                                                    <img src="{{ asset('storage/images/slider/' . $item->image) }}"
                                                                        alt="">
                                                                @else
                                                                    <img src="{{ asset('/images/photoPlaceholderWhite.png') }}"
                                                                        alt="">
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <a href="{{ route('slider.edit', $item->id) }}"
                                                                        class="  edit-icon px-2 py-1">
                                                                        <i
                                                                            class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fs-6 text-center text-nowrap">
                                                                {{ $item->updated_at->format('d-M-Y') }}<br>
                                                                <small>{{ $item->updated_at->diffForHumans() }}</small>
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
        //logoutt
        let logOut = document.querySelector('#logout');
        logOut.addEventListener('click', (e) => {
            e.preventDefault();
            logout();
        })
    </script>
@endsection

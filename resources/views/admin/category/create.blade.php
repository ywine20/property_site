@extends('admin.master')
@section('head')

@endsection
@section('content')
            <!--                start content-->
            <div class="content">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/category')}}">Category</a></li>
                                <li class="breadcrumb-item active">Create</li>
<!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="w-100 ">
                        <div class="py-3 px-3">
                            <div class="row create">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="mb-3 text-primary header">Category Create</h4>
                                        <a href="{{route('category.index')}}">
                                            <i class="bi bi-list fs-3 "></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 col-lg-6 ">
                                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
                                        @csrf
                                        <div class="row gx-1 d-flex flex-column flex-md-row justify-content-start align-items-start">
                                            <div class="col-12 col-md-8">
                                                <label for="categoryName" class="form-label">Category Name :</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input type="text" required id="categoryName" autofocus class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 @error('category_name') is-invalid @enderror" name="category_name">
                                                @error('category_name')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4 d-flex justify-content-end align-items-center justify-content-md-start">
                                                <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Create</button>
                                            </div>
                                        </div>
                                    </form>
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

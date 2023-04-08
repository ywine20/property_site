<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h5>User Form</h5>
                    <a href="" class="btn btn-secondary"> Back</a>
                 </div>
                 <form action="{{url('/user')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                        @error('title')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="profile_img"  value="{{old('profile_img')}}" class="form-control @error('profile_img') is-invalid @enderror">
                        @error('profile_img')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <Span class="invalid-feedback">{{$message}}</Span>
                        @enderror
                    </div> --}}

                    <button class="btn btn-primary">Save</button>
                 </form>

            </div>
        </div>
    </div>

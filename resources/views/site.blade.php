<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Post Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class=" bg-success py-3">
        <form action="{{ route('save-sitepost-gallery') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <h1>Site post gallery</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">

                    <div class="form-group m-3">
                        <label for="exampleInputEmail">Title</label>
                        <input value="{{ old('title') }}"type="text" name="title" class="form-control"
                            placeholder="Title">
                    </div>
                    <label for="exampleInputEmail">Description</label>
                    <div class="m-2">
                        <textarea name="description" cols="30" rows="10" value={{ old('description') }}></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">
                            Upload gallery
                        </label>
                        <div class="input-group m-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="galleries[]" multiple
                                    accept="" id='exampleInputFile'>
                                <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>
                            <div class="input-group-append">
                            </div>
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </div>
        </form>

        <div class="container mt-5">
            <div class="row">
                <!-- Display list of galleries -->
                @if (count($sitegalleries))
                    <div class="row">
                        @foreach ($sitegalleries as $sitegallery)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="{{ asset('storage/site_gallery/' . $sitegallery->gallery) }}"
                                        class="card-img-top">
                                    <div class="card-body">
                                        <p class="card-text">{{ $sitegallery->title }}</p>
                                        <p class="card-text">{{ $sitegallery->description }}</p>
                                        <!-- Delete button -->
                                        <form action="{{ route('site.delete', $sitegallery->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No galleries found.</p>
                @endif

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>

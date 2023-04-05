<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>


<body class="bg-dark">
    <div class="bg-primary py-3">
        <form action="{{ route('save-multipel-imgae') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="card-body">
                <h1>Album document</h1>

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

                <div class="form-group m-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title"
                        value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="albums">Upload Images</label>
                    <div class="input-group m-4">
                        <input type="file" name="albums[]" class="form-control" multiple accept="gallery/*">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Albums</button>
            </div>
        </form>
        @if (count($albums))
            <div class="row">
                @foreach ($albums as $album)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('storage/album/' . $album->album) }}" class="card-img-top"
                                alt="{{ $album->title }}">
                            <div class="card-body">
                                <p class="card-text">{{ $album->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No albums found.</p>
        @endif
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>

</html>

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

<body class=bg-dark>
    <div class=" bg-primary py-3">

        <form action="{{ route('save-multipel-imgae') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <h1>Album document</h1>
                <div class="form-group m-3 ">
                    <label for="emxampleInputEmail">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">
                        Upload Image
                    </label>
                    <div class="input-group m-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="album[]" multiple
                                id='exampleInputFile'>
                            <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                        <div class="input-group-append">

                        </div>
                        <button type="submit">Submit</button>
                    </div>
                </div>
                @foreach ($album as $img)
                    <img src="/public/storage/" alt="Image Alternative text"
                        title="Image Title" />
                @endforeach

        </form>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>

</html>

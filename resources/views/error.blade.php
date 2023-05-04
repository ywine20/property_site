<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <section class="error w-100 vh-100 d-flex justify-content-center align-items-center"
        style="background-color: #fea918;
    ">
        {{-- <h1>You do not have permission to access this page !</h1>
        <div class="back py-2 py-md-3">
            <button>
                <span class="backBtn" onclick="history.back()" style="cursor: pointer;">
                    <i class="bi bi-chevron-left"></i><i>Back</i>
                </span>
            </button>
        </div> --}}

        <div class="w-50">
            <img src="{{ asset('images/401_Error.jpg') }}" alt="" class="w-100 h-100">
        </div>
    </section>
</body>

</html>

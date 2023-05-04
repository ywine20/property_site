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
    <section class="error w-100 vh-100 d-flex justify-content-center align-items-center" style="background-color: #fea918;
    ">
      

        <div class="w-50 position-relative">
            <img src="{{ asset('images/401_Error.jpg') }}" alt="" class="w-100 h-100">
           
            <div class="w-100 position-absolute d-flex align-items-center justify-content-center">
                <button type="button" onclick="history.back()" class="btn bg-black text-white  d-flex align-items-center justify-content-center">
                    <i class="bi bi-chevron-left text-white"></i>Back
                </button>
            </div>
        </div>
    </section>
</body>

</html>
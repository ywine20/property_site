<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container py-4">

        <div class="row">
            <div class="col-12">
                <div class="header d-flex justify-content-between align-items-center mb-3">
                    <img src="{{ asset('image/smtlogo.png') }}" alt="" class="rounded"
                        style="width:40px;height:40px;">

                    <a href="{{ route('download-xlsx') }}"class="btn btn-primary">Download Excel</a>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="bg-primary bg-opacity-50">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col" class="text-center">Profile</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col" class="text-center">Tire</th>
                            <th scope="col">Modify Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td class="text-center"><img
                                    src="https://th.bing.com/th/id/OIP.1YM53mG10H_U25iPjop83QHaEo?pid=ImgDet&w=2880&h=1800&rs=1"
                                    alt="" class="rounded-circle"
                                    style="object-fit: cover; width: 40px; height: 40px;">
                            </td>
                            <td>John Doe</td>
                            <td>Johndoe@gmail.com</td>
                            <td>0912345678</td>
                            <td class="text-center">silver</td>
                            <td>4.5.2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

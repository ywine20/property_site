<!DOCTYPE html>
<html>

<head>
    <title>sunmyattunmm.com</title>
</head>

<body>

    <h3>{{ $details['title'] }}</h3>

    <p>Dear {{ $details['userName'] }}, a good day to you, </p><br>
    {{-- <p>{{ $details['body'] }}</p> --}}

    <p>We had received your request for Password Reset.</p><br>


    <div>
        Your New Password :
        <h3 style="color:#F5CC7A">{{ $details['newPassword'] }}</h3>
    </div>

    <p>Thank you <br> Sun Myat Tun Customer Service Team.</p>

</body>

</html>

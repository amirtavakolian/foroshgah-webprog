<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/index/all.css')}}">
</head>
<body>

    <div class="contaner">
        <div class="form">
            <form action="{{ route('otp.process') }}" method="post">
                <input type="text" name="opt">
                <input type="submit" value="ثبت">
            </form>
        </div>
    </div>

    <script src="{{ asset('js/index/all.js') }}"></script>
</body>
</html>

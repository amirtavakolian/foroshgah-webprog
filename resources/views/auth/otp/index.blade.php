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

    <br><br>
    <div class="contaner" style="display: flex;">
        <div class="form col-4">
            <form action="{{ route('otp.generate') }}" method="post" class="form-control">
                @csrf()
                <label>شماره خود را وارد کنید: </label>
                <input type="text" name="phone" class="form-group">
                <input type="submit" value="ثبت">
            </form>
        </div>
    </div>

    <script src="{{ asset('js/index/all.js') }}"></script>
</body>

</html>

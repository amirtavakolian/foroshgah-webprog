<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/panel/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel/bootstrap-select.min.css') }}">

    <title>Document</title>
</head>

<body>

    <form action="">

        <input type="text" name="user" id="">

        @if ($errors->has('user'))
            <div class="error">{{ $errors->first('user') }}</div>
        @endif


        <input type="text" name="pass" id="">

        @if ($errors->has('pass'))
            <div class="error">{{ $errors->first('pass') }}</div>
        @endif


        <input type="text" name="email" id="">

        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif


    </form>




</body>

</html>

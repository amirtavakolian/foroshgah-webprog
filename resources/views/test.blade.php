<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/panel/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/panel/bootstrap-select.min.css')}}">

    <title>Document</title>
</head>

<body>

    <select class="select" data-live-search="true" data-show-tick="true" data-multiple-separator=',' multiple>
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Barbecue</option>
    </select>

    <select id="filterAttributes" data-live-search="true" data-show-tick="true" data-multiple-separator=',' multiple></select>
    <select id="variableAttribute"></select>

    <script src="{{asset('js/panel/app.js')}}"></script>

    <script>
        $('.select').selectpicker();
        $('#filterAttributes').selectpicker();

        $('.select').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {

            $('.select').selectpicker('refresh')

            $('#filterAttributes').text(1);
            $('#filterAttributes').selectpicker('refresh');

            e.stopImmediatePropagation()
        });


    </script>
</body>

</html>

@extends('panel.layout.master')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 p-md-2 bg-white" id="mainDiv">
            <div class="mb-4">
                <h5 class="font-weight-bold">ایجاد ویژگی</h5>
            </div>
            <hr>
            @include('panel.sections.errors')
            <form action="{{ route('attribute.store') }}" method="POST">
                @csrf
                <div class="">
                    <div class="form-group col-md-3" id="createDiv">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name[]" type="text" {{ old('name') }}>
                    </div>
                </div>
                <button class="btn btn-success mt-5" type="submit">ثبت</button>
                <button class="btn btn-primary mt-5" type="submit" id="addField" data-toggle="1">اضافه کردن فیلد</button>
                <button class="btn btn-warning mt-5" type="submit" id="showAttributes">نمایش ویژگی ها</button>
                <a href="{{ route('attribute.index') }}" class="btn btn-danger mt-5 mr-3">بازگشت</a>
            </form>
        </div>
        <div class="col-xl-6 col-md-6 mb-4 p-md-2 bg-white fade" id="attributesTable">
            <div class="mb-4">
                <h5 class="font-weight-bold">ویژگی های موجود</h5>
            </div>
            <hr>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                    </tr>
                </thead>
                <tbody id="showTable">

                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const div = document.querySelector("div[class='form-group col-md-3']");
        const addField = document.querySelector("#addField");
        const showAttributes = document.querySelector("#showAttributes");
        const showTable = document.querySelector("#showTable");

        addField.addEventListener('click', function(event) {
            event.preventDefault();

            const newField = `
            <label for="name" class="mt-3">نام</label>
            <input class="form-control" id="name" name="name[]" type="text" {{ old('name') }}>
            `

            div.innerHTML += newField;
        });

        showAttributes.addEventListener('click', function(event) {
            event.preventDefault();

            if (addField.getAttribute('data-toggle') == 1) {
                addField.setAttribute('data-toggle', 0);
                showAttributesTable();
            } else {
                addField.setAttribute('data-toggle', 1);
                hideAttributes();
            }
        });

        function showAttributesTable() {
            const route = "{{ route('attribute.all') }}";
            const xhr = new XMLHttpRequest();

            xhr.open('post', route);
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send();

            xhr.addEventListener("load", function() {
                const jsonResponse = JSON.parse(xhr.responseText);
                let showTableValue = '';
                let counter = 1;

                mainDiv.classList.replace('col-xl-12', 'col-xl-6');
                mainDiv.classList.replace('col-md-12', 'col-md-6');
                createDiv.classList.replace('col-md-3', 'col-md-12');

                jsonResponse.forEach(function(value) {
                    showTableValue += `
                    <tr>
                        <th>${counter}</th>
                        <th>${value.name}</th>
                    </tr>
                    `
                    counter++;
                });

                showTable.innerHTML = showTableValue;
                attributesTable.classList.remove('fade');
                showAttributes.innerHTML = 'مخفی کردن ویژگی ها'
            });
        }


        function hideAttributes() {
            attributesTable.classList.add('fade');
            mainDiv.classList.replace('col-xl-6', 'col-xl-12');
            mainDiv.classList.replace('col-md-6', 'col-md-12');
            createDiv.classList.replace('col-md-12', 'col-md-3');
            showAttributes.innerHTML = 'نمایش ویژگی ها'
        }
    </script>
@endsection

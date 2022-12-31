@include('index.sections.head')

<body>
    <div class="wrapper">

        @include('index.sections.header')
        @include('index.sections.mobile')
        @yield('content')
        @include('index.sections.footer')


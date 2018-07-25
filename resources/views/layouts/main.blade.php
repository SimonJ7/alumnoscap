<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title' , 'Administración de estudiantes') | CAP Tarija</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" media="all"> 
    @yield('styles')
</head>

<body >

    <div class="container-fluid">
        <section>
            @include('home.header')
        </section>
        <section>
            @yield('content')
        </section>
        <section>
            @include('home.footer')
        </section>
    </div>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
        crossorigin="anonymous"></script>


    @yield('scripts')


</body>

</html>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
{{--    <link rel="stylesheet" href="style.css">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site2.partials.styles')
</head>
<body>
@include('site2.partials.header')
@include('site2.partials.nav')



@yield('content')
@include('site2.partials.footer')
@include('site2.partials.scripts')
</body>
</html>

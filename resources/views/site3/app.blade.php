<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="{{asset('frontend/css1/icofont.min.css')}}">

    <!-- Style CSS -->
{{--    <link rel="stylesheet" href="style.css">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site3.partials.styles')

</head>
<body>
@include('site3.partials.header')




@yield('content')
@include('site3.partials.footer')
@include('site3.partials.scripts')


<script type="text/javascript">

    $('#modal').on('show.bs.modal', function () {
        var myVal = $('.open-modal').data('id');
        var name = $('.open-modal').data('name');
        //alert(name);
        $(this).find('.product-name').text(myVal);
        //$(this).find('.product-name').text(name);


    });

</script>


</body>
</html>

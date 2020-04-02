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



    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        $('#ti').text($(this).data('name'));
        $('#by').text($(this).data('description'));
        $('#pr').text($(this).data('price'));
        $('#pr2').text($(this).data('price2'));
        $('#dr').attr("href",$(this).data('route'));
        // $('#im').text($(this).data('image'));

        $('#first_img').attr("src",$(this).data('image'));
        // $('.hover_img').attr("src",$(this).data('image2'));

        // $('#image').html($(this).data('image') );
        $('.modal-title').text('Show Post');
    });

</script>


</body>
</html>

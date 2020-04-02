<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css1/icofont.min.css')); ?>">

    <!-- Style CSS -->


    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
    <?php echo $__env->make('site3.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body>
<?php echo $__env->make('site3.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('site3.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('site3.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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
<?php /**PATH /Users/albert/minishop/resources/views/site3/app.blade.php ENDPATH**/ ?>
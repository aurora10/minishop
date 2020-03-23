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
<?php /**PATH /Users/albert/minishop/resources/views/site3/app.blade.php ENDPATH**/ ?>
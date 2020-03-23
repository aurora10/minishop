<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/main.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')); ?>"/>


</head>
<body class="app sidebar-mini rtl" >
<?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="app-content" id="app">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<script type="text/javascript" src="<?php echo e(asset('backend/js/app.js')); ?>"></script>

<script src="<?php echo e(asset('backend/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/plugins/pace.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH /Users/albert/minishop/resources/views/admin/app.blade.php ENDPATH**/ ?>
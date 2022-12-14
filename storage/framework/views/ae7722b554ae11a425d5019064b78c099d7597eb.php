<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/all.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/bootstrap.rtl.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/style-ar.css")); ?>">
</head>
<body>
    <div class="Draiwal_app">
        <?php echo $__env->yieldContent('header'); ?>
        <?php echo $__env->yieldContent('sidebar'); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\draiwal\resources\views/layouts/master.blade.php ENDPATH**/ ?>
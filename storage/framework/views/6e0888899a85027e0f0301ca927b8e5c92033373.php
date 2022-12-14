<!DOCTYPE html>
<?php if(app()->getLocale() == 'ar'): ?>
    <html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
    <?php else: ?>
        <html lang="<?php echo e(app()->getLocale()); ?>" dir="ltr">
        <?php endif; ?>
<head>
    <meta name="description" content="">

    <title><?php echo e(config('app.name')); ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin_assets/css/main-teal.css')); ?>" media="all">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin_assets/css/font-awesome.min.css')); ?>">

    <?php if(app()->getLocale() == 'ar'): ?>

        

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap">

        <style>
            body {
                font-family: 'cairo', 'sans-serif';
            }

            .breadcrumb-item + .breadcrumb-item {
                padding-left: .5rem;
            }

            .breadcrumb-item + .breadcrumb-item::before {
                padding-left: .5rem;
            }

            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                margin: 2px 2px;
            }
        </style>
    <?php endif; ?>

    
    <script src="<?php echo e(asset('admin_assets/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin_assets/js/jquery-ui.js')); ?>"></script>

    
    <link rel="stylesheet" href="<?php echo e(asset('admin_assets/plugins/noty/noty.css')); ?>">
    <script src="<?php echo e(asset('admin_assets/plugins/noty/noty.min.js')); ?>"></script>

    
    <script type="text/javascript" src="<?php echo e(asset('admin_assets/plugins/jquery.dataTables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_assets/plugins/dataTables.bootstrap/dataTables.bootstrap.min.js')); ?>"></script>

    
    <link rel="stylesheet" href="<?php echo e(asset('admin_assets/plugins/magnific-popup/magnific-popup.css')); ?>">

    
    
    
    
    
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(asset('admin_assets/css/custom.css')); ?>">

    <style>
        .loader {
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        .loader-sm {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #009688;
            width: 40px;
            height: 40px;
        }

        .loader-md {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #009688;
            width: 90px;
            height: 90px;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes  spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="app sidebar-mini">

<?php echo $__env->make('layouts.admin._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.admin._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="app-content">

    <?php echo $__env->make('admin.partials._session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <div class="modal fade general-modal" id="add-brand" aria-labelledby="add-brand" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>

</main><!-- end of main -->

<!-- Essential javascripts for application to work-->
<script src="<?php echo e(asset('admin_assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/bootstrap.min.js')); ?>"></script>


<script type="text/javascript" src="<?php echo e(asset('admin_assets/plugins/select2/select2.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin_assets/js/main.js')); ?>"></script>


<script src="<?php echo e(asset('admin_assets/plugins/ckeditor/ckeditor.js')); ?>"></script>


<script src="<?php echo e(asset('admin_assets/plugins/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


<script src="<?php echo e(asset('admin_assets/js/custom/index.js')); ?>"></script>
<script src="<?php echo e(asset('admin_assets/js/custom/roles.js')); ?>"></script>

<script>
    $(document).ready(function () {

        //delete
        $(document).on('click', '.delete, #bulk-delete', function (e) {

            var that = $(this)

            e.preventDefault();
    CKEDITOR.config.language = "<?php echo e(app()->getLocale()); ?>";

    //select 2
    $('.select2').select2({
        'width': '100%',
    });

</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\Draiwal\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>
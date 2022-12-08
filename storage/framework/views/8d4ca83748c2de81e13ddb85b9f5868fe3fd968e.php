<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo app('translator')->get('admin.admin'); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('ad.index')); ?>"><?php echo e(trans('admin.users')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.createuser')); ?></li>
    </ul>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">
                <form method="post" action="<?php echo e(route('ad.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                    </div>

                    <div class="form-group">
                    <label>Select to upload:</label>
                    <input name="image[]" type="file" class="form-control"  required>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/admin/advertisement/create.blade.php ENDPATH**/ ?>
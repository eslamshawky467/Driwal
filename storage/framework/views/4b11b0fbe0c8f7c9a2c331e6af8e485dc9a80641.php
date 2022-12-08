<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.admin')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        
        <li class="breadcrumb-item"><?php echo e(trans('admin.edit')); ?></li>
    </ul>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('car_model.update', $model->id)); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('put')); ?>

                    <?php echo csrf_field(); ?>
                 
                    <div class="form-group">
                        <label><?php echo e(trans('admin.model')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="model" class="form-control" value="<?php echo e(old('model')); ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>
                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/admin/car_models/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editdriver')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('driver.index')); ?>"><?php echo e(trans('admin.driver')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.editdriver')); ?></li>
    </ul>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('firebasedriver.update', 'test')); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($driver['start_cost']); ?>">
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $driver['name'])); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $driver['email'])); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $driver['phone_number'])); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.start_cost')); ?> <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="<?php echo e(old('start_cost',$driver['start_cost'])); ?>">
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-light"><i class="fa fa-edit"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/driverfirebase/edit.blade.php ENDPATH**/ ?>
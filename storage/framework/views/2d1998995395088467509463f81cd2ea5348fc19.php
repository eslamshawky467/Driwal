<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editAdmin')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admins.index')); ?>"><?php echo e(trans('admin.index')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.edit')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('admins.update')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(method_field('Patch')); ?>

                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($admin->id); ?>">
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $admin->name)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $admin->email)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.password')); ?> <span class="text-danger">*</span></label>
                        <input id="pass" type="password" name="password" rows="10" cols="30" class="form-control">
                        <br>
                        <input type="checkbox"  onclick="myFunction()"
                               id="exampleCheck1"><span><?php echo e(trans('admin.show')); ?></span>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.confirm')); ?> <span class="text-danger">*</span></label>
                        <input id="confirm" type="password" name="password_confirmation" rows="10" cols="30" class="form-control"  >
                        <br>
                        <input type="checkbox"  onclick="myFunction2()"
                               id="exampleCheck1"><span><?php echo e(trans('admin.show')); ?></span>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/admins/edit.blade.php ENDPATH**/ ?>
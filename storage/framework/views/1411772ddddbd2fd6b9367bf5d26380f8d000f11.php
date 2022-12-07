<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.admin')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admins.index')); ?>"><?php echo e(trans('admin.index')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.create')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('admins.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>

                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="<?php echo e(old('name')); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.password')); ?> <span class="text-danger">*</span></label>
                        <input id="pass" type="password" name="password" rows="10" cols="30" class="form-control">
                        <br>
                        <input type="checkbox"  onclick="myFunction3()"
                               id="exampleCheck1"><span><?php echo e(trans('admin.show')); ?></span>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.confirm')); ?> <span class="text-danger">*</span></label>
                        <input id="confirm" type="password" name="password_confirmation" rows="10" cols="30" class="form-control" >
                        <br>
                        <input type="checkbox"  onclick="myFunction4()"
                               id="exampleCheck1"><span><?php echo e(trans('admin.show')); ?></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
function myFunction3() {
var x = document.getElementById("pass");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
function myFunction4() {
var x = document.getElementById("confirm");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\daiwal\resources\views/admin/admins/create.blade.php ENDPATH**/ ?>
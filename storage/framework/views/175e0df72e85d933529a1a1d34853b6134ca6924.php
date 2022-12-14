<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.creat_car_types')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        
        <li class="breadcrumb-item"><?php echo e(trans('admin.create_car_type')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
               
                <form method="post" action="<?php echo e(route('car_type.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>

                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.type_en')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="type_en" autofocus class="form-control" value="<?php echo e(old('type_en')); ?>">
                    </div>

                   
                   <div class="form-group">
                    <label><?php echo e(trans('admin.type_ar')); ?> <span class="text-danger">*</span></label>
                    <input type="text" name="type_ar" autofocus class="form-control" value="<?php echo e(old('type_ar')); ?>">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/car_types/create.blade.php ENDPATH**/ ?>
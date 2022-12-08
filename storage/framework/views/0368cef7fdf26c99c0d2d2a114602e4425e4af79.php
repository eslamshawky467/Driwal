<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.createcompany')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('Companies.index')); ?>"><?php echo e(trans('admin.Companies')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.createcompany')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('Companies.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>

                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="<?php echo e(old('name')); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" autofocus class="form-control" value="<?php echo e(old('phone_number')); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>

                    
                    <input type="hidden" name="password" value="password">

                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.status')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                            <option value="active"><?php echo e(trans('admin.active')); ?></option>
                            <option value="inactive"><?php echo e(trans('admin.inactive')); ?></option>
                        </select>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/companies/create.blade.php ENDPATH**/ ?>
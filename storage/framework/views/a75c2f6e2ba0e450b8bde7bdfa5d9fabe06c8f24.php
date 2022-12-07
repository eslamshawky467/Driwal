<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.createdriveraccount')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('driversaccounts.index')); ?> "><?php echo e(trans('admin.driversaccounts')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.createdriveraccount')); ?></li>
    </ul>
    <?php if(session()->has('message')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo e(session()->get('message')); ?></strong>

    </div>
<?php endif; ?>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('driversaccounts.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>

                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.name')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="driver_id"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($driver->id); ?>"><?php echo e($driver->name); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.status')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="status"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <option value="pending"><?php echo e(trans('admin.pending')); ?></option>
                                         <option value="approved"><?php echo e(trans('admin.approved')); ?></option>
                                         <option value="canceled"><?php echo e(trans('admin.canceled')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.files')); ?> <span class="text-danger">*</span></label>
                                <input type="file"  name="files[]" autofocus class="form-control" accept="image/*" multiple required>
                            </div>
                        </div>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/driver/drivers_accounts/create.blade.php ENDPATH**/ ?>
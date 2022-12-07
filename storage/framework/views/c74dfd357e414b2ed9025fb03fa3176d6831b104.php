<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.createzone')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('zones.index')); ?> "><?php echo e(trans('admin.zone')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.createzone')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('zones.store')); ?>" >
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>

                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                                <input type="text" name="name" autofocus class="form-control" value="<?php echo e(old('name')); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.distance')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="distance"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <?php $__currentLoopData = $distances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($distance->distance); ?>"><?php echo e($distance->distance); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.from_time')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="from_time"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($time->time); ?>"><?php echo e($time->time); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.to_time')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="to_time"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <?php $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($time->time); ?>"><?php echo e($time->time); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.package')); ?>

                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="package_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                     <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(app()->getLocale()=='ar'): ?>
                                            <option value="<?php echo e($package->id); ?>"><?php echo e($package->name_ar); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($package->id); ?>"><?php echo e($package->name_en); ?></option>
                                        <?php endif; ?>

                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.distance_time_price')); ?> <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="distance_time_price" autofocus class="form-control" value="<?php echo e(old('distance_time_price')); ?>" required>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/zones/create.blade.php ENDPATH**/ ?>
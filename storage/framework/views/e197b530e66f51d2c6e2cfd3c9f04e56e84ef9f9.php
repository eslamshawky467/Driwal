<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.createdriver')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('driver.index')); ?>"><?php echo e(trans('admin.driver')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.createdriver')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('driver.store')); ?> " enctype="multipart/form-data">
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
                        <label><?php echo e(trans('admin.id_number')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="id_number" autofocus class="form-control" value="<?php echo e(old('id_number')); ?>">
                    </div>
                      
                      <div class="form-group">
                        <label><?php echo e(trans('admin.license_expiration')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" autofocus class="form-control" value="<?php echo e(old('license_expiration')); ?>">
                    </div>
                      
                      <div class="form-group">
                        <label><?php echo e(trans('admin.license_number')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="license_number" autofocus class="form-control" value="<?php echo e(old('license_number')); ?>">
                    </div>

                     
                     <div class="form-group">
                        <label><?php echo e(trans('admin.number_plate')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="number_plate" autofocus class="form-control" value="<?php echo e(old('number_plate')); ?>">
                    </div>

                     
                     <div class="form-group">
                        <label><?php echo e(trans('admin.transport_year')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" autofocus class="form-control" value="<?php echo e(old('transport_year')); ?>">
                    </div>

                     
                     <div class="form-group">
                        <label><?php echo e(trans('admin.governorate')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="governorate" autofocus class="form-control" value="<?php echo e(old('governorate')); ?>">
                    </div>

                     
                     <div class="form-group">
                        <label><?php echo e(trans('admin.neighborhood')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="neighborhood" autofocus class="form-control" value="<?php echo e(old('neighborhood')); ?>">
                    </div>

                     
                     <div class="form-group">
                        <label><?php echo e(trans('admin.street')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="street" autofocus class="form-control" value="<?php echo e(old('street')); ?>">
                    </div>

                    
              
                
                <div class="form-group">
                  <label><?php echo e(trans('admin.building_number')); ?> <span class="text-danger">*</span></label>
                  <input type="number" name="building_number" autofocus class="form-control" value="<?php echo e(old('building_number')); ?>">
              </div>

                    
                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.start_cost')); ?> <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="<?php echo e(old('start_cost')); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>

                    
                    
                    <input type="hidden" name="password" value="password">

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.files')); ?> <span class="text-danger">*</span></label>

                        <input
                        name="files[]"
                        type="file"
                        class="form-control"
                        multiple required>
                    </div>

                    
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
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.nationality')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="nation"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <?php $__currentLoopData = $nationlities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(app()->getLocale() == 'en'): ?>
                                    <option value="<?php echo e($nation->id); ?>"><?php echo e($nation->name_en); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($nation->id); ?>"><?php echo e($nation->name_ar); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('driver.model')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_model"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <option value="<?php echo e($car_model->id); ?>"><?php echo e($car_model->model); ?></option>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('driver.type')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_type"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(app()->getLocale() == 'en'): ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->type_en); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->type_ar); ?></option>
                            <?php endif; ?>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/driver/create.blade.php ENDPATH**/ ?>
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
                <form action="<?php echo e(route('driver.update', 'test')); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($driver->id); ?>">
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $driver->name)); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $driver->email)); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $driver->phonenumber)); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.start_cost')); ?> <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="<?php echo e(old('start_cost',$driver->start_cost)); ?>">
                    </div>

                    
                    <input type="hidden" name="password" value="password">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.cars')); ?>:</label>
                                <select  class="form-select" aria-label="Default select example" name="type_id"id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                    <?php if(app()->getLocale() == 'en'): ?>
                                        <option value="<?php echo e($driver->type->id); ?>" selected><?php echo e($driver->type->type_en); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($driver->type->id); ?>" selected><?php echo e($driver->type->type_ar); ?></option>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                            <option value="<?php echo e($car->id); ?>"><?php echo e($car->type_en); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($car->id); ?>"><?php echo e($car->type_ar); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.carsmodels')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="model_id"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                         <option value="<?php echo e($driver->model->id); ?>" selected><?php echo e($driver->model->model); ?></option>
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($model->id); ?>"><?php echo e($model->model); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.nationality')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="nation"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                                    <option type="hidden" value="<?php echo e($driver->nationality_id); ?>"><?php echo e((app()->getLocale()=='ar')?$driver->nation->name_ar:$driver->nation->name_en); ?></option>
                                    <?php $__currentLoopData = $nationlities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nation->id); ?>"><?php echo e((app()->getLocale()=='ar')? $nation->name_ar:$nation->name_en); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.status')); ?>

                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="status"
                                    id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                    <option type="hidden" value="<?php echo e($driver->status); ?>"><?php echo e(trans('admin.'.$driver->status)); ?></option>
                                    <option value="active"><?php echo e(trans('admin.active')); ?></option>
                                    <option value="inactive"><?php echo e(trans('admin.inactive')); ?></option>
                                </select>
                            </div>

                        </div>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/driver/edit.blade.php ENDPATH**/ ?>
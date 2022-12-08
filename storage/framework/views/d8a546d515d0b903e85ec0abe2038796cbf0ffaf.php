<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editdriver')); ?></h2>
    </div>
    <?php if(session()->has('Add')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('Add')); ?></strong>
        </div>
    <?php endif; ?>
    <?php if(session()->has('delete')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('delete')); ?></strong>

        </div>
    <?php endif; ?>
    <?php if(session()->has('edit')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('edit')); ?></strong>
        </div>
    <?php endif; ?>

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
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $driver->name)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $driver->email)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $driver->phonenumber)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.start_cost')); ?> <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="<?php echo e(old('start_cost',$driver->start_cost)); ?>" required>
                    </div>

                
                <div class="form-group">
                    <label><?php echo e(trans('admin.id_number')); ?> <span class="text-danger">*</span></label>
                    <input type="number" name="id_number" class="form-control" value="<?php echo e(old('id_number', $driver->id_number)); ?>" required>
                </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.license_number')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="license_number" class="form-control" value="<?php echo e(old('license_number', $driver->license_number)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.license_expiration')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" class="form-control" value="<?php echo e(old('license_expiration', $driver->license_expiration)); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('admin.license_expiration')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" class="form-control" value="<?php echo e(old('license_expiration')); ?>" required >
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.transport_year')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" class="form-control" value="<?php echo e(old('transport_year', $driver->transport_year)); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('admin.transport_year')); ?> <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" class="form-control" value="<?php echo e(old('transport_year')); ?>" required>
                    </div>


                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.number_plate')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="number_plate" class="form-control" value="<?php echo e(old('number_plate', $driver->number_plate)); ?>"required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.governorate')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="governorate" class="form-control" value="<?php echo e(old('governorate', $driver->governorate)); ?>"required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.neighborhood')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="neighborhood" class="form-control" value="<?php echo e(old('neighborhood', $driver->neighborhood)); ?>"required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.street')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="street" class="form-control" value="<?php echo e(old('street', $driver->street)); ?>"required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.building_number')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="building_number" class="form-control" value="<?php echo e(old('building_number', $driver->building_number)); ?>"required>
                    </div>

                    
                    <input type="hidden" name="password" value="password">

                    
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

                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.types')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_type"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                            <option type="hidden" value="<?php echo e($driver->type_id); ?>"><?php echo e((app()->getLocale()=='ar')?$driver->type->type_ar:$driver->type->type_en); ?></option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($car_type->id); ?>"><?php echo e((app()->getLocale()=='ar')? $car_type->type_ar:$car_type->type_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.model')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_model"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                            <option type="hidden" value="<?php echo e($driver->model_id); ?>"><?php echo e($driver->model->model); ?></option>
                            <?php $__currentLoopData = $car_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($car_model->id); ?>"><?php echo e($car_model->model); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/driver/edit.blade.php ENDPATH**/ ?>
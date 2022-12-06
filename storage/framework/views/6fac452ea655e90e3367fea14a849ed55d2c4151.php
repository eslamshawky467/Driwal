<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.admin')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('clints.index')); ?>"><?php echo e(trans('admin.users')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.edituser')); ?></li>
    </ul>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('clints.update', 'test')); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($users->id); ?>">
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $users->name)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $users->email)); ?>" required>
                    </div>



                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $users->phonenumber)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(trans('admin.identity_card')); ?> <span class="text-danger">*</span></label>
                        <input type="number" name="identity_card" class="form-control" value="<?php echo e(old('identity_card', $users->id_number)); ?>" required>
                    </div>


                    
                    <input type="hidden" name="password" value="password">

                    
                    <input  type="hidden" name="password_confirmation" class="form-control" value="password_confirmation" required >

                    <?php if(app()->getLocale() == 'en'): ?>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.country_id')); ?>

                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="country_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                <option type="hidden" value="<?php echo e($users->country_id); ?>"><?php echo e($users->nationality->name_en); ?></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name_en); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php else: ?>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.country_id')); ?>

                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="nationality_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                <option type="hidden" value="<?php echo e($users->nationality_id); ?>"><?php echo e($users->nationality->name_ar); ?></option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name_ar); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.status')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="<?php echo e($users->status); ?>"><?php echo e($users->status); ?></option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\daiwal\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>
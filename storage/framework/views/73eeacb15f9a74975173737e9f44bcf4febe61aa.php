<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editCompanies')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('Companies.index')); ?>"><?php echo e(trans('admin.Companies')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.editCompanies')); ?></li>
    </ul>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('Companies.update', 'test')); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    
                    <input  type="hidden" name="id" value="<?php echo e($campany->id); ?>">
                    <div class="form-group">
                        <label><?php echo e(trans('admin.name')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $campany->name)); ?>">
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.email')); ?> <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $campany->email)); ?>" required>
                    </div>

                    
                    <div class="form-group">
                        <label><?php echo e(trans('admin.phone_number')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo e(old('phone_number', $campany->phonenumber)); ?>" required>
                    </div>

                    
                    <input type="hidden" name="password" value="password">

                    
                    <input  type="hidden" name="password_confirmation" class="form-control" value="password" required >

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.status')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="<?php echo e($campany->status); ?>"><?php echo e(trans('admin.'.$campany->status)); ?></option>
                            <option value="active"><?php echo e(trans('admin.active')); ?></option>
                            <option value="inactive"><?php echo e(trans('admin.inactive')); ?></option>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/companies/edit.blade.php ENDPATH**/ ?>
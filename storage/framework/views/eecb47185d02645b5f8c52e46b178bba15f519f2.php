<?php $__env->startSection('content'); ?>
<div class="Draiwal_login container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="<?php echo e(asset('assets/images/car.png')); ?>" class="brand_logo" alt="Logo">
                </div>
            </div>
            <?php if(\Session::has('message')): ?>
                <div class="alert alert-danger">
                    <li><?php echo \Session::get('message'); ?></li>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($type); ?>" name="type">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control input_user" value="" placeholder="<?php echo e(trans('admin.email')); ?>">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="<?php echo e(trans('admin.password')); ?>">
                    </div>
                    
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="button" class="btn login_btn"><?php echo e(trans('admin.login')); ?></button>
               </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/auth/login.blade.php ENDPATH**/ ?>
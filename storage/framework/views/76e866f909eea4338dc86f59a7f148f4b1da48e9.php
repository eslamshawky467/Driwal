<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo app('translator')->get('admin.cost'); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href=""><?php echo e(trans('admin.cost')); ?></a></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('costs.edit')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(session()->has('edit')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo e(session()->get('edit')); ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo e(session()->get('message')); ?></strong>
                        </div>
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.kilo_cost')); ?> <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="kilo_cost" autofocus class="form-control" value="<?php echo e(old('kilo_cost',$costs->kilo_cost)); ?>" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.waiting_cost')); ?> <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="waiting_cost" autofocus class="form-control" value="<?php echo e(old('waiting_cost',$costs->waiting_cost)); ?>" required>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo e(trans('admin.cost_admin')); ?> <span class="text-danger">*</span></label>
                                <input type="number" name="admin_cost" step="0.01" class="form-control" value="<?php echo e(old('admin_cost',$costs->admin_cost)); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-edit"></i><?php echo e(trans('admin.submit')); ?></button>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/costs/index.blade.php ENDPATH**/ ?>
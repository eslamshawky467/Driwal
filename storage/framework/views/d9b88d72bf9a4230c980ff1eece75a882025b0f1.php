<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editdriver')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('driver.index')); ?>"><?php echo e(trans('admin.Companies')); ?></a></li>
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
                <form action="<?php echo e(route('requests.update', $requests->id)); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($requests->id); ?>">


                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(__('admin.status')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value=""><?php echo e($requests->status); ?></option>
                            <option value="approved">approved</option>
                            <option value="canceled">canceled</option>
                        </select>
                    </div>

                    


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/Requests/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.accounts')); ?></h2>
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


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                
                <form action="<?php echo e(route('client_accounts.update',$account->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(method_field('put')); ?>

                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.status')); ?>

                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>

                                 <option  value="<?php echo e($account->status); ?>" selected><?php echo e(trans('admin.'.$account->status)); ?></option>
                                 <option  value="pending" ><?php echo e(trans('admin.pending')); ?></option>
                                 <option  value="approved" ><?php echo e(trans('admin.approved')); ?></option>
                                 <option  value="canceled" ><?php echo e(trans('admin.canceled')); ?></option>
                        </select>
                    </div>
                    <div class="px-5 py-4">
                        <button type="submit" class="btn btn-light btn-lg"><?php echo e(trans('admin.update')); ?></button>
                      </div>
                </form>
            </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/client_accounts/edit.blade.php ENDPATH**/ ?>
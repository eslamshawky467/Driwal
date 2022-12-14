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
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.accounts')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('client_accounts.create' )); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> <?php echo e(trans('admin.addclint')); ?></a>
                    </div><!-- end of row -->
                </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><?php echo e(trans('admin.name')); ?></th>
                    <th><?php echo e(trans('admin.bank_balance')); ?></th>
                    <th><?php echo e(trans('admin.user_id')); ?></th>
                    <th><?php echo e(trans('admin.status')); ?></th>
                    <th><?php echo e(trans('admin.Action')); ?></th>
                </tr>
                <tbody class="alldata">
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($account->status!='pending'): ?>
                        <tr id="sid<?php echo e($account->id); ?>">
                            <td>
                                <input type="checkbox" name="ids[<?php echo e($account->id); ?>]" class="checkbox" value="<?php echo e($account->id); ?>"/>
                            </td>
                            <td>
                                    <?php echo e($account->user->name); ?>

                            </td>
                            <td>
                                <?php echo e($account->balance); ?>

                            </td>
                            <td>
                                <?php echo e($account->id); ?>

                            </td>
                            <td>
                                <?php echo e(trans('admin.'.$account->status)); ?></td>

                            <td><a href="<?php echo e(route('client_accounts.edit',$account->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a>
                            <a href="<?php echo e(route('client_accounts.delete',$account->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a>
                            <a href="<?php echo e(route('client_accounts.show',$account->id)); ?>" class="btn btn-secondary btn-sm"><?php echo e(trans('admin.showx')); ?></a></td>
                        </tr>

                                <?php else: ?>

                    <tbody class="alldata">
                    <tr id="sid<?php echo e($account->id); ?>">
                        <td>
                            <input type="checkbox" name="ids[<?php echo e($account->id); ?>]" class="checkbox" value="<?php echo e($account->id); ?>"/>
                        </td>
                        <td>
                                <?php echo e($account->user->name); ?>

                        </td>

                        <td>
                            <?php echo e($account->balance); ?>

                        </td>
                        <td>
                            <?php echo e($account->id); ?>

                        </td>
                        <td>
                            <?php echo e($account->status); ?></td>
                        <td><a href="<?php echo e(route('client_accounts.approve',$account->id)); ?> " class="btn btn-secondaary btn-sm"><?php echo e(trans('admin.approved')); ?></a>
                        <a href="<?php echo e(route('client_accounts.delete',$account->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.canceled')); ?></a>
                        
                    </tr>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                <tbody id="Content" class="searchdata">
                </tbody>
                <thead class="searchdata" id="Content">
                </thead>
            </table>
            </table>

        </div><!-- end of table responsive -->

    </div><!-- end of col -->
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/admin/client_accounts/index.blade.php ENDPATH**/ ?>
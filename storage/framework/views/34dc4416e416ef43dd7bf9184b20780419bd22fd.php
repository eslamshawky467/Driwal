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
                        <a href="<?php echo e(route('ad.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('admin.persons')); ?></a>
                    </div><!-- end of row -->

                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><input type="checkbox" id="checkboxall"/></th>
                                        <th><b><?php echo e(trans('admin.name')); ?></b></th>
                                        <th><?php echo e(trans('admin.vidoe')); ?> </th>
                                        <th><?php echo e(trans('admin.edit')); ?></th>
                                        <th><?php echo e(trans('admin.delete')); ?></th>
                                    </tr>
                                    <tbody class="alldata">
                                    <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="sid<?php echo e($advertisement->id); ?>">
                                            <td>
                                                <input type="checkbox" name="ids[<?php echo e($advertisement->id); ?>]" class="checkbox" value="<?php echo e($advertisement->id); ?>"/>
                                            </td>
                                            <td><?php echo e($advertisement->name); ?></td>
                                            <td><a href="<?php echo e(route('ad.show',$advertisement->id)); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('admin.ad.show')); ?></a></td>

                                            
                                            <td><a href="<?php echo e(route('ad.delete',$advertisement->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div><!-- end of table responsive -->

                        </div><!-- end of col -->

                    </div><!-- end of row -->

                </div><!-- end of tile -->
            </div><!-- end of col -->

        </div><!-- end of row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/advertisement/index.blade.php ENDPATH**/ ?>
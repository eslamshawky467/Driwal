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
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('car_type.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('admin.create_car_type')); ?></a>
                        </div>
                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><?php echo e(trans('id')); ?></th>
                                        <th><?php echo e(trans('admin.type_en')); ?></th>
                                        <th><?php echo e(trans('admin.type_ar')); ?></th>
                                        <th><?php echo e(trans('admin.Action')); ?></th>
                                    </tr>
                                    <tbody class="alldata">
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($type->id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($type->type_en); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($type->type_ar); ?>

                                                </td>
                                                <td><a href=" <?php echo e(route('car_type.edit',$type->id)); ?>" class="btn btn-success btn-sm"><?php echo e(trans('admin.edit_type')); ?></a>
                                                </td>
                                                <td>
                                                    <form method="post" action="<?php echo e(route('car_type.delete',$type->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button  class="btn btn-danger btn-sm">
                                                            <?php echo e(trans('admin.delete')); ?>

                                                        </button>
                                                        </form>
                                                </td>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/admin/car_types/index.blade.php ENDPATH**/ ?>
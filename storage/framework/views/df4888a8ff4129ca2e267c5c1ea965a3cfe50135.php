<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('car.car_models')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('car.index_car_models')); ?></li>

    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('car_model.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(trans('car.create_car_models')); ?></a>
                        </div>
                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>


                                        <th><?php echo e(trans('car.model')); ?></th>
                                        <th><?php echo e(trans('admin.Action')); ?></th>
                                    </tr>
                                    <tbody class="alldata">
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td>
                                                    <?php echo e($model->model); ?>

                                                </td>

                                                <td><a href=" <?php echo e(route('car_model.edit',$model->id)); ?>" class="btn btn-success btn-sm"><?php echo e(trans('admin.edit')); ?></a>
                                                </td>                                            

<td>
                                                <form action="<?php echo e(route('car_model.delete',$model->id)); ?>" method="post" >
                                                    <?php echo csrf_field(); ?>

                                                    <button class="btn btn-danger" >  <?php echo e(trans('admin.delete')); ?> </button>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Draiwal\resources\views/admin/car_models/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('req.accounts')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('request.requests')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">

                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><input type="checkbox" id="checkboxall"/></th>
                                        <th><b><?php echo e(trans('request.campany.name')); ?></b></th>
                                        <th><b><?php echo e(trans('request.package.name')); ?></b></th>
                                        <th><b><?php echo e(trans('request.location')); ?></b></th>
                                        <th><?php echo e(trans('request.status')); ?> </th>
                                        <th><?php echo e(trans('request.action')); ?></th>
                                        <th><?php echo e(trans('request.delete')); ?></th>
                                    </tr>
                                    <tbody class="alldata">
                                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="sid<?php echo e($request->id); ?>">
                                            <td>
                                                <input type="checkbox" name="ids[<?php echo e($request->id); ?>]" class="checkbox" value="<?php echo e($request->id); ?>"/>
                                            </td>

                                            <td><?php echo e($request->company->name); ?></td>
                                            <td><?php echo e($request->Packge->name_ar); ?></td>
                                            <td><a href="<?php echo e(route('requests.showLocation',$request->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('request.show.location')); ?></a></td>
                                            <td><?php echo e($request->status); ?></td>


                                            <?php if($request->status == 'approved' || $request->status == 'canceled'): ?>

                                            <td><a href="<?php echo e(route('requests.showImage',$request->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('request.show.image')); ?></a>
                                            <a href="<?php echo e(route('requests.showMap',$request->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('request.show.map')); ?></a>
                                            <a href="<?php echo e(route('requests.edit',$request->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>



                                            <?php else: ?>
                                            <td><a href="<?php echo e(route('requests.approved',$request->id)); ?>" class="btn btn-primary btn-sm"><?php echo e(trans('request.approve')); ?></a>
                                            <a href="<?php echo e(route('requests.cancel',$request->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('request.cancel')); ?></a></td>


                                            <?php endif; ?>
                                            <td><a href="<?php echo e(route('requests.delete',$request->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('request.delete')); ?></a></td>
                                            
                                            


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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/Requests/index.blade.php ENDPATH**/ ?>
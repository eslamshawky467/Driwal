<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.requests')); ?></h2>
    </div>
    <?php if(session()->has('delete')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('delete')); ?></strong>
        </div>
    <?php endif; ?>
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><?php echo e(trans('admin.requests')); ?></li>
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
                                    <label style="font-size: 30px; color:black"><b><?php echo e(trans('admin.file')); ?></b></label>
                                    <thead class="alldata">
                                    <tr>
                                        <th><b><?php echo e(trans('admin.file')); ?></b></th>
                                        <th><?php echo e(trans('admin.delete')); ?></th>
                                    </tr>

                                    <tbody class="alldata">

                                    <?php $__currentLoopData = $requests->file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                            $name=explode('/',$file->file_name);
                                        ?>
                                        

                                        <!--    <?php echo csrf_field(); ?>-->
                                        <!--    <h4><?php echo e(end($name)); ?></h4>-->

                                        <!--    <input type="hidden" name="file" value="<?php echo e($file->file_name); ?>">-->
                                        <!--    <input type="submit" value="download">-->
                                        <!--</form>-->
                                        <tr>
                                        <td> <a href="<?php echo e($file->file_name); ?>" download=""><?php echo e(end($name)); ?></a></td>
                                        <td>  <a href="<?php echo e(route('request.file.delete',$file->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                    </thead>
                                </table>

                            </div><!-- end of table responsive -->

                        </div><!-- end of col -->

                    </div><!-- end of row -->

                </div><!-- end of tile -->
            </div><!-- end of col -->

        </div><!-- end of row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/admin/Requests/show.blade.php ENDPATH**/ ?>
<div>

    <div class ="search">
        <label style="font-size: 30px; color:black"><b><?php echo e(trans('admin.search')); ?></b></label>
        <input type ="search" name="search"
               placeholder="<?php echo e(trans('admin.search')); ?>" wire:model='package_search' class="form-control" >
    </div>
    <div class="table-responsive">
        <table class="table datatable" id="admins-table" style="width: 100%;">
            <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b><?php echo e(trans('admin.name')); ?>  </b></th>
                    <th><?php echo e(trans('admin.description')); ?></th>
                    <th><?php echo e(trans('admin.price')); ?></th>
                    <th><?php echo e(trans('admin.tripsnumber')); ?></th>
                    <th><?php echo e(trans('admin.status')); ?></th>
                    <th><?php echo e(trans('admin.enddate')); ?></th>
                    <th><?php echo e(trans('admin.edit')); ?></th>
                    <th><?php echo e(trans('admin.delete')); ?></th>
                </tr>
            </thead>
            <tbody class="alldata">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="sid<?php echo e($package->id); ?> ">

                        <td>
                            <input type="checkbox" name="ids[]" class="checkbox" value="<?php echo e($package->id); ?>"/>
                        </td>
                        <?php if(app()->getLocale()=='ar'): ?>
                        <td>
                            <?php echo e($package->name_ar); ?>

                        </td>
                        <td>
                            <?php echo e($package->description_ar); ?>

                        </td>
                        <?php else: ?>
                        <td>
                            <?php echo e($package->name_en); ?>

                        </td>
                        <td>
                            <?php echo e($package->description_en); ?>

                        </td>
                        <?php endif; ?>
                        <td>
                            <?php echo e($package->price); ?>

                        </td>
                        <td>
                            <?php echo e($package->number_trips); ?>

                        </td>
                        <td>
                            <?php echo e($package->status); ?>

                        </td>
                        <td>
                            <?php echo e($package->end_date); ?>

                        </td>
                        <td><a href=" <?php echo e(route('packages.show',$package->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                        <td><a href="<?php echo e(route('packages.destroy',$package->id)); ?> " class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
<?php /**PATH C:\laragon\www\Salm-mostafa_driwal_transaction_task\resources\views/livewire/package-search.blade.php ENDPATH**/ ?>
<div class="row mb-2">
    <div class="container">
        <div class ="search">
            <label style="font-size: 30px; color:black"><b><?php echo e(trans('admin.search')); ?></b></label>
            <input type ="search" wire:model="search"
                    placeholder="<?php echo e(trans('admin.search')); ?>" class="form-control" >
        </div>
    </div>
    <div class="col-md-12">

        <div class="table-responsive">

            <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b><?php echo e(trans('order.id')); ?>

                        
                    </th>
                    <th><?php echo e(trans('order.location')); ?></th>
                    <th><?php echo e(trans('order.myLocation')); ?></th>
                    <th><?php echo e(trans('order.clientName')); ?></th>
                    <th><?php echo e(trans('order.status')); ?></th>
                </tr>
                <tbody class="alldata">
                <?php $__currentLoopData = $actives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $active): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="sid<?php echo e($active->id); ?>">
                        <td>
                            <input type="checkbox" name="ids" class="checkbox" value="<?php echo e($active->id); ?>"/>
                        </td>
                        <td>
                            <?php echo e($active->location); ?></td>
                        <td>
                            <?php echo e($active->my_location); ?>

                        </td>

                        <td>
                            <?php echo e($active->requests->company->name); ?>

                        </td>

                        <td>
                            <?php echo e($active->client->name); ?>

                        </td>
                        <td>
                            <?php echo e($active->status); ?>

                        </td>

                    </tr>
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

<?php /**PATH C:\laragon\www\Draiwal\resources\views/livewire/order-active.blade.php ENDPATH**/ ?>
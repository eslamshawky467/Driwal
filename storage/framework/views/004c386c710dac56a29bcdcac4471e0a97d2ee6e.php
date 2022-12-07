<div class="search">
    <div class ="search">
        <label style="font-size: 30px; color:black"><b><?php echo e(trans('admin.search')); ?></b></label>
        <input type ="search" name="search"
               placeholder="<?php echo e(trans('admin.search')); ?>" wire:model='search'  class="form-control" >
    </div>
    <div class="col-md-12">

        <div class="table-responsive">

            <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b><?php echo e(trans('admin.name')); ?>   <?php if(!isset($search)): ?><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','↓↑'));?><?php endif; ?> </b></th>
                    <th><?php echo e(trans('admin.email')); ?></th>
                    <th><?php echo e(trans('admin.edit')); ?></th>
                    <th><?php echo e(trans('admin.delete')); ?></th>
                </tr>
                <tbody class="alldata">
                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($admin->id); ?>">
                    <?php if($admin->id==1): ?>
                        <td>
                            -
                        </td>
                        <td>
                            <?php echo e($admin->name); ?></td>
                        <td>
                            <?php echo e($admin->email); ?>

                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <?php else: ?>
                        <td>
                            <input type="checkbox" name="ids[<?php echo e($admin->id); ?>]" class="checkbox" value="<?php echo e($admin->id); ?>"/>
                        </td>
                        <td>
                            <?php echo e($admin->name); ?></td>
                            <td>
                            <?php echo e($admin->email); ?>

                        </td>
                   <td><a href="<?php echo e(route('admins.edit',$admin->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                    <td><a href="<?php echo e(route('admins.destroy',$admin->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
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

    </div>
</div>
<?php echo $admins->appends(\Request::except('page'))->render(); ?>


<?php /**PATH C:\laragon\www\draiwal\resources\views/livewire/search-live-admin.blade.php ENDPATH**/ ?>
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
                    <th><b><?php echo e(trans('admin.name')); ?> <?php if(!isset($search)): ?><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','↓↑'));?><?php endif; ?></b></th>
                    <th><?php echo e(trans('admin.email')); ?></th>
                    <th><?php echo e(trans('admin.phone_number')); ?></th>
                    <th><?php echo e(trans('admin.edit')); ?></th>
                    <th><?php echo e(trans('admin.delete')); ?></th>
                </tr>
                <tbody class="alldata">
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="sid<?php echo e($company->id); ?>">
                        <td>
                            <input type="checkbox" name="ids" class="checkbox" value="<?php echo e($company->id); ?>"/>
                        </td>
                        <td>
                            <?php echo e($company->name); ?></td>
                        <td>
                            <?php echo e($company->email); ?>

                        </td>
                        <td>
                            <?php echo e($company->phonenumber); ?>

                        </td>
                        <td><a href="<?php echo e(route('Companies.edit', $company->id)); ?>" class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                        <td>
                            <form method="post" action="<?php echo e(route('Companies.destroy', $company->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                
                                <input type="submit" class="btn btn-danger btn-sm" value="<?php echo e(trans('admin.delete')); ?>">
                            </form>
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
<?php echo $companies->appends(\Request::except('page'))->render(); ?>

<?php /**PATH C:\laragon\www\draiwal\resources\views/livewire/companies.blade.php ENDPATH**/ ?>
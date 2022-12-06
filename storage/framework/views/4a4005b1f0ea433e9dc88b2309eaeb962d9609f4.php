<div class="row">
    <div class="col-md-12">
        <div class="tile shadow">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a href="<?php echo e(route('clints.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> <?php echo e(trans('admin.createuser')); ?></a>
                    <form method="post" action="<?php echo e(route('All_Delete')); ?>" style="display: inline-block;">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="record_ids" id="record-ids">
                        <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?></button>
                    </form><!-- end of form -->
                </div><!-- end of row -->

                <div class="row">
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
                                    <th><b><?php echo e(trans('admin.name')); ?> <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','↓↑'));?></b></th>
                                    <th><?php echo e(trans('admin.email')); ?></th>
                                    <th><?php echo e(trans('admin.phone_number')); ?></th>
                                    <th><?php echo e(trans('admin.identity_card')); ?></th>
                                    <th><?php echo e(trans('admin.country_id')); ?></th>
                                    <th><?php echo e(trans('admin.edit')); ?></th>
                                    <th><?php echo e(trans('admin.delete')); ?></th>
                                </tr>
                                <tbody class="alldata">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($user->id); ?>">
                                        <td>
                                            <input type="checkbox" name="ids[<?php echo e($user->id); ?>]" class="checkbox" value="<?php echo e($user->id); ?>"/>
                                        </td>
                                        <td>
                                            <?php echo e($user->name); ?></td>
                                        <td>
                                            <?php echo e($user->email); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->phonenumber); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->identity_card); ?>

                                        </td>
                                        <?php if(app()->getLocale() == 'en'): ?>
                                        <td>
                                            <?php echo e($user->nationality->name_en); ?>

                                        </td>
                                        <?php else: ?>
                                        <td>
                                            <?php echo e($user->nationality->name_ar); ?>

                                        </td>
                                        <?php endif; ?>
                                        <td><a href="<?php echo e(route('clints.edit', $user->id)); ?>" class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                                        <td><a href="<?php echo e(route('clint.block', $user->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
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

                </div><!-- end of row -->

            </div><!-- end of tile -->
            <?php echo $users->appends(\Request::except('page'))->render(); ?>

        </div><!-- end of col -->
    </div><!-- end of row -->
</div>
<?php /**PATH C:\laragon\www\daiwal\resources\views/livewire/search-clint.blade.php ENDPATH**/ ?>
<div class="col-md-12 mb-2">
    <div class ="search">
        <label style="font-size: 30px; color:black"><b><?php echo e(trans('admin.search')); ?></b></label>
        <input type ="search" wire:model="search"
                placeholder="<?php echo e(trans('admin.search')); ?>" class="form-control" >
    </div>
    <div class="table-responsive">

        <table class="table datatable" id="admins-table" style="width: 100%;">
            <thead class="alldata">
            <tr>
                <th><input type="checkbox" id="checkboxall"/></th>
                <th><b><?php echo e(trans('admin.name')); ?> <?php if(!isset($search)): ?><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','↓↑'));?><?php endif; ?></b></th>
                <th><?php echo e(trans('admin.email')); ?></th>
                <th><?php echo e(trans('admin.phone_number')); ?></th>
                <th><?php echo e(trans('admin.start_cost')); ?></th>


                <th><?php echo e(trans('admin.id_number')); ?></th>
                <th><?php echo e(trans('admin.license_number')); ?></th>
                <th><?php echo e(trans('admin.license_expiration')); ?></th>
                <th><?php echo e(trans('admin.number_plate')); ?></th>
                <th><?php echo e(trans('admin.transport_year')); ?></th>
                <th><?php echo e(trans('admin.governorate')); ?></th>
                <th><?php echo e(trans('admin.neighborhood')); ?></th>
                <th><?php echo e(trans('admin.street')); ?></th>
                <th><?php echo e(trans('admin.building_number')); ?></th>
                <th><?php echo e(trans('admin.nationality_id')); ?></th>
                <th><?php echo e(trans('admin.model_id')); ?></th>
                <th><?php echo e(trans('admin.type_id')); ?></th>




                <th><?php echo e(trans('admin.edit')); ?></th>
                <th><?php echo e(trans('admin.delete')); ?></th>
                <th><?php echo e(trans('admin.view')); ?></th>
                <th><?php echo e(trans('admin.viewlocation')); ?></th>
            </tr>
            <tbody class="alldata">
            <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="sid<?php echo e($driver->id); ?>">
                    <td>
                        <input type="checkbox" name="ids" class="checkbox" value="<?php echo e($driver->id); ?>"/>
                    </td>
                    <td>
                        <?php echo e($driver->name); ?></td>
                    <td>
                        <?php echo e($driver->email); ?>

                    </td>
                    <td>
                        <?php echo e($driver->phonenumber); ?>

                    </td>
                    <td>
                        <?php echo e($driver->start_cost); ?>

                    </td>



                    <td>
                        <?php echo e($driver->id_number); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->license_number); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->license_expiration); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->number_plate); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->transport_year); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->governorate); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->neighborhood); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->street); ?>

                    </td> 
                    <td>
                        <?php echo e($driver->building_number); ?>

                    </td> 
                    <td>
                        <?php if(app()->getLocale() == 'en'): ?>
                          <?php echo e($driver->nation->name_en); ?>                     
                        <?php else: ?>
                            <?php echo e($driver->nation->name_ar); ?>     
                        <?php endif; ?>
                       
                    </td> 
                    <td>
                        <?php echo e($driver->model->model); ?>

                    </td>
                     <td>
                        <?php if(app()->getLocale() == 'en'): ?>
                        <?php echo e($driver->type->type_en); ?>                    
                        <?php else: ?>
                        <?php echo e($driver->type->type_ar); ?>    
                        <?php endif; ?>
                        
                    </td>



                    <?php if($driver->status=='pending'): ?>
                    <td><a href="<?php echo e(route('driver.active',$driver->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.active')); ?></a></td>
                    <td><a href="<?php echo e(route('driver.inactive',$driver->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.inactive')); ?></a></td>
                    <?php else: ?>
                    <td><a href="<?php echo e(route('driver.edit', $driver->id)); ?>" class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                    <td>
                        <form method="post" action="<?php echo e(route('driver.destroy', $driver->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="submit" class="btn btn-danger btn-sm" value="<?php echo e(trans('admin.delete')); ?>">
                        </form>
                    </td>
                    <?php endif; ?>
                    <td><a href="<?php echo e(route('driver.show',$driver->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.view')); ?></a></td>
                    <td><a href="<?php echo e(route('driver.show_location',$driver->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.viewlocation')); ?></a></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tbody id="Content" class="searchdata">
            </tbody>
            <thead class="searchdata" id="Content">
            </thead>
        </table>
        </table>

    </div>

</div>
<?php echo $drivers->appends(\Request::except('page'))->render(); ?>

<?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/livewire/driver.blade.php ENDPATH**/ ?>
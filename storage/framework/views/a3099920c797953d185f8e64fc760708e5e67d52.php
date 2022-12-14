<div class="row">
    <div class="col-md-12">
        <div class="tile shadow">
            <div class="row mb-2">










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


                                    <th><b><?php echo e(trans('trip.drivername')); ?> </b></th>
                                    <th><?php echo e(trans('trip.clientname')); ?></th>
                                    <th><?php echo e(trans('trip.location')); ?></th>
                                    <th><?php echo e(trans('trip.mylocation')); ?></th>

                                    <th><?php echo e(trans('trip.price')); ?></th>
                                    <th><?php echo e(trans('trip.distance')); ?></th>
                                    <th><?php echo e(trans('trip.status')); ?></th>
                                    <th><?php echo e(trans('trip.paymenttype')); ?></th>

                                </tr>
                                <tbody class="alldata">
                                <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="sid<?php echo e($trip->id); ?> ">





                                        <td>
                                            <?php echo e($trip->driver->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($trip->client->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($trip->order->location); ?>

                                        </td>
                                        <td>
                                            <?php echo e($trip->order->my_location); ?>

                                        </td>




                                        <td>
                                            <?php echo e($trip->price); ?>

                                        </td>
                                        <td>
                                            <?php echo e($trip->distance); ?>

                                        </td>

                                        <td>
                                            <?php echo e($trip->status); ?>

                                        </td>
                                        <td>
                                            <?php echo e($trip->payment_type); ?>

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

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->
    </div><!-- end of row -->
</div>
<?php echo $trips->appends(\Request::except('page'))->render(); ?>

<?php /**PATH C:\laragon\www\Draiwal\resources\views/livewire/canceled.blade.php ENDPATH**/ ?>
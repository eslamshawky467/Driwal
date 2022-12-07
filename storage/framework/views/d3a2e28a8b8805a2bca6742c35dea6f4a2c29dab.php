<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.zones')); ?></h2>
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
        <li class="breadcrumb-item"><a href=" "><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.zones')); ?></li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('zones.create')); ?> " class="btn btn-dark"><i class="fa fa-plus"></i><?php echo e(trans('admin.createzone')); ?></a>
                        <form method="post" action="<?php echo e(route('zones.bulkdelete')); ?> " style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?></button>
                        </form><!-- end of form -->
                    </div><!-- end of row -->
                </div>
                <div class="row">
                    
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead class="alldata">
                                <tr>
                                    <th><input type="checkbox" id="checkboxall"/></th>
                                    <th><b><?php echo e(trans('admin.name')); ?> </b></th>
                                    <th><?php echo e(trans('admin.distance')); ?></th>
                                    <th><?php echo e(trans('admin.from_time')); ?></th>
                                    <th><?php echo e(trans('admin.to_time')); ?></th>
                                    <th><?php echo e(trans('admin.distance_time_price')); ?></th>
                                    <th><?php echo e(trans('admin.package')); ?></th>
                                    <th><?php echo e(trans('admin.edit')); ?></th>
                                    <th><?php echo e(trans('admin.delete')); ?></th>
                                </tr>
                            <tbody class="alldata">
                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="sid<?php echo e($zone->id); ?>">

                                        <td>
                                            <input type="checkbox" name="ids[]" class="checkbox" value="<?php echo e($zone->id); ?>"/>
                                        </td>
                                        <td>
                                            <?php echo e($zone->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($zone->distance); ?>

                                        </td>
                                        <td>
                                            <?php echo e($zone->from_time); ?>

                                        </td>
                                        <td>
                                            <?php echo e($zone->to_time); ?>

                                        </td>
                                        <td>
                                            <?php echo e($zone->distance_time_price); ?>

                                        </td>
                                        <?php if(app()->getLocale()=='ar'): ?>
                                            <td>
                                                <?php echo e($zone->Package->name_ar); ?>

                                            </td>
                                        <?php else: ?>
                                            <td>
                                                <?php echo e($zone->Package->name_en); ?>

                                            </td>
                                        <?php endif; ?>
                                   <td><a href=" <?php echo e(route('zones.show',$zone->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                                   <td><a href="<?php echo e(route('zones.destroy',$zone->id)); ?> " class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $zones->appends(\Request::except('page'))->render(); ?>


                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->
    </div>

<!-- end of row -->
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value=$(this).val();
                if($value)
                {
                    $('.alldata').hide();
                    $('.searchdata').show();
                }
                else{
                    $('.alldata').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type:'get',
                    url:'<?php echo e(URL::to('search/admin')); ?>',
                    data:{'search':$value},
                    success:function(data){
                        console.log(data);
                        $('#Content').html(data);
                    }
                });
            })
        </script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script>
                $(document).on('change', '.checkbox', function () {
                    getSelectedRecords();
                });
                // used to select all records
                $(document).on('change', '#checkboxall', function () {
                    $('.checkbox').prop('checked', this.checked);
                    getSelectedRecords();
                });
                function getSelectedRecords() {
                    var recordIds = [];
                    $.each($(".checkbox:checked"), function () {
                        recordIds.push($(this).val());
                    });
                    $('#record-ids').val(JSON.stringify(recordIds));
                    recordIds.length > 0
                        ? $('#bulk-delete').attr('disabled', false)
                        : $('#bulk-delete').attr('disabled', true)
                }
            </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/zones/index.blade.php ENDPATH**/ ?>
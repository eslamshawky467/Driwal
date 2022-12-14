<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.driversaccounts')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('admin.driversaccounts')); ?></li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('driversaccounts.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i><?php echo e(trans('admin.createdriveraccount')); ?></a>
                        <form method="post" action="<?php echo e(route('driversaccounts.bulkdelete')); ?> " style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.cancel')); ?></button>
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
                                    <th><b><?php echo e(trans('admin.amount')); ?> </b></th>
                                    <th><?php echo e(trans('admin.operation')); ?></th>
                                    <th><?php echo e(trans('admin.view')); ?></th>
                                </tr>
                            <tbody class="alldata">
                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="sid<?php echo e($account->id); ?>">

                                        <td>
                                            <input type="checkbox" name="ids[]" class="checkbox" value="<?php echo e($account->id); ?>"/>
                                        </td>
                                        <td>
                                            <?php echo e($account->User->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($account->balance); ?>

                                        </td>
                                        <?php if($account->status=='pending'): ?>
                                            <td>
                                                <a href=" <?php echo e(route('driveraccount.approve',$account->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.approve')); ?></a>
                                                <a href="<?php echo e(route('driveraccount.cancel',$account->id)); ?> " class="btn btn-danger btn-sm"><?php echo e(trans('admin.cancel')); ?></a>
                                            </td>
                                        <?php else: ?>
                                            <td>
                                                <a href=" <?php echo e(route('driversaccounts.show',$account->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a>
                                                <a href="<?php echo e(route('driversaccounts.destroy',$account->id)); ?> " class="btn btn-danger btn-sm"><?php echo e(($account->status=='approved')? trans('admin.cancel'):trans('admin.approve')); ?></a>
                                            </td>
                                        <?php endif; ?>
                                            <td>
                                                <a href=" <?php echo e(route('driveraccount.show',$account->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.view')); ?></a>
                                            </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $accounts->appends(\Request::except('page'))->render(); ?>


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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/admin/driver/drivers_accounts/index.blade.php ENDPATH**/ ?>
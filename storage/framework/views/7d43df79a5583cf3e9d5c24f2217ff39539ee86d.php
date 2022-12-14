<?php echo \Livewire\Livewire::styles(); ?>


<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.FAQ')); ?></h2>
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
    <?php if(session()->has('message')): ?>
        <div class="alert alert-danger">
            <p class="mb-0"><?php echo e(session()->get('message')); ?></p>
         </div>
    <?php endif; ?>
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.FAQ')); ?></li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('qa.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> <?php echo e(trans('admin.createqa')); ?></a>
                        <form method="post" action="<?php echo e(route('settings.delete')); ?>" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            
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
                                                    <th><b><?php echo e(trans('admin.question')); ?>  </b></th>
                                                    <th><?php echo e(trans('admin.answer')); ?></th>
                                                    <th><?php echo e(trans('admin.edit')); ?></th>
                                                    <th><?php echo e(trans('admin.delete')); ?></th>
                                                </tr>
                                                <tbody class="alldata">
                                                <?php $__currentLoopData = $qa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="sid<?php echo e($q->id); ?>">

                                                        <td>
                                                            <input type="checkbox" name="ids[<?php echo e($q->id); ?>]" class="checkbox" value="<?php echo e($q->id); ?>"/>
                                                        </td>
                                                        <?php if(app()->getLocale()=='ar'): ?>
                                                        <td>
                                                            <?php echo e($q->title_ar); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($q->description_ar); ?>

                                                        </td>
                                                        <?php else: ?>
                                                        <td>
                                                            <?php echo e($q->title_en); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($q->description_en); ?>

                                                        </td>
                                                        <?php endif; ?>

                                                   <td><a href=" <?php echo e(route('qa.update',$q->id)); ?>" class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                                                    <td><a href="<?php echo e(route('settings.destroy',$q->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
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
                                    </div>
                                    </div><!-- end of col -->

                                    </div><!-- end of row -->

                                    </div><!-- end of tile -->
                                    <?php echo $qa->appends(\Request::except('page'))->render(); ?>


                                    </div><!-- end of col -->

                                    </div><!-- end of row -->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


        </div><!-- end of row -->
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
                    url:'<?php echo e(URL::to('search/user')); ?>',
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
    <?php echo \Livewire\Livewire::scripts(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/setting_view/qa/index.blade.php ENDPATH**/ ?>
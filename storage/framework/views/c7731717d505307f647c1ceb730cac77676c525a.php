<?php echo \Livewire\Livewire::styles(); ?>


<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.contact')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('admin.contact')); ?></li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('contact_us.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> <?php echo e(trans('admin.createcontact_us')); ?></a>
                        <form method="post" action="<?php echo e(route('settings.delete')); ?>" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?></button>
                        </form><!-- end of form -->
                    </div><!-- end of row -->
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div>
                                        <div class="table-responsive">
                                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                                <thead class="alldata">
                                                <tr>
                                                    <th><input type="checkbox" id="checkboxall"/></th>
                                                    <th><b><?php echo e(trans('admin.title')); ?>  </b></th>
                                                    <th><?php echo e(trans('admin.url')); ?></th>
                                                    <th><?php echo e(trans('admin.icon')); ?></th>
                                                    <th><?php echo e(trans('admin.edit')); ?></th>
                                                    <th><?php echo e(trans('admin.delete')); ?></th>
                                                </tr>
                                                <tbody class="alldata">
                                                <?php $__currentLoopData = $contact_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id="sid<?php echo e($contact->id); ?>">

                                                        <td>
                                                            <input type="checkbox" name="ids[<?php echo e($contact->id); ?>]" class="checkbox" value="<?php echo e($contact->id); ?>"/>
                                                        </td>
                                                        <?php if(app()->getLocale()=='ar'): ?>
                                                        <td>
                                                            <?php echo e($contact->title_ar); ?>

                                                        </td>
                                                        <?php else: ?>
                                                        <td>
                                                            <?php echo e($contact->title_en); ?>

                                                        </td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <?php echo e($contact->description_ar); ?>

                                                        </td>
                                                        <td>
                                                           <i class='<?php echo e($contact->icon); ?>'></i>
                                                        </td>
                                                   <td><a href="<?php echo e(route('contact_us.update',$contact->id)); ?> " class="btn btn-secondary btn-sm"><?php echo e(trans('admin.edit')); ?></a></td>
                                                    <td><a href="<?php echo e(route('settings.destroy',$contact->id)); ?>" class="btn btn-danger btn-sm"><?php echo e(trans('admin.delete')); ?></a></td>
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
                                    <?php echo $contact_us->appends(\Request::except('page'))->render(); ?>


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


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/setting_view/contact_us/index.blade.php ENDPATH**/ ?>
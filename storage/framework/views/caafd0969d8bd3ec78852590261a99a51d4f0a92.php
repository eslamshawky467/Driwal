<?php echo \Livewire\Livewire::styles(); ?>


<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.index')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('admin.index')); ?></li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('admins.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i><?php echo e(trans('admin.create')); ?></a>
                        <form method="post" action="<?php echo e(route('admin.bulk_delete','test')); ?>" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?></button>
                        </form><!-- end of form -->
                </div><!-- end of row -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search-live-admin')->html();
} elseif ($_instance->childHasBeenRendered('7hAKe0h')) {
    $componentId = $_instance->getRenderedChildComponentId('7hAKe0h');
    $componentTag = $_instance->getRenderedChildComponentTagName('7hAKe0h');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7hAKe0h');
} else {
    $response = \Livewire\Livewire::mount('search-live-admin');
    $html = $response->html();
    $_instance->logRenderedChild('7hAKe0h', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>



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
<?php echo \Livewire\Livewire::scripts(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\daiwal\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>
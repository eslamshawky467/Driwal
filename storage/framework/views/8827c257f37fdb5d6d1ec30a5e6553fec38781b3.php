<?php echo \Livewire\Livewire::styles(); ?>


<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.driver')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('admin.driver')); ?></li>
    </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="tile shadow">
                    <a href="<?php echo e(route('driver.create')); ?>" class="btn btn-dark"><i class="fa fa-plus"></i><?php echo e(trans('admin.createdriver')); ?></a>
                    <form method="post" action="<?php echo e(route('driver.delete_All','test')); ?>" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="record_ids" id="record-ids">
                        <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> <?php echo e(trans('admin.delete')); ?></button>
                    </form>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('driver')->html();
} elseif ($_instance->childHasBeenRendered('IPoWtxF')) {
    $componentId = $_instance->getRenderedChildComponentId('IPoWtxF');
    $componentTag = $_instance->getRenderedChildComponentTagName('IPoWtxF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('IPoWtxF');
} else {
    $response = \Livewire\Livewire::mount('driver');
    $html = $response->html();
    $_instance->logRenderedChild('IPoWtxF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
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


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/driver/index.blade.php ENDPATH**/ ?>
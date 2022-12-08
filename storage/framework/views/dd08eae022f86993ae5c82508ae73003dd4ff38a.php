<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.users')); ?></h2>
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
        <li class="breadcrumb-item"><?php echo e(trans('admin.users')); ?></li>
    </ul>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search-clint')->html();
} elseif ($_instance->childHasBeenRendered('vfqiDIz')) {
    $componentId = $_instance->getRenderedChildComponentId('vfqiDIz');
    $componentTag = $_instance->getRenderedChildComponentTagName('vfqiDIz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vfqiDIz');
} else {
    $response = \Livewire\Livewire::mount('search-clint');
    $html = $response->html();
    $_instance->logRenderedChild('vfqiDIz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

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
    <?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/users/index.blade.php ENDPATH**/ ?>
<?php $__currentLoopData = $dat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php echo e($item->location); ?>

    <br>
    <?php echo e($item->lang); ?>

    <br>
    <?php echo e($item->lat); ?>

    <br>
    https://www.google.com/maps/place/30%C2%B017'56.7%22N+31%C2%B035'22.0%22E/@ <?php echo e($item->lang); ?>, <?php echo e($item->lat); ?>,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xd0978a16a4c85c94!8m2!3d30.2990688!4d31.5894509


    <br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
















<?php /**PATH C:\laragon\www\Draiwal\resources\views/admin/location/index.blade.php ENDPATH**/ ?>
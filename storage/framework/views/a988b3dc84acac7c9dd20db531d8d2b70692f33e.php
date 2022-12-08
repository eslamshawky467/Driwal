<?php if(session('success')): ?>

    <script>
        new Noty({
            layout: 'topRight',
            text: "<?php echo e(session('success')); ?>",
            timeout: 2000,
            killer: true
        }).show();
    </script>

<?php endif; ?>

<?php if(session('error')): ?>

    <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: "<?php echo e(session('error')); ?>",
            timeout: 2000,
            killer: true
        }).show();
    </script>

<?php endif; ?>
<?php /**PATH C:\laragon\www\Salm-mostafa_driwal_transaction_task\resources\views/admin/partials/_session.blade.php ENDPATH**/ ?>
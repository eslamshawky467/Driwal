<html>
    <form method="post" action="<?php echo e(route('create')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       

        <div class="form-group ">
            <label>location</label>
            <input type="text" name="location" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
            <label>lat</label>
            <input type="text" name="lat" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
            <label>long</label>
            <input type="text" name="long" autofocus class="form-control" required>
        </div>
        <div class="form-group ">
           
            <input type="hidden" name="id" autofocus value="16" class="form-control" required>
        </div>
        
        
        <div class="form-group ">
            <button type="submit" class="btn btn-primary">button</button>
        </div>
     
</form>

    <?php /**PATH C:\laragon\www\Salm-mostafa_draiwal_dashboard_edit_task\resources\views/test.blade.php ENDPATH**/ ?>
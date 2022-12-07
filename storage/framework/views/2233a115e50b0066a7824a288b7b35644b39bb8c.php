<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo app('translator')->get('admin.updateqa'); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('qa.index')); ?>"><?php echo e(trans('admin.FAQ')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.updateqa')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="<?php echo e(route('qa.edit')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.questionar')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="title_ar" autofocus class="form-control" value="<?php echo e(old('title_ar',$qa->title_ar)); ?>" required>
                        <input type="hidden" name="id" autofocus  value="<?php echo e($qa->id); ?>" required>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.questionen')); ?> <span class="text-danger">*</span></label>
                        <input type="text" name="title_en" autofocus class="form-control" value="<?php echo e(old('title_en',$qa->title_en)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.answerar')); ?> <span class="text-danger">*</span></label>
                        <textarea name="description_ar" autofocus class="form-control"  required><?php echo e(old('description_ar',$qa->description_ar)); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label><?php echo e(trans('admin.answeren')); ?> <span class="text-danger">*</span></label>
                        <textarea name="description_en" autofocus class="form-control"  required><?php echo e(old('description_en',$qa->description_en)); ?></textarea>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-light"><i class="fa fa-edit"></i><?php echo e(trans('admin.submit')); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function myFunction3() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction4() {
            var x = document.getElementById("confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/setting_view/qa/edit.blade.php ENDPATH**/ ?>
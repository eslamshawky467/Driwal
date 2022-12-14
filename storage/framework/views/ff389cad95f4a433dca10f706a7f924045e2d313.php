<?php $__env->startSection('content'); ?>

    <div>
        <h2><?php echo e(trans('admin.editpackage')); ?></h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(trans('admin.home')); ?></a></li>
        <li class="breadcrumb-item"><a href=" <?php echo e(route('packages.index')); ?>"><?php echo e(trans('admin.package')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(trans('admin.editpackage')); ?></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?php echo e(route('packages.update','test')); ?>" method="post"enctype="multipart/form-data">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('admin.partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <input id="id" type="hidden" name="id" class="border"
                           value="<?php echo e($package->id); ?>">
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.name_ar')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="name_ar" autofocus class="form-control" value="<?php echo e(old('name_ar',$package->name_ar)); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.name_en')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="name_en" autofocus class="form-control" value="<?php echo e(old('name_en',$package->name_en)); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.description_ar')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="description_ar" autofocus class="form-control" value="<?php echo e(old('description_ar',$package->description_ar)); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.description_en')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="description_en" autofocus class="form-control" value="<?php echo e(old('description_en',$package->description_en)); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.price')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="price" autofocus class="form-control" value="<?php echo e(old('price',$package->price)); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.tripsnumber')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" step="1" name="number_trips" autofocus class="form-control" value="<?php echo e(old('number_trips',$package->number_trips)); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.enddate')); ?> <span class="text-danger">*</span></label>
                                    <input type="date" step="1" name="end_date" autofocus class="form-control" value="<?php echo e(old('end_date',$package->end_date)); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> <?php echo e(trans('admin.status')); ?>

                                        :</label>
                                    <select  class="form-select" aria-label="Default select example" name="status"
                                             id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                             <option value="<?php echo e($package->status); ?>" selected><?php echo e(trans('admin.'.$package->status)); ?></option>
                                             <option value="active"><?php echo e(trans('admin.active')); ?></option>
                                             <option value="inactive"><?php echo e(trans('admin.inactive')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(trans('admin.image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file"  name="image" autofocus class="form-control">
                                </div>
                            </div>
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
        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\draiwal\resources\views/admin/packages/edit.blade.php ENDPATH**/ ?>
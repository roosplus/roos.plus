<?php $__env->startSection('content'); ?>
    <div class="row mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">Edit</h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('/admin/language-settings/update-' . $getlanguage->id)); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-3 col-md-12">
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.layout')); ?> <span
                                        class="text-danger"> *
                                    </span></label>
                                <select name="layout" class="form-control layout-dropdown" id="layout" required>
                                    <option value="" selected><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1"<?php echo e($getlanguage->layout == '1' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.ltr')); ?></option>
                                    <option value="2"<?php echo e($getlanguage->layout == '2' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.rtl')); ?></option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="layout" class="col-form-label"><?php echo e(trans('labels.image')); ?></label>
                                <input type="file" class="form-control" name="image">
                                <img src="<?php echo e(helper::image_path($getlanguage->image)); ?>"
                                    class="img-fluid rounded hw-50 mt-1" alt="">
                            </div>

                        </div>
                    </div>
                    <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                        <a href="<?php echo e(URL::to('admin/language-settings')); ?>"
                            class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>
                        <button
                            <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                            class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/included/language/edit.blade.php ENDPATH**/ ?>
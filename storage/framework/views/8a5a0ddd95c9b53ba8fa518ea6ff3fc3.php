<?php $__env->startSection('content'); ?>

<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
        <div class="d-flex">
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>



        <div class="col-12 mb-7">

            <div class="card border-0 box-shadow">

                <div class="card-body">

                    <form action="<?php echo e(URL::to('admin/store_categories/update-' . $editcategory->id)); ?>" method="POST">

                        <?php echo csrf_field(); ?>

                        <div class="row">

                            <div class="form-group">

                                <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> *

                                    </span></label>

                                <input type="text" class="form-control" name="category_name"

                                    value="<?php echo e($editcategory->name); ?>" placeholder="<?php echo e(trans('labels.name')); ?>" required>

                              
                            </div>

                            <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">

                                <a href="<?php echo e(URL::to('admin/store_categories')); ?>" class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>

                                <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5" <?php if(env('Environment') == 'sendbox'): ?> type="button"

                                    onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/store_categories/edit.blade.php ENDPATH**/ ?>
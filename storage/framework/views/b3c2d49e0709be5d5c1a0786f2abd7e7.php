<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <?php
            if (Auth::user()->type == 4) {
                $vendor_id = Auth::user()->vendor_id;
            } else {
                $vendor_id = Auth::user()->id;
            }
        ?>
        <div class="col-12 mb-7">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="<?php echo e(URL::to('admin/tax/save')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"
                                    placeholder="<?php echo e(trans('labels.name')); ?>" required>
                               
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo e(trans('labels.type')); ?><span class="text-danger"> *
                                    </span></label>
                                <select name="type" class="form-select" required>
                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                    <option value="1"><?php echo e(trans('labels.fixed')); ?> (<?php echo e(helper::appdata($vendor_id)->currency); ?>)</option>
                                    <option value="2"><?php echo e(trans('labels.percentage')); ?> (%)</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label"><?php echo e(trans('labels.tax')); ?><span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control numbers_only" name="tax" value="<?php echo e(old('tax')); ?>"
                                    placeholder="<?php echo e(trans('labels.tax')); ?>" required>
                                
                            </div>
                            <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                <a href="<?php echo e(URL::to('admin/tax')); ?>"
                                    class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>
                                <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_tax', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                    <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/tax/add.blade.php ENDPATH**/ ?>
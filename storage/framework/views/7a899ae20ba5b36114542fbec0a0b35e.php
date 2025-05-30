<?php $__env->startSection('content'); ?>
<div class="row justify-content-between align-items-center">
    <div class="col-12">
        <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
        <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/areas/update-'.$editarea->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(trans('labels.city')); ?><span class="text-danger"> * </span></label>
                            <select name="city" class="form-select" required>
                                <option value=""><?php echo e(trans('labels.select')); ?></option>
                                <?php $__currentLoopData = $allcity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $editarea->city_id ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label"><?php echo e(trans('labels.area')); ?><span class="text-danger"> * </span></label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($editarea->area); ?>" placeholder="<?php echo e(trans('labels.area')); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                            <a href="<?php echo e(URL::to('admin/areas')); ?>" class="btn btn-danger px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_areas', Auth::user()->role_id, $vendor_id, 'edit') == 1  ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5" <?php if(env('Environment')=='sendbox' ): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/areas/edit.blade.php ENDPATH**/ ?>
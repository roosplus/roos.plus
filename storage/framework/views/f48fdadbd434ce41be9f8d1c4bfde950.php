<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.edit')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="col-12 mt-3 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('/admin/faqs/update-' . $getfaq->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label"><?php echo e(trans('labels.question')); ?><span class="text-danger"> *
                                </span></label>
                            <input type="text" class="form-control" name="question" value="<?php echo e($getfaq->question); ?>"
                                placeholder="<?php echo e(trans('labels.question')); ?>" required>
                            <?php $__errorArgs = ['question'];
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
                        <div class="form-group">
                            <label class="form-label"><?php echo e(trans('labels.answer')); ?><span class="text-danger"> *
                                </span></label>
                            <textarea class="form-control" name="answer" placeholder="<?php echo e(trans('labels.answer')); ?>" rows="5" required><?php echo e($getfaq->answer); ?></textarea>
                            <?php $__errorArgs = ['answer'];
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
                    </div>
                    <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                        <a href="<?php echo e(URL::to('admin/faqs')); ?>"
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

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/faqs/edit.blade.php ENDPATH**/ ?>
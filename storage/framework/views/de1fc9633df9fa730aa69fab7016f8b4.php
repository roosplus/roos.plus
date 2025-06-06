<?php
if(Auth::user()->type == 4)
{
    $vendor_id = Auth::user()->vendor_id;
}else{
    $vendor_id = Auth::user()->id;
}
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.refund_policy')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mt-3 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div id="privacy-policy-three" class="privacy-policy">
                    <form action="<?php echo e(URL::to('admin/refund-policy/update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <textarea class="form-control" id="ckeditor" name="refundpolicy"><?php echo e(@$getrefundpolicy->refund_policy_content); ?></textarea>
                        <?php $__errorArgs = ['refundpolicy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span><br>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                            <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_cms_pages', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/otherpages/refund_privacypolicy.blade.php ENDPATH**/ ?>
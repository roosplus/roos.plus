<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->


<section class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <ol class="breadcrumb d-flex m-0 text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                        class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>
                        
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                    <?php echo e(trans('labels.refund_policy')); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- breadcrumb end -->

<!-- refund Policy section end -->

<?php if($refund_policy != null): ?>

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            <?php echo @$refund_policy->refund_policy_content; ?>


        </div>

    </div>

</section>

<?php else: ?>

    <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- refund Policy section end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/refund_policy.blade.php ENDPATH**/ ?>
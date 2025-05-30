<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->



<section class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <ol class="breadcrumb d-flex m-0 text-capitalize">
                <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                        class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>
                        
                <li class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                    <?php echo e(trans('labels.terms')); ?>

                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- breadcrumb end -->

<!-- terms-and-condition section start -->



<?php if($terms != null): ?>

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            <?php echo @$terms->terms_content; ?>


        </div>

    </div>

</section>

<?php else: ?>

    <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- terms-and-condition section end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/terms_and_condition.blade.php ENDPATH**/ ?>
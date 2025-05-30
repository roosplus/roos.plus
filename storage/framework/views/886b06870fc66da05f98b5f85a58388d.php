<?php $__env->startSection('content'); ?>

<!-- breadcrumb start -->


<section class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <ol class="breadcrumb d-flex m-0 text-capitalize">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-dark">
                        <?php echo e(trans('labels.home')); ?>

                    </a>
                </li>
                <li
                    class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                    <?php echo e(trans('labels.about_us')); ?>

                </li>
            </ol>
        </nav>
    </div>
</section>
<!-- breadcrumb end -->

<!-- About Us Section Start -->

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            

            <?php if(!empty($aboutus->about_content)): ?>

                <div class="cms-section my-3">



                    <?php echo $aboutus->about_content; ?>




                </div>

            <?php else: ?>

                <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- About Us Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/about.blade.php ENDPATH**/ ?>
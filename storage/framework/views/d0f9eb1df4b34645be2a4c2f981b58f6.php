

<?php $__env->startSection('content'); ?>

<section class="theme-1-margin-top">
    <div class="container">
        <div class="sec-title text-center mb-4" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <h2 class="text-capitalize"><?php echo e(trans('landing.about_us')); ?></h2>
            <h5 class="sub-title"><?php echo e(trans('landing.about_us_desc')); ?></h5>
        </div>
        <div class="details row">
            <?php echo $about_us->about_content; ?>

        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/landing/about_us.blade.php ENDPATH**/ ?>
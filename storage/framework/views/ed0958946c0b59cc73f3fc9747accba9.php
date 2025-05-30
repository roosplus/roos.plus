<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                            class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>

                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.search_products')); ?></li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- Search Products section end -->
    <?php if(count($getsearchitems) > 0): ?>
        <section class="bg-light py-5">
            <div class="container">
                <div class="row g-2 g-md-3 products-img" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                    data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <h3 class="page-title mb-1"><?php echo e(trans('labels.search_products')); ?></h3>
                    <p class="page-subtitle line-limit-2 mt-0">
                        <?php echo e(trans('labels.search_desc')); ?>

                    </p>
                    <?php $__currentLoopData = $getsearchitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-lg-3 theme1grid">
                            <?php echo $__env->make('front.productcommonview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
        <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- Search Products section end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/search.blade.php ENDPATH**/ ?>
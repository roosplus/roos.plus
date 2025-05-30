<?php $__env->startSection('content'); ?>
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="text-dark"><?php echo e(trans('labels.home')); ?></a>
                    </li>
                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.who_we_are')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <?php if(count($allwhoweare) > 0): ?>
        <section class="theme-1-margin-top">
            <div class="container Who_We_Are">
                <div class="row my-md-4 my-3 g-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center align-items-center">
                        <div>
                            <div class="menu-heading">
                                <h3 class="page-title mb-1 text-capitalize">
                                    <?php echo e(helper::appdata($storeinfo->id)->whoweare_title); ?></h3>
                                <p class="page-subtitle line-limit-2 mt-0 fs-7">
                                    <?php echo e(helper::appdata($storeinfo->id)->whoweare_subtitle); ?>

                                </p>
                            </div>
                            <div class="row g-xl-4 g-3">
                                <?php $__currentLoopData = $allwhoweare; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $whoweare): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6 col-12 d-flex gap-2">
                                        <div class="icon rounded-2">
                                            <img src="<?php echo e(helper::image_path($whoweare->image)); ?>"
                                                class="w-100 h-100 rounded-2">
                                        </div>
                                        <div class="text-content col">
                                            <h6 class="mb-2 fs-15 text-capitalize fw-600 line-2"><?php echo e($whoweare->title); ?>

                                            </h6>
                                            <p class="fs-7 m-0 line-3"><?php echo e($whoweare->sub_title); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="image1 rounded overflow-hidden">
                            <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->whoweare_image)); ?>"
                                alt="" class="object rounded">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/whoweare.blade.php ENDPATH**/ ?>
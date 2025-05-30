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
                        <?php echo e(trans('labels.faqs')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <?php if(count($allfaqs) > 0): ?>
        <section class="theme-1-margin-top faq">
            <div class="container">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="accordion" id="accordionExample">
                            <?php $__currentLoopData = $allfaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button fw-500 fs-15 m-0 <?php echo e(session()->get('direction') == 2 ? 'rtl' : ''); ?> <?php echo e($key == 0 ? '' : 'collapsed'); ?>"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-<?php echo e($key); ?>" aria-expanded="true"
                                            aria-controls="collapse-<?php echo e($key); ?>">
                                            <?php echo e($faq->question); ?>

                                        </button>
                                    </h2>
                                    <div id="collapse-<?php echo e($key); ?>"
                                        class="accordion-collapse collapse <?php echo e($key == 0 ? 'show' : ''); ?>"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-7">
                                            <?php echo e($faq->answer); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image1 rounded overflow-hidden h-100">
                            <img src="<?php echo e(@helper::image_path(helper::appdata(@$vdata)->faq_image)); ?>" alt="faq image"
                                class="object">
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

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/faq.blade.php ENDPATH**/ ?>
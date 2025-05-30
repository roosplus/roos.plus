<?php $__env->startSection('content'); ?>
    <section class="my-5">
        <div class="container faq-container">
            <div class="sec-title mb-4">
                <h2 class="faq-title"><?php echo e(trans('landing.faq_section_title')); ?></h2>
                <h5 class="faq-subtitle col-md-12 sub-title">
                    <?php echo e(trans('landing.faq_section_description')); ?>

                </h5>
            </div>
            <div>
                <div class="accordion" id="accordionExample">
                    <?php $__currentLoopData = $allfaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item  border-0 <?php echo e($key == 0 ? ' pt-0' : ' pt-4'); ?>">
                            <h2 class="accordion-header" id="heading-<?php echo e($key); ?>">
                                <button
                                    class="<?php echo e(session()->get('direction') == 2 ? 'accordion-button-rtl' : 'accordion-button'); ?> border rounded-3 bg-black <?php echo e($key == 0 ? '' : 'collapsed'); ?>  bg-white text-black"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($key); ?>"
                                    aria-expanded="true" aria-controls="collapse-<?php echo e($key); ?>">
                                    <?php echo e($faq->question); ?>

                                </button>
                            </h2>
                            <div id="collapse-<?php echo e($key); ?>"
                                class="accordion-collapse border border rounded-2 collapse mt-2 <?php echo e($key == 0 ? 'show' : ''); ?>"
                                aria-labelledby="heading-<?php echo e($key); ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded-1">
                                    <p class="faq-accordion-lorem-text pt-3">
                                        <?php echo e($faq->answer); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/landing/faqs.blade.php ENDPATH**/ ?>
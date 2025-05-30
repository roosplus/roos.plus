<?php $__env->startSection('content'); ?>
    <section id="blog" class="blog mb-5 py-5">
        <div class="container">
            <div class="sec-title mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic"
                data-aos-duration="2000">
                <h2 class="text-capitalize"><?php echo e(trans('landing.blog_section_title')); ?></h2>
                <h5 class="sub-title"><?php echo e(trans('landing.blog_section_description')); ?></h5>
            </div>
            <div class="row g-3">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <a href="<?php echo e(URL::to('blog_details-' . $blog->id)); ?>">
                            <div class="card h-100 border-0 rounded-0">
                                <img class="card-img-top blog-image"
                                    src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/blog/' . $blog->image)); ?>"
                                    alt="">
                                <div class="card-body px-0">
                                    <div class="d-flex align-items-start">
                                        <div>
                                            <h4 class="card-title text-truncate-2"><?php echo e($blog->title); ?></h4>
                                            <p class="card-text m-0 text-truncate-3"><?php echo Str::limit(@$blog->description, 100); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/landing/blog_list.blade.php ENDPATH**/ ?>
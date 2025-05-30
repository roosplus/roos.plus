

<?php $__env->startSection('content'); ?>
    <section id="blog" class="blog py-5">
        <div class="container">
            <div class="sec-title mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h2 class="text-capitalize"><?php echo e(trans('landing.blog_details')); ?></h2>
                <h5 class="sub-title"><?php echo e(trans('landing.blog_details_desc')); ?></h5>
            </div>



            <div class="card h-100 rounded-3 p-3">
                <img class="card-img-top blog-image blog_img rounded-3"
                    src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/blog/' . $blog->image)); ?>" alt="">
                <div class="card-body px-0">
                    <div class="d-flex align-items-start">
                        <div>
                            <h4 class="card-title text-truncate-2"><?php echo e($blog->title); ?></h4>
                            <p class="card-text text-truncate-3"><?php echo @$blog->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sec-title my-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h2 class="text-capitalize"><?php echo e(trans('landing.related_blogs')); ?></h2>
                <h5 class="sub-title"><?php echo e(trans('landing.related_blogs_desc')); ?></h5>
            </div>

            <div id="blog-owl" class="owl-carousel owl-theme">
                <?php $__currentLoopData = $blogdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-aos="zoom-in" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <a href="<?php echo e(URL::to('blog_details-' . $blog->id)); ?>">
                            <div class="card h-100 border-0 rounded-0">
                                <img class="card-img-top blog-image"
                                    src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/blog/' . $blog->image)); ?>"
                                    alt="">
                                <div class="card-body px-0">
                                    <div class="d-flex align-items-start">
                                        <div>
                                            <h4 class="card-title text-truncate-2"><?php echo e($blog->title); ?></h4>
                                            <p class="card-text text-truncate-3"><?php echo Str::limit(@$blog->description, 100); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a href="<?php echo e(URL::to('blog_list')); ?>" class="btn btn-secondary fw-500 px-3">See all <i
                        class="fa-solid fa-arrow-right px-2"></i></a>
            </div>

        </div>
    </section>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/landing/blog_details.blade.php ENDPATH**/ ?>
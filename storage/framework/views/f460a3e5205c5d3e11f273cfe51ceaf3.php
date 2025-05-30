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
                        class="breadcrumb-item <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>" class="text-dark">
                            <?php echo e(trans('labels.blogs')); ?>

                        </a>
                    </li>
                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.blogs_details')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- blog detail section start -->
    <?php if($blogdetail != null): ?>
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card h-100 rounded-5 overflow-hidden p-3">
                            <img src="<?php echo e(helper::image_path($blogdetail->image)); ?>" alt="blog-img" class="h-75 rounded-5">
                            <div class="card-body blog-detalis-body">
                                <h2 class="blog-details-title"><?php echo e($blogdetail->title); ?></h2>
                                <p class="blog-details"><?php echo $blogdetail->description; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog detail section end -->
        <!-- related blog section start -->
        <?php if(count($getblog) > 0): ?>
            <section class="theme-1-margin-top">
                <div class="container">
                    <div class="row blogs-card pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="page-title"><?php echo e(trans('labels.related_blogs')); ?></h3>
                            <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>"
                                class="border btn btn-secondary rounded-3 extra-paddings">
                                <?php echo e(trans('labels.view_all')); ?>

                            </a>
                        </div>
                        <div class="col">
                            <div class="owl-carousel blogs-slider owl-theme">
                                <?php $__currentLoopData = $getblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-details-' . $blog->slug)); ?>">
                                        <div class="item pb-3">
                                            <div class="card h-100 rounded-5">
                                                <img src="<?php echo e(helper::image_path($blog->image)); ?>" alt=""
                                                    class="rounded-5">
                                                <div class="card-body py-4">
                                                    <p class="title mt-2 blog-title"><?php echo e($blog->title); ?></p>
                                                    <span class="blog-description"><?php echo $blog->description; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <!-- related blog section end -->
    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.blogs-slider').owlCarousel({
            loop: false,
            nav: false,
            margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 5
                },
                1660: {
                    items: 5
                }
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/included/blog_details.blade.php ENDPATH**/ ?>
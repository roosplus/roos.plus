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
                    <li class="breadcrumb-item <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>" class="text-dark">
                            <?php echo e(trans('labels.blogs')); ?>

                        </a>
                    </li>
                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.our_latest_blogs')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <?php if(count($blogs) > 0): ?>
        <!-- Our Lestes Blogs section start -->
        <section class="theme-1-margin-top">
            <div class="container">
                <div class="row blogs-card pt-0 g-3">
                    <h3 class="page-title mb-1"><?php echo e(trans('labels.blogs')); ?></h3>
                    <p class="page-subtitle line-limit-2 mt-0">
                        <?php echo e(trans('labels.blog_desc')); ?>

                    </p>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3">
                            <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-details-' . $blog->slug)); ?>">
                                <div class="card h-100 rounded">
                                    <img src="<?php echo e(helper::image_path($blog->image)); ?>" alt="" class="rounded">
                                    <div class="card-body py-4">
                                        <p class="title mt-2 blog-title"><?php echo e($blog->title); ?></p>
                                        <span class="blog-description"><?php echo $blog->description; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex justify-content-center align-items-center m-auto mb-3">
                    <nav aria-label="Page navigation example">
                        <?php if($blogs->lastPage() > 1): ?>
                            <ul class="pagination">
                                <li class="page-item <?php echo e($blogs->currentPage() == 1 ? 'disabled' : ''); ?>">
                                    <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-end rounded-start-0' : 'rounded-start rounded-end-0'); ?>"
                                        href="<?php echo e($blogs->url(1)); ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i = 1; $i <= $blogs->lastPage(); $i++): ?>
                                    <li class="page-item <?php echo e($blogs->currentPage() == $i ? 'active' : ''); ?>"><a
                                            class="page-link" href="<?php echo e($blogs->url($i)); ?>"><?php echo e($i); ?></a></li>
                                <?php endfor; ?>
                                <li
                                    class="page-item <?php echo e($blogs->currentPage() == $blogs->lastPage() ? 'disabled' : ''); ?>">
                                    <a class="page-link <?php echo e(session()->get('direction') == 2 ? 'rounded-start rounded-end-0' : 'rounded-end rounded-start-0'); ?>"
                                        href="<?php echo e($blogs->url($blogs->currentPage() + 1)); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </section>
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Our Lestes Blogs section end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/included/blog-list.blade.php ENDPATH**/ ?>
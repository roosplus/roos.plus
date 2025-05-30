<?php $__env->startSection('recaptcha_script'); ?>
    <!-- IF VERSION 2  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
    <!-- IF VERSION 3  -->
    <?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
        <?php echo RecaptchaV3::initJs(); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
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
                        <?php echo e(trans('labels.contact_us')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- contact section start -->
    <section class="my-5">
        <div class="container">
            <div class="row gx-sm-3 gx-0">
                <div class="col-12 col-lg-8 col-sm-12 col-auto mb-4 mb-lg-0">
                    <div class="card rounded h-100 select-delivery py-3 px-sm-2 px-0">
                        <div class="card-body">
                            <form action="<?php echo e(URL::To(@$storeinfo->slug . '/submit')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <h2 class="page-title mb-1 px-2"> <?php echo e(trans('labels.contact_us')); ?></h2>
                                    <p class="page-subtitle px-2 mb-3 md-mb-5">
                                    </p>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault"
                                            class="form-label"><?php echo e(trans('labels.frist_name')); ?><span class="text-danger"> *
                                            </span></label>
                                        <input type="text" class="form-control input-h" name="first_name"
                                            placeholder="<?php echo e(trans('labels.frist_name')); ?>" required>
                                        <input type="hidden" name="vendor_id" value="<?php echo e($vdata); ?>">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault"
                                            class="form-label"><?php echo e(trans('labels.last_name')); ?><span class="text-danger"> *
                                            </span></label>
                                        <input type="text" class="form-control input-h" name="last_name"
                                            placeholder="<?php echo e(trans('labels.last_name')); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                class="text-danger"> * </span></label>
                                        <input type="text" class="form-control input-h" name="email"
                                            placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationDefault" class="form-label"><?php echo e(trans('labels.mobile')); ?><span
                                                class="text-danger"> * </span></label>
                                        <input type="number" class="form-control input-h" name="mobile"
                                            placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label"><?php echo e(trans('labels.message')); ?><span class="text-danger"> *
                                            </span></label>
                                        <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="message"
                                            placeholder="<?php echo e(trans('labels.message')); ?>" required></textarea>
                                    </div>
                                    <?php echo $__env->make('landing.layout.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col d-flex justify-content-end mt-2">
                                        <button type="submit"
                                            class="btn-primary btn rounded px-sm-4 px-3 py-2 fw-500 fs-15 mobile-viwe-btn"><?php echo e(trans('labels.submit')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-12 col-auto">
                    <div class="card contact-details rounded">
                        <div class="card-body mx-3">
                            <h4 class="page-title mb-4"><?php echo e(trans('labels.contact_details')); ?></h4>
                            <ul class="contact-right-side">
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>
                                        <a href="#" class="px-2"> <?php echo e(helper::appdata($vdata)->address); ?></a>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-headphones"></i>
                                    <span class="px-2"><?php echo e(trans('labels.call_us')); ?><a
                                            href="tel:<?php echo e(helper::appdata($vdata)->contact); ?>">
                                            +<?php echo e(helper::appdata($vdata)->contact); ?></a>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <span class="px-2">
                                        <?php echo e(trans('labels.email')); ?>

                                        <a href="mailto:<?php echo e(helper::appdata($vdata)->email); ?>">
                                            <?php echo e(helper::appdata($vdata)->email); ?></a>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa-regular fa-circle-question"></i>
                                    <span class="px-2">
                                        <?php echo e(trans('labels.hours')); ?>

                                        <?php $__currentLoopData = @helper::timings($vdata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <br>
                                            <a href="#">
                                                <?php echo e(Str::upper($timing->day)); ?> --
                                                <?php if($timing->is_always_close == 1): ?>
                                                    (<?php echo e(trans('labels.closed')); ?>)
                                                <?php else: ?>
                                                    (<?php echo e($timing->open_time); ?> to <?php echo e($timing->close_time); ?>)
                                                <?php endif; ?>
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </span>
                                </li>
                            </ul>
                            <hr class="my-4">
                            <h5 class="title mb-2"><?php echo e(trans('labels.social_share')); ?></h5>
                            <div class="social-share d-flex flex-wrap gap-2">
                                <?php $__currentLoopData = @helper::getsociallinks($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="btn btn-outline-light btn-social" role="button"
                                        href="<?php echo e($links->link); ?>"><?php echo $links->icon; ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section start -->

    <!-- Subscription Section Start -->
    <section class="theme-1-margin-top my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="subscription-main position-relative w-100 overflow-hidden">
                        <div class="overflow-hidden rounded">
                            <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)); ?>"
                                class="img-fluid subscription-image rounded-2">
                            <div class="caption-subscription col-md-7 col-lg-6">
                                <div class="subscription-text">
                                    <h3><?php echo e(trans('labels.subscribe_title')); ?></h3>
                                    <p><?php echo e(trans('labels.subscribe_description')); ?></p>
                                    <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="subscribe-input form-control col-md-6">
                                            <input type="hidden" value="<?php echo e($storeinfo->id); ?>" name="id">
                                            <input type="email" name="email" class="form-control border-0"
                                                placeholder="<?php echo e(trans('labels.enter_email')); ?>" required>
                                            <button type="submit"
                                                class="btn btn-primary m-0 fs-15 fw-500"><?php echo e(trans('labels.subscribe')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscription Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/contactus.blade.php ENDPATH**/ ?>
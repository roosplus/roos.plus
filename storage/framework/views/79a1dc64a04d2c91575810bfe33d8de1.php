<!-- Footer Section Start -->
<footer class="mt-25 mb-lg-0 mb-5 pb-lg-0 pb-3">
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 col-12 pb-md-4 pb-lg-0 mb-md-4 mb-lg-0">
                <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="footer-logo text-white">
                    <img src="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->logo)); ?>" alt="">
                </a>
                <p class="footersubtitle"> <?php echo e(helper::appdata($storeinfo->id)->description); ?></p>
                <?php if(@helper::app_settings($storeinfo->id)->mobile_app_on_off == 1): ?>
                    <div class="my-4 d-flex gap-2 app_download_img">
                        <a class="border p-1 rounded-2 border-light"
                            href="<?php echo e(@helper::app_settings($storeinfo->id)->android_link); ?>" target="_blank">
                            <img src="<?php echo e(url('storage/app/public/web-assets/iamges/svg/google-play.svg')); ?>"
                                width="140" height="37" alt="">
                        </a>
                        <a class="border p-1 rounded-2 border-light"
                            href="<?php echo e(@helper::app_settings($storeinfo->id)->ios_link); ?>" target="_blank">
                            <img src="<?php echo e(url('storage/app/public/web-assets/iamges/svg/app-store.svg')); ?>"
                                width="140" height="37" alt="">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row justify-content-lg-end justify-content-md-between">
                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-md-0 px-0 ">
                        <h5 class="footer-title"> <?php echo e(trans('labels.links')); ?></h5>
                        <ul class="footer-right-side">
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="mb-3">
                                    <?php echo e(trans('labels.home')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.contact_us')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/tablebook')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.table_book')); ?>

                                </a>
                            </li>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                                <?php

                                    if (helper::vendordata(@$vdata)->allow_without_subscription == 1) {
                                        $blog = 1;
                                    } else {
                                        $blog = @helper::get_plan($storeinfo->id)->blogs;
                                    }
                                ?>
                                <?php if($blog == 1): ?>
                                    <li>
                                        <a href="<?php echo e(URL::to(@$storeinfo->slug . '/blog-list')); ?>" class="mb-3">
                                            <?php echo e(trans('labels.blogs')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-md-0 px-0 ">
                        <h5 class="footer-title"> <?php echo e(trans('labels.other_pages')); ?></h5>
                        <ul class="footer-right-side">
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.about_us')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/faqshow')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.faqs')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/terms_condition')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.terms')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/privacypolicy')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.privacy_policy')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/refundprivacypolicy')); ?>" class="mb-3">
                                    <?php echo e(trans('labels.refund_policy')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0 px-0 ">
                        <h5 class="footer-title"> <?php echo e(trans('labels.infromation')); ?></h5>
                        <ul class="footer-right-side">
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fs-15 fa-location-dot"></i>
                                <span>
                                    <a href="https://www.google.com/maps/place/323/<?php echo e(helper::appdata($storeinfo->id)->address); ?>"
                                        class=""><?php echo e(helper::appdata($storeinfo->id)->address); ?></a>
                                </span>
                            </li>
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fs-15 fa-headphones"></i>
                                <span class=""> <a
                                        href="tel:<?php echo e(helper::appdata($storeinfo->id)->contact); ?>"><?php echo e(helper::appdata($storeinfo->id)->contact); ?></a>
                                </span>
                            </li>
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-regular fs-15 fa-envelope"></i>
                                <span class="">
                                    <a href="mailto:<?php echo e(helper::appdata($storeinfo->id)->email); ?>">
                                        <?php echo e(helper::appdata($storeinfo->id)->email); ?></a>
                                </span>
                            </li>
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-regular fs-15 fa-circle-question"></i>
                                <span class="">
                                    <a href="#" href="#" data-bs-toggle="modal"
                                        data-bs-target="#examplehours"
                                        data-bs-whatever="@mdo"><?php echo e(trans('labels.hours')); ?></a>
                                </span>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 align-items-end justify-content-between mt-0 mt-md-4">
            <!-- Payment card -->
            <div class="col-sm-7 col-md-6 col-lg-4">
                <h5 class="mb-2 text-white fw-bold"><?php echo e(trans('labels.payment_methods')); ?> &amp;
                    <?php echo e(trans('labels.security')); ?></h5>
                <ul class="list-inline mb-0 mt-3 d-flex flex-wrap gap-2">
                    <?php $__currentLoopData = helper::getallpayment($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-inline-item m-0">
                            <img src="<?php echo e(helper::image_path($payment->image)); ?>" class="h-30px" alt="">
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <!-- Social media icon -->
            <?php if(count(helper::getsociallinks($storeinfo->id)) > 0): ?>
                <div class="col-sm-5 col-md-6 col-lg-3 social-media text-sm-end">
                    <h5 class="mb-2 fw-bold text-white"><?php echo e(trans('labels.follow_us')); ?></h5>
                    <ul class="list-inline mb-0 mt-3  d-flex flex-wrap gap-2 justify-content-sm-end">
                        <?php $__currentLoopData = @helper::getsociallinks($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item m-0">
                                <a class="btn-social mb-0 fb" role="button"
                                    href="<?php echo e($links->link); ?>"><?php echo $links->icon; ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <hr class="my-3">
        <div class="d-flex align-items-center justify-content-center pb-3">
            <p class="fs-7 md-mb-0 lg-mb-0 xl-mb-0 text-center">
                <?php echo e(helper::appdata($storeinfo->id)->copyright); ?></p>
        </div>
    </div>
</footer>
<?php /**PATH /mnt/c/restro-saas/resources/views/front/theme/footer.blade.php ENDPATH**/ ?>
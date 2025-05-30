<footer>
    <div class="footer-bg-color">
        <div class="container">
            <div class="footer-contain pt-3 row justify-content-between">
                <div class="col-md-12 col-xl-4">
                    <div class="logo">
                        <a href="#"><img src="<?php echo e(helper::image_path(helper::appdata('')->logo)); ?>"
                                alt="logo"></a>
                    </div>
                    <p class="footer-contain my-4">
                        <?php echo e(trans('landing.footer_description')); ?>

                    </p>
                </div>
                <div class="col-xl-7 col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-6 footer-contain">
                            <p class="footer-title mb-3"><?php echo e(trans('landing.about_us')); ?></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#home')); ?>"><?php echo e(trans('landing.home')); ?></a></p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('/#features')); ?>"><?php echo e(trans('landing.features')); ?></a>
                            </p>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                <p class="mb-2"><a
                                        href="<?php echo e(URL::to('/#pricing-plans')); ?>"><?php echo e(trans('landing.pricing_plan')); ?></a>
                                </p>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                                <p class="mb-2"><a href="<?php echo e(URL::to('blog_list')); ?>"><?php echo e(trans('landing.blogs')); ?></a>
                                </p>
                            <?php endif; ?>
                            <p class="mb-1"><a href="#contect-us"><?php echo e(trans('landing.contact_us')); ?></a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-6 footer-contain">
                            <p class="footer-title mb-3"><?php echo e(trans('landing.other_pages')); ?></p>
                            <p class="mb-2"><a
                                    href="<?php echo e(URL::to('privacy_policy')); ?>"><?php echo e(trans('landing.privacy_policy')); ?></a>
                            </p>
                            <p class="mb-2"><a
                                    href="<?php echo e(URL::to('refund_policy')); ?>"><?php echo e(trans('landing.refund_policy')); ?></a></p>
                            <p class="mb-2"><a
                                    href="<?php echo e(URL::to('terms_condition')); ?>"><?php echo e(trans('landing.terms_condition')); ?></a>
                            </p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('about_us')); ?>"><?php echo e(trans('landing.about_us')); ?></a>
                            </p>
                            <p class="mb-2"><a href="<?php echo e(URL::to('faqs')); ?>"><?php echo e(trans('landing.faqs')); ?></a></p>
                            <p class="mb-2"><a
                                    href="<?php echo e(URL::to('/#our-stores')); ?>"><?php echo e(trans('landing.our_stores')); ?></a></p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-3"><?php echo e(trans('landing.help')); ?></p>
                            <p class="mb-2">
                                <a
                                    href="mailto:<?php echo e(helper::appdata('')->email); ?>" class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-envelope fs-15"></i>
                                    <?php echo e(helper::appdata('')->email); ?>

                                </a>
                            </p>
                            <p class="mb-2">
                                <a
                                    href="tel:<?php echo e(helper::appdata('')->contact); ?>" class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-phone fs-15"></i>
                                    <?php echo e(helper::appdata('')->contact); ?>

                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 align-items-end justify-content-between mt-0 mt-md-4">
                <!-- Payment card -->
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <h5 class="mb-2 text-white fw-bold">Payment methods &amp;
                        Security</h5>
                    <ul class="list-inline mb-0 mt-3 d-flex flex-wrap gap-2">
                        <?php $__currentLoopData = helper::getallpayment(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item m-0">
                                <img src="<?php echo e(helper::image_path($payment->image)); ?>" class="h-30px" alt="">
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Social media icon -->
                <div class="col-sm-5 col-md-6 col-lg-3 social-media text-sm-end">
                    <h5 class="mb-2 fw-bold text-white">Follow us on</h5>
                    <ul class="list-inline mb-0 mt-3  d-flex flex-wrap gap-2 justify-content-sm-end">
                        <?php $__currentLoopData = @helper::getsociallinks(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-inline-item m-0">
                                <a href="<?php echo e($links->link); ?>" target="_blank"
                                    class="btn-social mb-0 fb"><?php echo $links->icon; ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <hr class="text-white">
            <div class="copyright-sec row justify-content-between align-items-center">
                <p class="m-0 text-white col-12 fs-7 text-center">
                    <?php echo e(helper::appdata('')->copyright); ?></p>

                
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /mnt/c/restro-saas/resources/views/landing/layout/footer.blade.php ENDPATH**/ ?>
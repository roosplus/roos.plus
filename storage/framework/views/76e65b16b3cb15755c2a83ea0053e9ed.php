<?php if(request()->is($storeinfo->slug . '/details-*')): ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first()->activated == 1): ?>
        <div class="col-12 my-3 p-3 border-top">
            <div class="row g-3 product-detile">
                <div class="col-lg-3 col-6">
                    <div class="service-content">
                        <img src="<?php echo e(helper::image_path(@helper::otherappdata($storeinfo->id)->trusted_badge_image_1)); ?>"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="service-content">
                        <img src="<?php echo e(helper::image_path(@helper::otherappdata($storeinfo->id)->trusted_badge_image_2)); ?>"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="service-content">
                        <img src="<?php echo e(helper::image_path(@helper::otherappdata($storeinfo->id)->trusted_badge_image_3)); ?>"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="service-content">
                        <img src="<?php echo e(helper::image_path(@helper::otherappdata($storeinfo->id)->trusted_badge_image_4)); ?>"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first() != null &&
        App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first()->activated == 1): ?>
    <?php if(@helper::otherappdata($storeinfo->id)->safe_secure_checkout_payment_selection): ?>
        <div
            class="col-12 py-4 p-3 rounded-3 sevirce-trued <?php echo e(request()->is($storeinfo->slug . '/details-*') ? '' : 'my-3'); ?>">
            <div class="d-flex mb-2 pb-1 flex-wrap gap-2 justify-content-center aling-items-center">
                <?php $__currentLoopData = helper::getallpayment($storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(
                        @in_array(
                            $stpayment->payment_type,
                            explode(',', helper::otherappdata($storeinfo->id)->safe_secure_checkout_payment_selection))): ?>
                        <div class="sevirce-tru">
                            <div class="img">
                                <img class="border rounded-2" src="<?php echo e(helper::image_path($stpayment->image)); ?>"
                                    alt="">
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <h6 class="fs-15 text-center fw-normal"
                style="color: <?php echo e(@helper::otherappdata($storeinfo->id)->safe_secure_checkout_text_color); ?>">
                <?php echo e(@helper::otherappdata($storeinfo->id)->safe_secure_checkout_text); ?>

            </h6>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /mnt/c/restro-saas/resources/views/front/product/service-trusted.blade.php ENDPATH**/ ?>
<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="container">
        <div class="max-w-7xl mx-auto px-6">
            <div class="p-2 rounded-lg bg-yellow-100">
                <div class="row g-2 flex-wrap justify-content-center align-items-center">
                    <div class="col-lg-9 col-md-8">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="js-cookie-consent-img d-lg-block d-none">
                                <img src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/iamges/png/cookies.png')); ?>"
                                    class="w-100 img-fluid object-fit-cover" alt="">
                            </div>
                            <p class="ml-3  text-white cookie-consent__message my-3">
                                <?php echo e(trans('labels.cookie_text')); ?>

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="row g-2">
                            <div class="col-6">
                                <button
                                    class="js-cookie-consent-cancel m-0 w-100 btn btn-outline-light btn-class rounded-2 cookie-consent__agree cursor-pointer px-4 py-2 text-sm font-medium">
                                    <?php echo e(trans('labels.reject')); ?>

                                </button>
                            </div>
                            <div class="col-6">
                                <button
                                    class="js-cookie-consent-agree m-0 w-100 btn btn-class rounded-2 cookie-consent__agree cursor-pointer px-4 py-2 text-sm font-medium">
                                    <?php echo e(trans('labels.cookie_button_text')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /mnt/c/restro-saas/vendor/spatie/laravel-cookie-consent/resources/views/dialogContents.blade.php ENDPATH**/ ?>
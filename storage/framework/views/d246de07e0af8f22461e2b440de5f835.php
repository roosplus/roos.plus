<!------ breadcrumb ------>
<?php $__env->startSection('content'); ?>
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug . '/')); ?>" class="text-dark">
                            <?php echo e(trans('labels.home')); ?>

                        </a>
                    </li>
                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.add_money')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="bg-light py-sm-5 py-4">
        <div class="container">
            <div class="row gx-sm-3 gx-2">
                <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-9 col-md-12">
                    <div class="card rounded user-form">
                        <div class="card-body py-4">
                            <div class="settings-box">
                                <h2 class="page-title mb-2 border-bottom pb-1">
                                    <?php echo e(trans('labels.add_money')); ?>

                                </h2>
                                <div class="settings-box-body dashboard-section">
                                    <p class="mb-2 fs-6 fw-500"><?php echo e(trans('labels.add_amount')); ?></p>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span
                                                class="input-group-text fw-500 fs-15"><?php echo e(helper::appdata($storeinfo->id)->currency); ?></span>
                                            <input type="number" name="amount" id="amount" class="form-control fs-15"
                                                placeholder="<?php echo e(trans('labels.add_amount')); ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-xl-6 col-12">
                                            <p class="mb-0 fs-6 fw-500"><?php echo e(trans('labels.notes')); ?> :</p>
                                            <ul>
                                                <li class="text-muted fs-7 d-flex gap-2 align-items-center">
                                                    <i class="fa-regular fa-circle-check text-success"></i>
                                                    <?php echo e(trans('labels.wallet_note_1')); ?>

                                                </li>
                                                <li class="text-muted fs-7 d-flex gap-2 align-items-center">
                                                    <i class="fa-regular fa-circle-check text-success"></i>
                                                    <?php echo e(trans('labels.wallet_note_2')); ?>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-6 col-12">
                                            <?php echo $__env->make('front.product.service-trusted', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                    <p class="mb-1 fs-6 fw-500"><?php echo e(trans('labels.payment_option')); ?></p>
                                    <div class="recharge_payment_option row g-3">
                                        <?php $key = 0; ?>
                                        <?php $__currentLoopData = $getpaymentmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                // Check if the current $payment is a system addon and activated
                                                if ($payment->payment_type == '1' || $payment->payment_type == '16') {
                                                    $systemAddonActivated = true;
                                                } else {
                                                    $systemAddonActivated = false;
                                                }
                                                $addon = App\Models\SystemAddons::where(
                                                    'unique_identifier',
                                                    $payment->unique_identifier,
                                                )->first();
                                                if ($addon != null && $addon->activated == 1) {
                                                    $systemAddonActivated = true;
                                                }
                                            ?>
                                            <?php if($systemAddonActivated): ?>
                                                <label class="form-check-label mx-0 col-md-6 cursor-pointer"
                                                    for="<?php echo e($payment->payment_type); ?>">
                                                    <div class="payment-check w-100">
                                                        <div class="payment_option_img rounded-3 overflow-hidden">
                                                            <img src="<?php echo e(helper::image_path($payment->image)); ?>"
                                                                class="w-100 h-100" alt="">
                                                        </div>
                                                        <?php if(strtolower($payment->payment_type) == '2'): ?>
                                                            <input type="hidden" name="razorpay" id="razorpay"
                                                                value="<?php echo e($payment->public_key); ?>">
                                                        <?php endif; ?>
                                                        <?php if(strtolower($payment->payment_type) == '3'): ?>
                                                            <input type="hidden" name="stripe" id="stripe"
                                                                value="<?php echo e($payment->public_key); ?>">
                                                        <?php endif; ?>
                                                        <?php if(strtolower($payment->payment_type) == '4'): ?>
                                                            <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                                                value="<?php echo e($payment->public_key); ?>">
                                                        <?php endif; ?>
                                                        <?php if(strtolower($payment->payment_type) == '5'): ?>
                                                            <input type="hidden" name="paystackkey" id="paystackkey"
                                                                value="<?php echo e($payment->public_key); ?>">
                                                        <?php endif; ?>

                                                        <p class="m-0"><?php echo e($payment->payment_name); ?></p>
                                                        <input
                                                            class="form-check-input <?php echo e(session()->get('direction') == '2' ? 'me-auto' : 'ms-auto'); ?>"
                                                            type="radio" name="transaction_type"
                                                            value="<?php echo e($payment->payment_type); ?>"
                                                            data-currency="<?php echo e($payment->currency); ?>"
                                                            <?php echo e($key++ == 0 ? 'checked' : ''); ?>

                                                            id="<?php echo e($payment->payment_type); ?>"
                                                            data-payment_type="<?php echo e(strtolower($payment->payment_type)); ?>"
                                                            style="">

                                                        <?php if(strtolower($payment->payment_type) == '6'): ?>
                                                            <input type="hidden"
                                                                value="<?php echo e($payment->payment_description); ?>"
                                                                id="bank_payment">
                                                        <?php endif; ?>
                                                    </div>
                                                </label>
                                            <?php endif; ?>
                                            <?php if($payment->payment_type == 3): ?>
                                                <div class="my-3 d-none" id="card-element"></div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="col-12 d-flex gap-2 mt-3 justify-content-end">
                                        <button
                                            class="btn btn-primary px-sm-4 px-3 py-2 fs-15 fw-500 rounded wallet_recharge"
                                            onclick="addmoney()"><?php echo e(trans('labels.proceed_pay')); ?></button>
                                    </div>

                                    <input type="hidden" name="walleturl" id="walleturl"
                                        value="<?php echo e(URL::to($storeinfo->slug . '/wallet/recharge')); ?>">
                                    <input type="hidden" name="successurl" id="successurl"
                                        value="<?php echo e(URL::to($storeinfo->slug . '/wallet')); ?>">
                                    <input type="hidden" name="user_name" id="user_name" value="<?php echo e(Auth::user()->name); ?>">
                                    <input type="hidden" name="user_email" id="user_email"
                                        value="<?php echo e(Auth::user()->email); ?>">
                                    <input type="hidden" name="user_mobile" id="user_mobile"
                                        value="<?php echo e(Auth::user()->mobile); ?>">
                                    <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e($storeinfo->id); ?>">
                                    <input type="hidden" name="title" id="title"
                                        value="<?php echo e(helper::appdata($storeinfo->id)->website_title); ?>">
                                    <input type="hidden" name="logo" id="logo"
                                        value="<?php echo e(helper::appdata(@$storeinfo->id)->image); ?>">

                                    <input type="hidden" name="addsuccessurl" id="addsuccessurl"
                                        value="<?php echo e(URL::to($storeinfo->slug . '/addwalletsuccess')); ?>">
                                    <input type="hidden" name="addfailurl" id="addfailurl"
                                        value="<?php echo e(URL::to($storeinfo->slug . '/addfail')); ?>">

                                    <input type="hidden" name="myfatoorahurl" id="myfatoorahurl"
                                        value="<?php echo e(URL::to('orders/myfatoorahrequest')); ?>">
                                    <input type="hidden" name="mercadopagourl" id="mercadopagourl"
                                        value="<?php echo e(URL::to('orders/mercadoorderrequest')); ?>">
                                    <input type="hidden" name="paypalurl" id="paypalurl"
                                        value="<?php echo e(URL::to('orders/paypalrequest')); ?>">
                                    <input type="hidden" name="toyyibpayurl" id="toyyibpayurl"
                                        value="<?php echo e(URL::to('orders/toyyibpayrequest')); ?>">
                                    <input type="hidden" name="paytaburl" id="paytaburl"
                                        value="<?php echo e(URL::to('orders/paytabrequest')); ?>">
                                    <input type="hidden" name="phonepeurl" id="phonepeurl"
                                        value="<?php echo e(URL::to('orders/phoneperequest')); ?>">
                                    <input type="hidden" name="mollieurl" id="mollieurl"
                                        value="<?php echo e(URL::to('orders/mollierequest')); ?>">
                                    <input type="hidden" name="khaltiurl" id="khaltiurl"
                                        value="<?php echo e(URL::to('orders/khaltirequest')); ?>">
                                    <input type="hidden" name="xenditurl" id="xenditurl"
                                        value="<?php echo e(URL::to('orders/xenditrequest')); ?>">

                                    <input type="hidden" name="slug" id="slug" value="<?php echo e($storeinfo->slug); ?>">

                                    <input type="hidden" value="<?php echo e(trans('messages.payment_selection_required')); ?>"
                                        name="payment_type_message" id="payment_type_message">

                                    <input type="hidden" value="<?php echo e(trans('messages.enter_amount')); ?>"
                                        name="amount_message" id="amount_message">

                                    <form action="<?php echo e(url('orders/paypalrequest')); ?>" method="post" class="d-none">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="return" value="2">
                                        <input type="submit" class="callpaypal" name="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/wallet.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/addmoney.blade.php ENDPATH**/ ?>
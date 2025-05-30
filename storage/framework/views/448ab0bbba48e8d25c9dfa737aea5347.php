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
                        <?php echo e(trans('labels.checkout')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <section class="my-5">
        <div class="container">
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first()->activated == 1): ?>
                <?php echo $__env->make('front.cart_checkout_countdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="row g-sm-3 g-0">
                <div class="col-md-12 col-lg-8">
                    <div class="border rounded py-0 mb-4">
                        <?php
                            $total_price = 0;
                        ?>
                        <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total_price += $cart->price * $cart->qty;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card border-0 select-delivery rounded">
                            <div class="card-body row">
                                <div class="radio-item-container px-sm-2 px-0">
                                    <div class="d-flex align-items-center mb-3 px-0 border-bottom pb-2">
                                        <i class="fa-solid fa-truck"></i>
                                        <p class="title px-2"><?php echo e(trans('labels.delivery_option')); ?></p>
                                    </div>
                                    <form class="px-3">
                                        <?php
                                            $delivery_types = explode(',', helper::appdata(@$vdata)->delivery_type);
                                            if (Session::has('table_id')) {
                                                $delivery_types = [3];
                                            }
                                        ?>
                                        <?php $__currentLoopData = $delivery_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $delivery_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12 px-0 mb-2">
                                                <label
                                                    class="form-check-label d-flex mx-0 justify-content-between align-items-center"
                                                    for="cart-delivery-<?php echo e($delivery_type); ?>">
                                                    <div class="d-flex align-items-center">
                                                        <input class="form-check-input m-0" type="radio"
                                                            name="cart-delivery" id="cart-delivery-<?php echo e($delivery_type); ?>"
                                                            value="<?php echo e($delivery_type); ?>" <?php echo e($key == 0 ? 'checked' : ''); ?>>
                                                        <p class="px-2">
                                                            <?php if($delivery_type == 1): ?>
                                                                <?php echo e(trans('labels.delivery')); ?>

                                                            <?php elseif($delivery_type == 2): ?>
                                                                <?php echo e(trans('labels.pickup')); ?>

                                                            <?php elseif($delivery_type == 3): ?>
                                                                <?php echo e(trans('labels.dine_in')); ?>

                                                            <?php endif; ?>
                                                        </p>

                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded py-0 mb-4" id="data_time">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body">
                                <div class="row gx-sm-3 gx-0">
                                    <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                                        <i class="fa-regular fa-clock"></i>
                                        <p class="title px-2"><?php echo e(trans('labels.date_time')); ?></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="Name" class="form-label"
                                            id="delivery_date"><?php echo e(trans('labels.delivery_date')); ?>

                                            <span class="text-danger"> * </span></label>
                                        <label for="Name" class="form-label"
                                            id="pickup_date"><?php echo e(trans('labels.pickup_date')); ?>

                                            <span class="text-danger"> * </span></label>
                                        <input type="text" class="form-control input-h delivery_pickup_date"
                                            id="delivery_dt" value="" placeholder="Delivery date" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="Name" class="form-label"
                                            id="delivery"><?php echo e(trans('labels.delivery_time')); ?>

                                            <span class="text-danger"> * </span></label>
                                        <label for="Name" class="form-label"
                                            id="pickup"><?php echo e(trans('labels.pickup_time')); ?>

                                            <span class="text-danger"> * </span></label>
                                        <label id="store_close"
                                            class="d-none text-danger"><?php echo e(trans('labels.today_store_closed')); ?></label>
                                        <input type="hidden" name="store_id" id="store_id" value="<?php echo e(@$vdata); ?>">
                                        <input type="hidden" name="sloturl" id="sloturl"
                                            value="<?php echo e(URL::to(@$storeinfo->slug . '/timeslot')); ?>">
                                        <select name="delivery_time" id="delivery_time" class="form-select input-h"
                                            required>
                                            <option value="<?php echo e(old('delivery_time')); ?>"><?php echo e(trans('labels.select')); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded py-0 mb-4" id="table_show">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="row gx-sm-3 gx-0">
                                        <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                                            <i class="fa-solid fa-utensils"></i>
                                            <p class="title px-2"><?php echo e(trans('labels.table')); ?></p>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <label for="Name" class="form-label"
                                                id="delivery"><?php echo e(trans('labels.table')); ?><span class="text-danger"> *
                                                </span></label>
                                            <select name="table" id="table" class="form-select input-h"
                                                <?php if(Session::has('table_id')): ?> disabled <?php endif; ?> required>
                                                <option value=""><?php echo e(trans('labels.select_table')); ?>

                                                </option>
                                                <?php $__currentLoopData = $tableqrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableqr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($tableqr->id); ?>"
                                                        <?php echo e(@Session::get('table_id') == $tableqr->id ? 'selected' : ''); ?>>
                                                        <?php echo e($tableqr->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded py-0 mb-4" id="open">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="row gx-sm-3 gx-0">
                                        <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                                            <i class="fa-regular fa-circle-question"></i>
                                            <p class="title px-2"><?php echo e(trans('labels.delivery_info')); ?></p>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.address')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control input-h" name="address"
                                                id="address" placeholder="<?php echo e(trans('labels.address')); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.landmark')); ?><span
                                                    class="text-danger"> </span></label>
                                            <input type="text" class="form-control input-h" name="landmark"
                                                id="landmark" placeholder="<?php echo e(trans('labels.landmark')); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.building')); ?></label>
                                            <input type="text" class="form-control input-h" name="building"
                                                id="building" placeholder="<?php echo e(trans('labels.building')); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.pincode')); ?></label>
                                            <input type="number" class="form-control input-h"
                                                placeholder="<?php echo e(trans('labels.pincode')); ?>" name="postal_code"
                                                id="postal_code">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded py-0 mb-4">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body">
                                <form action="#" method="get">
                                    <div class="row gx-sm-3 gx-0">
                                        <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                                            <i class="fa-regular fa-address-card"></i>
                                            <p class="title px-2"><?php echo e(trans('labels.customer')); ?></p>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">*
                                                </span></label>
                                            <input type="text" class="form-control input-h"
                                                placeholder="<?php echo e(trans('labels.name')); ?>" name="customer_name"
                                                id="customer_name"
                                                value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->name : ''); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.mobile')); ?><span class="text-danger">
                                                    * </span></label>
                                            <input type="number" class="form-control input-h"
                                                placeholder="<?php echo e(trans('labels.mobile')); ?>" name="customer_mobile"
                                                id="customer_mobile"
                                                value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->mobile : ''); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="validationDefault"
                                                class="form-label"><?php echo e(trans('labels.email')); ?><span class="text-danger">*
                                                </span></label>
                                            <input type="email" class="form-control input-h"
                                                placeholder="<?php echo e(trans('labels.email')); ?>" name="customer_email"
                                                id="customer_email"
                                                value="<?php echo e(@Auth::user() && @Auth::user()->type == 3 ? @Auth::user()->email : ''); ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label"><?php echo e(trans('labels.note')); ?><span
                                                    class="text-danger"> </span></label>
                                            <textarea id="notes" name="notes" class="form-control input-h" rows="5" aria-label="With textarea"
                                                placeholder="<?php echo e(trans('labels.message')); ?>" value=""></textarea>
                                        </div>
                                        <input type="hidden" id="vendor" name="vendor"
                                            value="<?php echo e($vdata); ?>" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <input type="hidden" id="discount_amount" value="<?php echo e(Session::get('offer_amount')); ?>" />
                    <input type="hidden" id="offer_type" value="<?php echo e(Session::get('offer_type')); ?>" />
                    <input type="hidden" name="coupon_code" id="coupon_code" value="<?php echo e(Session::get('offer_code')); ?>">
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                            <?php
                                if (helper::vendordata(@$vdata)->allow_without_subscription == 1) {
                                    $promocode = 1;
                                } else {
                                    $promocode = helper::get_plan(@$vdata)->coupons;
                                }
                            ?>
                            <?php if($promocode == 1): ?>
                                <div class="border rounded py-0 mb-4 <?php if(@$coupons->count() == 0 || Session::get('offer_type') == 'loyalty'): ?> d-none <?php endif; ?>"
                                    id="promocodesection">
                                    <div class="card border-0 select-delivery rounded-4">
                                        <div class="card-body row px-sm-3 px-2 justify-content-between align-items-center">
                                            <p class="title border-bottom px-2 pb-2 mb-2">
                                                <i class="fa-solid fa-badge-percent"></i>
                                                <span class="px-2">
                                                    <?php echo e(trans('labels.apply_coupon')); ?>

                                                </span>
                                            </p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <input type="text" class="form-control rounded-2 offer-input"
                                                    value="<?php echo e(Session::has('offer_code') ? Session::get('offer_code') : ''); ?>"
                                                    name="promocode" id="couponcode"
                                                    placeholder="<?php echo e(trans('labels.coupon_code')); ?>" readonly>

                                                <button class="btn btn-md mb-0 btn-store d-none" id="btnremove"
                                                    onclick="RemoveCopon()"><?php echo e(trans('labels.remove')); ?></button>

                                                <button class="btn btn-md mb-0 btn-store d-block" id="btnapply"
                                                    onclick="ApplyCopon()"><?php echo e(trans('labels.apply')); ?></button>
                                            </div>
                                            <input type="hidden" id="removecouponurl"
                                                value="<?php echo e(URL::to('/cart/removepromocode')); ?>" />
                                            <input type="hidden" id="applycouponurl"
                                                value="<?php echo e(URL::to('/cart/applypromocode')); ?>" />
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(@Auth::user() && Auth::user()->type == 3): ?>
                                <?php if(loyaltyhelper::getloyaltydata($vdata) != null && loyaltyhelper::getloyaltydata($vdata)->is_available == 1): ?>
                                    <div class="border rounded py-0 mb-4 <?php if(Session::get('offer_type') == 'promocode'): ?> d-none <?php endif; ?>"
                                        id="loyaltysection">
                                        <div class="card border-0 select-delivery rounded-4">
                                            <div class="card-body px-sm-3 px-2">
                                                <div class="d-flex align-items-start border-bottom pb-2 px-0">
                                                    <div>
                                                        <p class="title px-2"><i class="fa-solid fa-trophy"></i>
                                                            <span class="px-2"
                                                                id="loyalty_program"><?php echo e(trans('labels.loyalty_program')); ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row mt-2 align-items-center">
                                                    <p class="apply-coupon-subtitle col-10" id="loyalty_desc">
                                                        <?php echo e(trans('labels.you_have_currently')); ?>

                                                        <b><?php echo e(@loyaltyhelper::availablepoints(@Auth::user()->id, @$vdata)); ?></b>
                                                        <?php echo e(trans('labels.use_it_on_order')); ?>

                                                    </p>
                                                    <div class="px-2 py-2">
                                                        <h6 class="fw-600">1 <?php echo e(trans('labels.point')); ?> =
                                                            <?php echo e(helper::currency_formate(@loyaltyhelper::getloyaltydata(@$vdata)->per_coin_amount, @$vdata)); ?>

                                                        </h6>

                                                        <?php if(loyaltyhelper::availablepoints(@Auth::user()->id, @$vdata) > 0): ?>
                                                            <div class="d-flex mt-2 gap-2">
                                                                <input type="text" class="form-control input-h"
                                                                    name="points" id="points"
                                                                    placeholder="<?php echo e(trans('labels.enter_point')); ?>"
                                                                    value="<?php echo e(Session::get('offer_code')); ?>"
                                                                    <?php if(Session::get('offer_type') == 'loyalty'): ?> readonly <?php endif; ?>>
                                                                <input type="hidden" id="applyredeempoints"
                                                                    value="<?php echo e(URL::to('/cart/applyredeempoints')); ?>" />
                                                                <input type="hidden" id="removeredeempoints"
                                                                    value="<?php echo e(URL::to('/cart/removeredeempoints')); ?>" />
                                                                <button class="btn btn-md mb-0 btn-store d-none"
                                                                    href="javascript:void(0)" id="btnremovepoint"
                                                                    onclick="RemovePoints()"><?php echo e(trans('labels.remove')); ?></button>
                                                                <button class="btn btn-md mb-0 btn-store d-block"
                                                                    id="btnredeempoint"
                                                                    onclick="RedeemPoints('<?php echo e(@$vdata); ?>')"><?php echo e(trans('labels.redeem')); ?></button>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                            <div class="border rounded py-0 mb-4">
                                <div class="card border-0 select-delivery rounded-4">
                                    <div class="card-body row justify-content-between align-items-center">
                                        <div class="d-flex align-items-start col-md-6 col-lg-12 col-xl-7 px-0">
                                            <p class="title px-2 mb-2">
                                                <i class="fa-solid fa-badge-percent"></i>
                                                <span class="px-2">
                                                    <?php echo e(trans('labels.apply_coupon')); ?>

                                                </span>
                                            </p>
                                            <div class="d-flex gap-3 align-items-center">
                                                <input type="text" class="form-control rounded-2 offer-input"
                                                    value="<?php echo e(Session::has('offer_code') ? Session::get('offer_code') : ''); ?>"
                                                    name="promocode" id="couponcode"
                                                    placeholder="<?php echo e(trans('labels.coupon_code')); ?>" readonly>

                                                <button class="btn btn-md mb-0 btn-store d-none" id="btnremove"
                                                    onclick="RemoveCopon()"><?php echo e(trans('labels.remove')); ?></button>

                                                <button class="btn btn-md mb-0 btn-store d-block" id="btnapply"
                                                    onclick="ApplyCopon()"><?php echo e(trans('labels.apply')); ?></button>
                                            </div>
                                        </div>
                                        <input type="hidden" id="removecouponurl"
                                            value="<?php echo e(URL::to('/cart/removepromocode')); ?>" />
                                        <input type="hidden" id="applycouponurl"
                                            value="<?php echo e(URL::to('/cart/applypromocode')); ?>" />
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="border rounded py-0 mb-4">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body row gx-sm-3 gx-0">
                                <div class="d-flex align-items-center border-bottom pb-2">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <p class="title px-2"><?php echo e(trans('labels.order_summary')); ?></p>
                                </div>
                                <div class="col">

                                    <ul class="list-group list-group-flush order-summary-list" id="payment_summery_list">
                                        <li class="list-group-item">
                                            <?php echo e(trans('labels.sub_total')); ?>

                                            <span>
                                                <?php echo e(helper::currency_formate($total_price, @$vdata)); ?>

                                            </span>
                                        </li>

                                        <?php
                                            if (
                                                Session::get('offer_type') == 'promocode' ||
                                                Session::get('offer_type') == 'loyalty'
                                            ) {
                                                $discount = Session::get('offer_amount');
                                            } else {
                                                $discount = 0;
                                            }
                                        ?>
                                        <li class="list-group-item <?php if(Session::get('offer_type') == ''): ?> d-none <?php endif; ?>"
                                            id="discount_1">
                                            <?php echo e(trans('labels.discount')); ?>

                                            <span id="offer_amount">
                                                - <?php echo e(helper::currency_formate(@$discount, @$vdata)); ?>

                                            </span>
                                        </li>
                                        <?php
                                            $totalcarttax = 0;
                                        ?>
                                        <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $rate = $taxArr['rate'][$k];
                                                $totalcarttax += (float) $taxArr['rate'][$k];
                                            ?>
                                            <li class="list-group-item" id="tax_list">
                                                <?php echo e($tax); ?>

                                                <span>
                                                    <?php echo e(helper::currency_formate($rate, $vdata)); ?>

                                                </span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($total_price >= helper::appdata($vdata)->min_order_amount_for_free_shipping): ?>
                                            <input type="hidden" name="delivery_charge" id="delivery_charge"
                                                value="0">
                                            <?php
                                                $grand_total = $total_price - $discount + $totalcarttax;
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $grand_total =
                                                    $total_price -
                                                    $discount +
                                                    $totalcarttax +
                                                    helper::appdata($vdata)->shipping_charges;
                                            ?>
                                            <input type="hidden" name="delivery_charge" id="delivery_charge"
                                                value="<?php echo e(helper::appdata($vdata)->shipping_charges); ?>">
                                            <li class="list-group-item" id="shipping_charge_hide">
                                                <?php echo e(trans('labels.delivery_charge')); ?> (+)
                                                <span id="shipping_charge">
                                                    <?php echo e(helper::currency_formate(helper::appdata($vdata)->shipping_charges, @$vdata)); ?>

                                                </span>
                                            </li>
                                        <?php endif; ?>
                                        <li class="list-group-item fw-700 text-dark">
                                            <?php echo e(trans('labels.grand_total')); ?>

                                            <span class="fw-700 text-dark" id="grand_total_view">
                                                <?php echo e(helper::currency_formate($grand_total, @$vdata)); ?>

                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('front.product.service-trusted', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="border rounded py-0 mb-4">
                        <div class="card border-0 select-delivery rounded-4">
                            <div class="card-body">
                                <div class="radio-item-container px-sm-2 px-0">
                                    <div class="d-flex align-items-center border-bottom pb-2">
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                        <p class="title px-2"> <?php echo e(trans('labels.payment_option')); ?></p>
                                    </div>
                                    <?php $key = 0; ?>
                                    <?php $__currentLoopData = $paymentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <div class="col-12 select-payment-list-items">
                                                <div class="form-check p-0 d-flex align-items-center gap-2">
                                                    <input class="form-check-input m-0" type="radio"
                                                        id="<?php echo e($payment->payment_type); ?>" name="payment"
                                                        data-payment_type="<?php echo e($payment->payment_type); ?>"
                                                        data-currency="<?php echo e($payment->currency); ?>"
                                                        <?php if($key++ == 0): ?> checked <?php endif; ?>
                                                        value="<?php echo e($payment->payment_type); ?>">
                                                    <label class="form-check-label m-0 w-100"
                                                        for="<?php echo e($payment->payment_type); ?>">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="fs-7"><?php echo e($payment->payment_name); ?></p>
                                                                <?php if(Auth::user()): ?>
                                                                    <?php if($payment->payment_type == 16): ?>
                                                                        <span
                                                                            class="fs-7 fw-500 text-dark"><?php echo e(helper::currency_formate(Auth::user()->wallet, $vdata)); ?></span>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <img src="<?php echo e(helper::image_path($payment->image)); ?>"
                                                                alt="" class="select-paymentimages">
                                                        </div>
                                                    </label>
                                                    <?php if($payment->payment_type == '2'): ?>
                                                        <input type="hidden" name="razorpay" id="razorpay"
                                                            value="<?php echo e($payment->public_key); ?>">
                                                    <?php endif; ?>
                                                    <?php if($payment->payment_type == '3'): ?>
                                                        <input type="hidden" name="stripekey" id="stripekey"
                                                            value="<?php echo e($payment->public_key); ?>">
                                                        <input type="hidden" name="stripecurrency" id="stripecurrency"
                                                            value="<?php echo e($payment->currency); ?>">
                                                    <?php endif; ?>
                                                    <?php if($payment->payment_type == '4'): ?>
                                                        <input type="hidden" name="flutterwavekey" id="flutterwavekey"
                                                            value="<?php echo e($payment->public_key); ?>">
                                                    <?php endif; ?>
                                                    <?php if($payment->payment_type == '5'): ?>
                                                        <input type="hidden" name="paystackkey" id="paystackkey"
                                                            value="<?php echo e($payment->public_key); ?>">
                                                    <?php endif; ?>
                                                    <?php if($payment->payment_type == '6'): ?>
                                                        <input type="hidden"
                                                            value="<?php echo e($payment->payment_description); ?>"
                                                            id="bank_payment">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($payment->payment_type == 3): ?>
                                            <div class="my-3 d-none" id="card-element"></div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-primary btn py-3 fs-15 fw-500 text-center w-100 checkout"
                        onclick="Order()"><?php echo e(trans('labels.place_order')); ?></button>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <input type="hidden" id="sub_total" value="<?php echo e($total_price); ?>" />
    <input type="hidden" id="tax" value="<?php echo e(implode('|', $taxArr['rate'])); ?>" />
    <input type="hidden" name="tax_name" id="tax_name" value="<?php echo e(implode('|', $taxArr['tax'])); ?>">
    <input type="hidden" name="totaltax" id="totaltax" value="<?php echo e($totalcarttax); ?>">
    <input type="hidden" name="grand_total" id="grand_total" value="<?php echo e($grand_total); ?>">

    <input type="hidden" id="table_required" value="<?php echo e(trans('messages.table_required')); ?>">
    <input type="hidden" id="delivery_time_required" value="<?php echo e(trans('messages.delivery_time_required')); ?>">
    <input type="hidden" id="delivery_date_required" value="<?php echo e(trans('messages.delivery_date_required')); ?>">
    <input type="hidden" id="address_required" value="<?php echo e(trans('messages.address_required')); ?>">
    <input type="hidden" id="no_required" value="<?php echo e(trans('messages.no_required')); ?>">
    <input type="hidden" id="landmark_required" value="<?php echo e(trans('messages.landmark_required')); ?>">
    <input type="hidden" id="pincode_required" value="<?php echo e(trans('messages.pincode_required')); ?>">
    <input type="hidden" id="delivery_area_required" value="<?php echo e(trans('messages.delivery_area')); ?>">
    <input type="hidden" id="pickup_date_required" value="<?php echo e(trans('messages.pickup_date_required')); ?>">
    <input type="hidden" id="pickup_time_required" value="<?php echo e(trans('messages.pickup_time_required')); ?>">
    <input type="hidden" id="customer_mobile_required" value="<?php echo e(trans('messages.customer_mobile_required')); ?>">
    <input type="hidden" id="customer_email_required" value="<?php echo e(trans('messages.customer_email_required')); ?>">
    <input type="hidden" id="customer_name_required" value="<?php echo e(trans('messages.customer_name_required')); ?>">
    <input type="hidden" id="currency" value="<?php echo e(helper::appdata(@$vdata)->currency); ?>">
    <input type="hidden" id="checkplanurl" value="<?php echo e(URL::to('/orders/checkplan')); ?>">
    <input type="hidden" id="paymenturl" value="<?php echo e(URL::to('/orders/paymentmethod')); ?>">
    <input type="hidden" id="mecadourl" value="<?php echo e(URL::to('/orders/mercadoorderrequest')); ?>">
    <input type="hidden" id="paypalurl" value="<?php echo e(URL::to('/orders/paypalrequest')); ?>">
    <input type="hidden" id="myfatoorahurl" value="<?php echo e(URL::to('/orders/myfatoorahrequest')); ?>">
    <input type="hidden" id="toyyibpayurl" value="<?php echo e(URL::to('/orders/toyyibpayrequest')); ?>">
    <input type="hidden" id="phonepeurl" value="<?php echo e(URL::to('/orders/phoneperequest')); ?>">
    <input type="hidden" id="paytaburl" value="<?php echo e(URL::to('/orders/paytabrequest')); ?>">
    <input type="hidden" id="mollieurl" value="<?php echo e(URL::to('/orders/mollierequest')); ?>">
    <input type="hidden" id="khaltiurl" value="<?php echo e(URL::to('/orders/khaltirequest')); ?>">
    <input type="hidden" id="xenditurl" value="<?php echo e(URL::to('/orders/xenditrequest')); ?>">
    <input type="hidden" id="payment_url" value="<?php echo e(URL::to(@$storeinfo->slug)); ?>/payment">
    <input type="hidden" id="website_title" value="<?php echo e(helper::appdata(@$vdata)->website_title); ?>">
    <input type="hidden" id="image" value="<?php echo e(helper::appdata(@$vdata)->image); ?>">
    <input type="hidden" id="slug" value="<?php echo e(@$storeinfo->slug); ?>">
    <input type="hidden" id="failure" value="<?php echo e(url()->current() . '?buy_now=' . request()->get('buy_now')); ?>">
    <input type="hidden" name="buynow_key" id="buynow_key" value="<?php echo e(request()->get('buy_now')); ?>">
    <form action="<?php echo e(url('/orders/paypalrequest')); ?>" method="post" class="d-none">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="return" value="2">
        <input type="submit" class="callpaypal" name="submit">
    </form>

    <?php if(count($coupons) > 0): ?>
        <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasExample">
            <div class="offers-label <?php echo e(session()->get('direction') == 2 ? 'offers-label-rtl' : 'offers-label-ltr'); ?>">
                <i class="fa-light fa-badge-percent text-white"></i>
                <div class="offers-label-name"><?php echo e(trans('labels.offer')); ?></div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Apply Coupon Modal Promocode -->
    <div class="offcanvas  <?php echo e(session()->get('direction') == 2 ? 'offcanvas-start' : 'offcanvas-end'); ?>" tabindex="-1"
        id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header justify-content-between bg-light offcanvas-header-coupons">
            <h5 class="offcanvas-title" id="offcanvasRightLabel"><?php echo e(trans('labels.coupons_offers')); ?></h5>
            <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row g-4">
                    <div class="col px-0">
                        <div class="card promo-card position-relative rounded h-100">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-between" data-copy=true>
                                    <input type="hidden" id="applycoponurl"
                                        value="<?php echo e(URL::to('/cart/applypromocode')); ?>" />
                                    <span id="promocode" type="text" class="rounded coupons-label px-2 input-h"
                                        readonly value=""><?php echo e($coupon->offer_code); ?></span>
                                    <p class="cursor-pointer fs-15 fw-600"
                                        onclick="copyToClipboard('<?php echo e($coupon->offer_code); ?>')">
                                        <?php echo e(trans('labels.copy')); ?></p>
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-2">
                                        <?php echo e($coupon->offer_type == 1 ? helper::currency_formate($coupon->offer_amount, $vdata) : $coupon->offer_amount . '%'); ?>

                                        <?php echo e(trans('labels.coupons')); ?></h5>
                                    <div class="coupons-content">
                                        <div class="mt-2">
                                            <h6 class="fs-15 fw-500"><?php echo e($coupon->offer_name); ?></h6>
                                            <p class="text-muted fw-400 fs-8 pt-1 mb-0">
                                                <?php echo e(Str::limit($coupon->description, 180)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        let storeid = "<?php echo e(@$vdata); ?>";
        var showbutton = "<?php echo e(Session::get('offer_type')); ?>";
        $(document).ready(function() {
            if (showbutton == 'promocode') {
                $('#btnremove').removeClass('d-none');
                $('#btnapply').addClass('d-none');
            } else {
                $('#btnremove').addClass('d-none');
                $('#btnapply').removeClass('d-none');
            }
            if (showbutton == 'loyalty') {
                $('#btnremovepoint').removeClass('d-none');
                $('#btnredeempoint').addClass('d-none');
            } else {
                $('#btnremovepoint').addClass('d-none');
                $('#btnredeempoint').removeClass('d-none');
            }
        });

        function ApplyCopon() {
            $('#btnapply').prop("disabled", true);
            $('#btnapply').html(
                '<span class="loader"></span>');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('#applycouponurl').val(),
                method: 'post',
                data: {
                    promocode: $('#couponcode').val(),
                    sub_total: $('#sub_total').val(),
                    vendor_id: $('#vendor').val(),
                },
                success: function(response) {
                    if (response.status == 1) {
                        var total = parseFloat($('#sub_total').val());
                        var tax = parseFloat($('#totaltax').val());
                        var delivery_charge = parseFloat($('#delivery_charge').val());
                        var discount = "";
                        if (response.data.offer_type == 1) {
                            discount = response.data.offer_amount;
                        }
                        if (response.data.offer_type == 2) {
                            discount = total * parseFloat(response.data.offer_amount) / 100;
                        }
                        if ($("input[name='cart-delivery']:checked").val() == 1) {
                            var grandtotal = parseFloat(total) + parseFloat(tax) + parseFloat(delivery_charge) -
                                parseFloat(discount);
                        } else {
                            var grandtotal = parseFloat(total) + parseFloat(tax) - parseFloat(discount);
                        }
                        $('#loyaltysection').addClass('d-none');
                        $('#discount_1').removeClass('d-none');
                        $('#offer_amount').text('- ' + currency_formate(parseFloat(discount)));
                        $('#grand_total_view').html(currency_formate(grandtotal));
                        $('#grand_total').val(grandtotal);
                        $('#discount_amount').val(discount);
                        $('#coupon_code').val(response.data.offer_code);
                        $('#offer_type').val(response.offer_type);
                        $('#points').val('');
                        $('#btnremove').removeClass('d-none');
                        $('#btnapply').addClass('d-none');
                        $('#btnapply').html("<?php echo e(trans('labels.apply')); ?>");
                        $('#btnapply').prop("disabled", false);
                        toastr.success(response.message);
                    } else {
                        $('#btnapply').html("<?php echo e(trans('labels.apply')); ?>");
                        $('#btnapply').prop("disabled", false);
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    $('#btnapply').html("<?php echo e(trans('labels.apply')); ?>");
                    $('#btnapply').prop("disabled", false);
                    toastr.error(wrong);
                }
            });
        }

        function RemoveCopon() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-1 yes-btn',
                    cancelButton: 'btn btn-danger mx-1 no-btn'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: are_you_sure,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: yes,
                cancelButtonText: no,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#btnremove').prop("disabled", true);
                    $('#btnremove').html(
                        '<span class="loader"></span>');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: $('#removecouponurl').val(),
                        method: 'post',
                        data: {
                            promocode: $('#couponcode').val()
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                var total = $('#sub_total').val();
                                var tax = parseFloat($('#totaltax').val());
                                var delivery_charge = $('#delivery_charge').val();
                                var discount = 0;
                                if ($("input[name='cart-delivery']:checked").val() == 1) {
                                    var grandtotal = parseFloat(total) + parseFloat(tax) + parseFloat(
                                            delivery_charge) -
                                        parseFloat(discount);
                                } else {
                                    var grandtotal = parseFloat(total) + parseFloat(tax) - parseFloat(
                                        discount);
                                }
                                $('#loyaltysection').removeClass('d-none');
                                $('#discount_1').addClass('d-none');
                                $('#offer_amount').text('- ' + currency_formate(parseFloat(0)));
                                $('#grand_total_view').html(currency_formate(grandtotal));
                                $('#couponcode').val('');
                                $('#coupon_code').val('');
                                $('#offer_type').val('');
                                $('#points').val('');
                                $('#grand_total').val(grandtotal);
                                $('#discount_amount').val(discount);
                                $('#btnremove').addClass('d-none');
                                $('#btnapply').removeClass('d-none');
                                $('#btnremove').html("<?php echo e(trans('labels.remove')); ?>");
                                $('#btnremove').prop("disabled", false);
                                toastr.success(response.message);
                            } else {
                                $('#btnremove').html("<?php echo e(trans('labels.remove')); ?>");
                                $('#btnremove').prop("disabled", false);
                                toastr.error(response.message);
                            }
                        },
                        error: function() {
                            $('#btnremove').html("<?php echo e(trans('labels.remove')); ?>");
                            $('#btnremove').prop("disabled", false);
                            toastr.error(wrong);
                        }
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.DismissReason.cancel
                }
            })
        }

        var select = "<?php echo e(trans('labels.select')); ?>";
        var dateFormat = "<?php echo e(helper::appdata($vdata)->date_format); ?>";
        var placeholderFormat = dateFormat
            .replace(/Y/g, 'yyyy') // Full year
            .replace(/m/g, 'mm') // Month
            .replace(/d/g, 'dd'); // Day

        document.getElementById("delivery_dt").setAttribute("placeholder", placeholderFormat);

        flatpickr(".delivery_pickup_date", {
            dateFormat: dateFormat,
            enableTime: false,
            altInput: true,
            altFormat: dateFormat,
            minDate: 'today'
        });
    </script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://checkout.stripe.com/v2/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/checkout.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/checkout.blade.php ENDPATH**/ ?>
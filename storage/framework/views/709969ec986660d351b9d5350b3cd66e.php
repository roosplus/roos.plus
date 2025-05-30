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
                        <?php echo e(trans('labels.my_cart')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- My Cart section start -->

    <?php if(count($cartdata) > 0): ?>
        <section class="my-5">
            <div class="container">
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first()->activated == 1): ?>
                    <?php echo $__env->make('front.cart_checkout_countdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div class="table-responsive cart-view">
                    <table class="table m-0 rounded-2 overflow-hidden" id="update_qty">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col" class="cart-table-title text-light p-3">
                                    <?php echo e(trans('labels.product')); ?>

                                </th>
                                <th scope="col" class="cart-table-title text-center text-light p-3">
                                    <?php echo e(trans('labels.price')); ?>

                                </th>
                                <th scope="col" class="cart-table-title text-center text-light p-3">
                                    <?php echo e(trans('labels.qty')); ?>

                                </th>
                                <th scope="col" class="cart-table-title text-center text-light p-3">
                                    <?php echo e(trans('labels.total')); ?>

                                </th>
                                <th scope="col" class="cart-table-title text-center text-light p-3">
                                    <?php echo e(trans('labels.action')); ?>

                                </th>
                            </tr>
                        </thead>
                        <?php
                            $subtotal = 0;
                        ?>
                        <tbody class="order-list">
                            <?php $__currentLoopData = $cartdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $subtotal += $cart->price * $cart->qty;
                                ?>
                                <tr class="align-middle text-center">
                                    <td class="p-3">
                                        <div class="tbl_cart_product gap-3">
                                            <div class="item-img d-lg-block d-none">
                                                <img src="<?php echo e(asset('storage/app/public/item/' . $cart->item_image)); ?>"
                                                    class="card-img-top p-0 object-fit-cover border rounded-4"
                                                    alt="...">
                                            </div>
                                            <div
                                                class="row flex-column gap-1 <?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                                <div class="item-title mb-0">
                                                    <p class="text-dark m-0 text-capitalize">
                                                        <?php echo e($cart->item_name); ?>

                                                    </p>
                                                </div>
                                                <li class="m-0">
                                                    <?php if($cart->variants_id != '' || $cart->extras_id != ''): ?>
                                                        <a href="javascript:void(0)" class="text-muted text-capitalize fs-7"
                                                            onclick="showextra('<?php echo e(@$cart->variants_name); ?>','<?php echo e(@$cart->item_price); ?>','<?php echo e(@$cart->extras_name); ?>','<?php echo e(@$cart->extras_price); ?>','<?php echo e(@$cart->item_name); ?>')">
                                                            <?php echo e(trans('labels.customize')); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </li>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <p class="item-price text-center">
                                            <?php echo e(helper::currency_formate($cart->price, $storeinfo->id)); ?>

                                        </p>
                                    </td>
                                    <td class="p-3">
                                        <div class="d-flex justify-content-center">
                                            <div
                                                class="input-group d-flex qty-input-cart responsive-margin m-0 rounded-2 hight-modal-btn align-items-center">
                                                <button class="btn p-0 change-qty-2"
                                                    onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','minus')"
                                                    value="minus value" href="javascript:void(0)" aria-label="Previous">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="text" class="border text-center"
                                                    id="number_<?php echo e($cart->id); ?>" name="number"
                                                    value="<?php echo e($cart->qty); ?>" min="1" max="10" readonly>
                                                <button class="btn p-0 change-qty-2"
                                                    onclick="qtyupdate('<?php echo e($cart->id); ?>','<?php echo e($cart->item_id); ?>','plus')"
                                                    value="plus value" href="javascript:void(0)" aria-label="Next">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <?php
                                            $grand_total = $cart->price * $cart->qty;
                                        ?>
                                        <p class="fs-15 fw-600">
                                            <?php echo e(helper::currency_formate($grand_total, $storeinfo->id)); ?>

                                        </p>
                                    </td>

                                    <td class="p-3">
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0)" onclick="RemoveCart('<?php echo e($cart->id); ?>')"
                                                class="delete-icon" tooltip="Remove">
                                                <i class="fa-solid fa-trash-can text-light"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <p class="muted text-end fs-7 line-2 mt-2"><?php echo e(trans('messages.cart_note')); ?></p>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first()->activated == 1): ?>
                    <?php echo $__env->make('front.cart_checkout_progressbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <div class="row g-3 justify-content-between mt-3 mb-xl-0 mb-3">
                    <div class="col-lg-3 col-md-5 col-sm-6">
                        <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" type="button"
                            class="btn fs-15 fw-500 btn-outline-dark px-sm-4 py-2 w-100 d-flex gap-2 justify-content-center">
                            <i class="fa-light fa-arrow-left-long fw-600"></i>
                            <span class="fw-500"><?php echo e(trans('labels.return_shop')); ?></span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6">
                        <button
                            class="btn btn-primary px-sm-4 fs-15 w-100 d-flex gap-2 justify-content-center px-sm-4 py-2"id="cartcheckout">
                            <span class="fw-500"><?php echo e(trans('labels.checkout')); ?></span>
                            <i class="fa-light fa-arrow-right-long fw-600"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <input type="hidden" id="removecart" value="<?php echo e(URL::to('/cart/deletecartitem')); ?>" />
        <input type="hidden" id="qtyupdate_url" value="<?php echo e(URL::to('/cart/qtyupdate')); ?>" />
    <?php else: ?>
        <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- My Cart section end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var variation_title = "<?php echo e(trans('labels.variation')); ?>";
        var extra_title = "<?php echo e(trans('labels.extras')); ?>";

        $('#cartcheckout').on('click', function() {
            "use strict";
            $('#cartcheckout').prop("disabled", true);
            $('#cartcheckout').html(
                '<span class="loader"></span>');
            <?php if(Auth::user() && Auth::user()->type == 3): ?>
                location.href = "<?php echo e(URL::to(@$storeinfo->slug . '/checkout?buy_now=0')); ?>";
            <?php else: ?>
                <?php if(helper::appdata($storeinfo->id)->checkout_login_required == 1): ?>
                    <?php if(helper::appdata($storeinfo->id)->is_checkout_login_required == 1): ?>
                        location.href = "<?php echo e(URL::to(@$storeinfo->slug . '/login')); ?>";
                    <?php else: ?>
                        $("#exampleModalToggle").on('hidden.bs.modal', function(e) {
                            $('#cartcheckout').html(
                                "<span class='fw-500'><?php echo e(trans('labels.checkout')); ?></span><i class='fa-light fa-arrow-right-long fw-600'></i>"
                            );
                            $('#cartcheckout').prop("disabled", false);
                        });
                        $('#exampleModalToggle').modal('show');
                    <?php endif; ?>
                <?php else: ?>
                    location.href = "<?php echo e(URL::to(@$storeinfo->slug . '/checkout?buy_now=0')); ?>";
                <?php endif; ?>
            <?php endif; ?>
        });
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/cart.blade.php ENDPATH**/ ?>
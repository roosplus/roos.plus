<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to($storeinfo->slug . '/orders/')); ?>"
                            class="text-dark"><?php echo e(trans('labels.orders')); ?></a></li>

                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.order_details')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <section class="bg-light py-sm-5 py-4">
        <div class="container">
            <div class="row g-0 g-lg-5">
                <div class="col-lg-8 px-0 mt-0 order-det-card">
                    <div class="card rounded mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-3 border-bottom mb-3">
                                <i class="fa-solid fa-cart-flatbed"></i>
                                <p class="title px-2"><?php echo e(trans('labels.order_details')); ?></p>
                            </div>
                            <div class="card border-0 p-0">
                                <div class="card-body p-0">
                                    <div class="order-details">
                                        <ul class="row">
                                            <li class="col-md-6 col-lg-3 col-6">
                                                <a><?php echo e(trans('labels.order_date')); ?></a>
                                                <p><?php echo e(helper::date_format($orderdata->created_at, $orderdata->vendor_id)); ?>

                                                </p>
                                            </li>
                                            <li class="border-start col-md-6 col-lg-3 mt-md-0 mt-lg-0 col-6">
                                                <a><?php echo e(trans('labels.status')); ?></a>
                                                <div class="d-flex align-items-center pt-1">
                                                    <p class="pt-0 text-center m-auto">
                                                        <?php echo e(@helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $storeinfo->id)->name == null ? '-' : @helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name); ?>


                                                    </p>
                                                </div>
                                            </li>
                                            <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">
                                                <a><?php echo e(trans('labels.type')); ?></a>
                                                <p>
                                                    <?php if($orderdata->order_type == 1): ?>
                                                        <?php echo e(trans('labels.delivery')); ?>

                                                    <?php elseif($orderdata->order_type == 2): ?>
                                                        <?php echo e(trans('labels.pickup')); ?>

                                                    <?php elseif($orderdata->order_type == 3): ?>
                                                        <?php echo e(trans('labels.dine_in')); ?>

                                                    <?php endif; ?>
                                                </p>
                                                <?php if($orderdata->order_type == 3): ?>
                                                    <span class="fs-8">( <?php echo e($orderdata['tableqr']->name); ?> )</span>
                                                <?php endif; ?>
                                            </li>
                                            <li class="border-start col-md-6 col-lg-3 mt-4 mt-lg-0 col-6">
                                                <a><?php echo e(trans('labels.order')); ?></a>
                                                <div class="d-flex justify-content-center align-items-center pt-1">
                                                    <strong class="pt-0">#<?php echo e($orderdata->order_number); ?></strong>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive cart-view mt-3">
                                <table class="table m-0 rounded-2 overflow-hidden" id="update_qty">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th scope="col" class="cart-table-title fs-15 fw-500 text-light p-3">
                                                <?php echo e(trans('labels.products')); ?>

                                            </th>
                                            <th scope="col"
                                                class="cart-table-title fs-15 fw-500 text-center text-light p-3">
                                                <?php echo e(trans('labels.price')); ?>

                                            </th>
                                            <th scope="col"
                                                class="cart-table-title fs-15 fw-500 text-center text-light p-3">
                                                <?php echo e(trans('labels.qty')); ?>

                                            </th>
                                            <th scope="col"
                                                class="cart-table-title fs-15 fw-500 text-center text-light p-3">
                                                <?php echo e(trans('labels.total')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="order-list">
                                        <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="align-middle text-center">
                                                <td class="p-3">
                                                    <div class="tbl_cart_product gap-3">
                                                        <div class="item-img">
                                                            <img src="<?php echo e(asset('storage/app/public/item/' . $odata->item_image)); ?>"
                                                                class="card-img-top p-0 object-fit-cover border rounded-4"
                                                                alt="...">
                                                        </div>
                                                        <div
                                                            class="row flex-column gap-1 <?php echo e(session()->get('direction') == 2 ? 'text-end' : 'text-start'); ?>">
                                                            <div class="item-title mb-0">
                                                                <p class="text-dark m-0 text-capitalize">
                                                                    <?php echo e($odata->item_name); ?>

                                                                </p>
                                                            </div>
                                                            <li class="m-0">
                                                                <?php if($odata->variants_id != '' || $odata->extras_id != ''): ?>
                                                                    <a class="customisable cursor-pointer"
                                                                        onclick="showextra('<?php echo e($odata->variants_name); ?>','<?php echo e($odata->variants_price); ?>','<?php echo e($odata->extras_name); ?>','<?php echo e($odata->extras_price); ?>','<?php echo e($odata->item_name); ?>')"><?php echo e(trans('labels.customize')); ?></a>
                                                                <?php endif; ?>
                                                                <a class="customisable cursor-pointer"></a>
                                                            </li>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-3">
                                                    <p class="item-price text-center">
                                                        <?php echo e(helper::currency_formate($odata->price, $storeinfo->id)); ?>

                                                    </p>
                                                </td>
                                                <td class="p-3">
                                                    <p class="item-price text-center">
                                                        <?php echo e($odata->qty); ?>

                                                    </p>
                                                </td>
                                                <td class="p-3">
                                                    <p class="fs-15 fw-600">
                                                        <?php echo e(helper::currency_formate($odata->qty * $odata->price, $storeinfo->id)); ?>

                                                    </p>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded mb-4">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center pb-3 border-bottom">
                                <i class="fa-regular fa-credit-card"></i>
                                <p class="title"><?php echo e(trans('labels.payment_summary')); ?></p>
                            </div>
                            <ul class="list-group list-group-flush order-summary-list">
                                <li class="list-group-item">
                                    <?php echo e(trans('labels.sub_total')); ?>

                                    <span>
                                        <?php echo e(helper::currency_formate(@$summery['sub_total'], $storeinfo->id)); ?>

                                    </span>
                                </li>
                                <?php
                                    $tax = explode('|', $summery['tax']);
                                    $tax_name = explode('|', $summery['tax_name']);
                                ?>
                                <?php if($summery['tax'] != null && $summery['tax'] != ''): ?>
                                    <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item">
                                            <?php echo e($tax_name[$key]); ?>

                                            <span>
                                                <?php echo e(helper::currency_formate(@(float) $tax[$key], $storeinfo->id)); ?>

                                            </span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if($summery['delivery_charge'] > 0): ?>
                                    <li class="list-group-item">
                                        <?php echo e(trans('labels.delivery_charge')); ?> (+)
                                        <span>
                                            <?php echo e(helper::currency_formate(@$summery['delivery_charge'], $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                <?php endif; ?>
                                <?php if($summery['discount_amount'] > 0): ?>
                                    <li class="list-group-item">
                                        <?php if($summery['offer_type'] == 'loyalty'): ?>
                                            <?php echo e(trans('labels.loyalty_discount')); ?> (-)
                                        <?php endif; ?>
                                        <?php if($summery['offer_type'] == 'promocode'): ?>
                                            <?php echo e(trans('labels.discount')); ?>

                                            (<?php echo e($summery['couponcode']); ?>)
                                        <?php endif; ?>
                                        <span>
                                            <?php echo e(helper::currency_formate(@$summery['discount_amount'], $storeinfo->id)); ?>

                                        </span>
                                    </li>
                                <?php endif; ?>
                                <li class="list-group-item fw-700 text-dark">
                                    <?php echo e(trans('labels.grand_total')); ?>

                                    <span class="fw-700 text-dark">
                                        <?php echo e(helper::currency_formate($summery['grand_total'], $storeinfo->id)); ?>

                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-0 customer-left-side">
                    <div class="card rounded mb-4">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center pb-3 mb-3 border-bottom">
                                <i class="fa-solid fa-circle-info text-dark"></i>
                                <p class="title"><?php echo e(trans('labels.customer')); ?></p>
                            </div>
                            <div class="cust-info">
                                <?php if($summery['customer_name'] != null): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa-regular fa-user"></i>
                                        <p class="px-2"><?php echo e($summery['customer_name']); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if($summery['customer_email'] != null): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa-regular fa-envelope"></i>
                                        <a href="#" class="px-2"><?php echo e($summery['customer_email']); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if($summery['mobile'] != null): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa-solid fa-phone"></i>
                                        <b class="px-2 fw-500"><?php echo e($summery['mobile']); ?></b>
                                    </div>
                                <?php endif; ?>
                                <?php if($summery['order_notes'] != null): ?>
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa-regular fa-clipboard"></i>
                                        <b class="px-2 fw-500"><?php echo e($summery['order_notes']); ?></b>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($summery['order_type'] == 1): ?>
                        <div class="card mb-4">
                            <div class="card-body cust-info">
                                <div class="d-flex gap-2 align-items-center pb-3 mb-3 border-bottom">
                                    <i class="fa-solid fa-truck-fast text-dark"></i>
                                    <p class="title"><?php echo e(trans('labels.delivery_info')); ?></p>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-location-dot pt-1"></i>
                                    <address class="px-2">
                                        <b> <?php echo e($summery['building']); ?>, <?php echo e($summery['address']); ?>,
                                            <?php echo e($summery['landmark']); ?>, <?php echo e($summery['pincode']); ?> </b>
                                    </address>
                                </div>
                            </div>
                        </div>
                        
                    <?php endif; ?>
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center pb-3 mb-3 border-bottom">
                                <i class="fa-regular fa-money-bill-1 text-dark"></i>
                                <p class="title"><?php echo e(trans('labels.payment_method')); ?></p>
                            </div>
                            <div class="cust-info">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-money-bill-wave"></i>
                                    <p class="px-2">
                                        <?php if($orderdata->payment_type == 0): ?>
                                            <?php echo e(trans('labels.online')); ?> </br>
                                        <?php else: ?>
                                            <?php echo e(@helper::getpayment($orderdata->payment_type, $orderdata->vendor_id)->payment_name); ?>

                                            <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                                                : <?php echo e($orderdata->payment_id); ?>

                                            <?php endif; ?>
                                            </br>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                                    <div class="mb-2">
                                        <span><?php echo e(trans('labels.payment_id')); ?></span>
                                        <p class="fw-600"><?php echo e($orderdata->payment_id); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <?php if($summery['status_type'] == 1): ?>
                        <a href="<?php echo e(URL::to($storeinfo->slug . '/cancel-order/' . $summery['order_number'])); ?>"
                            class="btn-danger btn text-center w-100 py-3 fs-15 fw-500"><?php echo e(trans('labels.cancel')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var variation_title = "<?php echo e(trans('labels.variation')); ?>";
        var extra_title = "<?php echo e(trans('labels.extras')); ?>";
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/track-order.blade.php ENDPATH**/ ?>
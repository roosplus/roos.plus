<?php $__env->startSection('content'); ?>
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>"
                            class="text-dark"><?php echo e(trans('labels.home')); ?></a></li>

                    <li
                        class="breadcrumb-item active <?php echo e(session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left'); ?>">
                        <?php echo e(trans('labels.orders')); ?>

                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- Orders section end -->
    <section class="bg-light mt-0 py-sm-5 py-4">
        <div class="container">
            <div class="row gx-sm-3 gx-2">
                <?php echo $__env->make('front.theme.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-md-12 col-lg-9">
                    <div class="card rounded">
                        <div class="card-body py-4">
                            <div class="">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="page-title mb-0"><?php echo e(trans('labels.orders')); ?></h2>
                                    <div class="dropdown">
                                        <a class="btn btn-primary not-hover-secondary dropdown-toggle px-3 py-2"
                                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Status
                                        </a>
                                        <ul class="dropdown-menu custom">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(URL::to($storeinfo->slug . '/orders?type=preparing')); ?>"><?php echo e(trans('labels.preparing')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(URL::to($storeinfo->slug . '/orders?type=cancelled')); ?>"><?php echo e(trans('labels.cancelled')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo e(URL::to($storeinfo->slug . '/orders?type=delivered')); ?>"><?php echo e(trans('labels.delivered')); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="page-subtitle mt-2 mb-0 line-limit-2"><?php echo e(trans('labels.orders_desc')); ?></p>
                            </div>
                            <!-- data table start -->
                            <?php if(count($getorders) > 0): ?>
                                <div class="settings-box-body dashboard-section mt-3">
                                    <div class="table-responsive rounded">
                                        <table class="table table-striped table-hover m-0">
                                            <thead class="table-light">
                                                <tr class="fs-7 fw-600">
                                                    <th scope="col"><?php echo e(trans('labels.date')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.order_date')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.total')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.payment_type')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.action')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.view')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php $__currentLoopData = $getorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="fs-7">
                                                        <td><?php echo e(helper::date_format($orderdata->created_at, $orderdata->vendor_id)); ?>

                                                        </td>
                                                        <td>
                                                            <a
                                                                href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number)); ?>">
                                                                # <?php echo e($orderdata->order_number); ?>

                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo e(helper::currency_formate($orderdata->grand_total, $orderdata->vendor_id)); ?>

                                                        </td>
                                                        <td>
                                                            <?php if($orderdata->payment_type == 6): ?>
                                                                <?php echo e(@helper::getpayment($orderdata->payment_type, $orderdata->vendor_id)->payment_name); ?>

                                                                : <small><a
                                                                        href="<?php echo e(helper::image_path($orderdata->screenshot)); ?>"
                                                                        target="_blank"
                                                                        class="text-danger"><?php echo e(trans('labels.click_here')); ?></a></small>
                                                            <?php else: ?>
                                                                <?php echo e(@helper::getpayment($orderdata->payment_type, $orderdata->vendor_id)->payment_name); ?>

                                                            <?php endif; ?>
                                                            <?php if(in_array($orderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                                                                : <?php echo e($orderdata->payment_id); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($orderdata->status_type == '1'): ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge rounded-0 bg-warninged">
                                                                    <p class="text-break m-0 text-warning fw-500 fs-15">
                                                                        <?php echo e(@helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name == null ? '-' : @helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name); ?>

                                                                    </p>
                                                                </div>
                                                            <?php elseif($orderdata->status_type == '2'): ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge rounded-0 bg-infoed">
                                                                    <p class="text-break m-0 text-info fw-500 fs-15">
                                                                        <?php echo e(@helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name == null ? '-' : @helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name); ?>

                                                                    </p>
                                                                </div>
                                                            <?php elseif($orderdata->status_type == '3'): ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge rounded-0 bg-completed">
                                                                    <p class="text-break m-0 text-success fw-500 fs-15">
                                                                        <?php echo e(@helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name == null ? '-' : @helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name); ?>

                                                                    </p>
                                                                </div>
                                                            <?php elseif($orderdata->status_type == '4'): ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge rounded-0 bg-cancelled">
                                                                    <p class="text-break m-0 text-danger fw-500 fs-15">
                                                                        <?php echo e(@helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name == null ? '-' : @helper::gettype($orderdata->status, $orderdata->status_type, $orderdata->order_type, $orderdata->vendor_id)->name); ?>

                                                                    </p>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center"
                                                                tooltip="<?php echo e(trans('labels.detail')); ?>">
                                                                <a class="detail-btn fw-500 fs-7"
                                                                    href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $orderdata->order_number)); ?>">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <!-- data table end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Orders section end -->

    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/orders.blade.php ENDPATH**/ ?>
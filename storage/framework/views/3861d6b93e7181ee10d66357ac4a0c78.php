<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-6">
            <!-- <h5 class="pages-title fs-2"><?php echo e(trans('labels.invoice')); ?></h5> -->
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.order_details')); ?></h5>
            <div class="d-flex">

                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'custom_status')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'custom_status')->first()->activated == 1): ?>
            <div class="col-12 col-md-6">
                <div class="col-md-12 my-2 gap-2 d-flex align-items-center justify-content-end justify-content-md-end">
                    <?php if($getorderdata->status_type == 1 || $getorderdata->status_type == 2): ?>
                        <button type="button"
                            class="btn btn-sm btn-primary px-4 rounded-start-5 rounded-end-5 dropdown-toggle"
                            data-bs-toggle="dropdown"><?php echo e(@helper::gettype($getorderdata->status, $getorderdata->status_type, $getorderdata->order_type, $vendor_id)->name == null ? '-' : @helper::gettype($getorderdata->status, $getorderdata->status_type, $getorderdata->order_type, $vendor_id)->name); ?></button>
                        <div class="dropdown-menu dropdown-menu-right <?php echo e(Auth::user()->type == 1 ? 'disabled' : ''); ?>">
                            <?php $__currentLoopData = helper::customstauts($getorderdata->vendor_id, $getorderdata->order_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item w-auto cursor-pointer <?php if($getorderdata->status == $status->id): ?> fw-600 <?php endif; ?>"
                                    onclick="statusupdate('<?php echo e(URL::to('admin/orders/update-' . $getorderdata->id . '-' . $status->id . '-' . $status->type)); ?>')"><?php echo e($status->name); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-between g-3">
                <div
                    class="<?php echo e($getorderdata->order_type == 4 ? 'col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12' : 'col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 '); ?>">
                    <div class="card border-0 mb-3 h-100 d-flex box-shadow">
                        <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                            <i class="fa-solid fa-circle-info fs-5"></i>
                            <h5 class="px-2 fw-500"><?php echo e(trans('labels.order_details')); ?></h5>
                        </div>
                        <div class="card-body">

                            <div class="basic-list-group">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                        <p><?php echo e(trans('labels.order_number')); ?></p>
                                        <p class="text-dark fw-600">#<?php echo e($getorderdata->order_number); ?></p>
                                    </li>
                                    <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                        <?php echo e(trans('labels.order_date')); ?>

                                        <p class="text-muted">
                                            <?php echo e(helper::date_format($getorderdata->created_at, $vendor_id)); ?>

                                        </p>
                                    </li>
                                    <?php if($getorderdata->order_from != 'pos' && $getorderdata->order_type != 3): ?>
                                        <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                            <?php echo e($getorderdata->order_type == 1 ? trans('labels.delivery_date') : trans('labels.pickup_date')); ?>

                                            <p class="text-muted">
                                                <?php echo e(helper::date_format($getorderdata->delivery_date, $vendor_id)); ?>

                                            </p>
                                        </li>
                                        <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                            <?php echo e($getorderdata->order_type == 1 ? trans('labels.delivery_time') : trans('labels.pickup_time')); ?>

                                            <p class="text-muted"><?php echo e($getorderdata->delivery_time); ?></p>
                                        </li>
                                    <?php endif; ?>

                                    
                                    <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                        <?php echo e(trans('labels.payment_type')); ?>

                                        <span class="text-muted">
                                            <?php if($getorderdata->payment_type == 0 && $getorderdata->payment_type != ''): ?>
                                                <?php echo e(trans('labels.online')); ?>

                                            <?php elseif($getorderdata->payment_type == 6): ?>
                                                <?php echo e(@helper::getpayment($getorderdata->payment_type, $getorderdata->vendor_id)->payment_name); ?>

                                                : <small>
                                                    <a href="<?php echo e(helper::image_path($getorderdata->screenshot)); ?>"
                                                        target="_blank"
                                                        class="text-danger"><?php echo e(trans('labels.click_here')); ?></a>
                                                </small>
                                            <?php else: ?>
                                                <?php echo e(@helper::getpayment($getorderdata->payment_type, $getorderdata->vendor_id)->payment_name); ?>

                                            <?php endif; ?>
                                        </span>
                                    </li>
                                    <?php if(in_array($getorderdata->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                                        <li class="list-group-item px-0 fs-7 fw-500"><?php echo e(trans('labels.payment_id')); ?>

                                            <p class="text-muted">
                                                <?php echo e($getorderdata->payment_id); ?>

                                            </p>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php if($getorderdata->notes != ''): ?>
                                <h6><?php echo e(trans('labels.order_notes')); ?></h6>
                                <small class="text-muted"><?php echo e($getorderdata->notes); ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div
                    class="<?php echo e($getorderdata->order_type == 4 ? 'col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12' : 'col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12'); ?>">
                    <div class="card border-0 mb-3 h-100 d-flex box-shadow">
                        <div
                            class="card-header d-flex align-items-center bg-transparent text-dark py-3 justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-user fs-5"></i>
                                <h5 class="px-2 fw-500"><?php echo e(trans('labels.customer')); ?>

                                </h5>
                            </div>
                            <p class="text-muted cursor-pointer"
                                onclick="editcustomerdata('<?php echo e($getorderdata->order_number); ?>','<?php echo e($getorderdata->customer_name); ?>','<?php echo e($getorderdata->mobile); ?>','<?php echo e($getorderdata->customer_email); ?>','<?php echo e(str_replace(',', '|', $getorderdata->address)); ?>','<?php echo e(str_replace(',', '|', $getorderdata->building)); ?>','<?php echo e(str_replace(',', '|', $getorderdata->landmark)); ?>','<?php echo e($getorderdata->pincode); ?>','customer_info')">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="basic-list-group">
                                <div class="row">
                                    <div class="basic-list-group">
                                        <ul class="list-group list-group-flush">

                                            <li
                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                <p><?php echo e(trans('labels.name')); ?></p>
                                                <p class="text-muted"> <?php echo e($getorderdata->customer_name); ?></p>
                                            </li>

                                            <?php if($getorderdata->mobile != null): ?>
                                                <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                                    <p><?php echo e(trans('labels.mobile')); ?></p>
                                                    <p class="text-muted"><?php echo e($getorderdata->mobile); ?></p>
                                                </li>
                                            <?php endif; ?>

                                            <?php if($getorderdata->customer_email != null): ?>
                                                <li class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                                    <p><?php echo e(trans('labels.email')); ?></p>
                                                    <p class="text-muted"><?php echo e($getorderdata->customer_email); ?></p>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($getorderdata->order_type != 4): ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="card border-0 mb-3 h-100 d-flex box-shadow">
                            <div
                                class="card-header d-flex align-items-center bg-transparent text-dark py-3 justify-content-between">
                                <h5 class="px-2 fw-500"><i class="fa-solid fa-file-invoice fs-5"></i>
                                    <?php if($getorderdata->order_type == 3): ?>
                                        <?php echo e(trans('labels.other_info')); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('labels.billing_info')); ?>

                                    <?php endif; ?>
                                </h5>
                                <?php if($getorderdata->order_type == 1): ?>
                                    <p class="text-muted cursor-pointer"
                                        onclick="editcustomerdata('<?php echo e($getorderdata->order_number); ?>','<?php echo e($getorderdata->customer_name); ?>','<?php echo e($getorderdata->mobile); ?>','<?php echo e($getorderdata->customer_email); ?>','<?php echo e(str_replace(',', '|', $getorderdata->address)); ?>','<?php echo e(str_replace(',', '|', $getorderdata->building)); ?>','<?php echo e(str_replace(',', '|', $getorderdata->landmark)); ?>','<?php echo e($getorderdata->pincode); ?>','delivery_info')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="card-body">
                                <div class="basic-list-group">
                                    <div class="row">
                                        <?php if($getorderdata->order_type == 1): ?>
                                            <div class="col-md-12 mb-2">
                                                <div class="basic-list-group">
                                                    <ul class="list-group list-group-flush">
                                                        <?php if($getorderdata->order_from == 'pos'): ?>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                                <p><?php echo e(trans('labels.pos')); ?></p>
                                                                <p class="text-muted"> <?php echo e(trans('labels.dine_in')); ?></p>
                                                            </li>
                                                        <?php else: ?>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                                <p><?php echo e(trans('labels.address')); ?></p>
                                                                <p class="text-muted"> <?php echo e($getorderdata->address); ?></p>
                                                            </li>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                                                <p><?php echo e(trans('labels.landmark')); ?></p>
                                                                <p class="text-muted"><?php echo e($getorderdata->building); ?>,
                                                                    <?php echo e($getorderdata->landmark); ?>

                                                                </p>
                                                            </li>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between">
                                                                <p><?php echo e(trans('labels.pincode')); ?></p>
                                                                <p class="text-muted"> <?php echo e($getorderdata->pincode); ?>.</p>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif($getorderdata->order_type == 2): ?>
                                            <div class="col-md-12 mb-2">
                                                <div class="basic-list-group">
                                                    <ul class="list-group list-group-flush">
                                                        <?php if($getorderdata->order_from == 'pos'): ?>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                                <p><?php echo e(trans('labels.order_type')); ?></p>
                                                                <p class="text-muted"> <?php echo e(trans('labels.takeaway')); ?></p>
                                                            </li>
                                                        <?php else: ?>
                                                            <li
                                                                class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                                <p><?php echo e(trans('labels.order_type')); ?></p>
                                                                <p class="text-muted"> <?php echo e(trans('labels.pickup')); ?></p>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php elseif($getorderdata->order_type == 3): ?>
                                            <div class="col-md-12 mb-2">
                                                <div class="basic-list-group">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                            <p><?php echo e(trans('labels.table')); ?></p>
                                                            <p class="text-muted"> <?php echo e($getorderdata['tableqr']->name); ?></p>
                                                        </li>
                                                        <li
                                                            class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                            <p><?php echo e(trans('labels.size')); ?></p>
                                                            <p class="text-muted"> <?php echo e($getorderdata['tableqr']->size); ?>

                                                                <?php echo e(trans('labels.seats')); ?>

                                                            </p>
                                                        </li>
                                                        <li
                                                            class="list-group-item px-0 fs-7 fw-500 d-flex justify-content-between align-items-center">
                                                            <p><?php echo e(trans('labels.area')); ?></p>
                                                            <p class="text-muted">
                                                                <?php echo e($getorderdata['tableqr']->area->name); ?>

                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div
                    class="<?php echo e($getorderdata->order_type == 4 ? 'col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12' : 'col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12'); ?>">
                    <div class="card border-0 mb-3 h-100 d-flex box-shadow">
                        <div
                            class="card-header d-flex align-items-center bg-transparent text-dark py-3 justify-content-between">
                            <h5 class="px-2 fw-500"><i class="fa-solid fa-clipboard fs-5"></i>
                                <?php echo e(trans('labels.notes')); ?>

                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-list-group">
                                <div class="row">
                                    <div class="basic-list-group">
                                        <?php if($getorderdata->vendor_note != ''): ?>
                                            <div class="alert alert-info" role="alert">
                                                <?php echo e($getorderdata->vendor_note); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer rounded-bottom-4 bg-white">
                            <form action="<?php echo e(URL::to('admin/orders/vendor_note')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group col-md-12">
                                    <label for="note"> <?php echo e(trans('labels.note')); ?> </label>
                                    <div class="controls">
                                        <input type="hidden" name="order_id" class="form-control"
                                            value="<?php echo e($getorderdata->order_number); ?>">
                                        <input type="text" name="vendor_note" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button
                                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" type="submit" <?php endif; ?>
                                        class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                                        <?php echo e(trans('labels.update')); ?> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-3 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-header d-flex align-items-center bg-transparent text-dark py-3">
                <i class="fa-solid fa-bag-shopping fs-5"></i>
                <h5 class="px-2 fw-500"><?php echo e(trans('labels.orders')); ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="fs-15 fw-500">
                                <td><?php echo e(trans('labels.image')); ?></td>
                                <td><?php echo e(trans('labels.products')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.unit_cost')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.qty')); ?></td>
                                <td class="text-end"><?php echo e(trans('labels.sub_total')); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ordersdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle">
                                    <td><img src="<?php echo e(helper::image_path($orders->item_image)); ?>"
                                            class="rounded-3 object-fit-cover hw-50" alt=""></td>
                                    <td><?php echo e($orders->item_name); ?>

                                        <?php if($orders->variants_id != '' || $orders->extras_id != ''): ?>
                                            <br>
                                            <a href="javascript:void(0)"
                                                onclick="showaddons('<?php echo e($orders->variants_name); ?>','<?php echo e($orders->variants_price); ?>','<?php echo e($orders->extras_name); ?>','<?php echo e($orders->extras_price); ?>','<?php echo e($orders->item_name); ?>')">
                                                <small class="text-dark"> <?php echo e(trans('labels.customize')); ?></small></a>
                                        <?php endif; ?>
                                        <?php if($orders->extras_id != ''): ?>
                                            <?php
                                                $extras_id = explode('|', $orders->extras_id);
                                                $extras_name = explode('|', $orders->extras_name);
                                                $extras_price = explode('|', $orders->extras_price);
                                                $extras_total_price = 0;
                                            ?>
                                            <br>
                                            <?php $__currentLoopData = $extras_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $extras_total_price += $extras_price[$key];
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php
                                                $extras_total_price = 0;
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <?php echo e(helper::currency_formate($orders->variants_price, $getorderdata->vendor_id)); ?>

                                        <?php if($extras_total_price > 0): ?>
                                            <br> <small class="text-muted"> +
                                                <?php echo e(helper::currency_formate($extras_total_price, $getorderdata->vendor_id)); ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end"><?php echo e($orders->qty); ?></td>
                                    <td class="text-end">
                                        <?php echo e(helper::currency_formate($orders->price * $orders->qty, $getorderdata->vendor_id)); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="fs-15 align-middle">
                                <td class="text-end border-0" colspan="4">
                                    <p class="fw-500 fs-15"><?php echo e(trans('labels.sub_total')); ?></p>
                                </td>
                                <td class="text-end border-0">
                                    <p class="fw-600 fs-15">
                                        <?php echo e(helper::currency_formate($getorderdata->sub_total, $getorderdata->vendor_id)); ?>

                                    </p>
                                </td>
                            </tr>

                            <?php
                                $tax = explode('|', $getorderdata->tax);
                                $tax_name = explode('|', $getorderdata->tax_name);
                            ?>
                            <?php if($getorderdata->tax != null && $getorderdata->tax != ''): ?>
                                <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="fs-15 align-middle">
                                        <td class="text-end border-0" colspan="4">
                                            <p class="fw-500 fs-15"><?php echo e($tax_name[$key]); ?></p>
                                        </td>
                                        <td class="text-end border-0">
                                            <p class="fw-600 fs-15">
                                                <?php echo e(helper::currency_formate(@(float) $tax[$key], $getorderdata->vendor_id)); ?>

                                            </p>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if($getorderdata->order_type == 1): ?>
                                <tr class="fs-15 align-middle">
                                    <td class="text-end border-0" colspan="4">
                                        <p class="fw-500 fs-15"><?php echo e(trans('labels.delivery_charge')); ?>

                                            <?php echo e($getorderdata->delivery_area); ?> (+)</p>
                                    </td>
                                    <td class="text-end border-0">
                                        <p class="fw-600 fs-15">
                                            <?php echo e(helper::currency_formate($getorderdata->delivery_charge, $getorderdata->vendor_id)); ?>

                                        </p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if($getorderdata->discount_amount > 0): ?>
                                <tr class="fs-15 align-middle">

                                    <td class="text-end border-0" colspan="4">
                                        <p class="fw-500 fs-15">
                                            <?php if($getorderdata->offer_type == 'loyalty'): ?>
                                                <?php echo e(trans('labels.loyalty_discount')); ?> (-)
                                            <?php endif; ?>

                                            <?php if($getorderdata->order_type == 4): ?>
                                                <?php echo e(trans('labels.discount')); ?> (-)
                                            <?php else: ?>
                                                <?php if($getorderdata->offer_type == 'promocode'): ?>
                                                    <?php echo e(trans('labels.discount')); ?> (-)
                                                    <?php echo e($getorderdata->couponcode != '' ? '(' . $getorderdata->couponcode . ')' : ''); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                    <td class="text-end border-0">
                                        <p class="fw-600 fs-15">
                                            <?php echo e(helper::currency_formate($getorderdata->discount_amount, $getorderdata->vendor_id)); ?>

                                        </p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr class="align-middle">
                                <td class="text-end text-dark border-0" colspan="4">
                                    <p class="fs-6 fw-600"><?php echo e(trans('labels.grand_total')); ?></p>
                                </td>
                                <td class="text-end text-dark border-0">
                                    <p class="fs-6 fw-600">
                                        <?php echo e(helper::currency_formate($getorderdata->grand_total, $getorderdata->vendor_id)); ?>

                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="customerinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-dark" id="modalbankdetailsLabel"><?php echo e(trans('labels.edit')); ?></h5>
                    <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="<?php echo e(URL::to('admin/orders/customerinfo')); ?>" method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="order_id" id="modal_order_id" class="form-control" value="">
                        <input type="hidden" name="edit_type" id="edit_type" class="form-control" value="">
                        <div id="customer_info">
                            <div class="form-group col-md-12">
                                <label for="customer_name"> <?php echo e(trans('labels.customer_name')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="customer_mobile"> <?php echo e(trans('labels.mobile')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_mobile" id="customer_mobile"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="customer_email"> <?php echo e(trans('labels.email')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_email" id="customer_email" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div id="delivery_info">
                            <div class="form-group col-md-12">
                                <label for="customer_address"> <?php echo e(trans('labels.address')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_address" id="customer_address"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="customer_building"> <?php echo e(trans('labels.building')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_building" id="customer_building"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="customer_landmark"> <?php echo e(trans('labels.landmark')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_landmark" id="customer_landmark"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="customer_pincode"> <?php echo e(trans('labels.pincode')); ?> </label>
                                <div class="controls">
                                    <input type="text" name="customer_pincode" id="customer_pincode"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer gap-2">
                        <button type="button" class="btn btn-danger px-4 rounded-start-5 rounded-end-5 m-0"
                            data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                        <button <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" type="submit" <?php endif; ?>
                            class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 m-0"> <?php echo e(trans('labels.save')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="customisation" tabindex="-1" aria-labelledby="customisationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header px-4 justify-content-between">
                    <p class="title pb-1" id="cart_item_name"></p>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pb-4">
                    <div class="p-12px">
                        <div id="item-variations" class="mt-2">

                        </div>
                        <!-- Extras -->
                        <div id="item-extras" class="mt-3">
                            <h5 class="fw-normal m-0 d-none" id="extras_title"><?php echo e(trans('labels.extras')); ?> </h5>
                            <ul class="m-0 ps-2">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var variation_title = "<?php echo e(trans('labels.variation')); ?>";
        var extra_title = "<?php echo e(trans('labels.extras')); ?>";

        function showaddons(variants_name, variants_price, extras_name, extras_price, item_name) {
            "use strict";
            $('#cart_item_name').html(item_name);

            var i = 0;
            var extras = extras_name.split("|");
            var variations = variants_name.split(',');
            var extra_price = extras_price.split('|');
            var html = "";
            if (variations != '') {
                html += '<p class="fw-bolder m-0" id="variation_title">' + variation_title + '</p><ul class="m-0 ps-2">';
                html += '<li class="px-0">' + variations + ' : <span class="text-muted">' + currency_formate(parseFloat(
                    variants_price)) + '</span></li>'
                html += '</ul>';
            }
            $('#item-variations').html(html);
            var html1 = '';
            if (extras != '') {
                $('#extras_title').removeClass('d-none');
                html1 += '<p class="fw-bolder m-0" id="extras_title">' + extra_title + '</p><ul class="m-0 ps-2">';
                for (i in extras) {
                    html1 += '<li class="px-0">' + extras[i] + ' : <span class="text-muted">' + currency_formate(parseFloat(
                        extra_price[i])) + '</span></li>'
                }
                html1 += '</ul>';
            }
            $('#item-extras').html(html1);
            $('#customisation').modal('show');
        }

        function currency_formate(price) {

            if ("<?php echo e(@helper::appdata($vendor_id)->currency_position); ?>" == "left") {

                if ("<?php echo e(helper::appdata($vendor_id)->decimal_separator); ?>" == 1) {
                    if ("<?php echo e(helper::appdata($vendor_id)->currency_space); ?>" == 1) {
                        return "<?php echo e(@helper::appdata($vendor_id)->currency); ?>" + " " + parseFloat(price).toFixed(
                            "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>");
                    } else {
                        return "<?php echo e(@helper::appdata($vendor_id)->currency); ?>" + parseFloat(price).toFixed(
                            "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>");
                    }

                } else {
                    if ("<?php echo e(helper::appdata($vendor_id)->currency_space); ?>" == 1) {
                        var newprice = "<?php echo e(@helper::appdata($vendor_id)->currency); ?>" + " " + (parseFloat(price).toFixed(
                            "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>"));
                    } else {
                        var newprice = "<?php echo e(@helper::appdata($vendor_id)->currency); ?>" + (parseFloat(price).toFixed(
                            "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>"));
                    }
                    newprice = newprice.replace('.', ',');
                    return newprice;
                }
            } else {
                if ("<?php echo e(helper::appdata($vendor_id)->decimal_separator); ?>" == 1) {
                    if ("<?php echo e(helper::appdata($vendor_id)->currency_space); ?>" == 1) {
                        return parseFloat(price).toFixed("<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>") + " " +
                            "<?php echo e(@helper::appdata($vendor_id)->currency); ?>";
                    } else {
                        return parseFloat(price).toFixed("<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>") +
                            "<?php echo e(@helper::appdata($vendor_id)->currency); ?>";
                    }
                } else {
                    if ("<?php echo e(helper::appdata($vendor_id)->currency_space); ?>" == 1) {
                        var newprice = (parseFloat(price).toFixed(
                                "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>")) + " " +
                            "<?php echo e(@helper::appdata($vendor_id)->currency); ?>";
                    } else {
                        var newprice = (parseFloat(price).toFixed(
                                "<?php echo e(helper::appdata($vendor_id)->currency_formate); ?>")) +
                            "<?php echo e(@helper::appdata($vendor_id)->currency); ?>";
                    }
                    newprice = newprice.replace('.', ',');
                    return newprice;
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/orders/invoice.blade.php ENDPATH**/ ?>
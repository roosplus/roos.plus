<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row flex-wrap justify-content-between align-items-center">
        <div class="col-12 col-xl-4">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.transaction')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-12 col-xl-8">
            <form action="<?php echo e(URL::to('/admin/transaction')); ?> " method="get">
                <div class="input-group ps-0 align-items-center justify-content-end gap-2">
                    <?php if(Auth::user()->type == 1): ?>
                        <select class="form-select py-2 transaction-select rounded-5" name="vendor">
                            <option value=""
                                data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                selected><?php echo e(trans('labels.select')); ?></option>
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vendor->id); ?>"
                                    data-value="<?php echo e(URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate'))); ?>"
                                    <?php echo e(request()->get('vendor') == $vendor->id ? 'selected' : ''); ?>>
                                    <?php echo e($vendor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php endif; ?>
                    <div class="input-group-append col-sm-auto col-12">
                        <input type="date" class="form-control rounded-5 py-2 px-4 bg-white mb-0" name="startdate"
                            value="<?php echo e(request()->get('startdate')); ?>">
                    </div>
                    <div class="input-group-append col-sm-auto col-12 ">
                        <input type="date" class="form-control py-2 rounded-5 px-4 bg-white mb-0" name="enddate"
                            value="<?php echo e(request()->get('enddate')); ?>">
                    </div>
                    <div class="input-group-append col-sm-auto col-12">
                        <button class="btn btn-secondary px-4 py-2 rounded-start-5 rounded-end-5 w-100 fs-15"
                            type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fw-500 fs-15">
                                <td><?php echo e(trans('labels.srno')); ?></td>
                                <?php if(Auth::user()->type == '1'): ?>
                                    <td><?php echo e(trans('labels.name')); ?></td>
                                <?php endif; ?>
                                <td><?php echo e(trans('labels.plan_name')); ?></td>
                                <td><?php echo e(trans('labels.amount')); ?></td>
                                <td><?php echo e(trans('labels.payment_type')); ?></td>
                                <td><?php echo e(trans('labels.purchase_date')); ?></td>
                                <td><?php echo e(trans('labels.expire_date')); ?></td>
                                <td><?php echo e(trans('labels.status')); ?></td>
                                <td><?php echo e(trans('labels.created_date')); ?></td>
                                <td><?php echo e(trans('labels.updated_date')); ?></td>
                                <td><?php echo e(trans('labels.action')); ?></td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i = 1;

                            ?>
                            <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="fs-7 align-middle">
                                    <td><?php echo $i++; ?></td>
                                    <?php if(Auth::user()->type == '1'): ?>
                                        <td><?php echo e($transaction['vendor_info']->name); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e(@$transaction['plan_info']->name); ?></td>
                                    <td><?php echo e(helper::currency_formate($transaction->grand_total, '')); ?></td>
                                    <td>
                                        <?php if($transaction->payment_type != ''): ?>
                                            <?php if($transaction->payment_type == 0): ?>
                                                <?php echo e(trans('labels.manual')); ?>

                                            <?php else: ?>
                                                <?php echo e(@helper::getpayment($transaction->payment_type, 1)->payment_name); ?>

                                            <?php endif; ?>
                                        <?php elseif($transaction->amount == 0): ?>
                                            -
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($transaction->payment_type == 6 || $transaction->payment_type == 1): ?>
                                            <?php if($transaction->status == 2): ?>
                                                <span
                                                    class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date, $vendor_id)); ?></span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span
                                                class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date, $vendor_id)); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($transaction->payment_type == 6 || $transaction->payment_type == 1): ?>
                                            <?php if($transaction->status == 2): ?>
                                                <span
                                                    class="badge bg-danger"><?php echo e($transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $vendor_id) : '-'); ?></span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span
                                                class="badge bg-danger"><?php echo e($transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $vendor_id) : '-'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($transaction->payment_type == 6 || $transaction->payment_type == 1): ?>
                                            <?php if($transaction->status == 1): ?>
                                                <span class="badge bg-warning"><?php echo e(trans('labels.pending')); ?></span>
                                            <?php elseif($transaction->status == 2): ?>
                                                <span class="badge bg-success"><?php echo e(trans('labels.accepted')); ?></span>
                                            <?php elseif($transaction->status == 3): ?>
                                                <span class="badge bg-danger"><?php echo e(trans('labels.rejected')); ?></span>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(helper::date_format($transaction->created_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($transaction->created_at, $vendor_id)); ?>


                                    </td>
                                    <td><?php echo e(helper::date_format($transaction->updated_at, $vendor_id)); ?><br>
                                        <?php echo e(helper::time_format($transaction->updated_at, $vendor_id)); ?>


                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <?php if(Auth::user()->type == '1'): ?>
                                                <?php if($transaction->payment_type == 6 || $transaction->payment_type == 1): ?>
                                                    <?php if($transaction->status == 1): ?>
                                                        <a class="btn btn-sm btn-success btn-size"
                                                            tooltip="<?php echo e(trans('labels.accept')); ?>"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-2')); ?>')"><i
                                                                class="fas fa-check"></i></a>

                                                        <a class="btn btn-sm btn-danger btn-size"
                                                            tooltip="<?php echo e(trans('labels.cancel')); ?>"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-3')); ?>')"><i
                                                                class="fas fa-close"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a class="btn btn-sm btn-dark btn-size" tooltip="<?php echo e(trans('labels.view')); ?>"
                                                href="<?php echo e(URL::to('admin/transaction/plandetails-' . $transaction->id)); ?>"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <a href="<?php echo e(URL::to('/admin/transaction/generatepdf-' . $transaction->id)); ?>"
                                                tooltip="<?php echo e(trans('labels.downloadpdf')); ?>"
                                                class="btn btn-danger btn-sm btn-size">
                                                <i class="fa-solid fa-file-pdf"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/transaction/transaction.blade.php ENDPATH**/ ?>
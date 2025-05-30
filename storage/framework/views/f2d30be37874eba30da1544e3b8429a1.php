

<table class="table table-striped table-bordered py-3 zero-configuration w-100">
    <thead>
        <tr class="fw-500">
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
            <?php if(Auth::user()->type == '1'): ?>
                <td><?php echo e(trans('labels.action')); ?></td>
            <?php endif; ?>

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
                    <td><?php echo e(@$transaction['vendor_info']->name); ?></td>
                <?php endif; ?>
                <td><?php echo e(@$transaction['plan_info']->name); ?></td>
                <td><?php echo e(helper::currency_formate($transaction->amount, '')); ?></td>
                <td>
                    <?php if($transaction->payment_type == '6'): ?>
                        <?php echo e(trans('labels.' . $transaction->payment_type)); ?> : <small><a
                                href="<?php echo e(helper::image_path($transaction->screenshot)); ?>" target="_blank"
                                class="text-danger"><?php echo e(trans('labels.click_here')); ?></a></small>
                    <?php elseif($transaction->amount == 0): ?>
                        -
                    <?php else: ?>
                        <?php echo e(@helper::getpayment($transaction->payment_type, 1)->payment_name); ?> :
                        <?php echo e($transaction->payment_id); ?>

                    <?php endif; ?>

                </td>
                <td>
                    <?php if($transaction->payment_type == '6'): ?>
                        <?php if($transaction->status == 2): ?>
                            <span
                                class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date, $transaction->vendor_id)); ?></span>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    <?php else: ?>
                        <span
                            class="badge bg-success"><?php echo e(helper::date_format($transaction->purchase_date, $transaction->vendor_id)); ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($transaction->payment_type == '6'): ?>
                        <?php if($transaction->status == 2): ?>
                            <span
                                class="badge bg-danger"><?php echo e($transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $transaction->vendor_id) : '-'); ?></span>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    <?php else: ?>
                        <span
                            class="badge bg-danger"><?php echo e($transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $transaction->vendor_id) : '-'); ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($transaction->payment_type == '6'): ?>
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
                <td><?php echo e(helper::date_format($transaction->created_at,$vendor_id)); ?><br>
                    <?php echo e(helper::time_format($transaction->created_at,$vendor_id)); ?>

                </td>
                <td><?php echo e(helper::date_format(@$transaction->updated_at,$vendor_id)); ?><br>
                    <?php echo e(helper::time_format(@$transaction->updated_at,$vendor_id)); ?>

                </td>
                <?php if(Auth::user()->type == '1'): ?>
                    <td>
                        <div class="d-flex gap-2">
                            <?php if($transaction->payment_type == '6'): ?>
                                <?php if($transaction->status == 1): ?>
                                    <a class="btn btn-sm btn-outline-success"
                                        onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-2')); ?>')"><i
                                            class="fas fa-check"></i></a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="statusupdate('<?php echo e(URL::to('admin/transaction-' . $transaction->id . '-3')); ?>')"><i
                                            class="fas fa-close"></i></a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </td>
                <?php endif; ?>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /mnt/c/restro-saas/resources/views/admin/dashboard/admintransaction.blade.php ENDPATH**/ ?>
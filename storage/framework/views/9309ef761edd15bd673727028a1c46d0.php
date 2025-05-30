<?php $__env->startSection('content'); ?>
    <!------ breadcrumb ------>
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
                        <?php echo e(trans('labels.wallet')); ?>

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
                        <div class="settings-box card-body py-4">
                            <div class="settings-box-header gap-3 flex-wrap mb-4">
                                <div class="col-sm-8">
                                    <div class="d-flex gap-3 mb-1 flex-wrap align-items-center">
                                        <h2 class="page-title m-0">
                                            <?php echo e(trans('labels.wallet_balance')); ?>

                                        </h2>
                                        <p class="text-success fs-5 fw-600">
                                            <?php echo e(helper::currency_formate(Auth::user()->wallet, $storeinfo->id)); ?>

                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-auto col-12">
                                    <a href="<?php echo e(URL::to($storeinfo->slug . '/addmoney')); ?>"
                                        class="w-100 btn-primary rounded px-sm-4 px-3 py-2 btn align-items-center fs-15 fw-500 justify-content-center d-flex gap-2">
                                        <i class="fa-regular fa-plus"></i>
                                        <?php echo e(trans('labels.add_money')); ?>

                                    </a>
                                </div>
                            </div>

                            <?php if(count($gettransactions) > 0): ?>
                                <div class="settings-box-body dashboard-section">
                                    <div class="table-responsive rounded">
                                        <table class="table table-striped align-middle table-hover m-0">
                                            <thead class="table-light">
                                                <tr class="fs-7 fw-600">
                                                    <th scope="col"><?php echo e(trans('labels.date')); ?></th>
                                                    <th scope="col"> <?php echo e(trans('labels.amount')); ?> </th>
                                                    <th scope="col"><?php echo e(trans('labels.remark')); ?></th>
                                                    <th scope="col"><?php echo e(trans('labels.status')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $gettransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="fs-7">
                                                        <td><?php echo e(helper::date_format($row->created_at, $storeinfo->id)); ?><br>
                                                            <?php echo e(helper::time_format($row->created_at, $storeinfo->id)); ?>

                                                        </td>
                                                        <td><?php echo e(helper::currency_formate($row->amount, $storeinfo->id)); ?>

                                                        </td>
                                                        <td>
                                                            <?php if($row->transaction_type == 2): ?>
                                                                <?php echo e(trans('labels.order_placed')); ?>

                                                                <a class="fw-600"
                                                                    href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $row->order_number)); ?>">
                                                                    <?php echo e($row->order_number); ?>

                                                                </a>
                                                            <?php elseif($row->transaction_type == 3): ?>
                                                                <?php echo e(trans('labels.order_cancelled')); ?>

                                                                <a class="fw-600"
                                                                    href="<?php echo e(URL::to($storeinfo->slug . '/track-order/' . $row->order_number)); ?>">
                                                                    <?php echo e($row->order_number); ?>

                                                                </a>
                                                            <?php else: ?>
                                                                <?php echo e(trans('labels.wallet_recharge')); ?>

                                                                <span><?php echo e(@helper::getpayment($row->payment_type, $storeinfo->id)->payment_name); ?></span>
                                                                <span><?php echo e($row->payment_id); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($row->transaction_type == 2): ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge bg-cancelled rounded-0">
                                                                    <span> <?php echo e(trans('labels.debit')); ?></span>
                                                                </div>
                                                            <?php else: ?>
                                                                <div
                                                                    class="badge bg-debit custom-badge rounded-0 bg-completed">
                                                                    <span> <?php echo e(trans('labels.credit')); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <?php echo e($gettransactions->links()); ?>

                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('front.nodata', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('front.sum_qusction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/front/wallet.blade.php ENDPATH**/ ?>
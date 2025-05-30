<?php $__env->startSection('content'); ?>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }

    ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2 align-items-center">
                <?php echo e(request()->is('admin/report*') ? trans('labels.report') : trans('labels.orders')); ?>

            </h5>
            <div class="d-flex">
                <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
        <div class="col-12 col-md-8">
            <?php if(request()->is('admin/report*')): ?>
                <form action="<?php echo e(URL::to('/admin/report')); ?>" class="mb-">
                    <div class="input-group col-md-12 ps-0 justify-content-end">
                        <?php if($getcustomerslist->count() > 0): ?>
                            <div class="input-group-append col-auto px-1">
                                <select name="customer_id" class="form-select">
                                    <option value=""><?php echo e(trans('labels.select_customer')); ?></option>
                                    <?php $__currentLoopData = $getcustomerslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcustomer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($getcustomer->id); ?>"
                                            <?php echo e($getcustomer->id == @$_GET['customer_id'] ? 'selected' : ''); ?>>
                                            <?php echo e($getcustomer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                            <input type="date" class="form-control rounded-5 px-4 bg-white" name="startdate"
                                <?php if(isset($_GET['startdate'])): ?> value="<?php echo e($_GET['startdate']); ?>" <?php endif; ?> required>
                        </div>
                        <div class="input-group-append col-auto px-1 pb-2 pb-xl-0">
                            <input type="date" class="form-control rounded-5 px-4 bg-white" name="enddate"
                                <?php if(isset($_GET['enddate'])): ?> value="<?php echo e($_GET['enddate']); ?>" <?php endif; ?> required>
                        </div>
                        <div class="input-group-append pb-2 pb-xl-0 px-1">
                            <button class="btn btn-primary rounded-5 px-4"
                                type="submit"><?php echo e(trans('labels.fetch')); ?></button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <?php echo $__env->make('admin.orders.statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel"><?php echo e(trans('labels.record_payment')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action=" <?php echo e(URL::to('admin/orders/payment_status-' . '2')); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" id="order_number" name="order_number" value="">
                        <label for="modal_total_amount" class="form-label">
                            <?php echo e(trans('labels.total')); ?> <?php echo e(trans('labels.amount')); ?>

                        </label>
                        <input type="text" class="form-control numbers_only" name="modal_total_amount"
                            id="modal_total_amount" disabled value="">
                        <div id="cod_payment">
                            <label for="modal_amount" class="form-label mt-2">
                                <?php echo e(trans('labels.cash_received')); ?>

                            </label>
                            <input type="text" class="form-control numbers_only" name="modal_amount" id="modal_amount"
                                value="" onkeyup="validation($(this).val())" required>
                            <label for="modal_amount" class="form-label mt-2">
                                <?php echo e(trans('labels.change_amount')); ?>

                            </label>
                            <input type="number" class="form-control" name="ramin_amount" id="ramin_amount" value=""
                                readonly>
                        </div>
                        <div id="pos_payment">
                            <p class="m-0 mt-2 mb-1 fs-7 text-dark fw-medium"> <?php echo e(trans('labels.payment_information')); ?>

                            </p>
                            <div class="col-12 d-flex gap-4">
                                <div class="form-check form-check-inline m-0 p-0 d-flex align-items-center gap-2">
                                    <input class="form-check-input m-0 p-0" type="radio" name="payment_type"
                                        id="inlineRadio1" value="1">
                                    <label class="form-check-label m-0 p-0 modal-price fw-500"
                                        for="inlineRadio1"><?php echo e(trans('labels.cash')); ?></label>
                                </div>
                                <div class="form-check form-check-inline m-0 p-0 d-flex align-items-center gap-2">
                                    <input class="form-check-input m-0 p-0" type="radio" name="payment_type"
                                        id="inlineRadio2" value="0">
                                    <label class="form-check-label m-0 p-0 modal-price fw-500"
                                        for="inlineRadio2"><?php echo e(trans('labels.online')); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary"><?php echo e(trans('labels.submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function codpayment(order_number, grand_total, order_type) {
            $('#modal_total_amount').val(grand_total);
            $('#order_number').val(order_number);
            if (order_type == 4) {
                $('#cod_payment').addClass('d-none');
                $('#pos_payment').removeClass('d-none');
                $('#modal_amount').prop('required', false);
                $("input[name=payment_type]").prop('required', true);
            } else {
                $('#cod_payment').removeClass('d-none');
                $('#pos_payment').addClass('d-none');
                $('#modal_amount').prop('required', true);
                $("input[name=payment_type]").prop('required', false);
            }
            $('#paymentModal').modal('show');
        }

        function validation(value) {
            var remaining = $('#modal_total_amount').val() - value;
            $('#ramin_amount').val(remaining.toFixed(2));
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>
<?php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
?>
<?php $__env->startSection('content'); ?>
    <div class="row align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.payment_settings')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
    <div class="row g-3 mb-7 sort_menu" id="carddetails" data-url="<?php echo e(url('admin/payment/reorder_payment')); ?>">

        <?php $__currentLoopData = $getpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pmdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                // Check if the current $pmdata is a system addon and activated
                if ($pmdata->payment_type == '1' || $pmdata->payment_type == '16') {
                    $systemAddonActivated = true;
                } else {
                    $systemAddonActivated = false;
                }
                $addon = App\Models\SystemAddons::where('unique_identifier', $pmdata->unique_identifier)->first();
                if ($addon != null && $addon->activated == 1) {
                    $systemAddonActivated = true;
                }
                $transaction_type = $pmdata->payment_type;
            ?>
            <?php if($systemAddonActivated): ?>
                <div class="col-md-12 col-lg-12 col-xl-6" data-id="<?php echo e($pmdata->id); ?>">
                    <form action="<?php echo e(URL::to('admin/payment/update')); ?>" method="POST" class=""
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="transaction_type" value="<?php echo e($pmdata->id); ?>">
                        <input type="hidden" name="payment_type" value="<?php echo e($transaction_type); ?>">
                        <div class="card h-100 box-shadow overflow-hidden handle">
                            <div class="card-header bg-secondary p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="<?php echo e(helper::image_path($pmdata->image)); ?>" alt=""
                                            class="img-fluid rounded me-2" height="30" width="30">
                                        <b>
                                            <?php echo e($pmdata->payment_name); ?>

                                            <?php if(
                                                $transaction_type == '2' ||
                                                    $transaction_type == '3' ||
                                                    $transaction_type == '4' ||
                                                    $transaction_type == '5' ||
                                                    $transaction_type == '6' ||
                                                    $transaction_type == '7' ||
                                                    $transaction_type == '8' ||
                                                    $transaction_type == '9' ||
                                                    $transaction_type == '10' ||
                                                    $transaction_type == '11' ||
                                                    $transaction_type == '12' ||
                                                    $transaction_type == '13' ||
                                                    $transaction_type == '14' ||
                                                    $transaction_type == '15'): ?>
                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span
                                                        class="badge badge bg-danger ms-2"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div>
                                        <input id="checkbox-switch-<?php echo e($transaction_type); ?>" type="checkbox"
                                            class="checkbox-switch" name="is_available" value="1"
                                            <?php echo e($pmdata->is_available == 1 ? 'checked' : ''); ?>>
                                        <label for="checkbox-switch-<?php echo e($transaction_type); ?>" class="switch">
                                            <span
                                                class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span
                                                    class="switch__circle-inner"></span></span>
                                            <span
                                                class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                            <span
                                                class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">
                                            <?php echo e(trans('labels.payment_name')); ?>

                                            <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="<?php echo e(trans('labels.payment_name')); ?>"
                                            value="<?php echo e($pmdata->payment_name); ?>" required>
                                    </div>
                                    <?php if(!in_array($transaction_type, ['1', '6', '16'])): ?>
                                        <div class="col-md-6">
                                            <label for="razorpaycurrency" class="form-label">
                                                <?php echo e(trans('labels.environment')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <div class="d-flex gap-3 align-items-center">
                                                <div class="form-check form-check-inline p-0 m-0">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <input class="form-check-input p-0 m-0" type="radio"
                                                            name="environment" id="sandbox-<?php echo e($transaction_type); ?>"
                                                            value="1"
                                                            <?php echo e($pmdata->environment == 1 ? 'checked' : ''); ?>>
                                                        <label class="form-check-label"
                                                            for="sandbox-<?php echo e($transaction_type); ?>">
                                                            <?php echo e(trans('labels.sandbox')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline p-0 m-0">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <input class="form-check-input p-0 m-0" type="radio"
                                                            name="environment" id="production-<?php echo e($transaction_type); ?>"
                                                            value="2"
                                                            <?php echo e($pmdata->environment == 2 ? 'checked' : ''); ?>>
                                                        <label class="form-check-label"
                                                            for="production-<?php echo e($transaction_type); ?>">
                                                            <?php echo e(trans('labels.production')); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="currency" class="form-label"> <?php echo e(trans('labels.currency')); ?>

                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" required="" id="currency" class="form-control"
                                                    name="currency" placeholder="Currency" value="<?php echo e($pmdata->currency); ?>">
                                            </div>
                                        </div>


                                        <?php if($transaction_type == '4'): ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        <?php if($transaction_type == 'flutterwave'): ?>
                                                            <?php echo e(trans('labels.encryption_key')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(trans('labels.merchant_user_id')); ?>

                                                        <?php endif; ?>
                                                        <span class="text-danger"> *</span>
                                                    </label>
                                                    <input type="text" id="encryption_key" class="form-control"
                                                        name="encryption_key" placeholder="Encryption Key"
                                                        value="<?php echo e($pmdata->encryption_key); ?>"
                                                        <?php echo e($transaction_type == 'flutterwave' ? 'required' : ''); ?>>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($transaction_type == '12'): ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="base_url_by_region" class="form-label">
                                                        <?php echo e(trans('labels.base_url_by_region')); ?>

                                                        <span class="text-danger"> *</span>
                                                    </label>
                                                    <input type="text" id="base_url_by_region" class="form-control"
                                                        name="base_url_by_region"
                                                        placeholder="<?php echo e(trans('labels.base_url_by_region')); ?>"
                                                        value="<?php echo e($pmdata->base_url_by_region); ?>"
                                                        <?php echo e($transaction_type == 'paytab' ? 'required' : ''); ?>>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div
                                            class=" <?php echo e($transaction_type == '7' || $transaction_type == '9' || $transaction_type == '13' || $transaction_type == '14' ? 'col-md-12' : 'col-md-6'); ?>">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <?php if($transaction_type == '11'): ?>
                                                        <?php echo e(trans('labels.salt_key')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(trans('labels.secret_key')); ?>

                                                    <?php endif; ?>
                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" required="" id="secretkey" class="form-control"
                                                    name="secret_key" placeholder="Secret Key"
                                                    value="<?php echo e($pmdata->secret_key); ?>">
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 <?php echo e($transaction_type == '7' || $transaction_type == '9' || $transaction_type == '13' || $transaction_type == '14' ? 'd-none' : ''); ?>">
                                            <div class="form-group">
                                                <label for="publickey" class="form-label">
                                                    <?php if($transaction_type == '12'): ?>
                                                        <?php echo e(trans('labels.profile_key')); ?>

                                                    <?php elseif($transaction_type == '11'): ?>
                                                        <?php echo e(trans('labels.merchant_id')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(trans('labels.public_key')); ?>

                                                    <?php endif; ?>
                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <input type="text" id="publickey" class="form-control"
                                                    name="public_key" placeholder="Public Key"
                                                    value="<?php echo e($pmdata->public_key); ?>"
                                                    <?php echo e($transaction_type != '7' || $transaction_type != '9' || $transaction_type != '13' || $transaction_type != '14' ? '' : 'required'); ?>>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image" class="form-label">
                                                <?php echo e(trans('labels.image')); ?>

                                            </label>
                                            <input type="file" class="form-control" name="image">
                                            <img src="<?php echo e(helper::image_path($pmdata->image)); ?>" alt=""
                                                class="img-fluid rounded hw-50">
                                        </div>
                                    </div>
                                    <?php if($transaction_type == '6'): ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">
                                                    <?php echo e(trans('labels.payment_description')); ?> <span class="text-danger">
                                                        *</span></label>
                                                <textarea class="form-control" id="ckeditor" name="payment_description"><?php echo e($pmdata->payment_description); ?></textarea>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12">
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_payment_methods', Auth::user()->role_id, $vendor_id, 'add') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.sort_menu').sortable({
                handle: '.handle',
                cursor: 'move',
                placeholder: 'highlight',
                axis: "x,y",

                update: function(e, ui) {
                    var sortData = $('.sort_menu').sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join('|'))
                }
            })

            function updateToDatabase(idString) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    url: $('#carddetails').attr('data-url'),
                    data: {
                        ids: idString,
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            toastr.success(response.msg);
                        } else {
                            toastr.success(wrong);
                        }
                    }
                });
            }

        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/payment/payment.blade.php ENDPATH**/ ?>
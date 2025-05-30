<html>

<head>
    <title><?php echo e(helper::appdata($plan->vendor_id)->web_title); ?></title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-15 {
        margin-top: 15px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Transaction Invoice</h1>
    </div>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
    ?>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Transaction number : <span
                    class="gray-color"><?php echo e($plan->transaction_number); ?></span></p>
            <p class="m-0 pt-5 text-bold w-100">Purchase date : <span
                    class="gray-color"><?php echo e(helper::date_format($plan->created_at, $vendor_id)); ?></span></p>
            <p class="m-0 pt-5 text-bold w-100">Expire date : <span
                    class="gray-color"><?php echo e($plan->expire_date != '' ? helper::date_format($plan->expire_date, $vendor_id) : '-'); ?></span>
            </p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Vendor info.</th>
                <th class="w-50">Payment info.</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p><i class="fa-regular fa-user"></i> <?php echo e(trans('labels.name')); ?></p>
                        <p><i class="fa-regular fa-phone"></i> <?php echo e(trans('labels.mobile')); ?> </p>
                        <p><i class="fa-regular fa-envelope"></i> <?php echo e(trans('labels.email')); ?></p>
                    </div>
                </td>
                <td>
                    <p><?php echo e(trans('labels.sub_total')); ?> : <?php echo e(helper::currency_formate($plan->amount, '')); ?></p>
                    <?php if($plan->amount != 0): ?>
                        <?php if($plan->tax != null && $plan->tax != ''): ?>
                            <?php
                                $tax = explode('|', $plan->tax);
                                $tax_name = explode('|', $plan->tax_name);
                            ?>
                            <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tax_value != 0): ?>
                                    <p><?php echo e($tax_name[$key]); ?> :
                                        <?php echo e(helper::currency_formate(@$tax[$key], '')); ?></p>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($plan->offer_amount != '' && $plan->offer_amount != null): ?>
                        <p><?php echo e(trans('labels.discount')); ?> : -<?php echo e(helper::currency_formate($plan->offer_amount, '')); ?>

                        </p>
                    <?php endif; ?>
                    <p><?php echo e(trans('labels.grand_total')); ?> :
                        <?php echo e(helper::currency_formate($plan->grand_total, '')); ?></p>
                    <div class="box-text">
                        <p><?php echo e(trans('labels.payment_type')); ?></p>
                        <?php if($plan->payment_type == 6): ?>
                            <?php echo e(@helper::getpayment($plan->payment_type, 1)->payment_name); ?>

                            : <small><a href="<?php echo e(helper::image_path($plan->screenshot)); ?>" target="_blank"
                                    class="text-danger">Click here</a></small>
                        <?php elseif(in_array($plan->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                            <?php echo e(@helper::getpayment($plan->payment_type, 1)->payment_name); ?>

                            : <?php echo e($plan->payment_id); ?>

                        <?php elseif($plan->payment_type == 1): ?>
                            <?php echo e(@helper::getpayment($plan->payment_type, 1)->payment_name); ?>

                        <?php elseif($plan->payment_type == 0): ?>
                            Manual
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Plan info.</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <h1><?php echo e($plan->plan_name); ?></h1>
                        <h2 class="mb-2"><?php echo e(helper::currency_formate($plan->amount, '')); ?>

                            <span class="fs-7 text-muted">/
                                <?php if($plan->duration != null || $plan->duration != ''): ?>
                                    <?php if($plan->duration == 1): ?>
                                        One month
                                    <?php elseif($plan->duration == 2): ?>
                                        Three month
                                    <?php elseif($plan->duration == 3): ?>
                                        Six month
                                    <?php elseif($plan->duration == 4): ?>
                                        One year
                                    <?php elseif($plan->duration == 5): ?>
                                        Lifetime
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo e($plan->days); ?>

                                    <?php echo e($plan->days > 1 ? 'Days' : 'Day'); ?>

                                <?php endif; ?>
                            </span>
                            <?php if($plan->tax != null && $plan->tax != ''): ?>
                                <small class="text-danger"><?php echo e(trans('labelsexclusive_taxes')); ?></small><br>
                            <?php else: ?>
                                <small class="text-success"><?php echo e(trans('labels.inclusive_taxes')); ?></small> <br>
                            <?php endif; ?>
                            <small class="text-muted text-center"><?php echo e($plan->description); ?></small>
                        </h2>
                        <ul class="pb-5">
                            <?php $features = ($plan->features == null ? null : explode('|', $plan->features));?>
                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                <span class="mx-2">
                                    <?php echo e($plan->service_limit == -1 ? trans('labels.unlimited') : $plan->service_limit); ?>

                                    <?php echo e($plan->service_limit > 1 || $plan->service_limit == -1 ? trans('labels.prducts') : trans('labels.prduct')); ?>

                                </span>
                            </li>
                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                <span class="mx-2">
                                    <?php echo e($plan->appoinment_limit == -1 ? trans('labels.unlimited') : $plan->appoinment_limit); ?>

                                    <?php echo e($plan->appoinment_limit > 1 || $plan->appoinment_limit == -1 ? trans('labels.orders') : trans('labels.order')); ?>

                                </span>
                            </li>
                            <?php
                                $themes = [];
                                if ($plan->themes_id != '' && $plan->themes_id != null) {
                                    $themes = explode('|', $plan->themes_id);
                            } ?>
                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                <span class="mx-2"><?php echo e(count($themes)); ?>

                                    <?php echo e(count($themes) > 1 ? trans('labels.themes') : trans('labels.theme')); ?></span>
                            </li>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                                <?php if($plan->coupons == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.coupons')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'custome_domain')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'custome_domain')->first()->activated == 1): ?>
                                <?php if($plan->custom_domain == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.custom_domain')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1): ?>
                                <?php if($plan->google_analytics == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.google_analytics')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                                <?php if($plan->blogs == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.blogs')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'google_login')->first()->activated == 1): ?>
                                <?php if($plan->google_login == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.google_login')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first()->activated == 1): ?>
                                <?php if($plan->facebook_login == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.facebook_login')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'notification')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'notification')->first()->activated == 1): ?>
                                <?php if($plan->sound_notification == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.sound_notification')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                <?php if($plan->whatsapp_message == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.whatsapp_message')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                                <?php if($plan->telegram_message == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.telegram_message')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pos')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pos')->first()->activated == 1): ?>
                                <?php if($plan->pos == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.pos')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'vendor_app')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'vendor_app')->first()->activated == 1): ?>
                                <?php if($plan->vendor_app == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.vendor_app')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
                                <?php if($plan->customer_app == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.customer_app')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                                <?php if($plan->pwa == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.pwa')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'employee')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'employee')->first()->activated == 1): ?>
                                <?php if($plan->role_management == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.role_management')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
                                <?php if($plan->pixel == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>
                                        <span class="mx-2"><?php echo e(trans('labels.pixel')); ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($features != ''): ?>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($feature != '' && $feature != null): ?>
                                        <li class="mb-2 d-flex"> <i
                                                class="fa-regular fa-circle-check text-secondary "></i>
                                            <span class="mx-2"> <?php echo e($feature); ?> </span>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="mt-15 text-center bg-white fixed-bottom border-top">
        <span><?php echo e(helper::appdata('')->copyright); ?></span>
    </div>
</body>

</html>
<?php /**PATH /mnt/c/restro-saas/resources/views/admin/plan/plandetailspdf.blade.php ENDPATH**/ ?>
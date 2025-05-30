<?php

    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }

?>

<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.plan_details')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mt-3 mb-7">
        <div class="row g-3">
            <div class="col-md-4 col-sm-6">

                <div class="card border-0 box-shadow">
                    <div class="card-header rounded-top-4 p-3 bg-secondary">
                        <h5 class="text-white text-capitalize">
                            <?php echo e($plan->plan_name); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h4 class="fw-600 text-dark mb-2"><?php echo e(helper::currency_formate($plan->amount, '')); ?>

                                <span class="fs-7 text-muted">/
                                    <?php if($plan->duration != null || $plan->duration != ''): ?>
                                        <?php if($plan->duration == 1): ?>
                                            <?php echo e(trans('labels.one_month')); ?>

                                        <?php elseif($plan->duration == 2): ?>
                                            <?php echo e(trans('labels.three_month')); ?>

                                        <?php elseif($plan->duration == 3): ?>
                                            <?php echo e(trans('labels.six_month')); ?>

                                        <?php elseif($plan->duration == 4): ?>
                                            <?php echo e(trans('labels.one_year')); ?>

                                        <?php elseif($plan->duration == 5): ?>
                                            <?php echo e(trans('labels.lifetime')); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php echo e($plan->days); ?>

                                        <?php echo e($plan->days > 1 ? trans('labels.days') : trans('labels.day')); ?>

                                    <?php endif; ?>
                                </span>
                            </h4>
                            <?php if($plan->tax != null && $plan->tax != ''): ?>
                                <small class="text-danger"><?php echo e(trans('labels.exclusive_taxes')); ?></small><br>
                            <?php else: ?>
                                <small class="text-success"><?php echo e(trans('labels.inclusive_taxes')); ?></small> <br>
                            <?php endif; ?>
                            <small class="text-muted text-center">
                                
                                <?php echo e(Str::limit($plan->description, 150)); ?>

                            </small>
                        </div>

                        <ul class="pb-5">

                            <?php $features = ($plan->features == null ? null : explode('|', $plan->features));?>

                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                <span class="mx-2 fs-7">

                                    <?php echo e($plan->service_limit == -1 ? trans('labels.unlimited') : $plan->service_limit); ?>


                                    <?php echo e($plan->service_limit > 1 || $plan->service_limit == -1 ? trans('labels.products') : trans('labels.product')); ?>


                                </span>

                            </li>

                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                <span class="mx-2 fs-7">

                                    <?php echo e($plan->appoinment_limit == -1 ? trans('labels.unlimited') : $plan->appoinment_limit); ?>


                                    <?php echo e($plan->appoinment_limit > 1 || $plan->appoinment_limit == -1 ? trans('labels.orders') : trans('labels.order')); ?>


                                </span>

                            </li>

                            <?php

                                $themes = [];

                                if ($plan->themes_id != '' && $plan->themes_id != null) {
                                    $themes = explode(',', $plan->themes_id);
                            } ?>

                            <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                <span class="mx-2 fs-7"><?php echo e(count($themes)); ?>


                                    <?php echo e(count($themes) > 1 ? trans('labels.themes') : trans('labels.theme')); ?>


                                    <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                        <a onclick="themeinfo('<?php echo e($plan->id); ?>','<?php echo e($plan->themes_id); ?>','<?php echo e($plan->plan_name); ?>')"
                                            tooltip="<?php echo e(trans('labels.info')); ?>" class="cursor-pointer"> <i
                                                class="fa-regular fa-circle-info"></i> </a>
                                    <?php endif; ?>

                                </span>

                            </li>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                                <?php if($plan->coupons == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.coupons')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1): ?>
                                <?php if($plan->custom_domain == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.custome_domain')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1): ?>
                                <?php if($plan->google_analytics == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.google_analytics')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                                <?php if($plan->blogs == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.blogs')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'google_login')->first()->activated == 1): ?>
                                <?php if($plan->google_login == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.google_login')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first()->activated == 1): ?>
                                <?php if($plan->facebook_login == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.facebook_login')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'notification')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'notification')->first()->activated == 1): ?>
                                <?php if($plan->sound_notification == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.sound_notification')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                <?php if($plan->whatsapp_message == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.whatsapp_message')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                                <?php if($plan->telegram_message == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.telegram_message')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'vendor_app')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'vendor_app')->first()->activated == 1): ?>
                                <?php if($plan->vendor_app == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.vendor_app_available')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
                                <?php if($plan->customer_app == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.customer_app')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pos')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pos')->first()->activated == 1): ?>
                                <?php if($plan->pos == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.pos')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                                <?php if($plan->pwa == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.pwa')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'employee')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'employee')->first()->activated == 1): ?>
                                <?php if($plan->role_management == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.role_management')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
                                <?php if($plan->pixel == 1): ?>
                                    <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.pixel')); ?></span>

                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($features != ''): ?>
                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($feature != '' && $feature != null): ?>
                                        <li class="mb-2 d-flex"> <i class="fa-regular fa-circle-check text-secondary "></i>

                                            <span class="mx-2 fs-7"> <?php echo e($feature); ?> </span>

                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>



                        </ul>

                    </div>

                </div>

            </div>
            <div class="col-md-8 col-sm-6 payments">
                <div class="row g-3 flex-column">
                    <?php if(Auth::user()->type == 1): ?>
                        <div class="col-12">
                            <div class="card border-0 box-shadow">
                                <div class="card-header rounded-top-4 bg-light p-3">
                                    <h5 class="text-dark"><?php echo e(trans('labels.vendor_info')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between px-0">

                                            <p class="fw-500 fs-15">Transaction Number</p>

                                            <p class="fw-600 text-dark"><?php echo e($plan->transaction_number); ?></p>

                                        </li>

                                        <li class="list-group-item d-flex justify-content-between px-0">

                                            <p class="fw-500 fs-15"><?php echo e(trans('labels.name')); ?></p>

                                            <p class="fw-500 fs-15"><?php echo e($plan['vendor_info']->name); ?></p>

                                        </li>

                                        <li class="list-group-item d-flex justify-content-between px-0">

                                            <p class="fw-500 fs-15"><?php echo e(trans('labels.email')); ?></p>

                                            <p class="fw-500 fs-15"><?php echo e($plan['vendor_info']->email); ?></p>

                                        </li>

                                        <li class="list-group-item d-flex justify-content-between px-0 border-bottom-0">

                                            <p class="fw-500 fs-15"><?php echo e(trans('labels.mobile')); ?></p>

                                            <p class="fw-500 fs-15"><?php echo e($plan['vendor_info']->mobile); ?></p>

                                        </li>

                                    </ul>

                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header rounded-top-4 bg-light p-3">
                                <h5 class="text-dark"><?php echo e(trans('labels.plan_information')); ?></h5>
                            </div>
                            <div class="card-body">

                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex justify-content-between px-0">

                                        <p class="fw-500 fs-15"><?php echo e(trans('labels.payment_type')); ?></p>

                                        <p class="fw-500 fs-15">

                                            <?php if($plan->payment_type == 6): ?>
                                                <?php echo e(helper::getpayment($plan->payment_type, 1)->payment_name); ?> : <small><a
                                                        href="<?php echo e(helper::image_path($plan->screenshot)); ?>"
                                                        target="_blank"
                                                        class="text-danger"><?php echo e(trans('labels.click_here')); ?></a></small>
                                            <?php elseif(in_array($plan->payment_type, [2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14, 15])): ?>
                                                <?php echo e(helper::getpayment($plan->payment_type, 1)->payment_name); ?> :
                                                <?php echo e($plan->payment_id); ?>

                                            <?php elseif($plan->payment_type == 0): ?>
                                                <?php echo e(trans('labels.manual')); ?>

                                            <?php elseif($plan->payment_type == 1): ?>
                                                <?php echo e(helper::getpayment($plan->payment_type, 1)->payment_name); ?>

                                            <?php elseif($plan->amount == 0): ?>
                                                -
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>

                                        </p>

                                    </li>

                                    <li class="list-group-item d-flex justify-content-between px-0">

                                        <p class="fw-500 fs-15"><?php echo e(trans('labels.purchase_date')); ?></p>

                                        <p class="fw-500 fs-15"><?php echo e(helper::date_format($plan->purchase_date, $vendor_id)); ?>

                                        </p>

                                    </li>

                                    <li class="list-group-item d-flex justify-content-between px-0 border-bottom-2">

                                        <p class="fw-500 fs-15"><?php echo e(trans('labels.expire_date')); ?></p>

                                        <p class="fw-500 fs-15">

                                            <?php echo e($plan->expire_date != '' ? helper::date_format($plan->expire_date, $vendor_id) : '-'); ?>

                                        </p>

                                    </li>

                                </ul>

                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div class="card-header rounded-top-4 bg-light p-3">
                                <h5 class="text-dark"><?php echo e(trans('labels.payment_information')); ?></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <p class="fw-500 fs-15"><?php echo e(trans('labels.sub_total')); ?></p>
                                        <p class="fw-500 fs-15"><?php echo e(helper::currency_formate($plan->amount, '')); ?></p>
                                    </li>
                                    <?php if($plan->amount != 0): ?>
                                        <?php if($plan->tax != null && $plan->tax != ''): ?>
                                            <?php
                                                $tax = explode('|', $plan->tax);
                                                $tax_name = explode('|', $plan->tax_name);
                                            ?>
                                            <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($tax_value != 0): ?>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between px-0 border-bottom-2">
                                                        <p class="fw-500 fs-15"><?php echo e($tax_name[$key]); ?></p>
                                                        <p class="fw-500 fs-15">
                                                            <?php echo e(helper::currency_formate(@$tax[$key], '')); ?>

                                                        </p>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($plan->offer_code != null && $plan->offer_amount != null): ?>
                                        <li class="list-group-item d-flex justify-content-between px-0 border-bottom-2">
                                            <p  class="fw-500 fs-15"><?php echo e(trans('labels.discount')); ?> (<?php echo e($plan->offer_code); ?>)</p>
                                            <p class="fw-500 fs-15">-<?php echo e(helper::currency_formate($plan->offer_amount, '')); ?>

                                            </p>
                                        </li>
                                    <?php endif; ?>

                                    <li class="list-group-item d-flex justify-content-between px-0">

                                        <p class="fw-600 text-dark"><?php echo e(trans('labels.grand_total')); ?></p>

                                        <p class="fw-600 text-dark">

                                            <?php echo e(helper::currency_formate($plan->grand_total, '')); ?>


                                        </p>

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        // function themeinfo(id, theme_id, plan_name) {

        //     let string = theme_id;

        //     let arr = string.split(',');

        //     $('#themeinfoLabel').text(plan_name);

        //     var html = "";

        //     for (var i = 0; i < arr.length; i++) {

        //         var imagepath = "<?php echo e(url(env('ASSETPATHURL') . 'admin-assets/images/theme/theme-')); ?>" + arr[i] + '.png';

        //         html += '<div class="col-6 mb-3"><div class="theme-selection border cursor-pointer"><img src=' + imagepath +
        //             ' alt="" class="w-100"></div></div>';

        //     }

        //     $('.theme_image').html(html);

        //     $('#themeinfo').modal('show');

        // }

        function themeinfo(id, theme_id, plan_name) {

            let string = theme_id;
            let arr = string.split(',');
            $('#themeinfoLabel').text(plan_name);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "<?php echo e(URL::to('admin/themeimages')); ?>",
                method: 'GET',
                data: {
                    theme_id: arr
                },
                dataType: 'json',
                success: function(data) {
                    $('#theme_modalbody').html(data.output);
                    $('#themeinfo').modal('show');
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/plan/plan_details.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
        $user = App\Models\User::where('id', $vendor_id)->where('is_available', 1)->where('is_deleted', 2)->first();
    ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.pricing_plan')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mt-3 mb-7">
        <div class="row g-3">
            <div class="col-12 col-md-12 col-lg-12 col-xl-8 payments">
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                    <div class="card border-0 box-shadow">
                        <div class="card-header rounded-top-4 bg-light p-3">
                            <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                <h5 class="text-dark"><?php echo e(trans('labels.apply_coupon')); ?></h5>
                                <p class="text-secondary cursor-pointer <?php echo e(session()->has('discount_data') ? 'd-none' : ''); ?>"
                                    data-bs-toggle="modal" data-bs-target="#couponmodal">
                                    <?php echo e(trans('labels.select_promocode')); ?>

                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $count = App\Models\Promocode::where('vendor_id', 1)->count();
                                $coupons = App\Models\Promocode::where('vendor_id', 1)->orderBy('reorder_id')->get();
                            ?>
                            <?php if(session()->has('discount_data')): ?>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control <?php echo e(session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0'); ?>"
                                        id="promocode" name="promocode"
                                        value="<?php echo e(session()->get('discount_data')['offer_code']); ?>" readonly
                                        placeholder="<?php echo e(trans('labels.enter_coupon_code')); ?>">
                                    <button type="button" onclick="removecoupon()"
                                        class="btn btn-secondary px-4 <?php echo e(session()->get('direction') == 2 ? 'rounded-start-5 rounded-end-0 border-end-0' : 'rounded-start-0 rounded-end-5'); ?>"><?php echo e(trans('labels.remove')); ?></button>
                                </div>
                            <?php else: ?>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control <?php echo e(session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0'); ?>"
                                        id="promocode" name="promocode" readonly
                                        placeholder="<?php echo e(trans('labels.enter_coupon_code')); ?>">
                                    <button type="button" onclick="applyCopon()"
                                        class="btn btn-secondary px-4 <?php echo e(session()->get('direction') == 2 ? 'rounded-start-5 rounded-end-0 border-end-0' : 'rounded-start-0 rounded-end-5'); ?>"><?php echo e(trans('labels.apply')); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card border-0 box-shadow mt-3">
                    <div class="card-header bg-light rounded-top-4 p-3">
                        <h5 class="text-dark m-0"><?php echo e(trans('labels.payment_details')); ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <p class="fw-600 fs-15"><?php echo e(trans('labels.sub_total')); ?></p>
                                <p class="fw-600 fs-15"><?php echo e(helper::currency_formate($plan->price, '')); ?></p>
                            </li>
                            <?php if(session()->has('discount_data')): ?>
                                <?php
                                    $discount = session()->get('discount_data')['offer_amount'];
                                ?>
                                <li class="list-group-item d-flex justify-content-between px-0">
                                    <p class="fw-600 fs-15"><?php echo e(trans('labels.discount')); ?> <span
                                            class="text-dark">(<?php echo e(session()->get('discount_data')['offer_code']); ?>)</span>
                                    </p>
                                    <p class="fw-600 fs-15">
                                        -<?php echo e(helper::currency_formate(session()->get('discount_data')['offer_amount'], '')); ?>

                                    </p>
                                </li>
                            <?php else: ?>
                                <?php
                                    $discount = 0;
                                ?>
                            <?php endif; ?>
                            <?php
                                $taxlist = helper::gettax($plan->tax);
                                $newtax = [];
                                $totaltax = 0;
                            ?>
                            <?php if($plan->tax != null && $plan->tax != ''): ?>
                                <?php $__currentLoopData = $taxlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <p class="fw-600 fs-15">
                                            <?php echo e(@$tax->name); ?>

                                        </p>
                                        <p class="fw-600 fs-15">
                                            <?php echo e(@$tax->type == 1 ? helper::currency_formate(@$tax->tax, '') : helper::currency_formate($plan->price * (@$tax->tax / 100), '')); ?>

                                        </p>
                                        <?php
                                            if (@$tax->type == 1) {
                                                $newtax[] = @$tax->tax;
                                            } else {
                                                $newtax[] = $plan->price * (@$tax->tax / 100);
                                            }
                                        ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php $__currentLoopData = $newtax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $totaltax += (float) $item;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between px-0">
                                <?php
                                    $grand_total = $plan->price - $discount + $totaltax;
                                ?>
                                <p class="fw-bolder"><?php echo e(trans('labels.grand_total')); ?></p>
                                <input type="hidden" name="grand_total" id="grand_total" value="<?php echo e($grand_total); ?>">
                                <p class="fw-bolder text-dark"><?php echo e(helper::currency_formate($grand_total, '')); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card border-0 box-shadow mt-3">
                    <div class="card-header bg-light rounded-top-4 p-3">
                        <h5 class="text-dark"><?php echo e(trans('labels.payment_methods')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-3">
                            <?php $__currentLoopData = $paymentmethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // Check if the current $pmdata is a system addon and activated
                                    if ($pmdata->payment_type == '1' || $pmdata->payment_type == '16') {
                                        $systemAddonActivated = true;
                                    } else {
                                        $systemAddonActivated = false;
                                    }
                                    $addon = App\Models\SystemAddons::where(
                                        'unique_identifier',
                                        $pmdata->unique_identifier,
                                    )->first();
                                    if ($addon != null && $addon->activated == 1) {
                                        $systemAddonActivated = true;
                                    }
                                    $payment_type = $pmdata->payment_type;
                                ?>
                                <?php if($systemAddonActivated): ?>
                                    <div class="col">
                                        <label for="<?php echo e($payment_type); ?>"
                                            class="form-control border mb-0 px-2 py-1 cursor-pointer">
                                            <div class="card h-100 border-0">
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-text bg-transparent border-0 p-0">
                                                            <input class="form-check-input mt-0" type="radio"
                                                                value="<?php echo e($pmdata->public_key); ?>" id="<?php echo e($payment_type); ?>"
                                                                data-transaction-type="<?php echo e($payment_type); ?>"
                                                                data-currency="<?php echo e($pmdata->currency); ?>"
                                                                <?php if($payment_type == '6'): ?> data-bank-name="<?php echo e($pmdata->bank_name); ?>" data-account-holder-name="<?php echo e($pmdata->account_holder_name); ?>" data-account-number="<?php echo e($pmdata->account_number); ?>" data-bank-ifsc-code="<?php echo e($pmdata->bank_ifsc_code); ?>" <?php endif; ?>
                                                                name="paymentmode">
                                                        </div>
                                                        <div class="mx-3">
                                                            <img src="<?php echo e(helper::image_path($pmdata->image)); ?>"
                                                                class="hw-20 rounded-0" alt="" srcset="">
                                                            <span class="px-1"><?php echo e($pmdata->payment_name); ?></span>
                                                        </div>
                                                    </div>
                                                    <?php if($payment_type == '6'): ?>
                                                        <input type="hidden" value="<?php echo e($pmdata->payment_description); ?>"
                                                            id="bank_payment">
                                                    <?php endif; ?>
                                                    <?php if($payment_type == '3'): ?>
                                                        <input type="hidden" name="stripe_public_key"
                                                            id="stripe_public_key" value="<?php echo e($pmdata->public_key); ?>">
                                                        <div class="stripe-form d-none pt-3">
                                                            <div id="card-element"></div>
                                                        </div>
                                                        <div class="text-danger stripe_error"></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <span
                                class="text-danger payment_error d-none"><?php echo e(trans('messages.select_atleast_one')); ?></span>
                        </div>
                        <div class="form-group m-0 mt-3 d-flex justify-content-end">
                            <button
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="button" <?php endif; ?>
                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(env('Environment') == 'sendbox' ? '' : 'buy_now'); ?> ">
                                <?php echo e(trans('labels.checkout')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                <div class="card box-shadow border-0 h-100 text-dark">
                    <div class="card-header rounded-top-4 p-3 bg-secondary">
                        <h5 class="text-white text-capitalize">
                            <?php echo e($plan->name); ?>

                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h4 class="fw-600 text-dark mb-2"><?php echo e(helper::currency_formate($plan->price, '')); ?>

                                <span class="per-month fw-normal">/
                                    <?php if($plan->plan_type == 1): ?>
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
                                    <?php endif; ?>
                                    <?php if($plan->plan_type == 2): ?>
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
                            <small class="text-muted line-limit-3"><?php echo e(Str::limit($plan->description, 150)); ?></small>
                        </div>
                        <ul>
                            <?php $features = explode('|', $plan->features); ?>
                            <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                <span class="mx-2 fs-7">
                                    <?php echo e($plan->order_limit == -1 ? trans('labels.unlimited') : $plan->order_limit); ?>

                                    <?php echo e($plan->order_limit > 1 || $plan->order_limit == -1 ? trans('labels.products') : trans('labels.product')); ?>

                                </span>
                            </li>
                            <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                <span class="mx-2 fs-7">
                                    <?php echo e($plan->appointment_limit == -1 ? trans('labels.unlimited') : $plan->appointment_limit); ?>

                                    <?php echo e($plan->appointment_limit > 1 || $plan->appointment_limit == -1 ? trans('labels.orders') : trans('labels.order')); ?>

                                </span>
                            </li>
                            <?php
                                $themes = [];
                                if ($plan->themes_id != '' && $plan->themes_id != null) {
                                    $themes = explode(',', $plan->themes_id);
                            } ?>
                            <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                <span class="mx-2 fs-7"><?php echo e(count($themes)); ?>

                                    <?php echo e(count($themes) > 1 ? trans('labels.themes') : trans('labels.theme')); ?></span>
                            </li>
                            <?php if($plan->coupons == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.coupons')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->custom_domain == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.custome_domain_available')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->vendor_app == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.vendor_app_available')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->google_analytics == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.google_analytics_available')); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php if($plan->blogs == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.blogs')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->google_login == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.google_login')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->facebook_login == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.facebook_login')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->sound_notification == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.sound_notification')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->whatsapp_message == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.whatsapp_message')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->telegram_message == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.telegram_message')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->pos == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.pos')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->pwa == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.pwa')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->tableqr == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.tableqr')); ?></span>
                                </li>
                            <?php endif; ?>
                            <?php if($plan->role_management == 1): ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"><?php echo e(trans('labels.role_management')); ?></span>
                                </li>
                            <?php endif; ?>

                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mb-3 d-flex"> <i class="fa-regular fa-circle-check text-secondary  "></i>
                                    <span class="mx-2 fs-7"> <?php echo e($feature); ?> </span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-dark" id="modalbankdetailsLabel"><?php echo e(trans('labels.banktransfer')); ?></h5>
                    <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="<?php echo e(URL::to('admin/plan/buyplan')); ?>" method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_type" id="modal_payment_type" class="form-control"
                            value="">
                        <input type="hidden" name="plan_id" id="modal_plan_id" class="form-control" value="">
                        <input type="hidden" name="amount" id="modal_amount" class="form-control" value="">
                        <input type="hidden" name="modal_offer_code" id="modal_offer_code" class="form-control"
                            value="">
                        <input type="hidden" name="modal_discount" id="modal_discount" class="form-control"
                            value="">
                        <p><?php echo e(trans('labels.payment_description')); ?></p>
                        <hr>
                        <p class="payment_description" id="payment_description"></p>
                        <hr>
                        <div class="form-group col-md-12">
                            <label for="screenshot"> <?php echo e(trans('labels.screenshot')); ?> </label>
                            <div class="controls">
                                <input type="file" name="screenshot" id="screenshot"
                                    class="form-control  <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['screenshot'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"> <?php echo e($message); ?> </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

    <!-- Modal -->
    <div class="modal fade" id="couponmodal" tabindex="-1" aria-labelledby="couponmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title text-dark" id="couponmodalLabel"><?php echo e(trans('labels.coupons_offers')); ?></h5>
                    <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="available-cuppon <?php echo e(session()->get('direction') == '2' ? 'text-right' : ''); ?>">
                        <p class="available-title text-dark" id="exampleModalLabel">
                            <?php echo e(trans('labels.available_coupons')); ?>

                        </p>
                    </div>
                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card my-3 border-0 bg-white box-shadow">
                            <div
                                class="card-body p-0 overflow-hidden <?php echo e(session()->get('direction') == '2' ? 'pe-3' : 'ps-3'); ?>">
                                <div class="coupon bg-white rounded d-flex justify-content-between align-items-center">
                                    <div
                                        class="<?php echo e(session()->get('direction') == '2' ? 'right-side' : 'left-side'); ?> py-3 d-flex w-100 justify-content-start align-items-center">
                                        <div>
                                            <h6 class="fw-600 text-dark"><?php echo e($coupon->offer_name); ?></h6>
                                            <p class="dark_color mb-0 fw-500 fs-15 dark_color mt-1">
                                                <?php echo e(trans('labels.coupons')); ?> :
                                                <span
                                                    class="fw-normal text-decoration-underline text-uppercase text-primary">
                                                    <?php echo e($coupon->offer_code); ?>

                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right-side border-0">
                                        <div class="info m-3 d-flex align-items-center">
                                            <span
                                                class="<?php echo e(session()->get('direction') == '2' ? 'coupn-circle-up-right' : 'coupn-circle-up-left'); ?>"></span>
                                            <div class="w-100 d-flex justify-content-center">
                                                <button class="btn btn-success px-sm-4 fs-7 rounded-start-5 rounded-end-5"
                                                    onclick="copy('<?php echo e($coupon->offer_code); ?>')">
                                                    <?php echo e(trans('labels.copy')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="price" id="price" value="<?php echo e($plan->price); ?>">
    <input type="hidden" name="plan_id" id="plan_id" value="<?php echo e($plan->id); ?>">
    <input type="hidden" name="user_name" id="user_name" value="<?php echo e($user->name); ?>">
    <input type="hidden" name="user_email" id="user_email" value="<?php echo e($user->email); ?>">
    <input type="hidden" name="user_mobile" id="user_mobile" value="<?php echo e($user->mobile); ?>">

    <form action="<?php echo e(url('admin/plan/buyplan/paypalrequest')); ?>" method="post" class="d-none">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="return" value="2">
        <input type="submit" class="callpaypal" name="submit">
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>
        var SITEURL = "<?php echo e(URL::to('')); ?>";
        var planlisturl = "<?php echo e(URL::to('admin/plan')); ?>";
        var buyurl = "<?php echo e(URL::to('admin/plan/buyplan')); ?>";
        var plan_name = "<?php echo e($plan->name); ?>";
        var plan_description = "<?php echo e(preg_replace('/\s+/', ' ', $plan->description)); ?>";
        var title = "<?php echo e(Str::limit(helper::appdata('')->website_title, 50)); ?>";
        var description = "Plan Subscription";
        var applycouponurl = "<?php echo e(URL::to('/admin/applycoupon')); ?>";
        var removecouponurl = "<?php echo e(URL::to('/admin/removecoupon')); ?>";
        var offer_code = "<?php echo e(session()->has('discount_data') ? session()->get('discount_data')['offer_code'] : 0); ?>";
        var discount = "<?php echo e(session()->has('discount_data') ? session()->get('discount_data')['offer_amount'] : 0); ?>";
        var sub_total = "<?php echo e($plan->price); ?>";
    </script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/plan_payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/plan/plan_payment.blade.php ENDPATH**/ ?>
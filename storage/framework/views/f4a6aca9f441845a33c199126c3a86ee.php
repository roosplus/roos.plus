<?php $__env->startSection('content'); ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.add_new')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 mb-7">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <form action="<?php echo e(URL::to('admin/plan/save_plan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.name')); ?><span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="plan_name" value="<?php echo e(old('plan_name')); ?>"
                                placeholder="<?php echo e(trans('labels.name')); ?>" required>
                            <?php $__errorArgs = ['plan_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label"><?php echo e(trans('labels.amount')); ?><span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control numbers_only" name="plan_price"
                                value="<?php echo e(old('plan_price')); ?>" placeholder="<?php echo e(trans('labels.amount')); ?>" required>
                            <?php $__errorArgs = ['plan_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.duration_type')); ?></label>
                                <select class="form-select type" name="type">
                                    <option value="1" <?php echo e(old('type') == '1' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.fixed')); ?></option>
                                    <option value="2" <?php echo e(old('type') == '2' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.custom')); ?></option>
                                </select>
                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group 1 selecttype">
                                <label class="form-label"><?php echo e(trans('labels.duration')); ?><span class="text-danger"> *
                                    </span></label>
                                <select class="form-select" name="plan_duration">
                                    <option value="1"><?php echo e(trans('labels.one_month')); ?></option>
                                    <option value="2"><?php echo e(trans('labels.three_month')); ?></option>
                                    <option value="3"><?php echo e(trans('labels.six_month')); ?></option>
                                    <option value="4"><?php echo e(trans('labels.one_year')); ?></option>
                                    <option value="5"><?php echo e(trans('labels.lifetime')); ?></option>
                                </select>
                                <?php $__errorArgs = ['plan_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group 2 selecttype">
                                <label class="form-label"><?php echo e(trans('labels.days')); ?><span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control numbers_only" name="plan_days" value=""
                                    placeholder="<?php echo e(trans('labels.days')); ?>">
                                <?php $__errorArgs = ['plan_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.service_limit')); ?></label>
                                <select class="form-select service_limit_type" name="service_limit_type">
                                    <option value="1" <?php echo e(old('service_limit_type') == '1' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.limited')); ?></option>
                                    <option value="2" <?php echo e(old('service_limit_type') == '2' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.unlimited')); ?></option>
                                </select>
                                <?php $__errorArgs = ['service_limit_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group 1 service-limit">
                                <label class="form-label"><?php echo e(trans('labels.max_business')); ?><span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control numbers_only" name="plan_max_business"
                                    value="<?php echo e(old('plan_max_business')); ?>"
                                    placeholder="<?php echo e(trans('labels.max_business')); ?>">
                                <?php $__errorArgs = ['plan_max_business'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-2"><?php echo e(trans('labels.booking_limit')); ?></label>
                                <select class="form-select booking_limit_type" name="booking_limit_type">
                                    <option value="1" <?php echo e(old('booking_limit_type') == '1' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.limited')); ?></option>
                                    <option value="2" <?php echo e(old('booking_limit_type') == '2' ? 'selected' : ''); ?>>
                                        <?php echo e(trans('labels.unlimited')); ?></option>
                                </select>
                                <?php $__errorArgs = ['booking_limit_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group 1 booking-limit">
                                <label class="form-label"><?php echo e(trans('labels.orders_limit')); ?><span class="text-danger">
                                        *
                                    </span></label>
                                <input type="text" class="form-control numbers_only" name="plan_appoinment_limit"
                                    value="<?php echo e(old('plan_appoinment_limit')); ?>"
                                    placeholder="<?php echo e(trans('labels.orders_limit')); ?>">
                                <?php $__errorArgs = ['plan_appoinment_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.description')); ?><span class="text-danger">
                                        *</span></label>
                                <textarea class="form-control" rows="3" name="plan_description" placeholder="<?php echo e(trans('labels.description')); ?>"
                                    required><?php echo e(old('plan_description')); ?></textarea>
                                <?php $__errorArgs = ['plan_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group add-extra-class <?php echo e(session()->get('direction') == 2 ? 'rtl' : ''); ?>">
                                <label class="form-label"><?php echo e(trans('labels.tax')); ?></label>
                                <select name="plan_tax[]" class="form-control selectpicker" multiple
                                    data-live-search="true">
                                    <?php if(!empty($gettaxlist)): ?>
                                        <?php $__currentLoopData = $gettaxlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tax->id); ?>"> <?php echo e($tax->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label"><?php echo e(trans('labels.features')); ?><span class="text-danger"> *
                                    </span></label>
                                <div id="repeater">
                                    <div class="d-flex gap-2 mb-3">
                                        <input type="text" class="form-control" name="plan_features[]"
                                            value="<?php echo e(old('plan_features[]')); ?>"
                                            placeholder="<?php echo e(trans('labels.features')); ?>" required>
                                        <button type="button" class="btn btn-dark hov btn-sm rounded-5" id="addfeature">
                                            <i class="fa-regular fa-plus clickadd"></i>
                                        </button>
                                    </div>
                                    <?php $__errorArgs = ['plan_features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="row">

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'coupon')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'coupon')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="coupons"
                                                id="coupons">
                                            <label class="form-check-label"
                                                for="coupons"><?php echo e(trans('labels.coupons')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['coupons'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="coupon"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1): ?>
                                    <div class="col-sm-6  mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="custom_domain"
                                                id="custom_domain">
                                            <label class="form-check-label"
                                                for="custom_domain"><?php echo e(trans('labels.custom_domain_available')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['custom_domain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="custom_domain"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'google_analytics')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="google_analytics"
                                                id="google_analytics">
                                            <label class="form-check-label"
                                                for="google_analytics"><?php echo e(trans('labels.google_analytics_available')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['google_analytics'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="google_analytic"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="blogs"
                                                id="blogs">
                                            <label class="form-check-label"
                                                for="blogs"><?php echo e(trans('labels.blogs')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['blogs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="blog"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_login')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'google_login')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="google_login"
                                                id="google_login">
                                            <label class="form-check-label"
                                                for="google_login"><?php echo e(trans('labels.google_login')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['google_login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="google_login"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="facebook_login"
                                                id="facebook_login">
                                            <label class="form-check-label"
                                                for="facebook_login"><?php echo e(trans('labels.facebook_login')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['facebook_login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="facebook_login"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="pwa"
                                                id="pwa">
                                            <label class="form-check-label"
                                                for="pwa"><?php echo e(trans('labels.pwa')); ?></label>
                                        </div>
                                        <?php $__errorArgs = ['pwa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" id="pwa"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'notification')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'notification')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="sound_notification"
                                                id="sound_notification">
                                            <label class="form-check-label"
                                                for="sound_notification"><?php echo e(trans('labels.sound_notification')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="whatsapp_message"
                                                id="whatsapp_message">
                                            <label class="form-check-label"
                                                for="whatsapp_message"><?php echo e(trans('labels.whatsapp_message')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="telegram_message"
                                                id="telegram_message">
                                            <label class="form-check-label"
                                                for="telegram_message"><?php echo e(trans('labels.telegram_message')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'pos')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'pos')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="pos"
                                                id="pos">
                                            <label class="form-check-label"
                                                for="pos"><?php echo e(trans('labels.pos')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="tableqr"
                                                id="tableqr">
                                            <label class="form-check-label"
                                                for="tableqr"><?php echo e(trans('labels.tableqr')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'employee')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'employee')->first()->activated == 1): ?>
                                    <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="employee"
                                                id="employee">
                                            <label class="form-check-label"
                                                for="employee"><?php echo e(trans('labels.role_management')); ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group add-extra-class <?php echo e(session()->get('direction') == 2 ? 'rtl' : ''); ?>">
                            <label class="form-label"><?php echo e(trans('labels.users')); ?></label>
                            <select class="form-control selectpicker" name="vendors[]" multiple data-live-search="true">
                                <?php if(!empty($vendors)): ?>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vendor->id); ?>"
                                            <?php echo e(old('vendor') == $vendor->id ? 'selected' : ''); ?>>
                                            <?php echo e($vendor->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label mt-2 mb-0"><?php echo e(trans('labels.themes')); ?>

                                    <span class="text-danger"> * </span> </label>
                                <?php if(env('Environment') == 'sendbox'): ?>
                                    <span class="badge badge bg-danger ms-2"><?php echo e(trans('labels.addon')); ?></span>
                                <?php endif; ?>
                                <?php
                                    $checktheme = App\Models\SystemAddons::where(
                                        'unique_identifier',
                                        'LIKE',
                                        '%' . 'theme_' . '%',
                                    )
                                        ->where('activated', '1')
                                        ->get();
                                    $themes = [];
                                    foreach ($checktheme as $ttlthemes) {
                                        array_push($themes, str_replace('theme_', '', $ttlthemes->unique_identifier));
                                    }
                                ?>

                            </div>
                        </div>



                        <div class="col-md-12 selectimg">
                            <div class="form-group">
                                <div class="row g-3">
                                    <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                            <label for="template<?php echo e($item); ?>"
                                                class="radio-card position-relative">
                                                <input type="checkbox" name="themecheckbox[]"
                                                    id="template<?php echo e($item); ?>" value="<?php echo e($item); ?>"
                                                    <?php echo e($key == 0 ? 'checked' : ''); ?> class="d-none">
                                                <div class="card-content-wrapper border rounded-2">
                                                    <span class="check-icon position-absolute"></span>
                                                    <div class="selecimg">
                                                        <img src="<?php echo e(helper::image_path('theme-' . $item . '.png')); ?>"
                                                            class="rounded">
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                            <a href="<?php echo e(URL::to('admin/plan')); ?>"
                                class="btn btn-danger px-4 rounded-start-5 rounded-end-5"><?php echo e(trans('labels.cancel')); ?></a>
                            <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . '/admin-assets/js/plan.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/plan/add_plan.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <?php
        if (Auth::user()->type == 4) {
            $vendor_id = Auth::user()->vendor_id;
        } else {
            $vendor_id = Auth::user()->id;
        }
        $user = App\Models\User::where('id', $vendor_id)->where('is_available', 1)->where('is_deleted', 2)->first();
    ?>
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2"><?php echo e(trans('labels.settings')); ?></h5>
            <?php echo $__env->make('admin.layout.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="col-12 settings mt-3 mb-7">
        <div class="col-xl-12 mb-4">
            <div class="card card-sticky-top border-0 box-shadow">
                <div class="card-body">
                    <nav class="scrolling-wrapper">
                        <ul class="d-flex align-items-center flex-md-wrap general_settings list-options gap-2">
                            <li>
                                <a data_attribute="basicinfo"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline active"
                                    aria-current="true">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <p class="px-2"><?php echo e(trans('labels.basic_info')); ?></p>
                                </a>
                            </li>
                            <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                <li>
                                    <a data_attribute="themesettings"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                        aria-current="true">
                                        <i class="fa-solid fa-screwdriver-wrench"></i>
                                        <p class="px-2"><?php echo e(trans('labels.theme_settings')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a data_attribute="editprofile"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                    aria-current="true">
                                    <i class="fa-solid fa-user-pen"></i>
                                    <p class="px-2"><?php echo e(trans('labels.edit_profile')); ?></p>
                                </a>
                            </li>
                            <li>
                                <a data_attribute="changepasssword"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-baseline"
                                    aria-current="true">
                                    <i class="fa-solid fa-unlock"></i>
                                    <p class="px-2"><?php echo e(trans('labels.change_password')); ?></p>
                                </a>
                            </li>
                            <li>
                                <a data_attribute="seo"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                    aria-current="true">
                                    <i class="fa-solid fa-chart-line"></i>
                                    <p class="px-2"><?php echo e(trans('labels.seo')); ?></p>
                                </a>
                            </li>
                            <?php if(Auth::user()->type == 1): ?>
                                <li>
                                    <a data_attribute="landing_page"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                        aria-current="true">
                                        <i class="fa-solid fa-clipboard"></i>
                                        <p class="px-2"><?php echo e(trans('labels.landing_page')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_login')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'google_login')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="google_login_config"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-brands fa-google"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.google_login_config')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="facebook_login_config"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.facebook_login_config')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="trusted_badges"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-sharp fa-solid fa-badge-check"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.trusted_badges')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="safe_secure"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-solid fa-shield-check"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.safe_secure')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'email_settings')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'email_settings')->first()->activated == 1): ?>
                                <li>
                                    <a data_attribute="email_smtp_configuration"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                        aria-current="true">
                                        <i class="fa-solid fa-envelope"></i>
                                        <p class="px-2">
                                            <?php echo e(trans('labels.email_smtp_configuration')); ?>

                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a data_attribute="email_template"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                        aria-current="true">
                                        <i class="fa-sharp fa-solid fa-envelopes"></i>
                                        <p class="px-2">
                                            <?php echo e(trans('labels.email_message_settings')); ?>

                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                        <?php
                                            if ($user->allow_without_subscription == 1) {
                                                $whatsapp_message = 1;
                                            } else {
                                                $whatsapp_message = @helper::get_plan($vendor_id)->whatsapp_message;
                                            }
                                        ?>
                                        <?php if($whatsapp_message == 1): ?>
                                            <li>
                                                <a data_attribute="whatsappmessagesettings"
                                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center"
                                                    aria-current="true">
                                                    <i class="fa-brands fa-whatsapp fs-5"></i>
                                                    <p class="px-2">
                                                        <?php echo e(trans('labels.whatsapp_message_settings')); ?>

                                                        <?php if(env('Environment') == 'sendbox'): ?>
                                                            <span
                                                                class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                                        <li>
                                            <a data_attribute="whatsappmessagesettings"
                                                class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center"
                                                aria-current="true">
                                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                                <p class="px-2">
                                                    <?php echo e(trans('labels.whatsapp_message_settings')); ?>

                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>


                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                                        <?php
                                            if ($user->allow_without_subscription == 1) {
                                                $telegram_message = 1;
                                            } else {
                                                $telegram_message = @helper::get_plan($vendor_id)->telegram_message;
                                            }
                                        ?>
                                        <?php if($telegram_message == 1): ?>
                                            <li>
                                                <a data_attribute="telegram"
                                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center"
                                                    aria-current="true">
                                                    <i class="fa-brands fa-telegram"></i>
                                                    <p class="px-2">
                                                        <?php echo e(trans('labels.telegram_message_settings')); ?>

                                                        <?php if(env('Environment') == 'sendbox'): ?>
                                                            <span
                                                                class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                                        <li>
                                            <a data_attribute="telegram"
                                                class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-center"
                                                aria-current="true">
                                                <i class="fa-brands fa-telegram"></i>
                                                <p class="px-2">
                                                    <?php echo e(trans('labels.telegram_message_settings')); ?>

                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>


                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                                        <?php
                                            $checkplan = App\Models\Transaction::where('vendor_id', $vendor_id)
                                                ->orderByDesc('id')
                                                ->first();

                                            if ($user->allow_without_subscription == 1) {
                                                $pwa = 1;
                                            } else {
                                                $pwa = @$checkplan->pwa;
                                            }
                                        ?>
                                        <?php if($pwa == 1): ?>
                                            <li>
                                                <a data_attribute="pwa"
                                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                                    aria-current="true">
                                                    <i class="fa-regular fa-tablet-button"></i>
                                                    <p class="px-2"><?php echo e(trans('labels.pwa')); ?>

                                                        <?php if(env('Environment') == 'sendbox'): ?>
                                                            <span
                                                                class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                                        <li>
                                            <a data_attribute="pwa"
                                                class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                                aria-current="true">
                                                <i class="fa-regular fa-tablet-button"></i>
                                                <p class="px-2"><?php echo e(trans('labels.pwa')); ?>

                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </a>

                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="pixel_settings"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-regular fa-tablet-button"></i>
                                            <p class="px-2"><?php echo e(trans('labels.pixel_settings')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>

                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first()->activated == 1): ?>
                                        <li>
                                            <a data_attribute="loyalty_program"
                                                class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                                aria-current="true">
                                                <i class="fa-solid fa-trophy"></i>
                                                <p class="px-2"><?php echo e(trans('labels.loyalty_program')); ?>

                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first()->activated == 1): ?>
                                        <li>
                                            <a data_attribute="loyalty_program"
                                                class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                                aria-current="true">
                                                <i class="fa-solid fa-trophy"></i>
                                                <p class="px-2"><?php echo e(trans('labels.loyalty_program')); ?>

                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </a>

                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(Auth::user()->type == 1): ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="custom_domain"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex justify-content-between align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-solid fa-globe"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.custom_domain')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_recaptcha')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'google_recaptcha')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="recaptcha"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                            aria-current="true">
                                            <i class="fa-solid fa-gears"></i>
                                            <p class="px-2">
                                                <?php echo e(trans('labels.google_recaptcha')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'tawk')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'tawk')->first()->activated == 1): ?>
                                <li>
                                    <a data_attribute="tawk_config"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline w-100"
                                        aria-current="true">
                                        <i class="fa-regular fa-message"></i>
                                        <p class="px-2"><?php echo e(trans('labels.tawk_config')); ?>

                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first()->activated == 1): ?>
                                <li>
                                    <a data_attribute="wizz_chat_settings"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                        aria-current="true">
                                        <i class="fa-regular fa-message"></i>
                                        <p class="px-2"><?php echo e(trans('labels.wizz_chat_settings')); ?>

                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first()->activated == 1): ?>
                                <li>
                                    <a data_attribute="quick_call"
                                        class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                        aria-current="true">
                                        <i class="fa-duotone fa-solid fa-phone"></i>
                                        <p class="px-2"><?php echo e(trans('labels.quick_call')); ?>

                                            <?php if(env('Environment') == 'sendbox'): ?>
                                                <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="fake_sales_notification"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-regular fa-bell"></i>
                                            <p class="px-2"><?php echo e(trans('labels.fake_sales_notification')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="product_fake_view"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-sharp fa-regular fa-eye"></i>
                                            <p class="px-2"><?php echo e(trans('labels.product_fake_view')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="age_verification"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-sharp fa-regular fa-badge-check"></i>
                                            <p class="px-2"><?php echo e(trans('labels.age_verification')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="review_settings"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-regular fa-star"></i>
                                            <p class="px-2"><?php echo e(trans('labels.review_settings')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="app_section"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-solid fa-circle-info"></i>
                                            <p class="px-2"><?php echo e(trans('labels.mobile_app_section')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="cart_checkout_countdown"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-solid fa-clock"></i>
                                            <p class="px-2"><?php echo e(trans('labels.cart_checkout_countdown')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first() != null &&
                                        App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first()->activated == 1): ?>
                                    <li>
                                        <a data_attribute="cart_checkout_progressbar"
                                            class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                            aria-current="true">
                                            <i class="fa-regular fa-bars-progress"></i>
                                            <p class="px-2"><?php echo e(trans('labels.cart_checkout_progressbar')); ?>

                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                    <span class="badge badge bg-danger"><?php echo e(trans('labels.addon')); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li>
                                <a data_attribute="social_links"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                    aria-current="true">
                                    <i class="fa-solid fa-link"></i>
                                    <p class="px-2"><?php echo e(trans('labels.social_links')); ?></p>
                                </a>
                            </li>
                            <li>
                                <a data_attribute="other"
                                    class="list-group-item basicinfo p-2 px-3 list-item-secondary d-flex align-items-baseline"
                                    aria-current="true">
                                    <i class="fa-solid fa-gears"></i>
                                    <p class="px-2"><?php echo e(trans('labels.other')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div id="settingmenuContent">
                <div id="basicinfo" class="hidechild">
                    <div class="col-12">
                        <div class="card overflow-hidden border-0 box-shadow">
                            <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                <i class="fa-solid fa-circle-info fs-5"></i>
                                <h5 class="px-2"><?php echo e(trans('labels.basic_info')); ?></h5>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(URL::to('admin/settings/update')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 form-group">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.currency_symbol')); ?><span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control" name="currency"
                                                            value="<?php echo e(@$settingdata->currency); ?>"
                                                            placeholder="<?php echo e(trans('labels.currency_symbol')); ?>" required>
                                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">
                                                            <?php echo e(trans('labels.currency_position')); ?>

                                                        </label>
                                                        <div>
                                                            <div class="form-check form-check-inline p-0 m-0">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <input
                                                                        class="form-check-input form-check-input-secondary p-0 m-0"
                                                                        type="radio" name="currency_position"
                                                                        id="radio" value="1"
                                                                        <?php echo e(@$settingdata->currency_position == 'left' ? 'checked' : ''); ?> />
                                                                    <label for="radio"
                                                                        class="form-check-label"><?php echo e(trans('labels.left')); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check form-check-inline p-0 m-0">
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <input
                                                                        class="form-check-input form-check-input-secondary p-0 m-0"
                                                                        type="radio" name="currency_position"
                                                                        id="radio1" value="2"
                                                                        <?php echo e(@$settingdata->currency_position == 'right' ? 'checked' : ''); ?> />
                                                                    <label for="radio1"
                                                                        class="form-check-label"><?php echo e(trans('labels.right')); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <p class="form-label">
                                                            <?php echo e(trans('labels.currency_space')); ?>

                                                        </p>
                                                        <div class="form-check form-check-inline p-0 m-0">
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <input
                                                                    class="form-check-input form-check-input-secondary p-0 m-0"
                                                                    type="radio" name="currency_space"
                                                                    id="currency_space" value="1"
                                                                    <?php echo e(@$settingdata->currency_space == '1' ? 'checked' : ''); ?> />
                                                                <label for="currency_space"
                                                                    class="form-check-label"><?php echo e(trans('labels.yes')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-check-inline p-0 m-0">
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <input
                                                                    class="form-check-input form-check-input-secondary p-0 m-0"
                                                                    type="radio" name="currency_space"
                                                                    id="currency_space1" value="2"
                                                                    <?php echo e(@$settingdata->currency_space == '2' ? 'checked' : ''); ?> />
                                                                <label for="currency_space1"
                                                                    class="form-check-label"><?php echo e(trans('labels.no')); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.currency_formate')); ?><span
                                                                class="text-danger"> * </span></label>
                                                        <input type="text" class="form-control"
                                                            name="currency_formate"
                                                            oninput="this.value = this.value.replace(/\D+/g, '')"
                                                            value="<?php echo e(@$settingdata->currency_formate); ?>"
                                                            placeholder="<?php echo e(trans('labels.currency_formate')); ?>" required>

                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.decimal_separator')); ?></label><br>
                                                        <div class="form-check form-check-inline p-0 m-0">
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <input
                                                                    class="form-check-input form-check-input-secondary m-0 p-0"
                                                                    type="radio" name="decimal_separator"
                                                                    id="dot" value="1" checked
                                                                    <?php echo e(@$settingdata->decimal_separator == '1' ? 'checked' : ''); ?> />
                                                                <label for="dot"
                                                                    class="form-check-label"><?php echo e(trans('labels.dot')); ?>

                                                                    (.)</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-check-inline p-0 m-0">
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <input
                                                                    class="form-check-input form-check-input-secondary p-0 m-0"
                                                                    type="radio" name="decimal_separator"
                                                                    id="comma" value="2"
                                                                    <?php echo e(@$settingdata->decimal_separator == '2' ? 'checked' : ''); ?> />
                                                                <label for="comma"
                                                                    class="form-check-label"><?php echo e(trans('labels.comma')); ?>

                                                                    (,)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-start mt-2 mt-md-0 <?php echo e(Auth::user()->type == 2 || Auth::user()->type == 4 ? 'col-md-2' : 'col-md-3'); ?>">
                                                        <div>
                                                            <label class="form-label"
                                                                for=""><?php echo e(trans('labels.maintenance_mode')); ?>

                                                            </label>
                                                            <input id="maintenance_mode-switch" type="checkbox"
                                                                class="checkbox-switch" name="maintenance_mode"
                                                                value="1"
                                                                <?php echo e($settingdata->maintenance_mode == 1 ? 'checked' : ''); ?>>
                                                            <label for="maintenance_mode-switch" class="switch">
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
                                                    <?php if(Auth::user()->type == 1): ?>
                                                        <div
                                                            class="d-flex justify-content-start mt-2 mt-md-0  <?php echo e(env('Environment') == 'sendbox' ? 'col-md-3 ' : 'col-md-3'); ?>">
                                                            <div>
                                                                <label class="form-label"
                                                                    for=""><?php echo e(trans('labels.vendor_register')); ?>

                                                                </label>
                                                                <input id="vendor_register-switch" type="checkbox"
                                                                    class="checkbox-switch" name="vendor_register"
                                                                    value="1"
                                                                    <?php echo e($settingdata->vendor_register == 1 ? 'checked' : ''); ?>>
                                                                <label for="vendor_register-switch" class="switch">
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
                                                        <div class="col-md-6 form-group">
                                                            <label class="form-label"
                                                                for=""><?php echo e(trans('labels.image_size')); ?><span
                                                                    class="text-danger"> * </span>
                                                            </label>
                                                            <input type="text" step="any"
                                                                class="form-control numbers_only" name="image_size"
                                                                value="<?php echo e(@$settingdata->image_size); ?>"
                                                                placeholder="<?php echo e(trans('labels.image_size')); ?>" required>

                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                                                            <div class="col-md-2" id="checkout_login_required">
                                                                <label class="form-label"
                                                                    for=""><?php echo e(trans('labels.checkout_login_required')); ?>

                                                                </label>
                                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                                    <span
                                                                        class="badge badge bg-danger ms-2 mb-0"><?php echo e(trans('labels.addon')); ?></span>
                                                                <?php endif; ?>
                                                                <input id="checkout_login_required-switch" type="checkbox"
                                                                    class="checkbox-switch" name="checkout_login_required"
                                                                    value="1"
                                                                    <?php echo e($settingdata->checkout_login_required == 1 ? 'checked' : ''); ?>>
                                                                <label for="checkout_login_required-switch"
                                                                    class="switch">
                                                                    <span
                                                                        class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span
                                                                            class="switch__circle-inner"></span></span>
                                                                    <span
                                                                        class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                                                    <span
                                                                        class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-2 <?php echo e($settingdata->checkout_login_required == 1 ? '' : 'd-none'); ?>"
                                                                id="is_checkout_login_required">
                                                                <label class="form-label"
                                                                    for=""><?php echo e(trans('labels.is_checkout_login_required')); ?>

                                                                </label>
                                                                <?php if(env('Environment') == 'sendbox'): ?>
                                                                    <span
                                                                        class="badge badge bg-danger ms-2 mb-0"><?php echo e(trans('labels.addon')); ?></span>
                                                                <?php endif; ?>
                                                                <input id="is_checkout_login_required-switch"
                                                                    type="checkbox" class="checkbox-switch"
                                                                    name="is_checkout_login_required" value="1"
                                                                    <?php echo e($settingdata->is_checkout_login_required == 1 ? 'checked' : ''); ?>>
                                                                <label for="is_checkout_login_required-switch"
                                                                    class="switch">
                                                                    <span
                                                                        class="<?php echo e(session()->get('direction') == 2 ? 'switch__circle-rtl' : 'switch__circle'); ?>"><span
                                                                            class="switch__circle-inner"></span></span>
                                                                    <span
                                                                        class="switch__left <?php echo e(session()->get('direction') == 2 ? 'pe-2' : 'ps-2'); ?>"><?php echo e(trans('labels.off')); ?></span>
                                                                    <span
                                                                        class="switch__right <?php echo e(session()->get('direction') == 2 ? 'ps-2' : 'pe-2'); ?>"><?php echo e(trans('labels.on')); ?></span>
                                                                </label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                                        <div class="col-md-4 form-group">
                                                            <label
                                                                class="form-label"><?php echo e(trans('labels.order_prefix_number')); ?><span
                                                                    class="text-danger"> * </span></label>
                                                            <input type="text" class="form-control w-10"
                                                                name="order_prefix"
                                                                value="<?php echo e(@$settingdata->order_prefix); ?>"
                                                                placeholder="<?php echo e(trans('labels.order_prefix_number')); ?>"
                                                                onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')"
                                                                required>
                                                        </div>
                                                        <?php if($order->count() == 0): ?>
                                                            <div class="col-md-4 form-group">
                                                                <label
                                                                    class="form-label"><?php echo e(trans('labels.order_number_start')); ?><span
                                                                        class="text-danger"> * </span></label>
                                                                <input type="text" class="form-control numbers_only"
                                                                    name="order_number_start"
                                                                    value="<?php echo e(@$settingdata->order_number_start); ?>"
                                                                    placeholder="<?php echo e(trans('labels.order_number_start')); ?>"
                                                                    onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')"
                                                                    required>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-md-4 form-group">
                                                            <label
                                                                class="form-label"><?php echo e(trans('labels.min_order_amount')); ?></label>
                                                            <input type="text" class="form-control w-10 numbers_only"
                                                                name="min_order_amount"
                                                                value="<?php echo e(@$settingdata->min_order_amount); ?>"
                                                                placeholder="<?php echo e(trans('labels.min_order_amount')); ?>"
                                                                onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label
                                                                class="form-label"><?php echo e(trans('labels.min_order_amount_for_free_shipping')); ?></label>
                                                            <input type="text" class="form-control w-10 numbers_only"
                                                                name="min_order_amount_for_free_shipping"
                                                                value="<?php echo e(@$settingdata->min_order_amount_for_free_shipping); ?>"
                                                                placeholder="<?php echo e(trans('labels.min_order_amount_for_free_shipping')); ?>"
                                                                onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label
                                                                class="form-label"><?php echo e(trans('labels.shipping_charges')); ?></label>
                                                            <input type="text" class="form-control numbers_only"
                                                                name="shipping_charges"
                                                                value="<?php echo e(@$settingdata->shipping_charges); ?>"
                                                                placeholder="<?php echo e(trans('labels.shipping_charges')); ?>"
                                                                onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="<?php echo e(env('Environment') == 'sendbox' ? 'col-md-6' : 'col-md-6'); ?> form-group">
                                            <label class="form-label" for=""><?php echo e(trans('labels.time_format')); ?>

                                            </label>
                                            <select class="form-select" name="time_format">
                                                <option value="2"
                                                    <?php echo e($settingdata->time_format == 2 ? 'selected' : ''); ?>>12
                                                    <?php echo e(trans('labels.hour')); ?>

                                                </option>
                                                <option value="1"
                                                    <?php echo e($settingdata->time_format == 1 ? 'selected' : ''); ?>>24
                                                    <?php echo e(trans('labels.hour')); ?>

                                                </option>
                                            </select>
                                        </div>
                                        <div
                                            class="<?php echo e(env('Environment') == 'sendbox' ? 'col-md-6' : 'col-md-6'); ?> form-group">
                                            <label class="form-label" for=""><?php echo e(trans('labels.date_format')); ?>

                                            </label>

                                            <select class="form-select" name="date_format">
                                                <option value="d M, Y"
                                                    <?php echo e($settingdata->date_format == 'd M, Y' ? 'selected' : ''); ?>>dd
                                                    MMM, yyyy</option>
                                                <option value="M d, Y"
                                                    <?php echo e($settingdata->date_format == 'M d, Y' ? 'selected' : ''); ?>>MMM
                                                    dd, yyyy</option>
                                                <option value="d-m-Y"
                                                    <?php echo e($settingdata->date_format == 'd-m-Y' ? 'selected' : ''); ?>>
                                                    dd-MM-yyyy</option>
                                                <option value="m-d-Y"
                                                    <?php echo e($settingdata->date_format == 'm-d-Y' ? 'selected' : ''); ?>>
                                                    MM-dd-yyyy</option>
                                                <option value="d/m/Y"
                                                    <?php echo e($settingdata->date_format == 'd/m/Y' ? 'selected' : ''); ?>>
                                                    dd/MM/yyyy</option>
                                                <option value="m/d/Y"
                                                    <?php echo e($settingdata->date_format == 'm/d/Y' ? 'selected' : ''); ?>>
                                                    MM/dd/yyyy</option>
                                                <option value="Y/m/d"
                                                    <?php echo e($settingdata->date_format == 'Y/m/d' ? 'selected' : ''); ?>>
                                                    yyyy/MM/dd</option>
                                                <option value="Y-m-d"
                                                    <?php echo e($settingdata->date_format == 'Y-m-d' ? 'selected' : ''); ?>>
                                                    yyyy-MM-dd</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.time_zone')); ?></label>
                                                <select class="form-select" name="timezone">
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Midway' ? 'selected' : ''); ?>

                                                        value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Adak' ? 'selected' : ''); ?>

                                                        value="America/Adak">(GMT-10:00) Hawaii-Aleutian
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Etc/GMT+10' ? 'selected' : ''); ?>

                                                        value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Marquesas' ? 'selected' : ''); ?>

                                                        value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Gambier' ? 'selected' : ''); ?>

                                                        value="Pacific/Gambier">(GMT-09:00) Gambier Islands
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Anchorage' ? 'selected' : ''); ?>

                                                        value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Ensenada' ? 'selected' : ''); ?>

                                                        value="America/Ensenada">(GMT-08:00) Tijuana, Baja
                                                        California </option>
                                                    <option <?php echo e(@$settingdata->timezone == 'Etc/GMT+8' ? 'selected' : ''); ?>

                                                        value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Los_Angeles' ? 'selected' : ''); ?>

                                                        value="America/Los_Angeles">(GMT-08:00) Pacific Time
                                                        (US
                                                        &amp; Canada) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Denver' ? 'selected' : ''); ?>

                                                        value="America/Denver">(GMT-07:00) Mountain Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Chihuahua' ? 'selected' : ''); ?>

                                                        value="America/Chihuahua">(GMT-07:00) Chihuahua, La
                                                        Paz,
                                                        Mazatlan </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Dawson_Creek' ? 'selected' : ''); ?>

                                                        value="America/Dawson_Creek">(GMT-07:00) Arizona
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Belize' ? 'selected' : ''); ?>

                                                        value="America/Belize">(GMT-06:00) Saskatchewan,
                                                        Central
                                                        America </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Cancun' ? 'selected' : ''); ?>

                                                        value="America/Cancun">(GMT-06:00) Guadalajara, Mexico
                                                        City,
                                                        Monterrey </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Chile/EasterIsland' ? 'selected' : ''); ?>

                                                        value="Chile/EasterIsland">(GMT-06:00) Easter Island
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Chicago' ? 'selected' : ''); ?>

                                                        value="America/Chicago">(GMT-06:00) Central Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/New_York' ? 'selected' : ''); ?>

                                                        value="America/New_York">(GMT-05:00) Eastern Time (US
                                                        &amp;
                                                        Canada) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Havana' ? 'selected' : ''); ?>

                                                        value="America/Havana">(GMT-05:00) Cuba</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Bogota' ? 'selected' : ''); ?>

                                                        value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito,
                                                        Rio
                                                        Branco </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Caracas' ? 'selected' : ''); ?>

                                                        value="America/Caracas">(GMT-04:30) Caracas</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Santiago' ? 'selected' : ''); ?>

                                                        value="America/Santiago">(GMT-04:00) Santiago</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/La_Paz' ? 'selected' : ''); ?>

                                                        value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Atlantic/Stanley' ? 'selected' : ''); ?>

                                                        value="Atlantic/Stanley">(GMT-04:00) Faukland Islands
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Campo_Grande' ? 'selected' : ''); ?>

                                                        value="America/Campo_Grande">(GMT-04:00) Brazil
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Goose_Bay' ? 'selected' : ''); ?>

                                                        value="America/Goose_Bay">(GMT-04:00) Atlantic Time
                                                        (Goose
                                                        Bay) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Glace_Bay' ? 'selected' : ''); ?>

                                                        value="America/Glace_Bay">(GMT-04:00) Atlantic Time
                                                        (Canada) </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/St_Johns' ? 'selected' : ''); ?>

                                                        value="America/St_Johns">(GMT-03:30) Newfoundland
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Araguaina' ? 'selected' : ''); ?>

                                                        value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Montevideo' ? 'selected' : ''); ?>

                                                        value="America/Montevideo">(GMT-03:00) Montevideo
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Miquelon' ? 'selected' : ''); ?>

                                                        value="America/Miquelon">(GMT-03:00) Miquelon, St.
                                                        Pierre
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Godthab' ? 'selected' : ''); ?>

                                                        value="America/Godthab">(GMT-03:00) Greenland</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Argentina' ? 'selected' : ''); ?>

                                                        value="America/Argentina/Buenos_Aires">(GMT-03:00)
                                                        Buenos
                                                        Aires </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Sao_Paulo' ? 'selected' : ''); ?>

                                                        value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'America/Noronha' ? 'selected' : ''); ?>

                                                        value="America/Noronha">(GMT-02:00) Mid-Atlantic
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Atlantic/Cape_Verde' ? 'selected' : ''); ?>

                                                        value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Atlantic/Azores' ? 'selected' : ''); ?>

                                                        value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Belfast' ? 'selected' : ''); ?>

                                                        value="Europe/Belfast">(GMT) Greenwich Mean Time :
                                                        Belfast
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Dublin' ? 'selected' : ''); ?>

                                                        value="Europe/Dublin">(GMT) Greenwich Mean Time :
                                                        Dublin
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Lisbon' ? 'selected' : ''); ?>

                                                        value="Europe/Lisbon">(GMT) Greenwich Mean Time :
                                                        Lisbon
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/London' ? 'selected' : ''); ?>

                                                        value="Europe/London">(GMT) Greenwich Mean Time :
                                                        London
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Abidjan' ? 'selected' : ''); ?>

                                                        value="Africa/Abidjan">(GMT) Monrovia, Reykjavik
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Amsterdam' ? 'selected' : ''); ?>

                                                        value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin,
                                                        Bern, Rome, Stockholm, Vienna</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Belgrade' ? 'selected' : ''); ?>

                                                        value="Europe/Belgrade">(GMT+01:00) Belgrade,
                                                        Bratislava,
                                                        Budapest, Ljubljana, Prague</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Brussels' ? 'selected' : ''); ?>

                                                        value="Europe/Brussels">(GMT+01:00) Brussels,
                                                        Copenhagen,
                                                        Madrid, Paris </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Algiers' ? 'selected' : ''); ?>

                                                        value="Africa/Algiers">(GMT+01:00) West Central Africa
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Windhoek' ? 'selected' : ''); ?>

                                                        value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Beirut' ? 'selected' : ''); ?>

                                                        value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Cairo' ? 'selected' : ''); ?>

                                                        value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                    <option <?php echo e(@$settingdata->timezone == 'Asia/Gaza' ? 'selected' : ''); ?>

                                                        value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Blantyre' ? 'selected' : ''); ?>

                                                        value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Jerusalem' ? 'selected' : ''); ?>

                                                        value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Minsk' ? 'selected' : ''); ?>

                                                        value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Damascus' ? 'selected' : ''); ?>

                                                        value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Europe/Moscow' ? 'selected' : ''); ?>

                                                        value="Europe/Moscow">(GMT+03:00) Moscow, St.
                                                        Petersburg,
                                                        Volgograd </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Africa/Addis_Ababa' ? 'selected' : ''); ?>

                                                        value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Tehran' ? 'selected' : ''); ?>

                                                        value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Dubai' ? 'selected' : ''); ?>

                                                        value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Yerevan' ? 'selected' : ''); ?>

                                                        value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Kabul' ? 'selected' : ''); ?>

                                                        value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Yekaterinburg' ? 'selected' : ''); ?>

                                                        value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Tashkent' ? 'selected' : ''); ?>

                                                        value="Asia/Tashkent"> (GMT+05:00) Tashkent</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Kolkata' ? 'selected' : ''); ?>

                                                        value="Asia/Kolkata"> (GMT+05:30) Chennai, Kolkata,
                                                        Mumbai,
                                                        New Delhi</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Katmandu' ? 'selected' : ''); ?>

                                                        value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Dhaka' ? 'selected' : ''); ?>

                                                        value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Novosibirsk' ? 'selected' : ''); ?>

                                                        value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Rangoon' ? 'selected' : ''); ?>

                                                        value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Bangkok' ? 'selected' : ''); ?>

                                                        value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi,
                                                        Jakarta
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : ''); ?>

                                                        value="Asia/Kuala_Lumpur">(GMT+08:00) Kuala Lumpur
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Krasnoyarsk' ? 'selected' : ''); ?>

                                                        value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Hong_Kong' ? 'selected' : ''); ?>

                                                        value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing,
                                                        Hong
                                                        Kong, Urumqi</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Irkutsk' ? 'selected' : ''); ?>

                                                        value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Perth' ? 'selected' : ''); ?>

                                                        value="Australia/Perth">(GMT+08:00) Perth</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Eucla' ? 'selected' : ''); ?>

                                                        value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Tokyo' ? 'selected' : ''); ?>

                                                        value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Seoul' ? 'selected' : ''); ?>

                                                        value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Yakutsk' ? 'selected' : ''); ?>

                                                        value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Adelaide' ? 'selected' : ''); ?>

                                                        value="Australia/Adelaide">(GMT+09:30) Adelaide
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Darwin' ? 'selected' : ''); ?>

                                                        value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Brisbane' ? 'selected' : ''); ?>

                                                        value="Australia/Brisbane">(GMT+10:00) Brisbane
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Hobart' ? 'selected' : ''); ?>

                                                        value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Vladivostok' ? 'selected' : ''); ?>

                                                        value="Asia/Vladivostok">(GMT+10:00) Vladivostok
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Australia/Lord_Howe' ? 'selected' : ''); ?>

                                                        value="Australia/Lord_Howe">(GMT+10:30) Lord Howe
                                                        Island
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Etc/GMT-11' ? 'selected' : ''); ?>

                                                        value="Etc/GMT-11">(GMT+11:00) Solomon Is., New
                                                        Caledonia
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Magadan' ? 'selected' : ''); ?>

                                                        value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Norfolk' ? 'selected' : ''); ?>

                                                        value="Pacific/Norfolk">(GMT+11:30) Norfolk Island
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Asia/Anadyr' ? 'selected' : ''); ?>

                                                        value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Auckland' ? 'selected' : ''); ?>

                                                        value="Pacific/Auckland">(GMT+12:00) Auckland,
                                                        Wellington
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Etc/GMT-12' ? 'selected' : ''); ?>

                                                        value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka,
                                                        Marshall
                                                        Is. </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Chatham' ? 'selected' : ''); ?>

                                                        value="Pacific/Chatham">(GMT+12:45) Chatham Islands
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Tongatapu' ? 'selected' : ''); ?>

                                                        value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa
                                                    </option>
                                                    <option
                                                        <?php echo e(@$settingdata->timezone == 'Pacific/Kiritimati' ? 'selected' : ''); ?>

                                                        value="Pacific/Kiritimati">(GMT+14:00) Kiritimati
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.website_title')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="website_title"
                                                    value="<?php echo e(@$settingdata->website_title); ?>"
                                                    placeholder="<?php echo e(trans('labels.website_title')); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.copyright')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="copyright"
                                                    value="<?php echo e(@$settingdata->copyright); ?>"
                                                    placeholder="<?php echo e(trans('labels.copyright')); ?>" required>
                                            </div>
                                        </div>
                                        <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first() != null &&
                                                    App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first()->activated == 1): ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.personlized_link')); ?><span
                                                                class="text-danger"> * </span></label>
                                                        <div class="input-group mb-2">
                                                            <span
                                                                class="input-group-text fs-7 overflow-x-scroll 
                                                                <?php echo e(session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0'); ?>"><?php echo e(URL::to('/')); ?></span>
                                                            <input type="text"
                                                                class="form-control mb-0  <?php echo e(session()->get('direction') == 2 ? 'rounded-start-5 rounded-end-0' : 'rounded-start-0 rounded-end-5'); ?>"
                                                                id="slug" name="slug"
                                                                value="<?php echo e($user->slug); ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(trans('labels.contact_email')); ?><span
                                                            class="text-danger"> * </span></label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?php echo e(@$settingdata->email); ?>"
                                                        placeholder="<?php echo e(trans('labels.contact_email')); ?>" required>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(trans('labels.address')); ?><span
                                                            class="text-danger"> * </span></label>
                                                    <textarea class="form-control" name="address" rows="3" placeholder="<?php echo e(trans('labels.address')); ?>" required><?php echo e(@$settingdata->address); ?></textarea>
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <?php
                                                    $delivery_type = explode(',', $settingdata->delivery_type);
                                                ?>
                                                <div class="col-md-12 mb-2">
                                                    <label class="form-label"><?php echo e(trans('labels.delivery_option')); ?><span
                                                            class="text-danger"> * </span></label>
                                                    <div class="form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="delivery_type[]" value="1" id="delivery"
                                                            <?php echo e(in_array(1, $delivery_type) ? 'checked' : ''); ?>>
                                                        <label class="form-check-label"
                                                            for="delivery"><?php echo e(trans('labels.delivery')); ?></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="delivery_type[]" value="2" id="pickup"
                                                            <?php echo e(in_array(2, $delivery_type) ? 'checked' : ''); ?>>
                                                        <label class="form-check-label"
                                                            for="pickup"><?php echo e(trans('labels.pickup')); ?></label>
                                                    </div>
                                                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1): ?>
                                                            <?php
                                                                $tableqr = 1;
                                                                if ($user->allow_without_subscription == 1) {
                                                                } else {
                                                                    $tableqr = @helper::get_plan($vendor_id)->tableqr;
                                                                }
                                                            ?>
                                                            <?php if($tableqr == 1): ?>
                                                                <div class="form-group">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="delivery_type[]" value="3"
                                                                        id="dine_in"
                                                                        <?php echo e(in_array(3, $delivery_type) ? 'checked' : ''); ?>>
                                                                    <label class="form-check-label"
                                                                        for="dine_in"><?php echo e(trans('labels.dine_in')); ?></label>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'tableqr')->first()->activated == 1): ?>
                                                            <div class="form-group">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="delivery_type[]" value="3" id="dine_in"
                                                                    <?php echo e(in_array(3, $delivery_type) ? 'checked' : ''); ?>>
                                                                <label class="form-check-label"
                                                                    for="dine_in"><?php echo e(trans('labels.dine_in')); ?></label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.description')); ?></label>
                                                        <textarea class="form-control" name="description" rows="3" placeholder="<?php echo e(trans('labels.description')); ?>"><?php echo e(@$settingdata->description); ?></textarea>
                                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="row justify-content-between align-items-center mb-3">
                                                        <label class="col-auto col-form-label"
                                                            for=""><?php echo e(trans('labels.footer_features')); ?>

                                                            <span class="" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Ex. <i class='fa-solid fa-truck-fast'></i> Visit https://fontawesome.com/ for more info">
                                                            </span>
                                                        </label>
                                                        <?php if(count($getfooterfeatures) > 0): ?>
                                                            <span class="col-auto">
                                                                <button
                                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5"
                                                                    type="button"
                                                                    onclick="add_features('<?php echo e(trans('labels.icon')); ?>','<?php echo e(trans('labels.title')); ?>','<?php echo e(trans('labels.description')); ?>')">
                                                                    <i class="fa-sharp fa-solid fa-plus"></i>
                                                                    <?php echo e(trans('labels.add_new')); ?>

                                                                    <?php echo e(trans('labels.footer_features')); ?>

                                                                </button>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <?php $__empty_1 = true; $__currentLoopData = $getfooterfeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $features): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <input type="hidden" name="edit_icon_key[]"
                                                                value="<?php echo e($features->id); ?>">
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        class="form-control mb-0 <?php echo e(session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0'); ?>"
                                                                        onkeyup="show_feature_icon(this)"
                                                                        name="edi_feature_icon[<?php echo e($features->id); ?>]"
                                                                        placeholder="<?php echo e(trans('labels.icon')); ?>"
                                                                        value="<?php echo e($features->icon); ?>" required>
                                                                    <p
                                                                        class="input-group-text <?php echo e(session()->get('direction') == 2 ? 'rounded-start-5 rounded-end-0 border-end-0' : 'rounded-start-0 rounded-end-5'); ?>">
                                                                        <?php echo $features->icon; ?>

                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" class="form-control"
                                                                    name="edi_feature_title[<?php echo e($features->id); ?>]"
                                                                    placeholder="<?php echo e(trans('labels.title')); ?>"
                                                                    value="<?php echo e($features->title); ?>" required>
                                                            </div>
                                                            <div class="col-md-4 d-flex gap-2 form-group">
                                                                <input type="text" class="form-control mb-0"
                                                                    name="edi_feature_description[<?php echo e($features->id); ?>]"
                                                                    placeholder="<?php echo e(trans('labels.description')); ?>"
                                                                    value="<?php echo e($features->description); ?>" required>
                                                                <button
                                                                    class="btn btn-danger btn-sm hov rounded-5 pricebtn"
                                                                    type="button"
                                                                    onclick="statusupdate('<?php echo e(URL::to('admin/settings/delete-feature-' . $features->id)); ?>')">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <div class="col-md-4 form-group">
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        class="form-control mb-0 <?php echo e(session()->get('direction') == 2 ? 'input-group-rtl' : ''); ?>"
                                                                        onkeyup="show_feature_icon(this)"
                                                                        name="feature_icon[]"
                                                                        placeholder="<?php echo e(trans('labels.icon')); ?>">
                                                                    <p
                                                                        class="input-group-text <?php echo e(session()->get('direction') == 2 ? 'input-group-icon-rtl' : ''); ?>">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" class="form-control"
                                                                    name="feature_title[]"
                                                                    placeholder="<?php echo e(trans('labels.title')); ?>">
                                                            </div>
                                                            <div class="col-md-4 form-group d-flex gap-2">
                                                                <input type="text" class="form-control mb-0"
                                                                    name="feature_description[]"
                                                                    placeholder="<?php echo e(trans('labels.description')); ?>">
                                                                <button class="btn btn-dark btn-sm rounded-5 hov pricebtn"
                                                                    type="button"
                                                                    onclick="add_features('<?php echo e(trans('labels.icon')); ?>','<?php echo e(trans('labels.title')); ?>','<?php echo e(trans('labels.description')); ?>')">
                                                                    <i class="fa-sharp fa-solid fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        <?php endif; ?>
                                                        <span class="extra_footer_features"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                                <?php if(App\Models\SystemAddons::where('unique_identifier', 'notification')->first() != null &&
                                                        App\Models\SystemAddons::where('unique_identifier', 'notification')->first()->activated == 1): ?>
                                                    <div class="form-group col-md-6">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.notification_sound')); ?></label>
                                                        <input type="file" class="form-control"
                                                            name="notification_sound">
                                                        <?php $__errorArgs = ['notification_sound'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <small class="text-danger"><?php echo e($message); ?></small><br>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <?php if(!empty($settingdata->notification_sound) && $settingdata->notification_sound != null): ?>
                                                            <audio controls class="mt-3">
                                                                <source
                                                                    src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/notification/' . $settingdata->notification_sound)); ?>"
                                                                    type="audio/mpeg">
                                                            </audio>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                                <button
                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="updatebasicinfo" value="1" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                    <div id="themesettings" class="hidechild">
                        <div class="col-12 mb-7 mt-3">
                            <div class="card border-0 box-shadow">
                                <div
                                    class="card-header rounded-top-4 bg-secondary py-3 d-flex align-items-center text-white">
                                    <i class="fa-solid fa-screwdriver-wrench fs-5"></i>
                                    <h5 class="px-2"><?php echo e(trans('labels.theme_settings')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?php echo e(URL::to('admin/settings/updatetheme')); ?>"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo e(trans('labels.logo')); ?>

                                                            </label>
                                                            <input type="file" class="form-control" name="logo">
                                                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <small class="text-danger"><?php echo e($message); ?></small>
                                                                <br>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <img class="img-fluid rounded-3 h-70px my-2 object-fit-contain"
                                                                src="<?php echo e(helper::image_path(@$settingdata->logo)); ?>"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label"><?php echo e(trans('labels.favicon')); ?></label>
                                                            <input type="file" class="form-control" name="favicon">
                                                            <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <small class="text-danger"><?php echo e($message); ?></small>
                                                                <br>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <img class="img-fluid rounded-3 h-70px my-2 object-fit-contain"
                                                                src="<?php echo e(helper::image_path(@$settingdata->favicon)); ?>"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.primary_color')); ?></label>
                                                        <input name="primary_color"
                                                            class="form-control form-control-color w-100 border-0"
                                                            type="color" value="<?php echo e(@$settingdata->primary_color); ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.secondary_color')); ?></label>
                                                        <input name="secondary_color"
                                                            class="form-control form-control-color w-100 border-0"
                                                            type="color" value="<?php echo e(@$settingdata->secondary_color); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $checktheme = @helper::checkthemeaddons('theme_');
                                                $themes = [];
                                                if ($user->allow_without_subscription == 1) {
                                                    foreach ($checktheme as $ttlthemes) {
                                                        array_push(
                                                            $themes,
                                                            str_replace('theme_', '', $ttlthemes->unique_identifier),
                                                        );
                                                    }
                                                } else {
                                                    if (
                                                        App\Models\SystemAddons::where(
                                                            'unique_identifier',
                                                            'subscription',
                                                        )->first() != null &&
                                                        App\Models\SystemAddons::where(
                                                            'unique_identifier',
                                                            'subscription',
                                                        )->first()->activated == 1
                                                    ) {
                                                        if (empty($theme)) {
                                                            $themes = [1];
                                                        } else {
                                                            $themes = explode(',', @$theme->themes_id);
                                                        }
                                                    } else {
                                                        foreach ($checktheme as $ttlthemes) {
                                                            array_push(
                                                                $themes,
                                                                str_replace(
                                                                    'theme_',
                                                                    '',
                                                                    $ttlthemes->unique_identifier,
                                                                ),
                                                            );
                                                        }
                                                    }
                                                }
                                            ?>
                                            <div class="col-md-12 selectimg">
                                                <div class="form-group">
                                                    <label class="form-label mt-4"><?php echo e(trans('labels.theme')); ?>

                                                        <span class="text-danger"> * </span> </label>
                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger ms-2"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                    <div class="row">
                                                        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                                                                <label for="template<?php echo e($item); ?>"
                                                                    class="radio-card position-relative">
                                                                    <input type="radio" name="template"
                                                                        id="template<?php echo e($item); ?>"
                                                                        value="<?php echo e($item); ?>"
                                                                        <?php echo e(@$settingdata->template == $item ? 'checked' : ''); ?>>
                                                                    <div class="card-content-wrapper border rounded-2">
                                                                        <span class="check-icon position-absolute"></span>
                                                                        <div class="selecimg">
                                                                            <img
                                                                                src="<?php echo e(helper::image_path('theme-' . $item . '.png')); ?>">
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 selectimg">
                                                <div class="form-group">
                                                    <label class="form-label mt-4"><?php echo e(trans('labels.theme_type')); ?>

                                                        <span class="text-danger"> * </span> </label>
                                                    <?php if(env('Environment') == 'sendbox'): ?>
                                                        <span
                                                            class="badge badge bg-danger ms-2"><?php echo e(trans('labels.addon')); ?></span>
                                                    <?php endif; ?>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <label for="template_type_1"
                                                                class="radio-card position-relative">
                                                                <input type="radio" name="template_type"
                                                                    id="template_type_1" value="1"
                                                                    <?php echo e(@$settingdata->template_type == 1 ? 'checked' : ''); ?>>
                                                                <div class="card-content-wrapper border rounded-2">
                                                                    <span class="check-icon position-absolute m-2"></span>
                                                                    <div class="selecimg">
                                                                        <img src="<?php echo e(helper::image_path('theme-grid.png')); ?>"
                                                                            class="w-100 h-100">
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="template_type_2"
                                                                class="radio-card position-relative">
                                                                <input type="radio" name="template_type"
                                                                    id="template_type_2" value="2"
                                                                    <?php echo e(@$settingdata->template_type == 2 ? 'checked' : ''); ?>>
                                                                <div class="card-content-wrapper border rounded-2">
                                                                    <span class="check-icon position-absolute m-2"></span>
                                                                    <div class="selecimg">
                                                                        <img src="<?php echo e(helper::image_path('theme-list.png')); ?>"
                                                                            class="w-100 h-100">
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-0 d-flex gap-2 justify-content-end">
                                                <button
                                                    class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                    <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div id="editprofile" class="hidechild">
                    <div class="col-12">
                        <div class="card overflow-hidden border-0 box-shadow">
                            <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                <i class="fa-solid fa-user-pen fs-5"></i>
                                <h5 class="px-2"><?php echo e(trans('labels.edit_profile')); ?></h5>
                            </div>
                            <div class="card-body">
                                <form method="POST"
                                    action="<?php echo e(URL::to('admin/settings/update-profile-' . Auth::user()->id)); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="form-label"><?php echo e(trans('labels.name')); ?><span
                                                    class="text-danger"> *
                                                </span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?php echo e(Auth::user()->name); ?>"
                                                placeholder="<?php echo e(trans('labels.name')); ?>" required>
                                            <?php $__errorArgs = ['name'];
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
                                        <div class="form-group col-sm-6">
                                            <label class="form-label"><?php echo e(trans('labels.email')); ?><span
                                                    class="text-danger">
                                                    * </span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="<?php echo e(Auth::user()->email); ?>"
                                                placeholder="<?php echo e(trans('labels.email')); ?>" required>
                                            <?php $__errorArgs = ['email'];
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
                                        <div class="form-group col-sm-6">
                                            <label class="form-label" for="mobile"><?php echo e(trans('labels.mobile')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="number" class="form-control" name="mobile" id="mobile"
                                                value="<?php echo e(Auth::user()->mobile); ?>"
                                                placeholder="<?php echo e(trans('labels.mobile')); ?>" required>
                                            <?php $__errorArgs = ['mobile'];
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
                                        <div class="form-group col-sm-6">
                                            <label class="form-label"><?php echo e(trans('labels.image')); ?></label>
                                            <input type="file" class="form-control" name="profile">
                                            <?php $__errorArgs = ['profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span> <br>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                src="<?php echo e(helper::image_Path(Auth::user()->image)); ?>" alt="">
                                        </div>
                                        <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                            <div class="form-group col-md-6">
                                                <label for="city" class="form-label"><?php echo e(trans('labels.city')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <select name="city" class="form-select" id="city" required>
                                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                                    <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>"
                                                            <?php echo e($city->id == Auth::user()->city_id ? 'selected' : ''); ?>>
                                                            <?php echo e($city->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="area" class="form-label"><?php echo e(trans('labels.area')); ?><span
                                                        class="text-danger">
                                                        * </span></label>
                                                <select name="area" class="form-select" id="area" required>
                                                    <option value=""><?php echo e(trans('labels.select')); ?></option>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="updateprofile" value="1" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="changepasssword" class="hidechild">
                    <div class="col-12">
                        <div class="card overflow-hidden border-0 box-shadow">
                            <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                <i class="fa-solid fa-unlock fs-5"></i>
                                <h5 class="px-2"><?php echo e(trans('labels.change_password')); ?></h5>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(URL::to('admin/settings/change-password')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="form-label"><?php echo e(trans('labels.current_password')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="current_password"
                                                value="<?php echo e(old('current_password')); ?>"
                                                placeholder="<?php echo e(trans('labels.current_password')); ?>" autocomplete="on"
                                                required>
                                            <?php $__errorArgs = ['current_password'];
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
                                        <div class="form-group col-sm-6">
                                            <label class="form-label"><?php echo e(trans('labels.new_password')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="new_password"
                                                value="<?php echo e(old('new_password')); ?>"
                                                placeholder="<?php echo e(trans('labels.new_password')); ?>" autocomplete="on"
                                                required>
                                            <?php $__errorArgs = ['new_password'];
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
                                        <div class="form-group col-sm-6">
                                            <label class="form-label"><?php echo e(trans('labels.confirm_password')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                value="<?php echo e(old('confirm_password')); ?>"
                                                placeholder="<?php echo e(trans('labels.confirm_password')); ?>" autocomplete="on"
                                                required>
                                            <?php $__errorArgs = ['confirm_password'];
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
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="seo" class="hidechild">
                    <div class="col-12">
                        <div class="card border-0 overflow-hidden box-shadow">
                            <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                <i class="fa-solid fa-chart-line fs-5"></i>
                                <h5 class="px-2"><?php echo e(trans('labels.seo')); ?></h5>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(URL::to('admin/settings/updateseo')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="form-label"><?php echo e(trans('labels.meta_title')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="meta_title"
                                                value="<?php echo e(@$settingdata->meta_title); ?>"
                                                placeholder="<?php echo e(trans('labels.meta_title')); ?>" required>
                                            <?php $__errorArgs = ['meta_title'];
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
                                            <label class="form-label"><?php echo e(trans('labels.meta_description')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <textarea class="form-control" name="meta_description" rows="3"
                                                placeholder="<?php echo e(trans('labels.meta_description')); ?>" required><?php echo e(@$settingdata->meta_description); ?></textarea>
                                            <?php $__errorArgs = ['meta_description'];
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
                                            <label class="form-label"><?php echo e(trans('labels.og_image')); ?><span
                                                    class="text-danger"> * </span></label>
                                            <input type="file" class="form-control" name="og_image">
                                            <?php $__errorArgs = ['og_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span> <br>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                src="<?php echo e(helper::image_path(@$settingdata->og_image)); ?>" alt="">
                                        </div>
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(Auth::user()->type == 1): ?>
                    <div id="landing_page" class="hidechild">
                        <div class="col-12">
                            <div class="card border-0 overflow-hidden box-shadow">
                                <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                    <i class="fa-solid fa-clipboard"></i>
                                    <h5 class="px-2"><?php echo e(trans('labels.landing_page')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo e(URL::to('/admin/landingsettings')); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.logo')); ?>

                                                    <small></small></label>
                                                <input type="file" class="form-control mb-0" name="logo">
                                                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small> <br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img class="img-fluid rounded-3 h-70px object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_path(@$settingdata->logo)); ?>" alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.favicon')); ?> </label>
                                                <input type="file" class="form-control mb-0" name="favicon">
                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small> <br>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img class="img-fluid rounded-3 h-70px object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_path(@$settingdata->favicon)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.primary_color')); ?></label>
                                                <input name="landing_primary_color"
                                                    class="form-control form-control-color w-100 border-0" type="color"
                                                    value="<?php echo e(@$settingdata->primary_color); ?>">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.secondary_color')); ?></label>
                                                <input name="landing_secondary_color"
                                                    class="form-control form-control-color w-100 border-0" type="color"
                                                    value="<?php echo e(@$settingdata->secondary_color); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.website_title')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control"
                                                    name="landing_website_title"
                                                    value="<?php echo e(@$settingdata->landing_website_title); ?>"
                                                    placeholder="<?php echo e(trans('labels.website_title')); ?>" required>
                                                <?php $__errorArgs = ['landing_website_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label"><?php echo e(trans('labels.contact_email')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="landing_email"
                                                    value="<?php echo e(@$settingdata->email); ?>"
                                                    placeholder="<?php echo e(trans('labels.contact_email')); ?>" required>
                                                <?php $__errorArgs = ['landing_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label"><?php echo e(trans('labels.contact_mobile')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="landing_mobile"
                                                    value="<?php echo e(@$settingdata->contact); ?>"
                                                    placeholder="<?php echo e(trans('labels.contact_mobile')); ?>" required>
                                                <?php $__errorArgs = ['contact_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"><?php echo e(trans('labels.address')); ?><span
                                                        class="text-danger"> * </span></label>
                                                <textarea class="form-control" name="landing_address" rows="3"
                                                    placeholder="<?php echo e(trans('labels.address')); ?>" required><?php echo e(@$settingdata->address); ?></textarea>
                                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="form-label"><?php echo e(trans('labels.facebook_link')); ?></label>
                                                    <input type="text" class="form-control"
                                                        name="landing_facebook_link"
                                                        value="<?php echo e(@$settingdata->facebook_link); ?>"
                                                        placeholder="<?php echo e(trans('labels.facebook_link')); ?>">
                                                    <?php $__errorArgs = ['facebook_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(trans('labels.twitter_link')); ?></label>
                                                    <input type="text" class="form-control"
                                                        name="landing_twitter_link"
                                                        value="<?php echo e(@$settingdata->twitter_link); ?>"
                                                        placeholder="<?php echo e(trans('labels.twitter_link')); ?>">
                                                    <?php $__errorArgs = ['twitter_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="form-label"><?php echo e(trans('labels.instagram_link')); ?></label>
                                                    <input type="text" class="form-control"
                                                        name="landing_instagram_link"
                                                        value="<?php echo e(@$settingdata->instagram_link); ?>"
                                                        placeholder="<?php echo e(trans('labels.instagram_link')); ?>">
                                                    <?php $__errorArgs = ['instagram_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="form-label"><?php echo e(trans('labels.linkedin_link')); ?></label>
                                                    <input type="text" class="form-control"
                                                        name="landing_linkedin_link"
                                                        value="<?php echo e(@$settingdata->linkedin_link); ?>"
                                                        placeholder="<?php echo e(trans('labels.linkedin_link')); ?>">
                                                    <?php $__errorArgs = ['linkedin_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_login')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'google_login')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.sociallogin.google_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'facebook_login')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.sociallogin.facebook_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'trusted_badges')->first()->activated == 1): ?>
                        <div id="trusted_badges" class="hidechild">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0 box-shadow">
                                        <div
                                            class="card-header rounded-top-4 py-3 bg-secondary d-flex align-items-center">
                                            <i class="fa-sharp fa-solid fa-badge-check fs-5"></i>
                                            <h5 class="px-2">
                                                <?php echo e(trans('labels.trusted_badges')); ?>

                                            </h5>
                                        </div>
                                        <form action="<?php echo e(URL::to('admin/settings/safe-secure-store')); ?>"
                                            method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="row row-cols-xxl-4 row-cols-xl-2 row-cols-lg-2 row-cols-md-2 row-cols-1">
                                                            <div class="form-group col">
                                                                <label
                                                                    class="form-label"><?php echo e(trans('labels.trusted_badge_image_1')); ?>

                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    name="trusted_badge_image_1">
                                                                <img class="img-fluid rounded h-40 mt-1"
                                                                    src="<?php echo e(@helper::image_Path($othersettingdata->trusted_badge_image_1)); ?>"
                                                                    alt="">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label
                                                                    class="form-label"><?php echo e(trans('labels.trusted_badge_image_2')); ?>

                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    name="trusted_badge_image_2">
                                                                <img class="img-fluid rounded h-40 mt-1"
                                                                    src="<?php echo e(@helper::image_Path($othersettingdata->trusted_badge_image_2)); ?>"
                                                                    alt="">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label
                                                                    class="form-label"><?php echo e(trans('labels.trusted_badge_image_3')); ?>

                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    name="trusted_badge_image_3">
                                                                <img class="img-fluid rounded h-40 mt-1"
                                                                    src="<?php echo e(@helper::image_Path($othersettingdata->trusted_badge_image_3)); ?>"
                                                                    alt="">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label
                                                                    class="form-label"><?php echo e(trans('labels.trusted_badge_image_4')); ?>

                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    name="trusted_badge_image_4">
                                                                <img class="img-fluid rounded h-40 mt-1"
                                                                    src="<?php echo e(@helper::image_Path($othersettingdata->trusted_badge_image_4)); ?>"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                                    <button
                                                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="trusted_badges" value="1" <?php endif; ?>
                                                        class="btn btn-primary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.save')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'safe_secure_checkout')->first()->activated == 1): ?>
                        <div id="safe_secure" class="hidechild">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="card border-0 box-shadow">
                                        <div
                                            class="card-header rounded-top-4 py-3 bg-secondary d-flex align-items-center">
                                            <i class="fa-solid fa-shield-check fs-5"></i>
                                            <h5 class="px-2">
                                                <?php echo e(trans('labels.safe_secure')); ?>

                                            </h5>
                                        </div>
                                        <form action="<?php echo e(URL::to('admin/settings/safe-secure-store')); ?>"
                                            method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.safe_secure_checkout_payment_selection')); ?>

                                                        </label>
                                                        <div class="row">
                                                            <?php $__currentLoopData = $getpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    // Check if the current $payment is a system addon and activated
                                                                    if ($payment->payment_type == '1') {
                                                                        $systemAddonActivated = true;
                                                                    } else {
                                                                        $systemAddonActivated = false;
                                                                    }
                                                                    $addon = App\Models\SystemAddons::where(
                                                                        'unique_identifier',
                                                                        $payment->unique_identifier,
                                                                    )->first();
                                                                    if ($addon != null && $addon->activated == 1) {
                                                                        $systemAddonActivated = true;
                                                                    }
                                                                ?>
                                                                <?php if($systemAddonActivated): ?>
                                                                    <div class="form-group col-auto">
                                                                        <div class="form-check">
                                                                            <input
                                                                                class="form-check-input payment-checkbox"
                                                                                type="checkbox"
                                                                                name="safe_secure_checkout_payment_selection[]"
                                                                                <?php echo e(@in_array($payment->payment_type, explode(',', $othersettingdata->safe_secure_checkout_payment_selection)) ? 'checked' : ''); ?>

                                                                                id="<?php echo e($payment->payment_type); ?>"
                                                                                value="<?php echo e($payment->payment_type); ?>">
                                                                            <label class="form-check-label fw-bolder"
                                                                                for="<?php echo e($payment->payment_type); ?>">
                                                                                <?php echo e($payment->payment_name); ?>

                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.safe_secure_checkout_text')); ?>

                                                        </label>
                                                        <input type="text" class="form-control"
                                                            name="safe_secure_checkout_text"
                                                            value="<?php echo e(@$othersettingdata->safe_secure_checkout_text); ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label
                                                            class="form-label"><?php echo e(trans('labels.safe_secure_checkout_text_color')); ?>

                                                        </label>
                                                        <input type="color"
                                                            class="form-control form-control-color w-100 border-0"
                                                            name="safe_secure_checkout_text_color"
                                                            value="<?php echo e(@$othersettingdata->safe_secure_checkout_text_color); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                                    <button
                                                        <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="safe_secure" value="1" <?php endif; ?>
                                                        class="btn btn-primary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"><?php echo e(trans('labels.save')); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'email_settings')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'email_settings')->first()->activated == 1): ?>
                    <?php echo $__env->make('admin.emailsettings.email_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.email_template.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                            <?php
                                if ($user->allow_without_subscription == 1) {
                                    $whatsapp_message = 1;
                                } else {
                                    $whatsapp_message = @helper::get_plan($vendor_id)->whatsapp_message;
                                }
                            ?>
                            <?php if($whatsapp_message == 1): ?>
                                <?php echo $__env->make('admin.included.whatsapp_message.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                            <?php echo $__env->make('admin.included.whatsapp_message.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                            <?php
                                if ($user->allow_without_subscription == 1) {
                                    $telegram_message = 1;
                                } else {
                                    $telegram_message = @helper::get_plan($vendor_id)->telegram_message;
                                }
                            ?>
                            <?php if($telegram_message == 1): ?>
                                <?php echo $__env->make('admin.telegram_message.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'telegram_message')->first()->activated == 1): ?>
                            <?php echo $__env->make('admin.telegram_message.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                            <?php
                                $checkplan = App\Models\Transaction::where('vendor_id', $vendor_id)
                                    ->orderByDesc('id')
                                    ->first();

                                if ($user->allow_without_subscription == 1) {
                                    $pwa = 1;
                                } else {
                                    $pwa = @$checkplan->pwa;
                                }
                            ?>
                            <?php if($pwa == 1): ?>
                                <?php echo $__env->make('admin.pwa.pwa_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                            <?php echo $__env->make('admin.pwa.pwa_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.pixel.pixel_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first()->activated == 1): ?>
                            <?php echo $__env->make('admin.loyalty_program.loyalty_program_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'loyalty_program')->first()->activated == 1): ?>
                            <?php echo $__env->make('admin.loyalty_program.loyalty_program_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(Auth::user()->type == 1): ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'custom_domain')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.customdomain.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'google_recaptcha')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'google_recaptcha')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.google_recaptcha.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'tawk')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'tawk')->first()->activated == 1): ?>
                    <?php echo $__env->make('admin.tawk.setting_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first()->activated == 1): ?>
                    <?php echo $__env->make('admin.wizz_chat_settings.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first()->activated == 1): ?>
                    <?php echo $__env->make('admin.quick_call.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.fake_sales_notification.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'fake_view')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.product_fake_view.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.age_verification.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.review.review_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'user_app')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'user_app')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.mobile_app.app_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_countdown')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.cart_checkout_countdown.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'cart_checkout_progressbar')->first()->activated == 1): ?>
                        <?php echo $__env->make('admin.cart_checkout_progressbar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <div id="social_links" class="hidechild">
                    <div class="col-12">
                        <div class="card border-0 box-shadow">
                            <div
                                class="card-header rounded-top-4 bg-secondary py-3 d-flex align-items-center justify-content-between text-white">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-link fs-5"></i>
                                    <h5 class="text-capitalize px-2"><?php echo e(trans('labels.social_links')); ?> <span
                                            class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Ex. <i class='fa-solid fa-truck-fast'></i> Visit https://fontawesome.com/ for more info">
                                        </span>
                                    </h5>
                                </div>
                                <button class="btn btn-dark btn-sm rounded-circle hov" type="button"
                                    tooltip="<?php echo e(trans('labels.add')); ?>"
                                    onclick="add_social_links('<?php echo e(trans('labels.icon')); ?>','<?php echo e(trans('labels.link')); ?>')">
                                    <i class="fa-sharp fa-solid fa-plus"></i> </button>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(URL::to('admin/social_links/update')); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">

                                        <?php $__currentLoopData = $getsociallinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-12">
                                                <div class="row">
                                                    <input type="hidden" name="edit_icon_key[]"
                                                        value="<?php echo e($links->id); ?>">
                                                    <div class="col-md-6 form-group">
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control soaciallink_required  <?php echo e(session()->get('direction') == 2 ? 'input-group-rtl' : ''); ?>"
                                                                onkeyup="show_feature_icon(this)"
                                                                name="edi_sociallink_icon[<?php echo e($links->id); ?>]"
                                                                placeholder="<?php echo e(trans('labels.icon')); ?>"
                                                                value="<?php echo e($links->icon); ?>" required>
                                                            <p
                                                                class="input-group-text <?php echo e(session()->get('direction') == 2 ? 'input-group-icon-rtl' : ''); ?>">
                                                                <?php echo $links->icon; ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex gap-2 align-items-center form-group">
                                                        <input type="text" class="form-control"
                                                            name="edi_sociallink_link[<?php echo e($links->id); ?>]"
                                                            placeholder="<?php echo e(trans('labels.link')); ?>"
                                                            value="<?php echo e($links->link); ?>" required>
                                                        <button class="btn btn-danger hov btn-sm rounded-5"
                                                            type="button" tooltip="<?php echo e(trans('labels.delete')); ?>"
                                                            onclick="statusupdate('<?php echo e(URL::to('admin/settings/delete-sociallinks-' . $links->id)); ?>')">
                                                            <i class="fa fa-trash"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <span class="extra_social_links"></span>
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, Auth::user()->vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="other" class="hidechild">
                    <div class="col-12">
                        <div class="card overflow-hidden border-0 box-shadow">
                            <div class="card-header bg-secondary py-3 d-flex align-items-center text-white">
                                <i class="fa-solid fa-gears fs-5"></i>
                                <h5 class="px-2"><?php echo e(trans('labels.other')); ?></h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo e(URL::to('admin/settings/otherdata/update')); ?>"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.google_review')); ?></label>
                                                <input type="text" class="form-control"
                                                    placeholder="<?php echo e(trans('labels.google_review')); ?>"
                                                    name="google_review" value="<?php echo e($settingdata->google_review); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->type == 1): ?>
                                            <div class="form-group col-sm-6">
                                                <label
                                                    class="form-label"><?php echo e(trans('labels.landing_home_banner')); ?></label>
                                                <input type="file" class="form-control" name="landing_home_banner">
                                                <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_Path($settingdata->landing_home_banner)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label
                                                    class="form-label"><?php echo e(trans('labels.maintenance_image')); ?></label>
                                                <input type="file" class="form-control" name="maintenance_image">
                                                <img class="img-fluid rounded hw-70 mt-2 object-fit-cover"
                                                    src="<?php echo e(helper::image_path(@$settingdata->maintenance_image)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label
                                                    class="form-label"><?php echo e(trans('labels.store_unavailable_image')); ?></label>
                                                <input type="file" class="form-control"
                                                    name="store_unavailable_image">
                                                <img class="img-fluid rounded hw-70 mt-2 object-fit-cover"
                                                    src="<?php echo e(helper::image_path(@$settingdata->store_unavailable_image)); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">
                                                <?php if(Auth::user()->type == 1): ?>
                                                    <?php echo e(trans('labels.admin_auth_page_image')); ?>

                                                <?php elseif(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                                    <?php echo e(trans('labels.web_auth_page_image')); ?>

                                                <?php endif; ?>
                                            </label>
                                            <input type="file" class="form-control" name="auth_page_image">
                                            <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                src="<?php echo e(helper::image_Path($settingdata->auth_page_image)); ?>"
                                                alt="">
                                        </div>
                                        <?php if(Auth::user()->type == 2 || Auth::user()->type == 4): ?>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.banner')); ?></label>
                                                <input type="file" class="form-control" name="banner">
                                                <img class="img-fluid rounded-3 hw-70 my-2 object-fit-cover"
                                                    src="<?php echo e(helper::image_path(@$settingdata->banner)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.landing_page_cover_image')); ?>

                                                </label>
                                                <input type="file" class="form-control"
                                                    name="landin_page_cover_image">
                                                <img class="img-fluid rounded-3 hw-70 my-2 object-fit-cover"
                                                    src="<?php echo e(helper::image_path($settingdata->cover_image)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.subscribe_background')); ?>

                                                </label>
                                                <input type="file" class="form-control"
                                                    name="subscribe_background">
                                                <img class="img-fluid rounded-3 hw-70 my-2"
                                                    src="<?php echo e(helper::image_path($settingdata->subscribe_background)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.faq_image')); ?></label>
                                                <input type="file" class="form-control" name="faq_image">
                                                <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_Path($settingdata->faq_image)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.book_table_image')); ?></label>
                                                <input type="file" class="form-control" name="book_table_image">
                                                <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_Path($settingdata->book_table_image)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label
                                                    class="form-label"><?php echo e(trans('labels.order_success_image')); ?></label>
                                                <input type="file" class="form-control" name="order_success_image">
                                                <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_Path($settingdata->order_success_image)); ?>"
                                                    alt="">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-label"><?php echo e(trans('labels.no_data_image')); ?></label>
                                                <input type="file" class="form-control" name="no_data_image">
                                                <img class="img-fluid rounded-3 hw-70 object-fit-cover my-2"
                                                    src="<?php echo e(helper::image_Path($settingdata->no_data_image)); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                                            <button
                                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5 <?php echo e(Auth::user()->type == 4 ? (helper::check_access('role_settings', Auth::user()->role_id, $vendor_id, 'edit') == 1 ? '' : 'd-none') : ''); ?>"
                                                <?php if(env('Environment') == 'sendbox'): ?> type="button" onclick="myFunction()" <?php else: ?> type="submit" name="updateprofile" value="1" <?php endif; ?>><?php echo e(trans('labels.save')); ?></button>
                                        </div>
                                    </div>
                                </form>
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
        var layout = "<?php echo e(session()->get('direction')); ?>";
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('labels.select')); ?>";
        var areaid = "<?php echo e(Auth::user()->area_id != null ? Auth::user()->area_id : '0'); ?>";
        $(document).ready(function() {
            $('#recaptcha_version').on('change', function() {
                var recaptcha_version = $(this).val();
                if (recaptcha_version == 'v3') {
                    $("#score_threshold").show();
                } else {
                    $("#score_threshold").hide();
                }
            });
        });
        $('#review_approved_status-switch').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).val(1);
                document.querySelector('#checkbox5').disabled = false;
                document.querySelector('#checkbox4').disabled = false;
                document.querySelector('#checkbox3').disabled = false;
                document.querySelector('#checkbox2').disabled = false;
                document.querySelector('#checkbox1').disabled = false;
                document.querySelector('#review_setting_update_btn').disabled = false;
            } else {
                $(this).val(2);
                document.querySelector('#checkbox5').disabled = true;
                document.querySelector('#checkbox4').disabled = true;
                document.querySelector('#checkbox3').disabled = true;
                document.querySelector('#checkbox2').disabled = true;
                document.querySelector('#checkbox1').disabled = true;
            }
        });
    </script>
    <script src="<?php echo e(url('storage/app/public/admin-assets/js/user.js')); ?>"></script>
    <?php if($vendor_id == 1): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('cname_text');
        </script>
    <?php endif; ?>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/js/settings.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/admin/otherpages/settings.blade.php ENDPATH**/ ?>
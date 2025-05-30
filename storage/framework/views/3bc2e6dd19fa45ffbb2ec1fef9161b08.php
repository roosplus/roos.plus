<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo e(@helper::appdata($vdata)->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(@helper::appdata($vdata)->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(@helper::image_path(helper::appdata($vdata)->og_image)); ?>' />
    
    <title><?php echo e(@helper::appdata($vdata)->website_title); ?></title>
    <link rel="icon" href="<?php echo e(@helper::image_path(@helper::appdata(@$vdata)->favicon)); ?>" type="image"
        sizes="16x16">
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/css/fontawesome/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <!--Aos animetion  -->
    <link href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/unpkg.com_aos@2.3.1_dist_aos.css')); ?>" rel="stylesheet">
    <!-- swiper Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/swiper-bundle.min.css')); ?>">
    <!-- Font-Family -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/font/outfit.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/font-awesome/css/all.min.css')); ?>">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/toastr/toastr.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/dataTables.bootstrap4.min.css')); ?>">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/owl.carousel.min.css')); ?>">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/owl.theme.default.css')); ?>">
    <!-- Bootstrap Min Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/bootstrap.min.css')); ?>">
    <!-- Style Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/style.css')); ?>">
    <!-- Responsive Css -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/responsive.css')); ?>">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/css/sweetalert/sweetalert2.min.css')); ?>">
    <?php echo $__env->yieldContent('recaptcha_script'); ?>
    <!-- PWA  -->

    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
            <?php
                $checkplan = App\Models\Transaction::where('vendor_id', $vdata)->orderByDesc('id')->first();
                $user = App\Models\User::where('id', $vdata)->first();
                if ($user->allow_without_subscription == 1) {
                    $pwa = 1;
                } else {
                    $pwa = @$checkplan->pwa;
                }
            ?>
            <?php if($pwa == 1): ?>
                <?php if(helper::appdata($vdata)->pwa == 1): ?>
                    <?php echo $__env->make('front.pwa.pwa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
                <?php if(helper::appdata($vdata)->pwa == 1): ?>
                    <?php echo $__env->make('front.pwa.pwa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <style>
        :root {
            --bs-primary: #ce6a19;
            --bs-secondary: #5a0bee;

            <?php if(helper::appdata($vdata)->primary_color != null): ?>
                --bs-primary: <?php echo e(helper::appdata($vdata)->primary_color); ?>;
            <?php endif; ?>
            <?php if(helper::appdata($vdata)->secondary_color != null): ?>
                --bs-secondary: <?php echo e(helper::appdata($vdata)->secondary_color); ?>;
            <?php endif; ?>
            --secondary-color: #000;
        }
    </style>
</head>

<body>
    <main>
        <?php
            $baseurl = url('/') . '/' . $storeinfo->slug;
            $basecaturl = url('/') . '/' . $storeinfo->slug . '/categories';
        ?>

        <?php if(helper::appdata(@$vdata)->template != 3 &&
                helper::appdata(@$vdata)->template != 5 &&
                helper::appdata(@$vdata)->template != 14): ?>
            <?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php if($baseurl != request()->url() && $basecaturl != request()->url()): ?>
                <?php echo $__env->make('front.theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first()->activated == 1): ?>
            <?php if(@helper::getagedetails($vdata)->age_verification_on_off == 1): ?>
                <?php
                    $class = 'blurred';
                ?>
            <?php else: ?>
                <?php
                    $class = '';
                ?>
            <?php endif; ?>
        <?php else: ?>
            <?php
                $class = '';
            ?>
        <?php endif; ?>
        <div class="<?php echo e($class); ?>" id="main-content">
            <?php echo $__env->yieldContent('content'); ?>

            <?php if(helper::appdata(@$vdata)->template != 3 &&
                    helper::appdata(@$vdata)->template != 5 &&
                    helper::appdata(@$vdata)->template != 14): ?>
                <?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php if($baseurl != request()->url() && $basecaturl != request()->url()): ?>
                    <?php echo $__env->make('front.theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first()->activated == 1): ?>
                <?php echo $__env->make('front.sales_notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'cookie_consent')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'cookie_consent')->first()->activated == 1): ?>
                <?php echo $__env->make('cookie-consent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                    <?php
                        $checkplan = App\Models\Transaction::where('vendor_id', $vdata)->orderByDesc('id')->first();
                        $user = App\Models\User::where('id', $vdata)->first();
                        if (@$user->allow_without_subscription == 1) {
                            $whatsapp_message = 1;
                        } else {
                            $whatsapp_message = @$checkplan->whatsapp_message;
                        }

                    ?>
                    <?php if($whatsapp_message == 1 && helper::appdata($vdata)->whatsapp_chat_on_off == 1): ?>
                        <input type="checkbox" id="check" class="d-none">
                        <label
                            class="chat-btn <?php echo e(helper::appdata($vdata)->whatsapp_chat_position == 1 ? 'chat-btn_rtl' : 'chat-btn_ltr'); ?>"
                            for="check">
                            <i class="fa-brands fa-whatsapp comment"></i>
                            <i class="fa fa-close close"></i>
                        </label>
                        <div
                            class="<?php echo e(helper::appdata($vdata)->whatsapp_chat_position == 1 ? 'wrapper_rtl' : 'wrapper'); ?> wp_chat_box shadow">
                            <div class="msg_header">
                                <h6><?php echo e(helper::appdata(@$vdata)->website_title); ?></h6>
                            </div>
                            <div class="text-start p-3 bg-msg">
                                <div class="card p-2 msg">
                                    <?php echo e(trans('labels.whatsapp_modal_description')); ?>

                                </div>
                            </div>
                            <div class="chat-form">
                                <form action="https://api.whatsapp.com/send" method="get" target="_blank"
                                    class="d-flex align-items-center d-grid gap-2">
                                    <textarea class="form-control" name="text" placeholder="Your Text Message" required></textarea>
                                    <input type="hidden" name="phone"
                                        value="<?php echo e(helper::appdata(@$vdata)->contact); ?>">
                                    <button type="submit" class="btn btn-success btn-block hover-1">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if(App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'whatsapp_message')->first()->activated == 1): ?>
                    <?php if(helper::appdata($vdata)->whatsapp_chat_on_off == 1): ?>
                        <input type="checkbox" id="check">
                        <label
                            class="chat-btn <?php echo e(helper::appdata($vdata)->whatsapp_chat_position == 1 ? 'chat-btn_rtl' : 'chat-btn_ltr'); ?>"
                            for="check">
                            <i class="fa-brands fa-whatsapp comment"></i>
                            <i class="fa fa-close close"></i>
                        </label>
                        <div
                            class="<?php echo e(helper::appdata($vdata)->whatsapp_chat_position == 1 ? 'wrapper_rtl' : 'wrapper'); ?> wp_chat_box shadow">
                            <div class="msg_header">
                                <h6><?php echo e(helper::appdata(@$vdata)->website_title); ?></h6>
                            </div>
                            <div class="text-start p-3 bg-msg">
                                <div class="card p-2 msg">
                                    <?php echo e(trans('labels.whatsapp_modal_description')); ?>

                                </div>
                            </div>
                            <div class="chat-form">
                                <form action="https://api.whatsapp.com/send" method="get" target="_blank"
                                    class="d-flex align-items-center d-grid gap-2">
                                    <textarea class="form-control" name="text" placeholder="Your Text Message" required></textarea>
                                    <input type="hidden" name="phone"
                                        value="<?php echo e(helper::appdata(@$vdata)->contact); ?>">
                                    <button type="submit" class="btn btn-success btn-block hover-1">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Quick call -->
            <?php if(App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first() != null &&
                    App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first()->activated == 1): ?>
                <?php if(helper::appdata($vdata)->quick_call == 1): ?>
                    <?php echo $__env->make('front.quick_call', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'age_verification')->first()->activated == 1): ?>
        <?php if(@helper::getagedetails($vdata)->age_verification_on_off == 1): ?>
            <?php echo $__env->make('front.theme.age_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Customisation modal Start -->
    <div class="modal" id="customisation" tabindex="-1" aria-labelledby="customisationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded">
                <div class="modal-header gap-2 justify-content-between p-3">
                    <p class="title" id="cart_item_name"></p>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-12px">
                        <div id="item-variations" class="mt-2">

                        </div>
                        <!-- Extras -->
                        <div id="item-extras" class="mt-3">
                            <h5 class="fw-normal m-0 d-none" id="extras_title"><?php echo e(trans('labels.extras')); ?> </h5>
                            <ul class="m-0 ps-2">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribe Modal -->

    <div class="modal subscription-popup" id="subscribe_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-lights">
                <div class="modal-body p-md-0">
                    <div class="card rounded-4 border-0 bg-lights p-md-3">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-4 d-none d-lg-block">
                                <img src="<?php echo e(helper::image_path(helper::appdata($storeinfo->id)->subscribe_background)); ?>"
                                    alt="" class="w-100 object-fit-cover rounded-4">
                            </div>
                            <div class="col-12 col-lg-8">
                                <h4 class="fs-2 mb-2 fw-600"><?php echo e(trans('labels.subscribe_title')); ?></h4>
                                <p class="text-muted pb-3"><?php echo e(trans('labels.subscribe_description')); ?></p>
                                <form action="<?php echo e(URL::to($storeinfo->slug . '/subscribe')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($storeinfo->id); ?>">
                                    <div class="bg-body rounded p-2 shadow-lg mb-3 mb-md-0">
                                        <div class="input-group">
                                            <input class="form-control border-0 me-1" type="email" name="email"
                                                placeholder="<?php echo e(trans('labels.enter_email')); ?>" required>
                                            <button type="submit"
                                                class="btn btn-primary fs-15 fw-500 mb-0 btn-submit px-sm-4 px-3 py-2 rounded d-none d-md-inline-block"><?php echo e(trans('labels.subscribe')); ?>!</button>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn w-100 btn-primary fs-15 fw-500 mb-0 btn-submit rounded px-sm-4 px-3 py-2 d-inline-block d-md-none"><?php echo e(trans('labels.subscribe')); ?>!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="addreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between align-items-center">
                    <h1 class="modal-title fs-5" id="product_name"></h1>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="<?php echo e(URL::to('add-review')); ?>" method="post" id="product_ratting">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <h5 class="fw-600 mb-2 text-center"><?php echo e(trans('labels.product_reviews_note_1')); ?></h5>
                        <p class="m-0 mb-2 fs-7 text-muted text-center"><?php echo e(trans('labels.product_reviews_note_2')); ?>

                        </p>
                        <div class="info col-12 d-flex flex-column justify-content-center">
                            <div class="emoji fs-1 m-0 text-center"></div>
                            <div class="status fw-500 fs-6 mt-2 text-center"></div>
                        </div>
                        <input type="hidden" name="item_id" id="item_id">
                        <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e(@$vdata); ?>">
                        <div class="stars mt-2 text-center <?php echo e(session()->get('direction') == 2 ? 'rtl' : ''); ?>">
                            <input type="radio" name="star" value="5" id="star5">
                            <label for="star5" class="star" data-rate="5">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" name="star" value="4" id="star4">
                            <label for="star4" class="star" data-rate="4">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" name="star" value="3" id="star3">
                            <label for="star3" class="star" data-rate="3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" name="star" value="2" id="star2">
                            <label for="star2" class="star" data-rate="2">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" name="star" value="1" id="star1">
                            <label for="star1" class="star" data-rate="1">
                                <i class="fa-solid fa-star"></i>
                            </label>
                        </div>
                        <div class="col-12 mt-3">
                            <textarea class="form-control fs-7 bg-light" placeholder="Write comment here..." name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer py-3">
                        <div class="col-12 m-0 w-100">
                            <div class="row m-0 g-2">
                                <div class="col-6 m-0">
                                    <button type="button" class="btn btn-secondary fs-15 fw-500 py-3 w-100"
                                        data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                                </div>
                                <div class="col-6 m-0">
                                    <button type="submit"
                                        class="btn btn-primary fs-15 fw-500 py-3 w-100"><?php echo e(trans('labels.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="d-flex align-items-center float-end">
        <div class="modal" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-4">
                    <div class="modal-header justify-content-between align-items-center p-3">
                        <h3 class="page-title mb-0 text-dark fw-bolder"><?php echo e(trans('labels.search')); ?></h3>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form class="" action="<?php echo e(URL::to($storeinfo->slug . '/search/')); ?>" method="get">
                        <div class="modal-body mb-0">
                            <div class="col-12">
                                <div class="row align-items-center justify-content-between g-0">
                                    <span><?php echo e(trans('labels.search_desc')); ?></span>
                                    <div class="col-12">
                                        <input type="hidden" name="vendor_id" value="<?php echo e($vdata); ?>">
                                        <input type="text" placeholder="<?php echo e(trans('labels.search_here')); ?>"
                                            name="search" id="searchText"
                                            class="py-2 input-width rounded-2 px-2 mt-3 mb-1 w-100 border fs-7 search_input"
                                            value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <div class="w-100 search-btn-group">
                                <div class="row g-3 justify-content-between align-items-center">
                                    <div class="col-6 m-sm-0">
                                        <a type="submit"
                                            class="btn btn-danger w-100 rounded px-sm-4 px-3 py-3 fw-500 fs-15 text-center"
                                            data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?> </a>
                                    </div>
                                    <div class="col-6 m-sm-0">
                                        <input type="submit"
                                            class="btn-primary btn w-100 rounded px-sm-4 px-3 py-3 fw-500 fs-15 text-center"
                                            value="<?php echo e(trans('labels.submit')); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hours Modal Start -->
    <div class="modal" id="examplehours" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content rounded-4">
                <div class="modal-header justify-content-between p-3">
                    <p class="title fs-5"> <?php echo e(trans('labels.working_hours')); ?></p>
                    <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="m-0">
                        <?php if(is_array(@helper::timings($vdata)) || is_object(@helper::timings($vdata))): ?>
                            <?php $__currentLoopData = @helper::timings($vdata); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($time->is_always_close != 1): ?>
                                    <li class="working-hours-main pb-3">
                                        <p>
                                            <i class="fa-regular fa-calendar-days hours-to"></i>
                                            <span class="px-2 fw-600">
                                                <?php echo e(trans('labels.' . strtolower($time->day))); ?></span>
                                        </p>
                                        <div class="hours-list">
                                            <button type="button"
                                                class="btn btn-outline-dark text-dark hours-to fs-7"><?php echo e($time->open_time); ?></button>
                                            <p class="to"><?php echo e(trans('labels.to')); ?></p>
                                            <button type="button"
                                                class="btn btn-outline-dark text-dark hours-to fs-7"><?php echo e($time->close_time); ?></button>
                                        </div>
                                    </li>
                                <?php else: ?>
                                    <li class="d-flex align-items-center justify-content-end pb-3">
                                        <p class="sunday">
                                            <i class="fa-regular fa-calendar-days hours-to"></i>
                                            <span
                                                class="px-2 fw-600 text-danger sunday"><?php echo e(trans('labels.' . strtolower($time->day))); ?>

                                            </span>
                                        </p>
                                        <div class="hours-list justify-content-center m-auto">
                                            <button type="button"
                                                class="btn border text-dark bg-danger text-white fs-7"
                                                data-bs-dismiss="modal"><?php echo e(trans('labels.closed')); ?></button>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Hours Modal end -->

    <div class="modal" id="additems" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div id="viewproduct_body"></div>
        </div>
    </div>

    <!-- Useroption Modal Start -->
    <div class="modal" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header justify-content-between p-3">
                    <h5 class="modal-title mb-0"><?php echo e(trans('labels.proceed_as_guest_or_login')); ?></h5>
                    <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <small><?php echo e(trans('labels.dont_have_account_guest')); ?></small>
                </div>
                <div class="modal-footer d-block p-3 pt-2">
                    <div class="row justify-content-between align-items-center g-2">
                        <div class="col-md-6 md-mt-0">
                            <a class="btn-outline-dark px-sm-4 px-3 py-2 btn w-100 text-center my-cart-account-btn"
                                href="<?php echo e(URL::to(@$storeinfo->slug . '/login')); ?>"><?php echo e(trans('labels.login_with_your_account')); ?></a>
                        </div>
                        <div class="col-md-6 md-mt-0">
                            <a class="btn-primary btn px-sm-4 px-3 py-2 rounded-2 w-100 text-center"
                                href="<?php echo e(URL::to(@$storeinfo->slug . '/checkout?buy_now=0')); ?>"><?php echo e(trans('labels.continue_as_guest')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Useroption Modal end -->

    <!-- Bankdetails Modal Start -->
    <div class="modal" id="modalbankdetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalbankdetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="modalbankdetailsLabel"><?php echo e(trans('labels.banktransfer')); ?></h5>
                    <button type="button" class="btn-close bg-white m-0 p-0 border-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form enctype="multipart/form-data" action="<?php echo e(URL::to('/orders/paymentmethod')); ?>" method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="payment_type" id="payment_type" class="form-control"
                            value="">
                        <input type="hidden" name="modal_customer_name" id="modal_customer_name"
                            class="form-control" value="">
                        <input type="hidden" name="modal_customer_email" id="modal_customer_email"
                            class="form-control" value="">
                        <input type="hidden" name="modal_customer_mobile" id="modal_customer_mobile"
                            class="form-control" value="">
                        <input type="hidden" name="modal_delivery_date" id="modal_delivery_date"
                            class="form-control" value="">
                        <input type="hidden" name="modal_delivery_time" id="modal_delivery_time"
                            class="form-control" value="">
                        <input type="hidden" name="modal_delivery_area" id="modal_delivery_area"
                            class="form-control" value="">
                        <input type="hidden" name="modal_delivery_charge" id="modal_delivery_charge"
                            class="form-control" value="">
                        <input type="hidden" name="modal_address" id="modal_address" class="form-control"
                            value="">
                        <input type="hidden" name="modal_landmark" id="modal_landmark" class="form-control"
                            value="">
                        <input type="hidden" name="modal_postal_code" id="modal_postal_code" class="form-control"
                            value="">
                        <input type="hidden" name="modal_building" id="modal_building" class="form-control"
                            value="">
                        <input type="hidden" name="modal_message" id="modal_message" class="form-control"
                            value="">
                        <input type="hidden" name="modal_subtotal" id="modal_subtotal" class="form-control"
                            value="">
                        <input type="hidden" name="modal_discount_amount" id="modal_discount_amount"
                            class="form-control" value="">
                        <input type="hidden" name="modal_couponcode" id="modal_couponcode" class="form-control"
                            value="">
                        <input type="hidden" name="modal_ordertype" id="modal_ordertype" class="form-control"
                            value="">
                        <input type="hidden" name="modal_vendor_id" id="modal_vendor_id" class="form-control"
                            value="">
                        <input type="hidden" name="modal_slug" id="modal_slug" class="form-control"
                            value="">
                        <input type="hidden" name="modal_grand_total" id="modal_grand_total" class="form-control"
                            value="">
                        <input type="hidden" name="modal_tax" id="modal_tax" class="form-control" value="">
                        <input type="hidden" name="modal_tax_name" id="modal_tax_name" class="form-control"
                            value="">
                        <input type="hidden" name="modal_order_type" id="modal_order_type" class="form-control"
                            value="">
                        <input type="hidden" name="modal_table" id="modal_table" class="form-control"
                            value="">
                        <input type="hidden" name="modal_offer_type" id="modal_offer_type" class="form-control"
                            value="">
                        <input type="hidden" name="modal_buynow" id="modal_buynow" class="form-control"
                            value="">
                        <p><?php echo e(trans('labels.payment_description')); ?></p>
                        <hr>
                        <p class="payment_description" id="payment_description"></p>
                        <hr>
                        <div class="form-group col-md-12">
                            <label for="screenshot" class="form-label"> <?php echo e(trans('labels.screenshot')); ?> </label>
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
                    <div class="modal-footer pt-0 p-3">
                        <div class="row w-100 justify-content-between align-items-center g-2 pt-2">
                            <div class="col-md-6 md-mt-0">
                                <button class="btn-danger btn w-100 fw-500 fs-15 py-3 text-center"
                                    data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                            </div>
                            <div class="col-md-6 md-mt-0">
                                <button type="submit"
                                    class="btn-primary btn rounded-2 w-100 fw-500 fs-15 py-3 text-center"><?php echo e(trans('labels.save')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bankdetails Modal end -->
    <div class="col-md-6 d-flex justify-content-center m-auto">
        <div class="offcanvas offcanvas-bottom categories_theme6_offcanvas" tabindex="-1" id="offcanvasBottom"
            aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header justify-content-between border-bottom">
                <h5 class="offcanvas-title" id="offcanvascategori">
                    <?php echo e(trans('labels.categories')); ?>

                </h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <!-- ----- modal start ---- -->
            <div class="offcanvas-body small overflow-auto ">
                <div class="tab-row" id="menu-center">
                    <ul
                        class="swiper-wrapper navgation_lower pb-1 d-block theme-7-category-card pb-1 mb-0 category-card">
                        <?php if(is_array(@$getcategory) || is_object(@$getcategory)): ?>
                            <?php $__currentLoopData = @$getcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $check_cat_count = 0;
                                ?>
                                <?php $__currentLoopData = $getitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($category->id == $item->cat_id): ?>
                                        <?php
                                            $check_cat_count++;
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($check_cat_count > 0): ?>
                                    <li class="<?php echo e($key == 0 ? 'active1' : ''); ?> d-flex py-2 swiper-slide w-100 justify-content-between border-bottom-1"
                                        data-bs-dismiss="offcanvas" id="specs-<?php echo e($category->id); ?>">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e(helper::image_path($category->image)); ?>" alt="">
                                            <p class="act-7 fw-500 px-2 text-start line-limit-1 fs-7">
                                                <?php echo e($category->name); ?></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="m-0"><?php echo e($check_cat_count); ?></span>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <div class="" id="viewreviewsbody"></div>

    <script>
        const stars = document.querySelectorAll(".star");
        const emojiEl = document.querySelector(".emoji");
        const statusEl = document.querySelector(".status");
        const defaultRatingIndex = 0;
        let currentRatingIndex = 0;

        const ratings = [{
                emoji: "✨",
                name: "Rating"
            },
            {
                emoji: "😔",
                name: "Very Bad",
                color: "#ff0000"
            },
            {
                emoji: "🙁",
                name: "Bad",
                color: "#ff4d00"
            },
            {
                emoji: "🙂",
                name: "Good",
                color: "#edcc12"
            },
            {
                emoji: "🤩",
                name: "Very Good",
                color: "rgb(81 141 14)"
            },
            {
                emoji: "🥰",
                name: "Excellent",
                color: "green"
            }
        ];

        const setRating = (index) => {
            stars.forEach((star) => star.classList.remove("selected"));
            if (index > 0 && index <= stars.length) {
                document.querySelector('[data-rate="' + index + '"]').classList.add("selected");
            }
            emojiEl.innerHTML = ratings[index].emoji;
            statusEl.innerHTML = ratings[index].name;
            statusEl.style.color = ratings[index].color;
        };

        stars.forEach((star) => {
            star.addEventListener("click", function() {
                const index = parseInt(star.getAttribute("data-rate"));
                currentRatingIndex = index;
                setRating(index);
            });

            star.addEventListener("mouseover", function() {
                const index = parseInt(star.getAttribute("data-rate"));
                setRating(index);
            });

            star.addEventListener("mouseout", function() {
                setRating(currentRatingIndex);
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            setRating(defaultRatingIndex);
        });
    </script>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'sales_notification')->first()->activated == 1): ?>
        <?php if(helper::appdata($vdata)->fake_sales_notification == 1): ?>
            <script>
                // Select the element with the ID 'sales-booster-popup'
                const popup = document.getElementById('sales-booster-popup');

                if (popup) {
                    let intervalId; // To hold the interval ID
                    let isMouseOver = false; // Track whether the mouse is over the popup

                    // Define a function to add and remove the 'loaded' class
                    const toggleLoadedClass = () => {
                        popup.classList.add('loaded');
                        // Remove the 'loaded' class after the specified time, unless the mouse is over the popup
                        setTimeout(() => {
                                if (!isMouseOver) {
                                    popup.classList.remove('loaded');
                                }
                            },
                            "<?php echo e(helper::appdata($vdata)->notification_display_time); ?>"
                        );
                    };

                    // Function to handle mouseover event
                    const handleMouseOver = () => {
                        isMouseOver = true;
                        // Clear the interval while the mouse is over the popup
                        clearInterval(intervalId);
                    };

                    // Function to handle mouseout event
                    const handleMouseOut = () => {
                        isMouseOver = false;
                        // Restart the interval when the mouse leaves the popup
                        startPopupInterval();
                    };

                    // Function to start the interval for fetching notification data
                    const startPopupInterval = () => {
                        intervalId = setInterval(() => {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "<?php echo e(URL::to('get_notification_data')); ?>",
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        vendor_id: "<?php echo e($vdata); ?>",
                                    },
                                    success: function(response) {
                                        toggleLoadedClass();
                                        $('#sales-booster-popup').show();
                                        $('#notification_body').html(response.output);
                                    },
                                });
                            },
                            "<?php echo e(helper::appdata($vdata)->notification_display_time + helper::appdata($vdata)->next_time_popup); ?>"
                        );
                    };

                    // Call the function initially
                    toggleLoadedClass();

                    // Start the interval initially
                    startPopupInterval();

                    // Add mouseover and mouseout event listeners to the popup
                    popup.addEventListener('mouseover', handleMouseOver);
                    popup.addEventListener('mouseout', handleMouseOut);

                    // Select the close button within the popup
                    const closeButton = popup.querySelector('.close'); // Close button selector

                    if (closeButton) {
                        // Add an event listener to the close button
                        closeButton.addEventListener('click', () => {
                            // Remove the 'loaded' class immediately
                            popup.classList.remove('loaded');
                            // Clear the interval when popup is closed
                            clearInterval(intervalId);
                        });
                    }
                }
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <input type="hidden" id="addtocarturl" value="<?php echo e(url('/add-to-cart')); ?>" />
    <input type="hidden" id="showitemurl" value="<?php echo e(url('/product-details')); ?>" />
    <input type="hidden" id="showreviewsurl" value="<?php echo e(url('/product-reviews')); ?>" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(helper::appdata(1)->tracking_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo e(helper::appdata(1)->tracking_id); ?>');
    </script>
    <!--Start of Tawk.to Script-->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'tawk')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'tawk')->first()->activated == 1): ?>
        <?php if(helper::appdata(@$vdata)->tawk_on_off == 1): ?>
            <?php echo helper::appdata(@$vdata)->tawk_widget_id; ?>

        <?php endif; ?>
    <?php endif; ?>
    <!--End of Tawk.to Script-->
    <!-- Wizz Chat -->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first()->activated == 1): ?>
        <?php if(helper::appdata($vdata)->wizz_chat_on_off == 1): ?>
            <?php echo helper::appdata($vdata)->wizz_chat_settings; ?>

        <?php endif; ?>
    <?php endif; ?>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/jquery-3.6.3.min.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/product.js')); ?>"></script>
    <script src="<?php echo e(url('resources/js/age.js')); ?>"></script>
    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js')); ?>" type="text/javascript"></script>

    <!-- Bootstrap Bundle Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Owl Carousel Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/toastr/toastr.min.js')); ?>"></script><!-- Toastr JS -->

    <!-- Jquery DataTables Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/jquery.dataTables.min.js')); ?>"></script>

    <!-- DataTables Bootstrap4 Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Sweetalert2@11 Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/sweetalert2@11.js')); ?>"></script>

    <!-- Aos Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/unpkg.com_aos@2.3.1_dist_aos.js')); ?>"></script>

    <!-- Swiper Bundle Min Js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/cdn.jsdelivr.net_npm_swiper@9_swiper-bundle.min.js')); ?>">
    </script>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'web-assets/js/jquery.number.min.js')); ?>"></script>
    <script>
        var are_you_sure = "<?php echo e(trans('messages.are_you_sure')); ?>";
        var yes = "<?php echo e(trans('messages.yes')); ?>";
        var no = "<?php echo e(trans('messages.no')); ?>";
        var cancel = "<?php echo e(trans('labels.cancel')); ?>";
        let wrong = "<?php echo e(trans('messages.wrong')); ?>";
        let env = "<?php echo e(env('Environment')); ?>";
        let whatsappnumber = "<?php echo e(@helper::appdata(@$vdata)->contact); ?>";
        let direction = "<?php echo e(session('direction')); ?>";
        var vendor_id = "<?php echo e($vdata); ?>";
        var formate = "<?php echo e(helper::appdata($vdata)->currency_formate); ?>";
        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-center",
        }
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>
    </script>

    <script>
        // top deals parameter
        var start_date = "<?php echo e(@helper::top_deals($storeinfo->id)->start_date); ?>";
        var start_time = "<?php echo e(@helper::top_deals($storeinfo->id)->start_time); ?>";
        var end_date = "<?php echo e(@helper::top_deals($storeinfo->id)->end_date); ?>";
        var end_time = "<?php echo e(@helper::top_deals($storeinfo->id)->end_time); ?>";
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'top_deals')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'top_deals')->first()->activated == 1): ?>
            var enddate = "<?php echo e(@App\Models\TopDeals::where('vendor_id', $storeinfo->id)->first()->end_date); ?>";
            var endtime = "<?php echo e(@App\Models\TopDeals::where('vendor_id', $storeinfo->id)->first()->end_time); ?>";
        <?php else: ?>
            var enddate = null;
            var endtime = null;
        <?php endif; ?>
        var topdeals = "<?php echo e(!empty(@$topdealsproducts) ? 1 : 0); ?>";
        var time_zone = "<?php echo e(helper::appdata($vdata)->timezone); ?>";
        var current_date = "<?php echo e(\Carbon\Carbon::now()->toDateString()); ?>";
        var deal_type = "<?php echo e(@helper::top_deals($storeinfo->id)->deal_type); ?>";
        var siteurl = "<?php echo e(URL::to($storeinfo->slug)); ?>";

        function currency_formate(price) {

            if ("<?php echo e(@helper::appdata($vdata)->currency_position); ?>" == "left") {

                if ("<?php echo e(helper::appdata($vdata)->decimal_separator); ?>" == 1) {
                    var oldprice = $.number(price, formate);
                    if ("<?php echo e(@helper::appdata($vdata)->currency_space); ?>" == 1) {
                        newprice = "<?php echo e(@helper::appdata($vdata)->currency); ?>" + ' ' + oldprice;
                    } else {
                        newprice = "<?php echo e(@helper::appdata($vdata)->currency); ?>" + oldprice;
                    }

                } else {
                    var oldprice = $.number(price, formate, ',', '.');
                    if ("<?php echo e(@helper::appdata($vdata)->currency_space); ?>" == 1) {
                        newprice = "<?php echo e(@helper::appdata($vdata)->currency); ?>" + ' ' + oldprice;
                    } else {

                        newprice = "<?php echo e(@helper::appdata($vdata)->currency); ?>" + oldprice;
                    }
                }
                return newprice;
            } else {
                if ("<?php echo e(helper::appdata($vdata)->decimal_separator); ?>" == 1) {
                    var oldprice = $.number(price, formate);
                    if ("<?php echo e(@helper::appdata($vdata)->currency_space); ?>" == 1) {
                        newprice = oldprice + ' ' + "<?php echo e(@helper::appdata($vdata)->currency); ?>";
                    } else {
                        newprice = oldprice + "<?php echo e(@helper::appdata($vdata)->currency); ?>";
                    }

                } else {
                    var oldprice = $.number(price, formate, ',', '.');
                    if ("<?php echo e(@helper::appdata($vdata)->currency_space); ?>" == 1) {
                        newprice = oldprice + ' ' + "<?php echo e(@helper::appdata($vdata)->currency); ?>";
                    } else {
                        newprice = oldprice + "<?php echo e(@helper::appdata($vdata)->currency); ?>";
                    }
                }
                return newprice;
            }
        }
        $('.whatsapp_icon').on("click", function(event) {
            $(".wp_chat_box").toggleClass("d-none");
        });

        // Theme-1 owlCarousel js
        $('.categories-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            // margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 5
                },
                1024: {
                    items: 6
                },
                1000: {
                    items: 8
                }
            }
        })
        $('.blogs-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3

                },
                1440: {
                    items: 4

                },
                1660: {
                    items: 4

                }
            }
        })

        $('.banner-imges-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: true,
            margin: 15,
            dots: false,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1024: {
                    items: 2
                },
                1660: {
                    items: 2
                }
            }
        })

        <?php if(helper::appdata($storeinfo->id)->template_type == 1): ?>
            $('.topdeals-slider').owlCarousel({
                rtl: direction == '2' ? true : false,
                loop: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplaySpeed: 2000,
                margin: 10,
                dots: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    400: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    768: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 11): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            3
                        <?php else: ?>
                            2
                        <?php endif; ?> ,
                        margin: 15,
                    },
                    1024: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 11): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            4
                        <?php else: ?>
                            3
                        <?php endif; ?> ,
                        margin: 15,
                    },
                    1440: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 11): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            4
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            4
                        <?php else: ?>
                            4
                        <?php endif; ?> ,
                        margin: 15,
                    },
                    1660: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 11): ?>
                            5
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            5
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            5
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            5
                        <?php else: ?>
                            4
                        <?php endif; ?> ,
                        margin: 15,
                    }
                }
            })
        <?php else: ?>
            $('.topdeals-slider').owlCarousel({
                rtl: direction == '2' ? true : false,
                loop: true,
                nav: false,
                margin: 10,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 1): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 2): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 7): ?>
                            1
                        <?php elseif(helper::appdata($storeinfo->id)->template == 8): ?>
                            1
                        <?php elseif(helper::appdata($storeinfo->id)->template == 10): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 11): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            2
                        <?php else: ?>
                            2
                        <?php endif; ?>
                    },
                    1024: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 1): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 2): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 4): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 8): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 10): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 11): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            2
                        <?php else: ?>
                            2
                        <?php endif; ?>
                    },
                    1440: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 1): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 2): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 4): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 8): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 10): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 11): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            3
                        <?php else: ?>
                            2
                        <?php endif; ?>
                    },
                    1660: {
                        items: <?php if(helper::appdata($storeinfo->id)->template == 1): ?>
                            2
                        <?php elseif(helper::appdata($storeinfo->id)->template == 2): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 4): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 8): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 10): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 11): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 12): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 13): ?>
                            3
                        <?php elseif(helper::appdata($storeinfo->id)->template == 15): ?>
                            3
                        <?php else: ?>
                            2
                        <?php endif; ?>

                    }
                }
            })
        <?php endif; ?>
        $('.testimonial-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: true,
            nav: false,
            margin: 15,
            dots: false,
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1024: {
                    items: 2
                },
                1440: {
                    items: 3

                },
                1660: {
                    items: 3

                }
            }
        })

        // Theme-2 owlCarousel js
        $('.theme-2-categories').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 30,
            padding: 30,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
        $('.theme-2blogs-slider').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 15,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3

                },
                1440: {
                    items: 4

                },
                1660: {
                    items: 4

                }
            }
        })
        $('.banner-imges-slider-2').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: true,
            margin: 25,
            dots: false,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1660: {
                    items: 3
                }
            }
        })

        // Theme-4 owlCarousel js
        $('.testimonial-slider4').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: true,
            nav: false,
            margin: 15,
            dots: false,
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1440: {
                    items: 4
                },
                1660: {
                    items: 4

                }
            }
        })

        // Theme-10 owlCarousel js
        $('.category-slider-theme-10').owlCarousel({
            loop: false,
            margin: 16,
            nav: true,
            dots: false,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        })

        // Theme-11 owlCarousel js
        $('.banner-imges-slider-11').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: true,
            nav: false,
            margin: 14,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 2000,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        })
        $('#testimonial-slider-11').owlCarousel({
            loop: true,
            nav: false,
            margin: 10,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplaySpeed: 1000,
            rtl: direction == '2' ? true : false,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                }
            }
        })

        // Theme-12 owlCarousel js
        $('#testimonial-slider-12').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: true,
            nav: false,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            dots: false,
            autoplay: true,
            autoHeight: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1,
                },
                700: {
                    items: 1,
                },
                1000: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
            }
        })

        // Theme-13 owlCarousel js
        $('.testimonial-slider-13').owlCarousel({
            loop: true,
            nav: false,
            margin: 10,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2500,
            rtl: direction == '2' ? true : false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })

        // Theme-15 owlCarousel js
        $('.product-slider-15').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: true,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            margin: 10,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1200: {
                    items: 5,
                }
            }
        })
        $('.product-list-slider-15').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: true,
            navText: ["<i class='fa-solid fa-arrow-left-long'></i>",
                "<i class='fa-solid fa-arrow-right-long'></i>"
            ],
            margin: 10,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                400: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            }
        })


        $('.cart-modal').owlCarousel({
            rtl: direction == '2' ? true : false,
            loop: false,
            nav: false,
            margin: 25,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 2
                },
                1660: {
                    items: 2
                }
            }
        })


        // aos js important
        AOS.init();

        AOS.init({
            // Global settings:
            disable: false,
            startEvent: 'DOMContentLoaded',
            initClassName: 'aos-init',
            animatedClassName: 'aos-animate',
            useClassNames: false,
            disableMutationObserver: false,
            debounceDelay: 50,
            throttleDelay: 99,


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120,
            delay: 0,
            duration: 400,
            easing: 'ease',
            once: false,
            mirror: false,
            anchorPlacement: 'top-bottom',

        });
    </script>
    
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
            <?php
                $checkplan = App\Models\Transaction::where('vendor_id', $vdata)->orderByDesc('id')->first();
                $user = App\Models\User::where('id', $vdata)->first();
                if ($user->allow_without_subscription == 1) {
                    $pwa = 1;
                } else {
                    $pwa = @$checkplan->pwa;
                }
            ?>
            <?php if($pwa == 1): ?>
                <script src="<?php echo e(url('storage/app/public/sw.js')); ?>"></script>
                <script>
                    if (!navigator.serviceWorker.controller) {
                        navigator.serviceWorker.register("<?php echo e(url('storage/app/public/sw.js')); ?>").then(function(reg) {
                            console.log("Service worker has been registered for scope: " + reg.scope);
                        });
                    }
                </script>
            <?php endif; ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if(App\Models\SystemAddons::where('unique_identifier', 'pwa')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'pwa')->first()->activated == 1): ?>
            <script src="<?php echo e(url('storage/app/public/sw.js')); ?>"></script>
            <script>
                if (!navigator.serviceWorker.controller) {
                    navigator.serviceWorker.register("<?php echo e(url('storage/app/public/sw.js')); ?>").then(function(reg) {
                        console.log("Service worker has been registered for scope: " + reg.scope);
                    });
                }
            </script>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'pixel')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'pixel')->first()->activated == 1): ?>
        <?php echo $__env->make('front.pixel.pixel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <script></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH /mnt/c/restro-saas/resources/views/front/theme/default.blade.php ENDPATH**/ ?>
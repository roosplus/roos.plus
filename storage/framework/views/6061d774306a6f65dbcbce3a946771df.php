<!DOCTYPE html>
<html lang="en" dir="<?php echo e(session()->get('direction') == 2 ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?php echo e(helper::appdata('')->meta_title); ?>" />
    <meta property="og:description" content="<?php echo e(helper::appdata('')->meta_description); ?>" />
    <meta property="og:image" content='<?php echo e(helper::image_path(helper::appdata('')->og_image)); ?>' />
    
    <link rel="icon" type="image" sizes="16x16" href="<?php echo e(helper::image_path(helper::appdata('')->favicon)); ?>">
    <!-- Favicon icon -->
    <title><?php echo e(helper::appdata('')->landing_website_title); ?></title>
    <!-- Font Awesome icon css-->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/all.min.css')); ?>">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/owl.carousel.min.css')); ?>">

    <!-- owl carousel css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/owl.theme.default.min.css')); ?>">

    <!-- Poppins fonts -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/fonts/poppins.css')); ?>">

    <!-- bootstrap-icons css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/bootstrap-icons.css')); ?>">

    <!-- bootstrap css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/bootstrap.min.css')); ?>">

    <!-- style css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/style.css')); ?>">

    <!-- responsive css -->

    <link rel="stylesheet" href="<?php echo e(url(env('ASSETSPATHURL') . 'landing/css/responsive.css')); ?>">
    <style>
        :root {

            /* Color */
            --bs-primary: <?php echo e(helper::appdata('')->primary_color); ?>;
            --bs-secondary: <?php echo e(helper::appdata('')->secondary_color); ?>;

        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body>
    <?php echo $__env->make('landing.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('landing.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Quick call -->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'quick_call')->first()->activated == 1): ?>
        <?php if(helper::appdata('')->quick_call == 1): ?>
            <?php echo $__env->make('front.quick_call', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>


    <!-- Modal -->
    <div class="d-flex align-items-center float-end">
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content search-modal-content rounded-4">
                    
                    <div class="modal-body">
                        <form class="" action="<?php echo e(URL::to('stores')); ?>" method="get">
                            <div class="col-12">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-6 d-none d-lg-block">
                                        <div class="Search-left-img">
                                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/images/search.webp')); ?>"
                                                alt="search-left-img" class="w-100 object-fit-cover search-left-img">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="search-content text-capitalize">
                                            <div class="d-flex justify-content-between gap-2 mb-2 align-items-center ">
                                                <h4 class="fs-2 text-dark fw-bolder m-0">
                                                    <?php echo e(trans('labels.search')); ?>

                                                </h4>
                                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <p class="fs-6"><?php echo e(trans('labels.search_title')); ?></p>
                                        </div>
                                        <div class="select-input-box">
                                            <select name="store"
                                                class="py-2 input-width px-2 mt-sm-4 mt-2 mb-1 w-100 border rounded-5 fs-7"
                                                id="store">
                                                <option value=""><?php echo e(trans('landing.select_store_category')); ?>

                                                </option>
                                                <?php $__currentLoopData = @helper::storecategory(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($store->name); ?>"
                                                        <?php echo e(request()->get('store') == $store->name ? 'selected' : ''); ?>>
                                                        <?php echo e($store->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <select name="city" id="city"
                                            class="py-2 input-width px-2 mt-2 mb-1 w-100 border rounded-5 fs-7">
                                            <option value=""
                                                data-value="<?php echo e(URL::to('/stores?city=' . '&area=' . request()->get('area'))); ?>"
                                                data-id="0" selected><?php echo e(trans('landing.select_city')); ?></option>

                                            <?php $__currentLoopData = helper::get_city(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->name); ?>"
                                                    data-value="<?php echo e(URL::to('/stores?city=' . request()->get('city') . '&area=' . request()->get('area'))); ?>"
                                                    data-id=<?php echo e($city->id); ?>

                                                    <?php echo e(request()->get('city') == $city->name ? 'selected' : ''); ?>>
                                                    <?php echo e($city->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <select name="area" id="area"
                                            class="py-2 input-width px-2 mt-2 mb-1 w-100 border rounded-5 fs-7">
                                            <option value=""><?php echo e(trans('landing.select_area')); ?></option>
                                            <?php if(request()->get('area')): ?>
                                                <option value="<?php echo e(request()->get('area')); ?>" selected>
                                                    <?php echo e(request()->get('area')); ?></option>
                                            <?php endif; ?>


                                        </select>

                                        <div class="search-btn-group">
                                            <div
                                                class="row g-2 justify-content-between align-items-center mt-sm-5 mt-3">
                                                <div class="col-6">
                                                    <a type="submit"
                                                        class="btn-primary bg-danger px-3 py-3 w-100 rounded-3 rounded-3 text-center"
                                                        data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?> </a>
                                                </div>
                                                <div class="col-6">
                                                    <input type="submit"
                                                        class="btn-primary w-100 rounded-3 px-3 py-3 rounded-3 text-center"
                                                        value="<?php echo e(trans('labels.submit')); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(env('Environment') == 'sendbox'): ?>
        <button type="button" class="demo_label main-button border-0 d-none" data-bs-toggle="modal"
            data-bs-target="#demo-modal">
            <i class="fa fa-info-circle"></i>
            <span>Note</span></button>
    <?php endif; ?>
    <!--Modal: order-modal-->
    <div class="modal fade" id="demo-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-notify modal-info" role="document">
            <div class="modal-content text-center">
                <div class="modal-header d-flex justify-content-center">
                    <h5>Script License Information</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-md-6 border-line text-danger">
                                <h4>Regular License</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        You can not create subscription plans
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        You can not charge your end customers using subscription plans
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 text-success">
                                <h4 class="mt-3 mt-sm-0">Extended License</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        You can create subscription plans
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        You can charge your end customers using subscription plans
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Script Installation & Configuration Service</h5>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6 border-line text-danger">
                                <h4>Regular License</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        One time installation service (cPanel OR Plesk based hosting server) : $49
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        One time installation service (Any other hosting server) : Contact us for
                                        pricing
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 text-success">
                                <h4 class="mt-3 mt-sm-0">Extended License</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        One time installation service (cPanel OR Plesk based hosting server) : FREE
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        One time installation service (Any other hosting server) : Contact us for
                                        pricing
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3">Script Addons Information</h5>
                        <p class="text-info">(We have installed all addons in the demo script. You will get the addons
                            as mentioned below)</p>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4 border-line text-danger">
                                <h4>Regular License</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        No addons available
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 border-line ms-auto text-success">
                                <h4 class="mt-3 mt-sm-0">Extended License</h4>
                                <small class="text-primary">(You will get below mentioned 7 addons free)</small>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Google Analytics
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Customer Login
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Blogs
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Language
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Coupons
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Custom Domain
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Themes
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 ms-auto text-dark">
                                <h4>Priemum Addons</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        PayPal
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        MyFatoorah
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        Mercado Pago
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        toyyibPay
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        POS (Point Of Sale)
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        Telegram
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        Table QR
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-dark "></i>
                                        PWA (Progressive Web App)
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-6 border-line text-danger">
                                <h4>Notes</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        Any third party configuration service will be charged extra (Example : Email
                                        Configuration, Custom Domain Configuration, Social Login Configuration, Google
                                        Analytics Configuration, Google reCaptcha Configuration, etc…)
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-danger "></i>
                                        If you have any questions regarding LICENSE, INSTALLATION & ADDONS then please
                                        contact us
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 text-success">
                                <h4 class="mt-3 mt-sm-0">Contact Information</h4>
                                <hr>
                                <ul class="text-start">
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Email : <a href="mailto: infotechgravity@gmail.com" target="_blank">
                                            infotechgravity@gmail.com</a>
                                    </li>
                                    <li> <i class="fa-regular fa-circle-check text-success "></i>
                                        Whatsapp : <a
                                            href="https://api.whatsapp.com/send?text=Hello I found your from Demo&phone=919499874557"
                                            target="_blank">+91 9499874557</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <a href="https://1.envato.market/R5mbvb" target="_blank" class="btn btn-danger m-1">Buy Regular
                        License</a>
                    <a href="https://1.envato.market/3eoEDd" target="_blank" class="btn btn-success m-1">Buy Extended
                        License</a>
                    <a href="https://rb.gy/nc1f9" target="_blank" class="btn btn-dark m-1">Buy Priemum Addons</a>
                    <button type="button" class="btn btn-info m-1" data-bs-dismiss="modal">Continue to Demo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- whatsapp modal start -->
    <?php if(helper::appdata(1)->contact != ''): ?>
        <input type="checkbox" id="check" class="d-none">
        <label class="chat-btn chat-btn_rtl" for="check">
            <i class="fa-brands fa-whatsapp comment"></i>
            <i class="fa fa-close close"></i>
        </label>
        <div class="wrapper_rtl shadow wp_chat_box">
            <div class="msg_header">
                <h6><?php echo e(helper::appdata('')->website_title); ?></h6>
            </div>
            <div class="text-start p-3 bg-msg">
                <div class="card p-2 msg">
                    How can I help you ?
                </div>
            </div>
            <div class="chat-form">
                <form action="https://api.whatsapp.com/send" method="get" target="_blank"
                    class="d-flex align-items-center d-grid gap-2">
                    <textarea class="form-control" name="text" placeholder="Your Text Message"></textarea>
                    <input type="hidden" name="phone" value="<?php echo e(helper::appdata('')->contact); ?>">
                    <button type="submit" class="btn btn-success p-2 btn-block">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <!-- whatsapp modal end -->
    <!--Start of Tawk.to Script-->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'tawk')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'tawk')->first()->activated == 1): ?>
        <?php if(helper::appdata('')->tawk_on_off == 1): ?>
            <?php echo helper::appdata('')->tawk_widget_id; ?>

        <?php endif; ?>
    <?php endif; ?>
    <!--End of Tawk.to Script-->
    <?php if(App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first() != null &&
            App\Models\SystemAddons::where('unique_identifier', 'wizz_chat')->first()->activated == 1): ?>
        <?php if(helper::appdata('')->wizz_chat_on_off == 1): ?>
            <!-- Wizz Chat -->
            <?php echo helper::appdata('')->wizz_chat_settings; ?>

        <?php endif; ?>
    <?php endif; ?>

    <!-- Jquery Min js -->
    <script>
        let direction = "<?php echo e(session()->get('direction')); ?>";
    </script>

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/js/jquery.min.js')); ?>"></script>

    <!-- Bootstrap js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- owl carousel js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/js/owl.carousel.min.js')); ?>"></script>

    <!-- custom js -->

    <script src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/js/custom.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <script>
        var areaurl = "<?php echo e(URL::to('admin/getarea')); ?>";
        var select = "<?php echo e(trans('landing.select_area')); ?>";
        var areaname = "<?php echo e(request()->get('area')); ?>";
        var env = "<?php echo e(env('Environment')); ?>";

        $('.whatsapp_icon').on("click", function(event) {
            $(".wp_chat_box").toggleClass("d-none");
        });

        // if (env == "sendbox") {
        //     $(window).on("load", function () {
        //         "use strict";
        //         var info = localStorage.getItem("info-show");
        //         if (info != 'yes') {
        //             jQuery("#demo-modal").modal('show');
        //             localStorage.setItem("info-show", 'yes');
        //         }
        //     });
        // }
    </script>

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


</body>
<?php /**PATH /mnt/c/restro-saas/resources/views/landing/layout/default.blade.php ENDPATH**/ ?>
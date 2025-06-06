<!-- IF VERSION 2  -->
<?php if(helper::appdata('')->recaptcha_version == 'v2'): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>
<!-- IF VERSION 3  -->
<?php if(helper::appdata('')->recaptcha_version == 'v3'): ?>
    <?php echo RecaptchaV3::initJs(); ?>

<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <main>
        <!--------------------------------- home-banner start --------------------------------->
        <section id="home" class="home-banner my-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-12">
                        <div class="banner-content me-xl-5 me-lg-3 me-md-2">
                            <h1 class="banner-title text-primary"><?php echo e(trans('landing.hero_banner_title')); ?></h1>
                            <p class="fw-normal mb-lg-5 mb-4 text-muted"><?php echo e(trans('landing.hero_banner_description')); ?></p>
                            <div class="input-group gap-3 mb-lg-4 mb-3">
                                <a href="<?php if(env('Environment') == 'sendbox'): ?> <?php echo e(URL::to('/admin')); ?> <?php else: ?> <?php echo e(helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin')); ?> <?php endif; ?>"
                                    class="btn btn-secondary px-3 py-2 fw-500 fs-15 rounded"
                                    target="_blank"><?php echo e(trans('landing.get_started')); ?></a>
                                <a href="<?php if(env('Environment') == 'sendbox'): ?> <?php echo e(URL::to('/admin')); ?> <?php else: ?> <?php echo e(helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin')); ?> <?php endif; ?>"
                                    class="btn border border-dark fw-500 fs-15 py-2 px-3 text-dark bg-transparent rounded"
                                    target="_blank">
                                    <?php echo e(trans('landing.buy_now')); ?>


                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 d-none d-md-block">
                        <img src="<?php echo e(helper::image_path(helper::appdata('')->landing_home_banner)); ?>" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <!---------------------------------- home-banner end ---------------------------------->

        <!-------------------------------- work section start -------------------------------->
        <?php if(count($works) > 0): ?>
            <section class="work bg-primary mb-5">
                <div class="container">
                    <div class="col-12">
                        <div class="work-content sec-title mb-5">
                            <h2 class="text-white"><?php echo e(helper::appdata('')->work_title); ?></h2>
                            <p class="sub-title text-white"><?php echo e(helper::appdata('')->work_subtitle); ?></p>
                        </div>
                        <div class="row g-3">
                            <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                    <div
                                        class="card h-100 border-0 rounded-0 pb-xl-5 <?php if($key % 2 != 0): ?> bg-secondary <?php endif; ?>">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <img class="card-img-top" src="<?php echo e(helper::image_path($work->image)); ?>"
                                                alt="" class="rounded-circle">
                                            <div class="numbers <?php if($key % 2 != 0): ?> text-white <?php endif; ?>">
                                                <?php echo e($key + 1); ?></div>
                                        </div>
                                        <div class="card-body p-0 ms-3">
                                            <div
                                                class="border-start border-2 <?php if($key % 2 == 0): ?> border-secondary-color <?php elseif($key % 2 != 0): ?> border-white <?php endif; ?> ps-4 mb-xl-4 mb-lg-3">
                                                <h4 class="card-title <?php if($key % 2 != 0): ?> text-white <?php endif; ?>">
                                                    <?php echo e($work->title); ?></h4>
                                                <p
                                                    class="card-text <?php if($key % 2 == 0): ?> text-muted <?php elseif($key % 2 != 0): ?> text-white <?php endif; ?> fs-7 text-truncate-2">
                                                    <?php echo e($work->sub_title); ?></p>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0 bg-transparent">
                                            <a href="<?php if(env('Environment') == 'sendbox'): ?> <?php echo e(URL::to('/admin')); ?> <?php else: ?> <?php echo e(helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin')); ?> <?php endif; ?>"
                                                class="border-bottom ms-4 fw-500 ms-lg-0 ms-xl-4 <?php if($key % 2 != 0): ?> text-white <?php endif; ?>"
                                                target="_blank"><?php echo e(trans('landing.get_started')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!---------------------------------- work section end ---------------------------------->

        <!--------------------------- Premium Features section start --------------------------->
        <?php if(count($features) > 0): ?>
            <section id="features" class="premium-features-sec pb-5">
                <div class="container">
                    <div class="sec-title col-lg-6 text-strat mb-5">
                        <h2 class=""><?php echo e(trans('landing.premium_features')); ?></h2>
                        <p class="sub-title"><?php echo e(trans('landing.premium_features_description')); ?></p>
                    </div>
                    <div class="premium-features">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3">
                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="features-circle w-100 my-3">
                                                <img src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/feature/' . $feature->image)); ?>"
                                                    alt="">
                                            </div>
                                            <p class="features-card-title text-truncate-2 mb-3"><?php echo e($feature->title); ?></p>
                                            <span
                                                class="description text-truncate-3 mb-3"><?php echo e($feature->description); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!---------------------------- Premium Features section end ---------------------------->


        <!--  Store Section Start -->

        <?php if(count($userdata) > 0): ?>
            <section id="our-stores">
                <div class="card-section-bg-color pb-5">
                    <div class="container card-section-container">
                        <div class="sec-title  mb-5">
                            <h2><?php echo e(trans('landing.our_partners')); ?></h2>
                            <h5 class="sub-title"><?php echo e(trans('landing.our_partners_description')); ?></h5>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2">

                            <?php $__currentLoopData = $userdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col">
                                    <a href="<?php echo e(URL::to($user->slug . '/')); ?>" target="_blank">
                                        <div class="card mx-1 rounded-4 h-100 border-0">
                                            <img src="<?php echo e(helper::image_path($user->cover_image)); ?>"
                                                class="card-img-top our_stores_images" alt="...">
                                            <div class="card-body px-0">
                                                <h5 class="card-title hotel-title"><?php echo e($user->website_title); ?></h5>
                                                <p class="hotel-subtitle text-muted text-truncate-2">
                                                    <?php echo e($user->description); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="<?php echo e(URL::to('stores')); ?>"
                                class="btn btn-secondary py-2 fw-500 px-3"><?php echo e(trans('landing.see_all')); ?> <i
                                    class="fa-solid <?php echo e(session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right'); ?> px-2"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!--  Store Section End -->

        <!------------------------------ Templates section start ------------------------------->
        <?php if(count($themes) > 0): ?>
            <section class="template bg-primary py-5">
                <div class="container">
                    <div class="sec-title mb-5">
                        <h2 class="text-white"><?php echo e(trans('landing.awesome_templates')); ?></h2>
                        <h5 class="sub-title text-white"><?php echo e(trans('landing.awesome_templates_description')); ?></h5>
                    </div>
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-sm-4 g-3">
                        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <div class="theme-img">
                                    <img src="<?php echo e(helper::image_path($item->image)); ?>" alt=""
                                        class="object-fit-cover h-100">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-------------------------------- Templates section end ------------------------------>

        <!------------------------------- plan section start ------------------------------->

        <?php if(App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1): ?>
            <section id="pricing-plans" class="our-plan pt-5">
                <div class="container">
                    <div class="sec-title mb-5">
                        <h2 class="text-capitalize"><?php echo e(trans('landing.pricing_plan_title')); ?></h2>
                        <h5 class="sub-title"><?php echo e(trans('landing.pricing_plan_description')); ?></h5>
                    </div>
                    <div class="row mb-3 plan">
                        <?php $__currentLoopData = $planlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="card border-0 rounded-3 shadow mb-4 h-100">
                                    <div class="card-header bg-changer rounded-top-3 p-3 py-2">
                                        <p class="fw-semibold fs-4 m-0"><?php echo e($plan->name); ?></p>
                                    </div>
                                    <div class="card-body p-4">
                                        <h5 class="fw-semibold"><?php echo e(helper::currency_formate($plan->price, '')); ?>/
                                            <?php if($plan->duration == 1): ?>
                                                <?php echo e(trans('landing.one_month')); ?>

                                            <?php elseif($plan->duration == 2): ?>
                                                <?php echo e(trans('landing.three_month')); ?>

                                            <?php elseif($plan->duration == 3): ?>
                                                <?php echo e(trans('landing.six_month')); ?>

                                            <?php elseif($plan->duration == 4): ?>
                                                <?php echo e(trans('landing.one_year')); ?>

                                            <?php elseif($plan->duration == 5): ?>
                                                <?php echo e(trans('landing.lifetime')); ?>

                                            <?php elseif($plan->duration == null): ?>
                                                <?php echo e(trans('landing.free')); ?>

                                            <?php endif; ?>
                                        </h5>
                                        <span class="fs-7"><?php echo e($plan->description); ?></span>
                                        <div class="plan-detals mt-4">
                                            <ul class="m-0 p-0 ">

                                                <?php $features = explode('|', $plan->features); ?>
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                    <span class="mx-2 fs-7">
                                                        <?php echo e($plan->order_limit == -1 ? trans('landing.unlimited') : $plan->order_limit); ?>

                                                        <?php echo e($plan->order_limit > 1 || $plan->order_limit == -1 ? trans('landing.products') : trans('landing.product')); ?>

                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                    <span class="mx-2 fs-7">
                                                        <?php echo e($plan->appointment_limit == -1 ? trans('landing.unlimited') : $plan->appointment_limit); ?>

                                                        <?php echo e($plan->appointment_limit > 1 || $plan->appointment_limit == -1 ? trans('landing.orders') : trans('landing.order')); ?>

                                                    </span>
                                                </li>
                                                <?php
                                                    $themes = [];
                                                    if ($plan->themes_id != '' && $plan->themes_id != null) {
                                                        $themes = explode(',', $plan->themes_id);
                                                } ?>
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                    <span class="mx-2 fs-7"><?php echo e(count($themes)); ?>

                                                        <?php echo e(count($themes) > 1 ? trans('landing.themes') : trans('landing.theme')); ?></span>
                                                </li>

                                                <?php if($plan->coupons == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7"><?php echo e(trans('landing.coupons')); ?></span>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if($plan->custom_domain == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.custome_domain_available')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->vendor_app == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.vendor_app_available')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->google_analytics == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">
                                                            <?php echo e(trans('landing.google_analytics_available')); ?></span>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if($plan->blogs == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7"><?php echo e(trans('landing.blogs')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->google_login == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7"><?php echo e(trans('landing.google_login')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->facebook_login == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.facebook_login')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->sound_notification == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.sound_notification')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->whatsapp_message == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.whatsapp_message')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->telegram_message == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7"><?php echo e(trans('landing.telegram_message')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->pos == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7"><?php echo e(trans('landing.pos')); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($plan->pwa == 1): ?>
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7"><?php echo e(trans('labels.pwa')); ?></span>
                                                    </li>

                                                    
                                                <?php endif; ?>
                                                <?php $features = explode('|',$plan->features); ?>
                                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="d-flex align-items-start mb-3"><i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                        <span class="mx-2 fs-7"><?php echo e($feature); ?></span>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-transparent py-4 px-4">
                                        <a href="<?php echo e(URL::to('/admin')); ?>"
                                            class="btn w-100 btn-secondary fw-500 fs-15 py-3"><?php echo e(trans('landing.subscribe')); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-------------------------------- plan section end -------------------------------->

        <!-------------------------------- Trusted section start -------------------------------->
        <section class="trusted py-5">
            <div class="container bg-primary">
                <div class="row align-items-center justify-content-between trusted-box">
                    <div class="col-md-4 col-12 ps-0 d-none d-lg-block">
                        <img src="<?php echo e(url(env('ASSETSPATHURL') . 'landing/images/png/trusted.png')); ?>"
                            alt="digital connection images" class="w-100 object-fit-content">
                    </div>
                    <div class="col-md-7 col-12">
                        <div>
                            <h3 class="mb-4 text-center text-md-start trusted-title"><?php echo e(trans('landing.trusted_by')); ?>

                            </h3>
                            <div class="d-flex">
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="65">65</h2>
                                    <h3 class="num-title"><?php echo e(trans('landing.fun_fact_one')); ?></h3>
                                </div>
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="10">10</h2>
                                    <h3 class="num-title"><?php echo e(trans('landing.fun_fact_two')); ?></h3>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="275">275</h2>
                                    <h3 class="num-title"><?php echo e(trans('landing.fun_fact_three')); ?></h3>
                                </div>
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="60">60</h2>
                                    <h3 class="num-title"><?php echo e(trans('landing.fun_fact_four')); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------------------------------- Trusted section end -------------------------------->

        <!----------------------------- testimonila section start ----------------------------->
        <section class="testimonila">
            <div class="container">
                <div class="sec-title mb-5">
                    <h2 class="text-capitalize"><?php echo e(trans('landing.client_says')); ?></h2>
                    <h5 class="sub-title"><?php echo e(trans('landing.client_says_description')); ?></h5>
                </div>
                <div id="testimonila-owl" class="owl-carousel owl-theme mt-5">

                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="card bg-secondary border-0 rounded-0 p-md-5">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center justify-content-between d-block">
                                        <div class="col-lg-7 col-md-6">
                                            <div class="test-content">
                                                <i class="fa-solid fa-quote-left text-white"></i>
                                                <p class="text-truncate-3"><?php echo e($testimonial->description); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 profile-circle mb-4 mb-md-0 mx-auto mx-md-0">
                                            <img src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/testimonials/' . $testimonial->image)); ?>"
                                                alt="user">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-transparent text-white">
                                    <h5 class="text-md-start text-center"><?php echo e($testimonial->name); ?></h5>
                                    <p class="text-md-start text-center fs-15"><?php echo e($testimonial->position); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>
        </section>
        <!------------------------------ testimonila section end ------------------------------>



        <!------------------------------ blog section end ------------------------------>
        <?php if(count($blogs) > 0): ?>
            <section id="blog" class="blog py-5">
                <div class="container">
                    <div class="sec-title mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic"
                        data-aos-duration="2000">
                        <h2 class="text-capitalize"><?php echo e(trans('landing.blogs')); ?></h2>
                        <h5 class="sub-title"> <?php echo e(trans('landing.blog_desc')); ?></h5>
                    </div>

                    <div id="blog-owl" class="owl-carousel owl-theme">

                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item" data-aos="zoom-in" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">
                                <a href="<?php echo e(URL::to('blog_details-' . $blog->id)); ?>">
                                    <div class="card border-0 rounded-0">
                                        <img class="card-img-top blog-image"
                                            src="<?php echo e(url(env('ASSETSPATHURL') . 'admin-assets/images/blog/' . $blog->image)); ?>"
                                            alt="">
                                        <div class="card-body px-0">
                                            <div class="d-flex align-items-start">
                                                <div>

                                                    <h4 class="card-title text-truncate-2"><?php echo e($blog->title); ?></h4>

                                                    <p class="card-text text-truncate-3"><?php echo Str::limit(@$blog->description, 100); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="<?php echo e(URL::to('blog_list')); ?>"
                            class="btn btn-secondary mt-4 py-2 fs-15 fw-500 px-3"><?php echo e(trans('landing.see_all')); ?> <i
                                class="fa-solid <?php echo e(session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right'); ?> px-2"></i></a>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!------------------------------ blog section end ------------------------------>




        <!------------------------------ newsletter start ------------------------------>
        <section class="newsletter bg-primary mb-5">
            <div class="container text-center text-white">
                <div class="py-5">
                    <h2 class="py-4 m-0 newsletter-title"><?php echo e(trans('landing.subscribe_section_title_msg')); ?></h2>
                    <h5 class="newsletter-subtitle col-xl-8 col-lg-10 col-auto m-auto text-white">
                        <?php echo e(trans('landing.subscribe_section_description')); ?></h5>
                    <form action="<?php echo e(URL::to('emailsubscribe')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="col-xl-6 col-lg-7 col-md-10 mx-md-auto mt-5">
                            <div class="input-group d-flex gap-3 mb-2">
                                <input type="text" class="form-control rounded fs-6" placeholder="Enter your email"
                                    name="email" id="email" aria-label="Recipient's username"
                                    aria-describedby="subscribe_button" required>
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
                                <button class="btn btn-secondary rounded py-3 m-0 px-4 fw-500 fs-15" type="submit"
                                    id="subscribe_button">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!------------------------------- newsletter end ------------------------------->

        <!------------------------------- Contact start ------------------------------->
        <section id="contect-us" class="contact pb-5 mb-4">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-4 col-md-6 col-12 mb-5 mb-md-0">

                        <div class="card card-info bg-primary border-0 text-white position-relative">
                            <div class="card-body">
                                <div class="info">
                                    <h5><?php echo e(trans('landing.contact_info')); ?></h5>
                                    <p><?php echo e(trans('landing.contact_info_msg')); ?></p>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fa-solid fa-phone-volume me-4"></i>
                                    <p class="m-0"><?php echo e(helper::appdata('')->contact); ?></p>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fa-solid fa-envelope me-4"></i>
                                    <p class="m-0"><?php echo e(helper::appdata('')->email); ?></p>
                                </div>
                                <div class="d-flex align-items-start mb-4">
                                    <i class="fa-solid fa-location-dot me-4"></i>
                                    <p class="m-0"><?php echo e(helper::appdata('')->address); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 col-12">
                        <div class="sec-title col-12 mb-5">
                            <h2 class="text-capitalize"><?php echo e(trans('landing.contact_us')); ?></h2>
                            <h5 class="sub-title"><?php echo e(trans('landing.contact_section_title')); ?></h5>
                        </div>
                        <form class="row" action="<?php echo e(URL::to('inquiry')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="first_name"
                                    class="form-label fw-semibold fs-7"><?php echo e(trans('landing.first_name')); ?> <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-7 p-2" name="first_name" id="first_name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="last_name"
                                    class="form-label fw-semibold fs-7"><?php echo e(trans('landing.last_name')); ?> <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-7 p-2" name="last_name" id="last_name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="emaill" class="form-label fw-semibold fs-7"><?php echo e(trans('landing.email')); ?>

                                    <span class="text-danger">*</span></label>
                                <input type="email" class="form-control fs-7 p-2" name="emaill" id="emaill"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="phone" class="form-label fw-semibold fs-7"><?php echo e(trans('landing.mobile')); ?>

                                    <span class="text-danger">*</span></label>
                                <input type="number" class="form-control fs-7 p-2" name="mobile" id="phone"
                                    onKeyPress="if(this.value.length==10) return false;" required>
                            </div>
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label for="Message" class="form-label fw-semibold fs-7"><?php echo e(trans('landing.message')); ?>

                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control p-2 text-muted fs-7" rows="4" name="message" id="Message"
                                    placeholder="Write your message.." required></textarea>
                            </div>

                            <?php echo $__env->make('landing.layout.recaptcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="col-12 d-flex justify-content-end">
                                <button class="m-0 btn btn-primary px-3 py-2 fw-500 fs-15"
                                    type="submit"><?php echo e(trans('landing.send_msg')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------------- Contact end ------------------------------->
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/restro-saas/resources/views/landing/index.blade.php ENDPATH**/ ?>
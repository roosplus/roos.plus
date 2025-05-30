<header>
    <div class="header-main fixed-top">
        <?php if(env('Environment') == 'sendbox'): ?>
            <div class="sale">
                <div class="container">
                    <div class="d-block d-md-flex justify-content-center align-items-center">
                        <p class="text-center"> <a href="https://1.envato.market/XxMgjX" target="_blank">This is a demo
                                website - Buy genuine Restro SaaS using our official link! Click Now >>> Buy Now</a></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="Navbar">
                <a href="<?php echo e(URL::to(@$storeinfo->slug)); ?>" class="logo mx-2">
                    <img src="<?php echo e(helper::image_path(helper::appdata(@$storeinfo->id)->logo)); ?>" alt="">
                </a>
                <div class="d-flex align-items-center gap-3">
                    <nav class="align-items-center <?php echo e(session()->get('direction') == 2 ? 'menu-rtl' : 'menu'); ?>">
                        <div id="deletebtn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <ul class="navbar-nav header-menu-items">
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link <?php echo e(request()->is(@$storeinfo->slug) ? 'active' : ''); ?> <?php echo e(request()->is('/') ? 'active' : ''); ?>"
                                    href="<?php echo e(URL::to(@$storeinfo->slug)); ?>">
                                    <?php echo e(trans('labels.home')); ?>

                                </a>
                            </li>
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link <?php echo e(request()->is(@$storeinfo->slug . '/aboutus') ? 'active' : ''); ?> <?php echo e(request()->is('aboutus') ? 'active' : ''); ?>"
                                    href="<?php echo e(URL::to(@$storeinfo->slug . '/aboutus')); ?>">
                                    <?php echo e(trans('labels.about_us')); ?>

                                </a>
                            </li>
                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a class="nav-link <?php echo e(request()->is(@$storeinfo->slug . '/contact') ? 'active' : ''); ?> <?php echo e(request()->is('contact') ? 'active' : ''); ?>"
                                    href="<?php echo e(URL::to(@$storeinfo->slug . '/contact')); ?>">
                                    <?php echo e(trans('labels.contact_us')); ?>

                                </a>
                            </li>

                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a href="<?php echo e(URL::to(@$storeinfo->slug . '/tablebook')); ?>"
                                    class="nav-link <?php echo e(request()->is(@$storeinfo->slug . '/tablebook') ? 'active' : ''); ?> <?php echo e(request()->is('tablebook') ? 'active' : ''); ?>">
                                    <?php echo e(trans('labels.table_book')); ?>

                                </a>
                            </li>

                            <li class="nav-item dropdown header-dropdown-menu px-4">
                                <a href="javascript:void(0)" class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#searchModal">
                                    <?php echo e(trans('labels.search')); ?>

                                </a>
                            </li>
                            <li
                                class="nav-item dropdown header-dropdown-menu px-4 d-flex align-items-center d-none d-lg-inline-block">
                                <div class="d-flex align-items-center">
                                    <a class="nav-link position-relative <?php echo e(request()->is(@$storeinfo->slug . '/cart') ? 'active' : ''); ?> <?php echo e(request()->is('cart') ? 'active' : ''); ?>"
                                        href="<?php echo e(URL::to(@$storeinfo->slug . '/cart')); ?>">
                                        <span>
                                            <?php echo e(trans('labels.my_cart')); ?>

                                        </span>
                                        <a class="cart-counting mx-2"
                                            id="cartcount"><?php echo e(helper::getcartcount($storeinfo->id, @Auth::user()->id)); ?></a>
                                    </a>
                                </div>
                            </li>


                            <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>

                                <?php if(Auth::user() && Auth::user()->type == 3): ?>
                                    <li
                                        class="nav-item dropdown header-dropdown-menu px-4 d-flex align-items-center d-lg-none">
                                        <a class="nav-link position-relative"
                                            href="<?php echo e(URL::to($storeinfo->slug . '/profile/')); ?>">
                                            <span>
                                                <?php echo e(trans('labels.profile')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <a onclick="statusupdate('<?php echo e(URL::to($storeinfo->slug . '/logout/')); ?>')"
                                        class="login-button-mobile login-buuton d-lg-none cursor-pointer"><?php echo e(trans('labels.logout')); ?></a>
                                <?php else: ?>
                                    <?php if(helper::appdata(@$storeinfo->id)->checkout_login_required == 1): ?>
                                        <a href="<?php echo e(URL::to($storeinfo->slug . '/login/')); ?>"
                                            class="login-button-mobile login-buuton d-lg-none"><?php echo e(trans('labels.login')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php endif; ?>

                        </ul>
                    </nav>
                    <?php
                        $languages = explode('|', helper::appdata(@$storeinfo->id)->languages);
                    ?>
                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'language')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'language')->first()->activated == 1): ?>
                        <?php if(count($languages) > 1): ?>
                            <div class="btn-group">
                                <a class="nav-link d-flex align-items-center" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo e(helper::image_path(session()->get('flag'))); ?>" alt=""
                                        class="language-dropdown-image">
                                </a>
                                <ul
                                    class="dropdown-menu user-dropdown-menu <?php echo e(session()->get('direction') == 2 ? 'drop-menu-rtl' : 'drop-menu'); ?>">

                                    <?php $__currentLoopData = helper::available_language(@$storeinfo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languagelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(in_array($languagelist->code, explode('|', helper::appdata(@$storeinfo->id)->languages))): ?>
                                            <li>
                                                <a class="dropdown-item language-items d-flex text-start"
                                                    href="<?php echo e(URL::to('/lang/change?lang=' . $languagelist->code)); ?>">
                                                    <img src="<?php echo e(helper::image_path($languagelist->image)); ?>"
                                                        alt="" class="language-items-img">
                                                    <span class="px-2"><?php echo e($languagelist->name); ?></span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if(App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                            App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1): ?>
                        <?php if(Auth::user() && Auth::user()->type == 3): ?>
                            <a class="nav-link d-flex align-items-center mx-2 mx-md-0 d-none d-lg-block text-white"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo e(helper::image_path(@Auth::user()->image)); ?>" alt=""
                                    class="profile_image">
                            </a>
                            <ul class="dropdown-menu user-dropdown-menu">
                                <li>
                                    <a class="dropdown-item language-items"
                                        href="<?php echo e(URL::to($storeinfo->slug . '/profile/')); ?>">
                                        <i class="fa fa-user"></i>
                                        <p><?php echo e(trans('labels.profile')); ?></p>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item language-items cursor-pointer"
                                        onclick="statusupdate('<?php echo e(URL::to($storeinfo->slug . '/logout/')); ?>')">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <p><?php echo e(trans('labels.logout')); ?></p>
                                    </a>
                                </li>

                            </ul>
                        <?php else: ?>
                            <?php if(helper::appdata(@$storeinfo->id)->checkout_login_required == 1): ?>
                                <a href="<?php echo e(URL::to($storeinfo->slug . '/login/')); ?>"
                                    class="login-buuton px-sm-4 px-3 py-2 fs-15 fw-500 d-none m-0 d-lg-block"><?php echo e(trans('labels.login')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="bg-layer"></div>
        </div>
    </div>

</header>



<!--------------- mobile menu Section start ------------------>

<div class="mobile-menu-footer d-lg-none">
    <ul class="d-flex align-items-center mobile-menu-active p-0 m-0">
        <li class="nav-link position-relative">
            <a class="<?php echo e(request()->is(@$storeinfo->slug) ? 'active' : ''); ?> <?php echo e(request()->is('/') ? 'active' : ''); ?>"
                href="<?php echo e(URL::to(@$storeinfo->slug)); ?>">
                <i class="fa-light fa-house"></i>
                <span class="act-8"><?php echo e(trans('labels.home')); ?></span>
            </a>
        </li>
        <li class="nav-link position-relative">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fa-light fa-search"></i>
                <span class="act-8"><?php echo e(trans('labels.search')); ?></span>
            </a>
        </li>
        <?php if(request()->route()->getName() == 'front.home'): ?>
            <li class="nav-link position-relative">
                <a href="javascript:void(0)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                    aria-controls="offcanvasBottom">
                    <i class="fa-light fa-box-archive"></i>
                    <span class="act-8"><?php echo e(trans('labels.menu')); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <li class="nav-link position-relative">
            <a href="<?php echo e(URL::to(@$storeinfo->slug . '/cart')); ?>"
                class="<?php echo e(request()->is(@$storeinfo->slug . '/cart') ? 'active' : ''); ?>">
                <i class="fa-light fa-bag-shopping position-relative">
                    <div class="cart-3 mx-2 d-lg-none " id="cartcount_mobile">
                        <?php echo e(helper::getcartcount($storeinfo->id, @Auth::user()->id)); ?></div>
                </i>
                <span><?php echo e(trans('labels.menu_cart')); ?></span>
            </a>
        </li>
        <li class="nav-link position-relative">
            <a href="javascript:void(0)" class="togl-btn text-dark toggle_button">
                <i class="fa-light fa-ellipsis-vertical fs-6"></i>
                <span><?php echo e(trans('labels.more')); ?></span>
            </a>
        </li>
    </ul>
</div>
<!--------------- mobile menu Section End ------------------>
<?php /**PATH /mnt/c/restro-saas/resources/views/front/theme/header.blade.php ENDPATH**/ ?>
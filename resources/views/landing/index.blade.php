@extends('landing.layout.default')
<!-- IF VERSION 2  -->
@if (helper::appdata('')->recaptcha_version == 'v2')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endif
<!-- IF VERSION 3  -->
@if (helper::appdata('')->recaptcha_version == 'v3')
    {!! RecaptchaV3::initJs() !!}
@endif
@section('content')
    <main>
        <!--------------------------------- home-banner start --------------------------------->
        <section id="home" class="home-banner my-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-12">
                        <div class="banner-content me-xl-5 me-lg-3 me-md-2">
                            <h1 class="banner-title text-primary">{{ trans('landing.hero_banner_title') }}</h1>
                            <p class="fw-normal mb-lg-5 mb-4 text-muted">{{ trans('landing.hero_banner_description') }}</p>
                            <div class="input-group gap-3 mb-lg-4 mb-3">
                                <a href="@if (env('Environment') == 'sendbox') {{ URL::to('/admin') }} @else {{ helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin') }} @endif"
                                    class="btn btn-secondary px-3 py-2 fw-500 fs-15 rounded"
                                    target="_blank">{{ trans('landing.get_started') }}</a>
                                <a href="@if (env('Environment') == 'sendbox') {{ URL::to('/admin') }} @else {{ helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin') }} @endif"
                                    class="btn border border-dark fw-500 fs-15 py-2 px-3 text-dark bg-transparent rounded"
                                    target="_blank">
                                    {{ trans('landing.buy_now') }}

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 d-none d-md-block">
                        <img src="{{ helper::image_path(helper::appdata('')->landing_home_banner) }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <!---------------------------------- home-banner end ---------------------------------->

        <!-------------------------------- work section start -------------------------------->
        @if (count($works) > 0)
            <section class="work bg-primary mb-5">
                <div class="container">
                    <div class="col-12">
                        <div class="work-content sec-title mb-5">
                            <h2 class="text-white">{{ helper::appdata('')->work_title }}</h2>
                            <p class="sub-title text-white">{{ helper::appdata('')->work_subtitle }}</p>
                        </div>
                        <div class="row g-3">
                            @foreach ($works as $key => $work)
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                    <div
                                        class="card h-100 border-0 rounded-0 pb-xl-5 @if ($key % 2 != 0) bg-secondary @endif">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <img class="card-img-top" src="{{ helper::image_path($work->image) }}"
                                                alt="" class="rounded-circle">
                                            <div class="numbers @if ($key % 2 != 0) text-white @endif">
                                                {{ $key + 1 }}</div>
                                        </div>
                                        <div class="card-body p-0 ms-3">
                                            <div
                                                class="border-start border-2 @if ($key % 2 == 0) border-secondary-color @elseif ($key % 2 != 0) border-white @endif ps-4 mb-xl-4 mb-lg-3">
                                                <h4 class="card-title @if ($key % 2 != 0) text-white @endif">
                                                    {{ $work->title }}</h4>
                                                <p
                                                    class="card-text @if ($key % 2 == 0) text-muted @elseif ($key % 2 != 0) text-white @endif fs-7 text-truncate-2">
                                                    {{ $work->sub_title }}</p>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0 bg-transparent">
                                            <a href="@if (env('Environment') == 'sendbox') {{ URL::to('/admin') }} @else {{ helper::appdata('')->vendor_register == 1 ? URL::to('/admin/register') : URL::to('/admin') }} @endif"
                                                class="border-bottom ms-4 fw-500 ms-lg-0 ms-xl-4 @if ($key % 2 != 0) text-white @endif"
                                                target="_blank">{{ trans('landing.get_started') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!---------------------------------- work section end ---------------------------------->

        <!--------------------------- Premium Features section start --------------------------->
        @if (count($features) > 0)
            <section id="features" class="premium-features-sec pb-5">
                <div class="container">
                    <div class="sec-title col-lg-6 text-strat mb-5">
                        <h2 class="">{{ trans('landing.premium_features') }}</h2>
                        <p class="sub-title">{{ trans('landing.premium_features_description') }}</p>
                    </div>
                    <div class="premium-features">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3">
                            @foreach ($features as $feature)
                                {{-- <div class="item px-2"> --}}
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="features-circle w-100 my-3">
                                                <img src="{{ url(env('ASSETSPATHURL') . 'admin-assets/images/feature/' . $feature->image) }}"
                                                    alt="">
                                            </div>
                                            <p class="features-card-title text-truncate-2 mb-3">{{ $feature->title }}</p>
                                            <span
                                                class="description text-truncate-3 mb-3">{{ $feature->description }}</span>
                                        </div>
                                        {{-- <div class="card-footer bg-transparent p-3 border-0">
                                            </div> --}}
                                    </div>
                                </div>
                                {{-- </div> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!---------------------------- Premium Features section end ---------------------------->


        <!--  Store Section Start -->

        @if (count($userdata) > 0)
            <section id="our-stores">
                <div class="card-section-bg-color pb-5">
                    <div class="container card-section-container">
                        <div class="sec-title  mb-5">
                            <h2>{{ trans('landing.our_partners') }}</h2>
                            <h5 class="sub-title">{{ trans('landing.our_partners_description') }}</h5>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2">

                            @foreach ($userdata as $user)
                                <div class="col">
                                    <a href="{{ URL::to($user->slug . '/') }}" target="_blank">
                                        <div class="card mx-1 rounded-4 h-100 border-0">
                                            <img src="{{ helper::image_path($user->cover_image) }}"
                                                class="card-img-top our_stores_images" alt="...">
                                            <div class="card-body px-0">
                                                <h5 class="card-title hotel-title">{{ $user->website_title }}</h5>
                                                <p class="hotel-subtitle text-muted text-truncate-2">
                                                    {{ $user->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ URL::to('stores') }}"
                                class="btn btn-secondary py-2 fw-500 px-3">{{ trans('landing.see_all') }} <i
                                    class="fa-solid {{ session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right' }} px-2"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!--  Store Section End -->

        <!------------------------------ Templates section start ------------------------------->
        @if (count($themes) > 0)
            <section class="template bg-primary py-5">
                <div class="container">
                    <div class="sec-title mb-5">
                        <h2 class="text-white">{{ trans('landing.awesome_templates') }}</h2>
                        <h5 class="sub-title text-white">{{ trans('landing.awesome_templates_description') }}</h5>
                    </div>
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-sm-4 g-3">
                        @foreach ($themes as $item)
                            <div class="col">
                                <div class="theme-img">
                                    <img src="{{ helper::image_path($item->image) }}" alt=""
                                        class="object-fit-cover h-100">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-------------------------------- Templates section end ------------------------------>

        <!------------------------------- plan section start ------------------------------->

        @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
            <section id="pricing-plans" class="our-plan pt-5">
                <div class="container">
                    <div class="sec-title mb-5">
                        <h2 class="text-capitalize">{{ trans('landing.pricing_plan_title') }}</h2>
                        <h5 class="sub-title">{{ trans('landing.pricing_plan_description') }}</h5>
                    </div>
                    <div class="row mb-3 plan">
                        @foreach ($planlist as $plan)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="card border-0 rounded-3 shadow mb-4 h-100">
                                    <div class="card-header bg-changer rounded-top-3 p-3 py-2">
                                        <p class="fw-semibold fs-4 m-0">{{ $plan->name }}</p>
                                    </div>
                                    <div class="card-body p-4">
                                        <h5 class="fw-semibold">{{ helper::currency_formate($plan->price, '') }}/
                                            @if ($plan->duration == 1)
                                                {{ trans('landing.one_month') }}
                                            @elseif($plan->duration == 2)
                                                {{ trans('landing.three_month') }}
                                            @elseif($plan->duration == 3)
                                                {{ trans('landing.six_month') }}
                                            @elseif($plan->duration == 4)
                                                {{ trans('landing.one_year') }}
                                            @elseif($plan->duration == 5)
                                                {{ trans('landing.lifetime') }}
                                            @elseif($plan->duration == null)
                                                {{ trans('landing.free') }}
                                            @endif
                                        </h5>
                                        <span class="fs-7">{{ $plan->description }}</span>
                                        <div class="plan-detals mt-4">
                                            <ul class="m-0 p-0 ">

                                                @php $features = explode('|', $plan->features); @endphp
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                    <span class="mx-2 fs-7">
                                                        {{ $plan->order_limit == -1 ? trans('landing.unlimited') : $plan->order_limit }}
                                                        {{ $plan->order_limit > 1 || $plan->order_limit == -1 ? trans('landing.products') : trans('landing.product') }}
                                                    </span>
                                                </li>
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                    <span class="mx-2 fs-7">
                                                        {{ $plan->appointment_limit == -1 ? trans('landing.unlimited') : $plan->appointment_limit }}
                                                        {{ $plan->appointment_limit > 1 || $plan->appointment_limit == -1 ? trans('landing.orders') : trans('landing.order') }}
                                                    </span>
                                                </li>
                                                @php
                                                    $themes = [];
                                                    if ($plan->themes_id != '' && $plan->themes_id != null) {
                                                        $themes = explode(',', $plan->themes_id);
                                                } @endphp
                                                <li class="d-flex align-items-start mb-3"> <i
                                                        class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                    <span class="mx-2 fs-7">{{ count($themes) }}
                                                        {{ count($themes) > 1 ? trans('landing.themes') : trans('landing.theme') }}</span>
                                                </li>

                                                @if ($plan->coupons == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">{{ trans('landing.coupons') }}</span>
                                                    </li>
                                                @endif

                                                @if ($plan->custom_domain == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.custome_domain_available') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->vendor_app == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.vendor_app_available') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->google_analytics == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">
                                                            {{ trans('landing.google_analytics_available') }}</span>
                                                    </li>
                                                @endif

                                                @if ($plan->blogs == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">{{ trans('landing.blogs') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->google_login == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">{{ trans('landing.google_login') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->facebook_login == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.facebook_login') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->sound_notification == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.sound_notification') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->whatsapp_message == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.whatsapp_message') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->telegram_message == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span
                                                            class="mx-2 fs-7">{{ trans('landing.telegram_message') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->pos == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">{{ trans('landing.pos') }}</span>
                                                    </li>
                                                @endif
                                                @if ($plan->pwa == 1)
                                                    <li class="d-flex align-items-start mb-3">
                                                        <i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5 "></i>
                                                        <span class="mx-2 fs-7">{{ trans('labels.pwa') }}</span>
                                                    </li>

                                                    {{-- <li class="mb-3 d-flex"> <i
                                                            class="fa-regular fa-circle-check text-success "></i>
                                                        <span class="mx-2 fs-7">{{ trans('labels.pwa') }}</span>
                                                    </li> --}}
                                                @endif
                                                @php $features = explode('|',$plan->features); @endphp
                                                @foreach ($features as $feature)
                                                    <li class="d-flex align-items-start mb-3"><i
                                                            class="fa-regular fa-circle-check text-secondary me-2 fs-5"></i>
                                                        <span class="mx-2 fs-7">{{ $feature }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-transparent py-4 px-4">
                                        <a href="{{ URL::to('/admin') }}"
                                            class="btn w-100 btn-secondary fw-500 fs-15 py-3">{{ trans('landing.subscribe') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-------------------------------- plan section end -------------------------------->

        <!-------------------------------- Trusted section start -------------------------------->
        <section class="trusted py-5">
            <div class="container bg-primary">
                <div class="row align-items-center justify-content-between trusted-box">
                    <div class="col-md-4 col-12 ps-0 d-none d-lg-block">
                        <img src="{{ url(env('ASSETSPATHURL') . 'landing/images/png/trusted.png') }}"
                            alt="digital connection images" class="w-100 object-fit-content">
                    </div>
                    <div class="col-md-7 col-12">
                        <div>
                            <h3 class="mb-4 text-center text-md-start trusted-title">{{ trans('landing.trusted_by') }}
                            </h3>
                            <div class="d-flex">
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="65">65</h2>
                                    <h3 class="num-title">{{ trans('landing.fun_fact_one') }}</h3>
                                </div>
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="10">10</h2>
                                    <h3 class="num-title">{{ trans('landing.fun_fact_two') }}</h3>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="275">275</h2>
                                    <h3 class="num-title">{{ trans('landing.fun_fact_three') }}</h3>
                                </div>
                                <div class="col-lg-6 col-md-10 col-6 mb-5 text-white border-start ps-2">
                                    <h2 class="num" data-val="60">60</h2>
                                    <h3 class="num-title">{{ trans('landing.fun_fact_four') }}</h3>
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
                    <h2 class="text-capitalize">{{ trans('landing.client_says') }}</h2>
                    <h5 class="sub-title">{{ trans('landing.client_says_description') }}</h5>
                </div>
                <div id="testimonila-owl" class="owl-carousel owl-theme mt-5">

                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="card bg-secondary border-0 rounded-0 p-md-5">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center justify-content-between d-block">
                                        <div class="col-lg-7 col-md-6">
                                            <div class="test-content">
                                                <i class="fa-solid fa-quote-left text-white"></i>
                                                <p class="text-truncate-3">{{ $testimonial->description }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 profile-circle mb-4 mb-md-0 mx-auto mx-md-0">
                                            <img src="{{ url(env('ASSETSPATHURL') . 'admin-assets/images/testimonials/' . $testimonial->image) }}"
                                                alt="user">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-transparent text-white">
                                    <h5 class="text-md-start text-center">{{ $testimonial->name }}</h5>
                                    <p class="text-md-start text-center fs-15">{{ $testimonial->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>
        <!------------------------------ testimonila section end ------------------------------>



        <!------------------------------ blog section end ------------------------------>
        @if (count($blogs) > 0)
            <section id="blog" class="blog py-5">
                <div class="container">
                    <div class="sec-title mb-5" data-aos="zoom-in" data-aos-easing="ease-out-cubic"
                        data-aos-duration="2000">
                        <h2 class="text-capitalize">{{ trans('landing.blogs') }}</h2>
                        <h5 class="sub-title"> {{ trans('landing.blog_desc') }}</h5>
                    </div>

                    <div id="blog-owl" class="owl-carousel owl-theme">

                        @foreach ($blogs as $blog)
                            <div class="item" data-aos="zoom-in" data-aos-easing="ease-out-cubic"
                                data-aos-duration="2000">
                                <a href="{{ URL::to('blog_details-' . $blog->id) }}">
                                    <div class="card border-0 rounded-0">
                                        <img class="card-img-top blog-image"
                                            src="{{ url(env('ASSETSPATHURL') . 'admin-assets/images/blog/' . $blog->image) }}"
                                            alt="">
                                        <div class="card-body px-0">
                                            <div class="d-flex align-items-start">
                                                <div>

                                                    <h4 class="card-title text-truncate-2">{{ $blog->title }}</h4>

                                                    <p class="card-text text-truncate-3">{!! Str::limit(@$blog->description, 100) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ URL::to('blog_list') }}"
                            class="btn btn-secondary mt-4 py-2 fs-15 fw-500 px-3">{{ trans('landing.see_all') }} <i
                                class="fa-solid {{ session()->get('direction') == 2 ? 'fa-arrow-left' : 'fa-arrow-right' }} px-2"></i></a>
                    </div>
                </div>
            </section>
        @endif
        <!------------------------------ blog section end ------------------------------>




        <!------------------------------ newsletter start ------------------------------>
        <section class="newsletter bg-primary mb-5">
            <div class="container text-center text-white">
                <div class="py-5">
                    <h2 class="py-4 m-0 newsletter-title">{{ trans('landing.subscribe_section_title_msg') }}</h2>
                    <h5 class="newsletter-subtitle col-xl-8 col-lg-10 col-auto m-auto text-white">
                        {{ trans('landing.subscribe_section_description') }}</h5>
                    <form action="{{ URL::to('emailsubscribe') }}" method="POST">
                        @csrf
                        <div class="col-xl-6 col-lg-7 col-md-10 mx-md-auto mt-5">
                            <div class="input-group d-flex gap-3 mb-2">
                                <input type="text" class="form-control rounded fs-6" placeholder="Enter your email"
                                    name="email" id="email" aria-label="Recipient's username"
                                    aria-describedby="subscribe_button" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                                    <h5>{{ trans('landing.contact_info') }}</h5>
                                    <p>{{ trans('landing.contact_info_msg') }}</p>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fa-solid fa-phone-volume me-4"></i>
                                    <p class="m-0">{{ helper::appdata('')->contact }}</p>
                                </div>
                                <div class="d-flex align-items-center mb-4">
                                    <i class="fa-solid fa-envelope me-4"></i>
                                    <p class="m-0">{{ helper::appdata('')->email }}</p>
                                </div>
                                <div class="d-flex align-items-start mb-4">
                                    <i class="fa-solid fa-location-dot me-4"></i>
                                    <p class="m-0">{{ helper::appdata('')->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 col-12">
                        <div class="sec-title col-12 mb-5">
                            <h2 class="text-capitalize">{{ trans('landing.contact_us') }}</h2>
                            <h5 class="sub-title">{{ trans('landing.contact_section_title') }}</h5>
                        </div>
                        <form class="row" action="{{ URL::to('inquiry') }}" method="POST">
                            @csrf
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="first_name"
                                    class="form-label fw-semibold fs-7">{{ trans('landing.first_name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-7 p-2" name="first_name" id="first_name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="last_name"
                                    class="form-label fw-semibold fs-7">{{ trans('landing.last_name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control fs-7 p-2" name="last_name" id="last_name"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="emaill" class="form-label fw-semibold fs-7">{{ trans('landing.email') }}
                                    <span class="text-danger">*</span></label>
                                <input type="email" class="form-control fs-7 p-2" name="emaill" id="emaill"
                                    required>
                            </div>
                            <div class="col-md-6 mb-4 mb-lg-5">
                                <label for="phone" class="form-label fw-semibold fs-7">{{ trans('landing.mobile') }}
                                    <span class="text-danger">*</span></label>
                                <input type="number" class="form-control fs-7 p-2" name="mobile" id="phone"
                                    onKeyPress="if(this.value.length==10) return false;" required>
                            </div>
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label for="Message" class="form-label fw-semibold fs-7">{{ trans('landing.message') }}
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control p-2 text-muted fs-7" rows="4" name="message" id="Message"
                                    placeholder="Write your message.." required></textarea>
                            </div>

                            @include('landing.layout.recaptcha')

                            <div class="col-12 d-flex justify-content-end">
                                <button class="m-0 btn btn-primary px-3 py-2 fw-500 fs-15"
                                    type="submit">{{ trans('landing.send_msg') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------------- Contact end ------------------------------->
    </main>
@endsection

@extends('front.theme.default')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="{{ URL::to(@$storeinfo->slug) }}"
                            class="text-dark">{{ trans('labels.home') }}</a></li>

                    <li
                        class="breadcrumb-item active {{ session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left' }}">
                        {{ trans('labels.top_deals') }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <section>
        <div class="background-black py-5">
            <div class="container">
                <div id="eapps-countdown-timer-1"
                    class="rounded eapps-countdown-timer eapps-countdown-timer-align-center eapps-countdown-timer-position-bottom-bar-floating eapps-countdown-timer-animation-none eapps-countdown-timer-theme-default eapps-countdown-timer-finish-button-show  eapps-countdown-timer-style-combined eapps-countdown-timer-style-blocks eapps-countdown-timer-position-bar eapps-countdown-timer-area-clickable eapps-countdown-timer-has-background">
                    <div class="eapps-countdown-timer-container d-flex">
                        <div class="eapps-countdown-timer-inner row g-md-3 g-5 flex-column flex-sm-row">
                            <div
                                class="eapps-countdown-timer-header d-flex col-sm-6 col-12 align-items-center justify-content-center justify-content-md-start">
                                <div
                                    class="eapps-countdown-timer-header-title {{ session()->get('direction') == 2 ? 'text-center text-md-end' : 'text-center text-md-start' }}">
                                    <div class="eapps-countdown-timer-header-title-text">
                                        <div class="page-title mb-1">
                                            {{ trans('labels.home_page_top_deals_title') }}
                                        </div>
                                        <div class="page-subtitle text-white line-limit-2 m-0">
                                            Special Offer 30% OFF 🔥 Lorem, ipsum dolor sit amet
                                            consectetur adipisicing elit. Enim tempora maiores.
                                            {{ trans('labels.home_page_top_deals_subtitle') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="eapps-countdown-timer-item-container col-sm-6 col-12">
                                <div id="countdown"
                                    class="{{ session()->get('direction') == 2 ? 'justify-content-center justify-content-start' : 'justify-content-md-end justify-content-center' }} gap-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-2 g-md-3 pt-4">
                @foreach ($topdealsproducts as $item)
                    @php
                        if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                            if ($item['variation']->count() > 0) {
                                if ($item['variation'][0]->price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                    $price =
                                        $item['variation'][0]->price - @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $item['variation'][0]->price;
                                }
                            } else {
                                if ($item->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                                    $price = $item->item_price - @helper::top_deals($storeinfo->id)->offer_amount;
                                } else {
                                    $price = $item->item_price;
                                }
                            }
                        } else {
                            if ($item['variation']->count() > 0) {
                                $price =
                                    $item['variation'][0]->price -
                                    $item['variation'][0]->price *
                                        (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            } else {
                                $price =
                                    $item->item_price -
                                    $item->item_price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
                            }
                        }
                        if ($item['variation']->count() > 0) {
                            $original_price = $item['variation'][0]->price;
                        } else {
                            $original_price = $item->item_price;
                        }
                        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
                    @endphp
                    @if (helper::appdata($storeinfo->id)->template_type == 1)
                        <div class="col-6 col-xl-3 col-lg-4">
                            <div class="card h-100 position-relative rounded">
                                <a href="{{ URL::to($storeinfo->slug . '/details-' . $item->slug) }}">
                                    <div class="overflow-hidden theme1grid_image p-2">
                                        <img src="@if (@$item['item_image']->image_url != null) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif"
                                            alt="" class="rounded">
                                        @if ($off > 0)
                                            <span
                                                class="offer-text rounded fw-500 text-bg-secondary fs-8">{{ $off }}%
                                                {{ trans('labels.off') }}</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="card-body p-2 p-md-3 pb-sm-0 ">
                                    @if (Auth::user() && Auth::user()->type == 3)
                                        <div class="favorite-icon set-fav1-{{ $item->id }}">
                                            @if ($item->is_favorite == 1)
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('{{ $storeinfo->id }}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')"><i
                                                        class="fa-solid fa-heart"></i></a>
                                            @else
                                                <a href="javascript:void(0)"
                                                    onclick="managefavorite('{{ $storeinfo->id }}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                    @if (App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                            App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1)
                                        @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
                                            @if (helper::appdata($storeinfo->id)->checkout_login_required == 1)
                                                <a class="fs-8 d-flex gap-1 align-items-center mb-1"
                                                    onclick="showreviews('{{ $item->id }}')" role="button"
                                                    aria-controls="offcanvasExample">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <p class="cursor-pointer fw-600 fs-8">
                                                        {{ number_format($item->avg_ratting, 1) }}</p>
                                                </a>
                                            @endif
                                        @endif
                                    @endif
                                    <a href="{{ URL::to($storeinfo->slug . '/details-' . $item->slug) }}"
                                        class="title pb-1">
                                        {{ $item->item_name }}
                                    </a>
                                </div>
                                <div class="card-footer bg-transparent border-0 p-2 pt-md-0 p-md-3 pt-0">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                        <div class="mb-2 mb-md-0">
                                            <div class="d-flex gap-1 flex-wrap align-items-center">
                                                <p class="price">
                                                    {{ helper::currency_formate($price, @$storeinfo->id) }}
                                                </p>
                                                @if ($item->item_original_price != null)
                                                    @if ($original_price > $price)
                                                        <del>{{ helper::currency_formate($original_price, @$storeinfo->id) }}</del>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                            <button
                                                class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                type="button"
                                                onclick="showitems('{{ $item->id }}','{{ $item->item_name }}','{{ $item->item_price }}')">
                                                <div class="addcartbtn-{{ $item->id }}">
                                                    <i class="fa-regular fa-plus"></i>
                                                    {{ trans('labels.add_to_cart') }}
                                                </div>
                                                <div class="load showload-{{ $item->id }}" style="display:none">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <div class="card thme1categories rounded dark h-100">
                                <a href="{{ URL::to($storeinfo->slug . '/details-' . $item->slug) }}">
                                    <img src="@if (@$item['item_image']->image_url != null) {{ @$item['item_image']->image_url }} @else {{ helper::image_path($item->image) }} @endif"
                                        class="card-img-top rounded" alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="text-section">
                                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                                            @if ($off > 0)
                                                <span
                                                    class="p-1 px-2 rounded fw-500 text-bg-secondary fs-8">{{ $off }}%
                                                    {{ trans('labels.off') }}</span>
                                            @endif
                                            @if (App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                                    App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1)
                                                @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                        App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
                                                    @if (helper::appdata($storeinfo->id)->checkout_login_required == 1)
                                                        <a class="fs-8 d-flex gap-1 align-items-center mb-1"
                                                            onclick="showreviews('{{ $item->id }}')" role="button"
                                                            aria-controls="offcanvasExample">
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                            <p class="cursor-pointer fw-600 fs-8">
                                                                {{ number_format($item->avg_ratting, 1) }}</p>
                                                        </a>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                        <a href="{{ URL::to($storeinfo->slug . '/details-' . $item->slug) }}"
                                            class="title pb-1 mt-2">{{ $item->item_name }}</a>
                                        <div class="d-flex align-items-baseline mt-2">
                                            <div class="products-price d-flex gap-2 align-items-center">
                                                <span class="price">
                                                    {{ helper::currency_formate($price, @$storeinfo->id) }}</span>
                                                @if ($item->item_original_price != null)
                                                    @if ($original_price > $price)
                                                        <del>{{ helper::currency_formate($original_price, @$storeinfo->id) }}</del>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div class="d-flex col-sm-auto justify-content-end align-items-center">
                                                <button
                                                    class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                    type="button"
                                                    onclick="showitems('{{ $item->id }}','{{ $item->item_name }}','{{ $item->item_price }}')">
                                                    <div class="addcartbtn-{{ $item->id }}">
                                                        <i class="fa-regular fa-plus"></i>
                                                        {{ trans('labels.add_to_cart') }}
                                                    </div>
                                                    <div class="load showload-{{ $item->id }}" style="display:none">
                                                    </div>
                                                </button>
                                            </div>
                                            @if (Auth::user() && Auth::user()->type == 3)
                                                <div class="favorite-icon1 p-0 set-fav1-{{ $item->id }}">
                                                    @if ($item->is_favorite == 1)
                                                        <a href="javascript:void(0)" class="text-secondary"
                                                            onclick="managefavorite('{{ $storeinfo->id }}','{{ $item->id }}',0,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')"><i
                                                                class="fa-solid fa-heart"></i></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="text-secondary"
                                                            onclick="managefavorite('{{ $storeinfo->id }}','{{ $item->id }}',1,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')"><i
                                                                class="fa-regular fa-heart"></i></a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <!-- blog detail section end -->
    @include('front.sum_qusction')
@endsection

@section('script')
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/top_deals.js') }}"></script>
@endsection

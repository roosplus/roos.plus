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
                        {{ trans('labels.favorites') }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- Favorites Section end -->
    <section class="bg-light mt-0 py-5 favorite-list">
        <div class="container">
            <div class="row gx-sm-3 gx-0">
                @include('front.theme.user_sidebar')
                <div class="col-md-12 col-lg-9">
                    <div class="card rounded">
                        <div class="card-body py-4">
                            <h2 class="page-title mb-0">{{ trans('labels.favourites') }}</h2>
                            <p class="page-subtitle my-2 line-limit-2">{{ trans('labels.loyalty_desc') }}</p>
                            @if (count($getfavoritelist) > 0)
                                <div class="row gy-3 gx-sm-3 gx-0 products-img">
                                    @foreach ($getfavoritelist as $itemdata)
                                        @php
                                            if (
                                                $itemdata->top_deals == 1 &&
                                                helper::top_deals($storeinfo->id) != null
                                            ) {
                                                if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
                                                    if ($itemdata['variation']->count() > 0) {
                                                        if (
                                                            $itemdata['variation'][0]->price >
                                                            @helper::top_deals($storeinfo->id)->offer_amount
                                                        ) {
                                                            $price =
                                                                $itemdata['variation'][0]->price -
                                                                @helper::top_deals($storeinfo->id)->offer_amount;
                                                        } else {
                                                            $price = $itemdata['variation'][0]->price;
                                                        }
                                                    } else {
                                                        if (
                                                            $itemdata->item_price >
                                                            @helper::top_deals($storeinfo->id)->offer_amount
                                                        ) {
                                                            $price =
                                                                $itemdata->item_price -
                                                                @helper::top_deals($storeinfo->id)->offer_amount;
                                                        } else {
                                                            $price = $itemdata->item_price;
                                                        }
                                                    }
                                                } else {
                                                    if ($itemdata['variation']->count() > 0) {
                                                        $price =
                                                            $itemdata['variation'][0]->price -
                                                            $itemdata['variation'][0]->price *
                                                                (@helper::top_deals($storeinfo->id)->offer_amount /
                                                                    100);
                                                    } else {
                                                        $price =
                                                            $itemdata->item_price -
                                                            $itemdata->item_price *
                                                                (@helper::top_deals($storeinfo->id)->offer_amount /
                                                                    100);
                                                    }
                                                }
                                                if ($itemdata['variation']->count() > 0) {
                                                    $original_price = $itemdata['variation'][0]->price;
                                                } else {
                                                    $original_price = $itemdata->item_price;
                                                }
                                                $off =
                                                    $original_price > 0
                                                        ? number_format(100 - ($price * 100) / $original_price, 1)
                                                        : 0;
                                            } else {
                                                if ($itemdata['variation']->count() > 0) {
                                                    $price = $itemdata['variation'][0]->price;
                                                    $original_price = $itemdata['variation'][0]->original_price;
                                                } else {
                                                    $price = $itemdata->item_price;
                                                    $original_price = $itemdata->item_original_price;
                                                }
                                                $off =
                                                    $original_price > 0
                                                        ? number_format(100 - ($price * 100) / $original_price, 1)
                                                        : 0;
                                            }
                                        @endphp
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card h-100 position-relative">
                                                <div class="overflow-hidden mobile-image p-2">
                                                    <a
                                                        href="{{ URL::to($storeinfo->slug . '/details-' . $itemdata->slug) }}">
                                                        <img src="@if (@$itemdata['item_image']->image_url != null) {{ @$itemdata['item_image']->image_url }} @else {{ helper::image_path($itemdata->image) }} @endif"
                                                            alt="" class="h-100">
                                                    </a>
                                                </div>
                                                <div class="card-body p-2 p-md-3 pb-0 pb-md-3">
                                                    <div class="d-flex align-items-center">
                                                        @if (Auth::user() && Auth::user()->type == 3)
                                                            <div class="set-fav-38 favorite-icon">
                                                                <div class="favorite-icon set-fav1-{{ $itemdata->id }}">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="removefavorite('{{ $storeinfo->id }}','{{ $itemdata->id }}',0,'{{ URL::to($storeinfo->slug . '/managefavorite') }}')">
                                                                        <i class="fa-solid fa-heart"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($off > 0)
                                                            <span
                                                                class="offer-text rounded fw-500 text-bg-secondary fs-8">{{ $off }}%
                                                                {{ trans('labels.off') }}</span>
                                                        @endif
                                                    </div>
                                                    @if (App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first() != null &&
                                                            App\Models\SystemAddons::where('unique_identifier', 'product_reviews')->first()->activated == 1)
                                                        @if (App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first() != null &&
                                                                App\Models\SystemAddons::where('unique_identifier', 'customer_login')->first()->activated == 1)
                                                            @if (helper::appdata($storeinfo->id)->checkout_login_required == 1)
                                                                <a class="fs-8 d-flex gap-1 align-items-center mb-1"
                                                                    onclick="showreviews('{{ $itemdata->id }}')"
                                                                    role="button" aria-controls="offcanvasExample">
                                                                    <i class="fa-solid fa-star text-warning"></i>
                                                                    <p class="cursor-pointer fw-600 fs-8">
                                                                        {{ number_format($itemdata->avg_ratting, 1) }}</p>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    <a href="{{ URL::to($storeinfo->slug . '/details-' . $itemdata->slug) }}"
                                                        class="title pb-1">{{ $itemdata->item_name }}</a>
                                                </div>
                                                <div class="card-footer bg-transparent border-0 p-2 p-md-3 pt-0 pt-md-3">
                                                    <div class="d-flex justify-content-between align-items-center gap-2">
                                                        <div class="mb-2 mb-md-0">
                                                            <div class="d-flex gap-1 flex-wrap align-items-center">
                                                                <p class="price">
                                                                    {{ helper::currency_formate($price, @$storeinfo->id) }}
                                                                </p>
                                                                @if ($itemdata->item_original_price != null)
                                                                    @if ($original_price > $price)
                                                                        <del>{{ helper::currency_formate($original_price, @$storeinfo->id) }}</del>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                                                            <button
                                                                class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                                                                type="button"
                                                                onclick="showitems('{{ $itemdata->id }}','{{ $itemdata->item_name }}','{{ $itemdata->item_price }}')">
                                                                <div class="addcartbtn-{{ $itemdata->id }}">
                                                                    <i class="fa-regular fa-plus"></i>
                                                                    {{ trans('labels.add_to_cart') }}
                                                                </div>
                                                                <div class="load showload-{{ $itemdata->id }}"
                                                                    style="display:none">
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $getfavoritelist->links() }}
                                </div>
                            @else
                                @include('front.nodata')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Favorites Section end -->

    @include('front.sum_qusction')
@endsection
@section('script')
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection

@php
    if ($itemdata->top_deals == 1 && helper::top_deals($storeinfo->id) != null) {
        if (@helper::top_deals($storeinfo->id)->offer_type == 1) {
            if ($itemdata['variation']->count() > 0) {
                if ($itemdata['variation'][0]->price > @helper::top_deals($storeinfo->id)->offer_amount) {
                    $price = $itemdata['variation'][0]->price - @helper::top_deals($storeinfo->id)->offer_amount;
                } else {
                    $price = $itemdata['variation'][0]->price;
                }
            } else {
                if ($itemdata->item_price > @helper::top_deals($storeinfo->id)->offer_amount) {
                    $price = $itemdata->item_price - @helper::top_deals($storeinfo->id)->offer_amount;
                } else {
                    $price = $itemdata->item_price;
                }
            }
        } else {
            if ($itemdata['variation']->count() > 0) {
                $price =
                    $itemdata['variation'][0]->price -
                    $itemdata['variation'][0]->price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
            } else {
                $price =
                    $itemdata->item_price -
                    $itemdata->item_price * (@helper::top_deals($storeinfo->id)->offer_amount / 100);
            }
        }
        if ($itemdata['variation']->count() > 0) {
            $original_price = $itemdata['variation'][0]->price;
        } else {
            $original_price = $itemdata->item_price;
        }
        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
    } else {
        if ($itemdata['variation']->count() > 0) {
            $price = $itemdata['variation'][0]->price;
            $original_price = $itemdata['variation'][0]->original_price;
        } else {
            $price = $itemdata->item_price;
            $original_price = $itemdata->item_original_price;
        }
        $off = $original_price > 0 ? round(100 - ($price * 100) / $original_price) : 0;
    }
@endphp
<div class="card h-100 position-relative rounded">
    <a href="{{ URL::to($storeinfo->slug . '/details-' . $itemdata->slug) }}">
        <div class="overflow-hidden theme1grid_image p-2">
            <img src="@if (@$itemdata['item_image']->image_url != null) {{ @$itemdata['item_image']->image_url }} @else {{ helper::image_path($itemdata->image) }} @endif"
                alt="" class="rounded">
            @if ($off > 0)
                <span
                    class="{{ session()->get('direction') == 2 ? 'offer-text-right' : 'offer-text' }} rounded fw-500 text-bg-secondary fs-8">{{ $off }}%
                    {{ trans('labels.off') }}</span>
            @endif
        </div>
    </a>
    <div class="card-body p-2 p-md-3 pb-sm-0 ">
        @if (Auth::user() && Auth::user()->type == 3)
            <div class="favorite-icon set-fav1-{{ $itemdata->id }}">
                @if ($itemdata->is_favorite == 1)
                    <a href="javascript:void(0)"
                        onclick="managefavorite('{{ $storeinfo->id }}','{{ $itemdata->id }}',0,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')">
                        <i class="fa-solid fa-heart"></i></a>
                @else
                    <a href="javascript:void(0)"
                        onclick="managefavorite('{{ $storeinfo->id }}','{{ $itemdata->id }}',1,'{{ URL::to($storeinfo->slug . '/managefavorite') }}','{{ request()->url() }}')">
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
                    <a class="fs-8 d-flex gap-1 align-items-center mb-1" onclick="showreviews('{{ $itemdata->id }}')"
                        role="button" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-star text-warning"></i>
                        <p class="cursor-pointer fw-600 fs-8">{{ number_format($itemdata->avg_ratting, 1) }}</p>
                    </a>
                @endif
            @endif
        @endif
        <a href="{{ URL::to($storeinfo->slug . '/details-' . $itemdata->slug) }}" class="title pb-1">
            {{ $itemdata->item_name }}
        </a>
    </div>
    <div class="card-footer bg-transparent border-0 p-2 pt-md-0 p-md-3 pt-0">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="mb-2 mb-md-0">
                <div class="d-flex gap-1 flex-wrap align-items-center">
                    <p class="price">
                        {{ helper::currency_formate($price, $vdata) }}
                    </p>
                    @if ($itemdata->item_original_price != null)
                        @if ($original_price > $price)
                            <del>{{ helper::currency_formate($original_price, $vdata) }}</del>
                        @endif
                    @endif
                </div>
            </div>
            <div class="d-flex col-sm-auto col-12 justify-content-end align-items-center">
                <button
                    class="btn-primary w-100 px-3 py-2 d-flex gap-2 fw-500 align-items-center justify-content-center fs-7 btn m-0"
                    type="button"
                    onclick="showitems('{{ $itemdata->id }}','{{ $itemdata->item_name }}','{{ $price }}')">
                    <div class="addcartbtn-{{ $itemdata->id }}">
                        <i class="fa-regular fa-plus"></i>
                        {{ trans('labels.add_to_cart') }}
                    </div>
                    <div class="load showload-{{ $itemdata->id }}" style="display:none">
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

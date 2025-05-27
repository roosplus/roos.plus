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
                        {{ trans('labels.search_products') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- Search Products section end -->
    @if (count($getsearchitems) > 0)
        <section class="bg-light py-5">
            <div class="container">
                <div class="row g-2 g-md-3 products-img" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000"
                    data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <h3 class="page-title mb-1">{{ trans('labels.search_products') }}</h3>
                    <p class="page-subtitle line-limit-2 mt-0">
                        {{ trans('labels.search_desc') }}
                    </p>
                    @foreach ($getsearchitems as $itemdata)
                        <div class="col-6 col-lg-3 theme1grid">
                            @include('front.productcommonview')
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        @include('front.sum_qusction')
    @else
        @include('front.nodata')
    @endif
    <!-- Search Products section end -->
@endsection
@section('script')
    <script src="{{ url(env('ASSETSPATHURL') . 'web-assets/js/custom/cart.js') }}" type="text/javascript"></script>
@endsection

@extends('front.theme.default')

@section('content')

<!-- breadcrumb start -->

{{-- <div class="breadcrumb-sec">

    <div class="container">

        <nav class="px-2">

            <h3 class="page-title text-white mb-2">{{trans('labels.refund_policy')}}</h3>

            <ol class="breadcrumb d-flex text-capitalize">

                <li class="breadcrumb-item"><a href="{{URL::to(@$storeinfo->slug)}}" class="text-white">{{trans('labels.home')}}</a></li>

                <li class="breadcrumb-item active {{session()->get('direction') == 2 ? 'breadcrumb-rtl' : ''}}">{{trans('labels.refund_policy')}}</li>

            </ol>

        </nav>

    </div>

</div> --}}
<section class="breadcrumb-sec">
    <div class="container">
        <nav class="px-3">
            <ol class="breadcrumb d-flex m-0 text-capitalize">
                <li class="breadcrumb-item"><a href="{{ URL::to(@$storeinfo->slug) }}"
                        class="text-dark">{{ trans('labels.home') }}</a></li>
                        
                <li class="breadcrumb-item active {{ session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left' }}">
                    {{trans('labels.refund_policy')}}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- breadcrumb end -->

<!-- refund Policy section end -->

@if($refund_policy != null)

<section class="theme-1-margin-top">

    <div class="container">

        <div class="details row">

            {!!@$refund_policy->refund_policy_content!!}

        </div>

    </div>

</section>

@else

    @include('front.nodata')

@endif
@include('front.sum_qusction')
<!-- refund Policy section end -->

@endsection
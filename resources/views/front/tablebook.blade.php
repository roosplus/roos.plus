@extends('front.theme.default')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-sec">
        <div class="container">
            <nav class="px-3">
                {{-- <h3 class="page-title text-white mb-2">{{trans('labels.table_book')}}</h3> --}}
                <ol class="breadcrumb d-flex m-0 text-capitalize">
                    <li class="breadcrumb-item"><a href="{{ URL::to(@$storeinfo->slug) }}"
                            class="text-dark">{{ trans('labels.home') }}</a></li>
                            
                    <li class="breadcrumb-item active {{ session()->get('direction') == 2 ? 'breadcrumb-item-right' : 'breadcrumb-item-left' }}">
                        {{ trans('labels.table_book') }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- contact section start -->
    <section class="my-5">
        <div class="container">
            <div class="row contact-form gx-sm-3 gx-0">
                <div class="col-lg-12 col-sm-12 col-auto mb-4 mb-lg-0">
                    <div class="card rounded-4 h-100 select-delivery ">
                        <form action="{{ URL::To(@$storeinfo->slug . '/book') }}" method="POST">
                            @csrf
                                {{-- <p class="page-subtitle px-2 mb-3 md-mb-5">
                                </p> --}}
                            <div class="card-body">
                                <div class="col-12">
                                    <h2 class="page-title m-0 px-2"> {{ trans('labels.table_book') }}</h2>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.event') }}<span class="text-danger"> *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="event"
                                                placeholder="{{ trans('labels.event') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.people') }}<span class="text-danger"> *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="people"
                                                placeholder="{{ trans('labels.people') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.event_date') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="date" class="form-control input-h" name="event_date"
                                                placeholder="{{ trans('labels.event_date') }}" min="{{ date('Y-m-d') }}"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.event_time') }}<span
                                                    class="text-danger"> * </span></label>
                                            <input type="time" class="form-control input-h" name="event_time"
                                                placeholder="{{ trans('labels.event_time') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="name"
                                                placeholder="{{ trans('labels.name') }}" required>
                                            <input type="hidden" name="vendor_id" value="{{ $vdata }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.email') }}<span class="text-danger"> *
                                                </span></label>
                                            <input type="text" class="form-control input-h" name="email"
                                                placeholder="{{ trans('labels.email') }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault"
                                                class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> *
                                                </span></label>
                                            <input type="number" class="form-control input-h" name="mobile"
                                                placeholder="{{ trans('labels.mobile') }}" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">{{ trans('labels.special_request') }}</label>
                                            <textarea class="form-control input-h" rows="5" aria-label="With textarea" name="notes"
                                                placeholder="{{ trans('labels.special_request') }}"></textarea>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn-primary btn rounded px-sm-4 px-3 py-2 fw-500 fs-15 mobile-viwe-btn">{{ trans('labels.submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section start -->
    @include('front.sum_qusction')
@endsection

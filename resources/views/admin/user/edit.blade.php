@extends('admin.layout.default')

@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>

    <div class="col-12 mb-7">

        <div class="card border-0 box-shadow">

            <div class="card-body">

                <form action="{{ URL::to('admin/users/update-' . $getuserdata->id) }}" method="post"
                    enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                     
                    <div class="form-group col-md-6">
                                <label for="store" class="form-label">{{ trans('labels.store_categories') }}<span
                                        class="text-danger">
                                        * </span></label>
                                <select name="store" class="form-select" required>
                                    <option value="">{{ trans('labels.select') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}"
                                            {{ $store->id == $getuserdata->store_id ? 'selected' : '' }}>
                                            {{ $store->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="col-sm-6 form-group">
                            <input type="hidden" value="{{ $getuserdata->id }}" name="id">
                            <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *
                                </span></label>
                            <input type="text" class="form-control" name="name" value="{{ $getuserdata->name }}"
                                placeholder="{{ trans('labels.name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">{{ trans('labels.email') }}<span class="text-danger"> *
                                </span></label>
                            <input type="email" class="form-control" name="email" value="{{ $getuserdata->email }}"
                                placeholder="{{ trans('labels.email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <div class="form-group">
                                <label class="form-label">{{ trans('labels.mobile') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="number" class="form-control" name="mobile"
                                    value="{{ $getuserdata->mobile }}" placeholder="{{ trans('labels.mobile') }}"
                                    required>
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">{{ trans('labels.image') }} (250 x 250) </label>
                            <input type="file" class="form-control" name="profile">
                            <img class="rounded-circle mb-2 mt-1" src="{{ helper::image_path($getuserdata->image) }}"
                                alt="" width="70" height="70">
                            @error('profile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city" class="form-label">{{ trans('labels.city') }}<span
                                    class="text-danger"> * </span></label>
                            <select name="city" class="form-select" id="city" required>
                                <option value="">{{ trans('labels.select') }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $city->id == $getuserdata->city_id ? 'selected' : '' }}>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="area" class="form-label">{{ trans('labels.area') }}<span class="text-danger">
                                    * </span></label>
                            <select name="area" class="form-select" id="area" required>
                                <option value="">{{ trans('labels.select') }}</option>
                            </select>
                        </div>
                        @if (App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first() != null &&
                                App\Models\SystemAddons::where('unique_identifier', 'unique_slug')->first()->activated == 1)
                            <div class="form-group">
                                <label for="basic-url" class="form-label">{{ trans('labels.personlized_link') }}<span
                                        class="text-danger"> * </span></label>
                                @if (env('Environment') == 'sendbox')
                                    <span class="badge badge bg-danger ms-2 mb-0">{{ trans('labels.addon') }}</span>
                                @endif
                                <div class="input-group ">
                                    <span
                                        class="input-group-text col-5 col-lg-auto overflow-x-auto {{ session()->get('direction') == 2 ? 'rounded-start-0 rounded-end-5' : 'rounded-start-5 rounded-end-0' }}">{{ URL::to('/') }}/</span>
                                    <input type="text" class="form-control {{ session()->get('direction') == 2 ? 'rounded-end-0 rounded-start-5' : 'rounded-start-0 rounded-end-5' }}" id="slug" name="slug"
                                        value="{{ $getuserdata->slug }}" required>
                                </div>
                            </div>
                        @endif
                        <div class=" col-sm-6">
                            @if (App\Models\SystemAddons::where('unique_identifier', 'allow_without_subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'allow_without_subscription')->first()->activated == 1)
                                <div class="form-group" id="plan">
                                    @php
                                        $plan = helper::plandetail(@$getuserdata->plan_id);
                                    @endphp
                                    <div class="d-flex">
                                        <input class="form-check-input mx-1" type="checkbox" name="plan_checkbox"
                                            id="plan_checkbox">
                                        <div>
                                            <label for="plan_checkbox"
                                                class="form-label">{{ trans('labels.assign_plan') }}</label>&nbsp;<span>({{ trans('labels.current_plan') }}&nbsp;:&nbsp;</span>
                                            <span class="fw-500"> {{ !empty($plan) ? $plan->name : '-' }})</span>
                                            @if (env('Environment') == 'sendbox')
                                                <span
                                                    class="badge badge bg-danger ms-2 mb-0">{{ trans('labels.addon') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <select name="plan" id="selectplan" class="form-select" disabled>
                                        <option value="">{{ trans('labels.select') }}</option>
                                        @foreach ($getplanlist as $plan)
                                            @if ($plan->vendor_id != '' && $plan->vendor_id != null)
                                                @if (in_array($getuserdata->id, explode('|', $plan->vendor_id)))
                                                    <option value="{{ $plan->id }}" {{$getuserdata->plan_id == $plan->id ? 'selected' : ''}}>
                                                        {{ $plan->name }}
                                                    </option>
                                                @endif
                                            @else
                                                <option value="{{ $plan->id }}" {{$getuserdata->plan_id == $plan->id ? 'selected' : ''}}>
                                                    {{ $plan->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                              

                                <div class="form-group d-flex">
                                    <input class="form-check-input mx-1" type="checkbox" name="allow_store_subscription"
                                        id="allow_store_subscription" @if ($getuserdata->allow_without_subscription == '1') checked @endif>
                                    <div>
                                        <label class="form-check-label"
                                            for="allow_store_subscription">{{ trans('labels.allow_store_without_subscription') }}
                                        </label>
                                        @if (env('Environment') == 'sendbox')
                                            <span class="badge badge bg-danger ms-2">{{ trans('labels.addon') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="form-group d-flex">
                                <input class="form-check-input mx-1" type="checkbox" name="show_landing_page"
                                    id="show_landing_page" @if ($getuserdata->available_on_landing == '1') checked @endif><label
                                    class="form-check-label"
                                    for="show_landing_page">{{ trans('labels.display_store_on_landing') }}</label>

                            </div>
                        </div>
                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                            <a href="{{ URL::to('admin/users') }}"
                                class="btn btn-danger px-4 rounded-start-5 rounded-end-5">{{ trans('labels.cancel') }}</a>
                            <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">{{ trans('labels.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        var areaurl = "{{ URL::to('admin/getarea') }}";
        var select = "{{ trans('labels.select') }}";
        var areaid = "{{ $getuserdata->area_id }}";
    </script>
    <script src="{{ url('storage/app/public/admin-assets/js/user.js') }}"></script>
@endsection

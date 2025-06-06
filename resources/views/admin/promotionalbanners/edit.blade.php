@extends('admin.layout.default')

@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="col-12 mt-3 mb-7">

        <div class="card border-0 box-shadow">

            <div class="card-body">

                <form action="{{ URL::to('/admin/promotionalbanners/update-' . $banner->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">{{ trans('labels.vendor_title') }}<span class="text-danger"> *
                                </span></label>
                            <select class="form-select" name="vendor" id="" required>
                                <option value="">{{ trans('labels.select') }}</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $vendor->id == $banner->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vendor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">{{ trans('labels.image') }} <span class="text-danger"> *
                                </span></label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ helper::image_path($banner->image) }}" class="hight-50 mt-2 rounded-3 object-fit-cover"
                                alt="">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">

                        <a href="{{ URL::to('admin/promotionalbanners') }}"
                            class="btn btn-danger px-4 rounded-start-5 rounded-end-5">{{ trans('labels.cancel') }}</a>

                        <button
                            @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                            class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">{{ trans('labels.save') }}</button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection

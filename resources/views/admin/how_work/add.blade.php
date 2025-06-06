@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12">
            <h5 class="pages-title fs-2">{{ trans('labels.add_new') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <form action="{{ URL::to('/admin/how_works/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ trans('labels.title') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    placeholder="{{ trans('labels.title') }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">{{ trans('labels.sub_title') }}<span class="text-danger"> *
                                    </span></label>
                                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}"
                                    placeholder="{{ trans('labels.sub_title') }}" required>
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (Auth::user()->type == 1)
                                <div class="form-group  col-md-12">
                                    <label class="form-label">{{ trans('labels.image') }}<span class="text-danger"> *
                                        </span></label>
                                    <input type="file" class="form-control" name="image" required>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">
                            <a href="{{ URL::to('admin/how_works') }}"
                                class="btn btn-danger px-4 rounded-start-5 rounded-end-5">{{ trans('labels.cancel') }}</a>
                            <button
                                @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="submit" @endif
                                class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">{{ trans('labels.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

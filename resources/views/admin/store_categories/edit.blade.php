@extends('admin.layout.default')

@section('content')

<div class="row justify-content-between align-items-center mb-3">
    <div class="col-12 col-md-4">
        <h5 class="pages-title fs-2">{{ trans('labels.edit') }}</h5>
        <div class="d-flex">
            @include('admin.layout.breadcrumb')
        </div>
    </div>

</div>



        <div class="col-12 mb-7">

            <div class="card border-0 box-shadow">

                <div class="card-body">

                    <form action="{{ URL::to('admin/store_categories/update-' . $editcategory->id) }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="form-group">

                                <label class="form-label">{{ trans('labels.name') }}<span class="text-danger"> *

                                    </span></label>

                                <input type="text" class="form-control" name="category_name"

                                    value="{{ $editcategory->name }}" placeholder="{{ trans('labels.name') }}" required>

                              
                            </div>

                            <div class="form-group m-0 mt-2 d-flex gap-2 justify-content-end">

                                <a href="{{ URL::to('admin/store_categories') }}" class="btn btn-danger px-4 rounded-start-5 rounded-end-5">{{

                                    trans('labels.cancel') }}</a>

                                <button class="btn btn-secondary px-4 rounded-start-5 rounded-end-5" @if (env('Environment') == 'sendbox') type="button"

                                    onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save')

                                    }}</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>


@endsection
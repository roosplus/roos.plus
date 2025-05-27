@extends('admin.layout.default')
@section('content')
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-12 col-md-4">
            <h5 class="pages-title fs-2">{{ trans('labels.users') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-end gap-2">
                @if (App\Models\SystemAddons::where('unique_identifier', 'vendor_import')->first() != null &&
                        App\Models\SystemAddons::where('unique_identifier', 'vendor_import')->first()->activated == 1)
                    <a href="{{ URL::to('admin/users/import') }}"
                        class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                        <i class="fa-solid fa-file-import mx-1"></i>{{ trans('labels.import') }}</a>
                @endif

                @if ($getuserslist->count() > 0)
                    <a href="{{ URL::to('admin/users/exportvendor') }}"
                        class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                        <i class="fa-solid fa-file-export mx-1"></i>{{ trans('labels.export') }}</a>
                @endif
                <a href="{{ URL::to('admin/users/add') }}" class="btn btn-secondary px-4 rounded-start-5 rounded-end-5">
                    <i class="fa-regular fa-plus mx-1"></i>
                    {{ trans('labels.add') }}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-7">
            <div class="card border-0 box-shadow">
                <div class="card-body">
                    <div class="table-responsive" id="table-display">
                        <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                            <thead>
                                <tr class="fw-500 fs-15">
                                    <td>{{ trans('labels.srno') }}</td>
                                    <td>{{ trans('labels.image') }}</td>
                                    <td>{{ trans('labels.name') }}</td>
                                    <td>{{ trans('labels.email') }}</td>
                                    <td>{{ trans('labels.mobile') }}</td>
                                    <td>{{ trans('labels.status') }}</td>
                                    <td>{{ trans('labels.created_date') }}</td>
                                    <td>{{ trans('labels.updated_date') }}</td>
                                    <td>{{ trans('labels.action') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($getuserslist as $user)
                                    <tr class="fs-7 align-middle">
                                        <td>@php echo $i++; @endphp</td>
                                        <td> <img src="{{ helper::image_path($user->image) }}"
                                                class="img-fluid rounded hw-50" alt="" srcset=""> </td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->mobile }} </td>
                                        <td>
                                            @if ($user->is_available == 1)
                                                <a class="btn btn-sm btn-success btn-size"
                                                    tooltip="{{ trans('labels.active') }}"
                                                    @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/users/status-' . $user->slug . '/2') }}')" @endif><i
                                                        class="fa-sharp fa-solid fa-check"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-danger btn-xmark"
                                                    tooltip="{{ trans('labels.in_active') }}"
                                                    @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/users/status-' . $user->slug . '/1') }}')" @endif><i
                                                        class="fa-sharp fa-solid fa-xmark"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ helper::date_format($user->created_at, Auth::user()->id) }}<br>
                                            {{ helper::time_format($user->created_at, Auth::user()->id) }}

                                        </td>
                                        <td>{{ helper::date_format($user->updated_at, Auth::user()->id) }}<br>
                                            {{ helper::time_format($user->updated_at, Auth::user()->id) }}

                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-sm btn-info btn-size"
                                                    tooltip="{{ trans('labels.edit') }}"
                                                    href="{{ URL::to('admin/users/edit-' . $user->id) }}">
                                                    <i class="fa fa-pen-to-square"></i>
                                                </a>
                                                <a class="btn btn-sm btn-dark btn-size"
                                                    tooltip="{{ trans('labels.login') }}"
                                                    href="{{ URL::to('admin/users/login-' . $user->slug) }}">
                                                    <i class="fa-regular fa-arrow-right-to-bracket"></i>
                                                </a>
                                                <a class="btn btn-sm btn-primary btn-size"
                                                    tooltip="{{ trans('labels.view') }}"
                                                    href="{{ URL::to('/' . $user->slug) }}" target="_blank">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>

                                                <a href="javascript:void(0)" tooltip="{{ trans('labels.delete') }}"
                                                    @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="statusupdate('{{ URL::to('admin/users/delete-' . $user->slug) }}')" @endif
                                                    class="btn btn-sm btn-danger btn-size">
                                                    <i class="fa-regular fa-trash"></i>
                                                </a>
                                                @if (App\Models\SystemAddons::where('unique_identifier', 'store_clone')->first() != null &&
                                                        App\Models\SystemAddons::where('unique_identifier', 'store_clone')->first()->activated == 1)
                                                    <a href="{{ URL::to('admin/users/add-' . $user->id) }}"
                                                        tooltip="{{ trans('labels.clone') }}"
                                                        class="btn btn-warning btn-size btn-sm">
                                                        <i class="fa-regular fa-clone"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

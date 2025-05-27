@extends('admin.layout.default')
@php
    if (Auth::user()->type == 4) {
        $vendor_id = Auth::user()->vendor_id;
    } else {
        $vendor_id = Auth::user()->id;
    }
@endphp
@section('content')
    <div class="row flex-wrap justify-content-between align-items-center">
        <div class="col-12 col-xl-4">
            <h5 class="pages-title fs-2">{{ trans('labels.transaction') }}</h5>
            @include('admin.layout.breadcrumb')
        </div>
        <div class="col-12 col-xl-8">
            <form action="{{ URL::to('/admin/transaction') }} " method="get">
                <div class="input-group ps-0 align-items-center justify-content-end gap-2">
                    @if (Auth::user()->type == 1)
                        <select class="form-select py-2 transaction-select rounded-5" name="vendor">
                            <option value=""
                                data-value="{{ URL::to('/admin/transaction?vendor=' . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                selected>{{ trans('labels.select') }}</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}"
                                    data-value="{{ URL::to('/admin/transaction?vendor=' . $vendor->id . '&startdate=' . request()->get('startdate') . '&enddate=' . request()->get('enddate')) }}"
                                    {{ request()->get('vendor') == $vendor->id ? 'selected' : '' }}>
                                    {{ $vendor->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    <div class="input-group-append col-sm-auto col-12">
                        <input type="date" class="form-control rounded-5 py-2 px-4 bg-white mb-0" name="startdate"
                            value="{{ request()->get('startdate') }}">
                    </div>
                    <div class="input-group-append col-sm-auto col-12 ">
                        <input type="date" class="form-control py-2 rounded-5 px-4 bg-white mb-0" name="enddate"
                            value="{{ request()->get('enddate') }}">
                    </div>
                    <div class="input-group-append col-sm-auto col-12">
                        <button class="btn btn-secondary px-4 py-2 rounded-start-5 rounded-end-5 w-100 fs-15"
                            type="submit">{{ trans('labels.fetch') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 mb-7 mt-3">
        <div class="card border-0 box-shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered py-3 zero-configuration w-100">
                        <thead>
                            <tr class="fw-500 fs-15">
                                <td>{{ trans('labels.srno') }}</td>
                                @if (Auth::user()->type == '1')
                                    <td>{{ trans('labels.name') }}</td>
                                @endif
                                <td>{{ trans('labels.plan_name') }}</td>
                                <td>{{ trans('labels.amount') }}</td>
                                <td>{{ trans('labels.payment_type') }}</td>
                                <td>{{ trans('labels.purchase_date') }}</td>
                                <td>{{ trans('labels.expire_date') }}</td>
                                <td>{{ trans('labels.status') }}</td>
                                <td>{{ trans('labels.created_date') }}</td>
                                <td>{{ trans('labels.updated_date') }}</td>
                                <td>{{ trans('labels.action') }}</td>

                            </tr>
                        </thead>
                        <tbody>
                            @php

                                $i = 1;

                            @endphp
                            @foreach ($transaction as $transaction)
                                <tr class="fs-7 align-middle">
                                    <td>@php echo $i++; @endphp</td>
                                    @if (Auth::user()->type == '1')
                                        <td>{{ $transaction['vendor_info']->name }}</td>
                                    @endif
                                    <td>{{ @$transaction['plan_info']->name }}</td>
                                    <td>{{ helper::currency_formate($transaction->grand_total, '') }}</td>
                                    <td>
                                        @if ($transaction->payment_type != '')
                                            @if ($transaction->payment_type == 0)
                                                {{ trans('labels.manual') }}
                                            @else
                                                {{ @helper::getpayment($transaction->payment_type, 1)->payment_name }}
                                            @endif
                                        @elseif($transaction->amount == 0)
                                            -
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaction->payment_type == 6 || $transaction->payment_type == 1)
                                            @if ($transaction->status == 2)
                                                <span
                                                    class="badge bg-success">{{ helper::date_format($transaction->purchase_date, $vendor_id) }}</span>
                                            @else
                                                -
                                            @endif
                                        @else
                                            <span
                                                class="badge bg-success">{{ helper::date_format($transaction->purchase_date, $vendor_id) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaction->payment_type == 6 || $transaction->payment_type == 1)
                                            @if ($transaction->status == 2)
                                                <span
                                                    class="badge bg-danger">{{ $transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $vendor_id) : '-' }}</span>
                                            @else
                                                -
                                            @endif
                                        @else
                                            <span
                                                class="badge bg-danger">{{ $transaction->expire_date != '' ? helper::date_format($transaction->expire_date, $vendor_id) : '-' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaction->payment_type == 6 || $transaction->payment_type == 1)
                                            @if ($transaction->status == 1)
                                                <span class="badge bg-warning">{{ trans('labels.pending') }}</span>
                                            @elseif ($transaction->status == 2)
                                                <span class="badge bg-success">{{ trans('labels.accepted') }}</span>
                                            @elseif ($transaction->status == 3)
                                                <span class="badge bg-danger">{{ trans('labels.rejected') }}</span>
                                            @else
                                                -
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ helper::date_format($transaction->created_at, $vendor_id) }}<br>
                                        {{ helper::time_format($transaction->created_at, $vendor_id) }}

                                    </td>
                                    <td>{{ helper::date_format($transaction->updated_at, $vendor_id) }}<br>
                                        {{ helper::time_format($transaction->updated_at, $vendor_id) }}

                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            @if (Auth::user()->type == '1')
                                                @if ($transaction->payment_type == 6 || $transaction->payment_type == 1)
                                                    @if ($transaction->status == 1)
                                                        <a class="btn btn-sm btn-success btn-size"
                                                            tooltip="{{ trans('labels.accept') }}"
                                                            onclick="statusupdate('{{ URL::to('admin/transaction-' . $transaction->id . '-2') }}')"><i
                                                                class="fas fa-check"></i></a>

                                                        <a class="btn btn-sm btn-danger btn-size"
                                                            tooltip="{{ trans('labels.cancel') }}"
                                                            onclick="statusupdate('{{ URL::to('admin/transaction-' . $transaction->id . '-3') }}')"><i
                                                                class="fas fa-close"></i></a>
                                                    @endif
                                                @endif
                                            @endif
                                            <a class="btn btn-sm btn-dark btn-size" tooltip="{{ trans('labels.view') }}"
                                                href="{{ URL::to('admin/transaction/plandetails-' . $transaction->id) }}"><i
                                                    class="fa-regular fa-eye"></i></a>
                                            <a href="{{ URL::to('/admin/transaction/generatepdf-' . $transaction->id) }}"
                                                tooltip="{{ trans('labels.downloadpdf') }}"
                                                class="btn btn-danger btn-sm btn-size">
                                                <i class="fa-solid fa-file-pdf"></i>
                                            </a>
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
@endsection

@extends('admin.layout.auth_default')
@section('content')

    <body class="bg-white">
        <div class="wrapper">
            <section>
                <div class="row justify-content-center align-items-center g-0 h-100vh">
                    <div class="col-lg-4 col-12 bg-white">
                        <div class="row horizontal-schroll g-0 vh-100 d-flex justify-content-center align-items-center">
                            <div class="p-4">
                                <div class="card overflow-hidden border-0 w-100 bg-transparent">
                                    <div class="card-body pt-4">
                                        <h4 class="fw-bold text-dark fs-1 pb-0 mb-0">{{ trans('labels.welcome_back') }}</h4>
                                        @if (helper::appdata('')->vendor_register == 1)
                                            <div class="d-flex align-items-center py-3">
                                                <p class="fs-7 text-center fw-500 text-muted">
                                                    {{ trans('labels.dont_have_account') }}</p>
                                                <a href="{{ URL::to('admin/register') }}"
                                                    class="text-primary fw-semibold px-1">{{ trans('labels.register') }}</a>
                                            </div>
                                        @endif
                                        <form class="my-3" method="POST"
                                            action="{{ URL::to('admin/checklogin-normal') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email" class="form-label">{{ trans('labels.email') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="email" class="form-control extra-padding" name="email"
                                                    id="email" placeholder="{{ trans('labels.email') }}" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="form-label">{{ trans('labels.password') }}<span
                                                        class="text-danger"> * </span></label>
                                                <input type="password" class="form-control extra-padding" name="password"
                                                    id="password" placeholder="{{ trans('labels.password') }}" required>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="text-end mb-1">
                                                <a href="{{ URL::to('admin/forgot_password?redirect=admin') }}"
                                                    class="fs-8 fw-600">
                                                    <i
                                                        class="fa-solid fa-lock-keyhole mx-2 fs-7"></i>{{ trans('labels.forgot_password') }}?
                                                </a>
                                            </div>
                                            <div class="row align-items-center g-2">
                                                <div class="">
                                                    <button class="btn btn-primary mt-2 w-100"
                                                        type="submit">{{ trans('labels.login') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                        @if (env('Environment') == 'sendbox')
                                            <div class="form-group mt-3">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Admin<br>admin@gmail.com</td>
                                                            <td>123456</td>
                                                            <td><button class="btn btn-info btn-sm"
                                                                    onclick="fillData('admin@gmail.com','123456')">{{ trans('labels.copy') }}</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vendor<br>theme1@yopmail.com</td>
                                                            <td>123456</td>
                                                            <td><button class="btn btn-info btn-sm"
                                                                    onclick="fillData('theme1@yopmail.com','123456')">{{ trans('labels.copy') }}</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row align-items-center g-2">
                                                @if (env('Environment') == 'sendbox')
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-1') }}"
                                                            target="_blank">Chicken Shop</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-2') }}"
                                                            target="_blank">The Pizza</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-3') }}"
                                                            target="_blank">Burger Shop</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-4') }}"
                                                            target="_blank">Cake Shop</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-5') }}"
                                                            target="_blank">Cafe Amore</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-6') }}"
                                                            target="_blank">Scoop Haven</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-7') }}"
                                                            target="_blank">Bar Bliss</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-8') }}"
                                                            target="_blank">The Kitchens</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a class="btn btn-dark mt-2 w-100" href="{{ URL::to('/theme-9') }}"
                                                            target="_blank">Tea Shop</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <a class="btn btn-dark mt-2 w-100"
                                                            href="{{ URL::to('/theme-10') }}" target="_blank">The
                                                            Chocolate</a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 d-none d-lg-block">
                        <div class="vh-100 d-flex justify-content-center align-items-center m-auto">
                            <img src="{{ helper::image_path(helper::appdata('')->auth_page_image) }}" alt=""
                                class="formimg">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
    @section('scripts')
        <script>
            function fillData(email, password) {
                "use strict";
                $('#email').val(email);
                $('#password').val(password);
            }
        </script>
    @endsection

<footer>
    <div class="footer-bg-color">
        <div class="container">
            <div class="footer-contain pt-3 row justify-content-between">
                <div class="col-md-12 col-xl-4">
                    <div class="logo">
                        <a href="#"><img src="{{ helper::image_path(helper::appdata('')->logo) }}"
                                alt="logo"></a>
                    </div>
                    <p class="footer-contain my-4">
                        {{ trans('landing.footer_description') }}
                    </p>
                </div>
                <div class="col-xl-7 col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-6 footer-contain">
                            <p class="footer-title mb-3">{{ trans('landing.about_us') }}</p>
                            <p class="mb-2"><a href="{{ URL::to('/#home') }}">{{ trans('landing.home') }}</a></p>
                            <p class="mb-2"><a href="{{ URL::to('/#features') }}">{{ trans('landing.features') }}</a>
                            </p>
                            @if (App\Models\SystemAddons::where('unique_identifier', 'subscription')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'subscription')->first()->activated == 1)
                                <p class="mb-2"><a
                                        href="{{ URL::to('/#pricing-plans') }}">{{ trans('landing.pricing_plan') }}</a>
                                </p>
                            @endif
                            @if (App\Models\SystemAddons::where('unique_identifier', 'blog')->first() != null &&
                                    App\Models\SystemAddons::where('unique_identifier', 'blog')->first()->activated == 1)
                                <p class="mb-2"><a href="{{ URL::to('blog_list') }}">{{ trans('landing.blogs') }}</a>
                                </p>
                            @endif
                            <p class="mb-1"><a href="#contect-us">{{ trans('landing.contact_us') }}</a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-6 footer-contain">
                            <p class="footer-title mb-3">{{ trans('landing.other_pages') }}</p>
                            <p class="mb-2"><a
                                    href="{{ URL::to('privacy_policy') }}">{{ trans('landing.privacy_policy') }}</a>
                            </p>
                            <p class="mb-2"><a
                                    href="{{ URL::to('refund_policy') }}">{{ trans('landing.refund_policy') }}</a></p>
                            <p class="mb-2"><a
                                    href="{{ URL::to('terms_condition') }}">{{ trans('landing.terms_condition') }}</a>
                            </p>
                            <p class="mb-2"><a href="{{ URL::to('about_us') }}">{{ trans('landing.about_us') }}</a>
                            </p>
                            <p class="mb-2"><a href="{{ URL::to('faqs') }}">{{ trans('landing.faqs') }}</a></p>
                            <p class="mb-2"><a
                                    href="{{ URL::to('/#our-stores') }}">{{ trans('landing.our_stores') }}</a></p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-12 footer-contain">
                            <p class="footer-title mb-3">{{ trans('landing.help') }}</p>
                            <p class="mb-2">
                                <a
                                    href="mailto:{{ helper::appdata('')->email }}" class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-envelope fs-15"></i>
                                    {{ helper::appdata('')->email }}
                                </a>
                            </p>
                            <p class="mb-2">
                                <a
                                    href="tel:{{ helper::appdata('')->contact }}" class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-phone fs-15"></i>
                                    {{ helper::appdata('')->contact }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 align-items-end justify-content-between mt-0 mt-md-4">
                <!-- Payment card -->
                <div class="col-sm-7 col-md-6 col-lg-4">
                    <h5 class="mb-2 text-white fw-bold">Payment methods &amp;
                        Security</h5>
                    <ul class="list-inline mb-0 mt-3 d-flex flex-wrap gap-2">
                        @foreach (helper::getallpayment(1) as $payment)
                            <li class="list-inline-item m-0">
                                <img src="{{ helper::image_path($payment->image) }}" class="h-30px" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Social media icon -->
                <div class="col-sm-5 col-md-6 col-lg-3 social-media text-sm-end">
                    <h5 class="mb-2 fw-bold text-white">Follow us on</h5>
                    <ul class="list-inline mb-0 mt-3  d-flex flex-wrap gap-2 justify-content-sm-end">
                        @foreach (@helper::getsociallinks(1) as $links)
                            <li class="list-inline-item m-0">
                                <a href="{{ $links->link }}" target="_blank"
                                    class="btn-social mb-0 fb">{!! $links->icon !!}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr class="text-white">
            <div class="copyright-sec row justify-content-between align-items-center">
                <p class="m-0 text-white col-12 fs-7 text-center">
                    {{ helper::appdata('')->copyright }}</p>

                {{-- <div
                    class="col-12 col-md-4 d-flex flex-wrap justify-content-md-end justify-content-center mt-2 mt-md-0">
                    <div class="social-icon d-flex d-grid gap-3">
                        @foreach (@helper::getsociallinks(1) as $links)
                            <a href="{{ $links->link }}" target="_blank"
                                class="social-rounded fb p-0">{!! $links->icon !!}</a>
                        @endforeach

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>

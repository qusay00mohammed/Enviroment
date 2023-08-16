@extends('layouts.website.master')

@section('title', __('nav.contact us'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/contact_us.ltr.css') }}">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/contact_us.css') }}">
    @endif

@endsection


@section('content')

    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ __('nav.contact us') }} </h6>
        </section>
        <section class="aboutt">
            <h1> {{ __('nav.contact us') }} </h1>

            <div class="body_cotact">
                <div class="right_contact">

                    <form action="{{ route('contact_us.store') }}" method="POST">
                        @csrf
                        <div class="input_name">
                            <input type="text" required name="fullname" placeholder="{{ __('master.full name') }}">
                            <input type="email" required name="email" placeholder="{{ __('master.email') }}">
                        </div>
                        <textarea name="message" required id="" cols="30" rows="10" placeholder="{{ __('master.message') }}"></textarea>
                        <div class="checkbox_text">
                            {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                            {{-- <p>أوافق على سياسة الخصوصية</p> --}}
                        </div>
                        <button type="submit" class="btn_donate"> {{ __('master.submit') }}</button>
                    </form>

                </div>
                <div class="left_contact">
                    <h1>{{ __('master.contact information') }}</h1>
                    <div class="line_contant"></div>

                    @foreach (App\Models\Setting::where('group', 'contact_details')->get() as $item)
                        @if ($item->key == 'location')
                            <div class="point" style="margin-bottom: 10px">
                                <div class="imgpoint">
                                    <img src='{{ asset('storage/images/contact-details/location.png') }}' alt="">
                                </div>

                                @if (App::getLocale() == 'en')
                                    <p>{{ $item->value_en }}</p>
                                @elseif (App::getLocale() == 'ar')
                                    <p>{{ $item->value_ar }}</p>
                                @endif

                            </div>
                        @elseif ($item->key == 'phone')
                            <div class="point" style="margin-bottom: 10px">
                                <div class="imgpoint">
                                    <img src='{{ asset('storage/images/contact-details/phone.png') }}' alt="">
                                </div>

                                <p>{{ $item->value_ar }}</p>

                            </div>
                        @elseif ($item->key == 'email_message')
                            <div class="point" style="margin-bottom: 10px">
                                <div class="imgpoint">
                                    <img src='{{ asset('storage/images/contact-details/message.png') }}' alt="">
                                </div>
                                <p>{{ $item->value_ar }}</p>
                            </div>
                        @endif
                    @endforeach


                    <div class="alliconbt">

                        @foreach (App\Models\Setting::where('group', 'social')->get() as $item)
                            @if ($item->key == 'facebook')
                                <a href="{{ $item->value_ar }}">
                                    <div class="icon_footericon">
                                        <div class="imgfooticon">
                                            <i class='bx bxl-facebook'></i>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($item->key == 'instagram')
                                <a href="{{ $item->value_ar }}">
                                    <div class="icon_footericon">
                                        <div class="imgfooticon">
                                            <i class='bx bxl-instagram'></i>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($item->key == 'twitter')
                                <a href="{{ $item->value_ar }}">
                                    <div class="icon_footericon">
                                        <div class="imgfooticon">
                                            <i class='bx bxl-twitter'></i>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($item->key == 'youtube')
                                <a href="{{ $item->value_ar }}">
                                    <div class="icon_footericon">
                                        <div class="imgfooticon">
                                            <i class='bx bxl-youtube'></i>
                                        </div>
                                    </div>
                                </a>
                            @elseif ($item->key == 'email')
                                <a href="{{ $item->value_ar }}">
                                    <div class="icon_footericon">
                                        <div class="imgfooticon">
                                            <i class='bx bx-envelope'></i>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>


        </section>
    </div>

@endsection

@section('js')

@endsection

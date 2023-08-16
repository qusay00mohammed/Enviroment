@extends('layouts.website.master')

@section('title', __('master.donate'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/donate.ltr.css') }}">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/donate.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('website/build/css/intlTelInput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/build/css/demo.css') }}">

@endsection


@section('content')

    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ __('master.donate') }} </h6>
        </section>

        <section class="aboutt">
            <h1> {{ __('master.donate') }} </h1>

            <form class="body_donate" action="{{ route('donate.store') }}" method="POST">
                @csrf
                <div class="right_donate">
                    <h2>{{ __('master.donor details') }}</h2>
                    <div class="blowline"></div>

                    <div class="input_donate">
                        <input type="text" required name="name" placeholder="{{ __('master.full name') }}">
                        <input type="email" required name="email" placeholder="{{ __('master.email') }}">
                    </div>

                    <div class="input_donate">
                        <div class="selectPhone">
                            <input class="inputPhoneI" required name="phone" type="tel" id="phone"
                                placeholder="{{ __('master.mobile number') }}">
                        </div>
                        <select class="form-select" name="project_donate" aria-label="">
                            <option selected value="">{{ __('master.choose project donate') }}</option>
                            <option value="1">الإغاثة الطارئة</option>
                            <option value="2">الإغاثة الطارئة</option>
                            <option value="3">الإغاثة الطارئة</option>
                        </select>
                    </div>

                    <div class="input_donate">
                        <textarea  name="" id="" cols="30" rows="10" name="message"
                            placeholder="{{ __('master.your message to us') }}"></textarea>
                    </div>
                    <div class="inputCheck">
                        <input class="form-check-input" type="checkbox" id="defaultCheck1" name="introducing_donor" value="1">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ __('master.introducing the donor') }}
                            <br>
                            {{ __('master.there nothing mentioning my name') }}
                        </label>
                    </div>
                </div>


                <div class="leftdonateForm">
                    <div class="mt-4">
                        <label style="font-weight: bold; font-size: 16px;" for="">{{__("master.choose the amount to donate")}}</label>
                        <div class="cardsDonate">
                            <div class="cardDonate cardDonateAmount" data-amount="20">
                                <i class='bx bx-check'></i>
                                <span>$20</span>
                            </div>
                            <div class="cardDonate cardDonateAmount" data-amount="50">
                                <i class='bx bx-check'></i>
                                <span>$50</span>
                            </div>
                            <div class="cardDonate cardDonateAmount" data-amount="100">
                                <i class='bx bx-check'></i>
                                <span>$100</span>
                            </div>
                            <div class="cardDonate cardDonateAmount" data-amount="500">
                                <i class='bx bx-check'></i>
                                <span>$500</span>
                            </div>
                            <div class="cardDonate cardDonateAmount" data-amount="1000">
                                <i class='bx bx-check'></i>
                                <span>$1000</span>
                            </div>
                            <div class="cardDonate cardDonateAmount" data-amount="2000">
                                <i class='bx bx-check'></i>
                                <span>$2000</span>
                            </div>
                        </div>
                        <div>
                            <div class="inputCheck anotherAmount">
                                <input class="form-check-input inputCheckA" type="checkbox" value=""
                                    id="defaultCheck2">
                                <label class="form-check-label " for="defaultCheck2">
                                    {{__("master.add another amount")}}
                                </label>
                            </div>
                        </div>
                        <div class="input_donate">
                            <div class=" inputPriceI mt-3 input-group mb-3" style=" max-width:300px;">
                                <span class=" input-group-text textDI inputCA">$</span>
                                <input type="number" required min="1" max="999999" name="amount" class="OnlyNumber form-control inputCA" id="DonationAmount"
                                    placeholder="{{__("master.how much do you want to donate")}}" readonly="readonly"
                                     />
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>{{__("master.donation method")}}</h5>
                        <div class="cardsDonate">
                            <div class="cardDonateS  active">
                                <i class='bx bx-check'></i>
                                <img src="{{ asset('website/images/mastercard.svg') }}" alt="">
                            </div>
                            <div class="cardDonateS">
                                <i class='bx bx-check'></i>
                                <img src="{{ asset('website/images/visa-svgrepo-com.svg') }}" alt="">
                            </div>
                            <div class="cardDonateS">
                                <i class='bx bx-check'></i>
                                <img src="{{ asset('website/images/stripe-purple-300x300.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <button class="btnDonare">{{__("master.donate")}}</button>
                    <div class="mt-4">
                        <h5>{{__("master.trusted")}}</h5>
                        <div class="imgGC">
                            <img src="{{ asset('website/images/masterCardS.svg') }}" alt="">
                            <img src="{{ asset('website/images/visaa.svg') }}" alt="">
                            <img src="{{ asset('website/images/3d-secure.svg') }}" alt="">
                            <img src="{{ asset('website/images/paypal.svg') }}" alt="">

                            <div class="d-flex gap-2">
                                <img class="imgS" src="{{ asset('website/images/secureCheckOut.svg') }}" alt="">
                                <img class="imgS" src="{{ asset('website/images/privacyProtected.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('js')

    <script src="{{ asset('website/js/jquery library.js') }}"></script>


    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {});

        output = document.querySelector("#output");

        var iti = window.intlTelInput(input, {
            nationalMode: true,
            utilsScript: "../../build/js/utils.js?1678446285328" // just for formatting/placeholders etc
        });

        var handleChange = function() {
            var text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
            var textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);
        };

        // listen to "keyup", but also "change" to update when the user selects a country
        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);
    </script>

    <script>
        $(".cardDonate").click(function() {

            $(".cardDonate").removeClass("active");
            $(".inputCheckA").prop("checked", false);
            $(".inputCA").prop("readonly", true);
            $(".inputCA").val("")
            $(this).addClass("active");

        });

        $(".cardDonateAmount").click(function() {
            $(".cardDonateAmount").removeClass("active");
            var amount = $(this).data("amount");
            $(".inputCheckA").prop("checked", false);
            $("#DonationAmount").prop("readonly", true);
            $("#DonationAmount").val(amount)
            $(this).addClass("active");
        });


        $(".anotherAmount").click(function() {
            $(".cardDonateAmount").removeClass("active");
            if ($('#defaultCheck2').prop('checked')) {
                $("#DonationAmount").prop("readonly", false);
            } else {
                $("#DonationAmount").prop("readonly", true);
            }
            $("#DonationAmount").val("")
        });

        /////////////////////////////////////////

        $(".cardDonateS").click(function() {

            $(".cardDonateS").removeClass("active");
            $(this).addClass("active");



        });
    </script>

    <script src="{{ asset('website/css/plugins.bundle.js') }}"></script>
    <script src="{{ asset('website/js/countrySelect.js') }}"></script>
    <script src="{{ asset('website/build/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('website/build/js/nationalMode.js') }}"></script>
@endsection

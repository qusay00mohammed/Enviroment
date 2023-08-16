@extends('layouts.website.master')

@section('title', __('master.request volunteer'))

@section('css')
    @if (App::getLocale() == 'en')
    @elseif (App::getLocale() == 'ar')
    @endif
    <link media="all" rel="stylesheet" href="{{ asset('website/css/volunteerrequest.css') }}" />
    <style>
        input[type="email"] {
            width: 100%;
            height: 40px;
            border: none;
            outline: 0;
            border-radius: 11px;
            border: 1px solid #cbced4;
            gap: 20px;
            box-sizing: border-box;
            padding: 0px 10px;
        }
    </style>
@endsection


@section('content')


    <div class="container">

        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">

                    </div>
                    <div class="steps-content">
                        <h3><span class="step-number"> </span> {{ __('master.basic information') }} </h3>

                    </div>
                    <ul class="progress-bar">
                        <li class="active"> {{ __('master.basic information') }}</li>
                        <li> {{ __('master.additional information') }}</li>

                    </ul>
                </div>
                <div class="right-side">

                    <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main active">

                            <div class="text">
                                <h2 style="font-weight: bold;">{{ __('master.request volunteer') }}</h2>
                                <p> {{ __('master.please fill data') }}</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="fullname" required id="user_name"
                                        value="{{ old('fullname') }}" placeholder="{{ __('master.full name') }}">
                                </div>
                                <div class="input-div">
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" required
                                        placeholder="{{ __('master.mobile number') }}">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        id="user_name" placeholder="{{ __('master.email') }}">
                                </div>
                                <div class="input-div">
                                    <input type="text" required name="address" value="{{ old('address') }}"
                                        placeholder="{{ __('master.address') }}">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select name="volunteered_before" required>
                                        <option selected disabled hidden value="">
                                            {{ __('master.you volunteered before') }} </option>
                                        <option {{ old('volunteered_before') == 1 ? 'selected' : '' }} value="1">
                                            {{ __('master.yes') }}</option>
                                        <option {{ old('volunteered_before') == 0 ? 'selected' : '' }} value="0">
                                            {{ __('master.no') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="volunteered_details"
                                        value="{{ old('volunteered_details') }}"
                                        placeholder="{{ __('master.if yes mention briefly') }}">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">

                                    <select name="skills" required>
                                        <option selected disabled hidden value="">{{ __('master.have any skills') }}
                                        </option>
                                        <option {{ old('skills') == 1 ? 'selected' : '' }} value="1">
                                            {{ __('master.yes') }}</option>
                                        <option {{ old('skills') == 0 ? 'selected' : '' }} value="0">
                                            {{ __('master.no') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="skills_details" value="{{ old('skills_details') }}"
                                        placeholder="{{ __('master.briefly state your volunteer') }}">
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="next_button">{{ __('master.next') }}</button>
                            </div>

                        </div>

                        <div class="main">
                            <div class="text">
                                <h2>{{ __('master.additional information') }}</h2>
                                <p>{{ __('master.please fill data') }}</p>
                            </div>

                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">{{ __('master.volunteer start') }}</label>
                                    <input type="date" required name="volunteered_start"
                                        value="{{ old('volunteered_start') }}">
                                    {{-- <span></span> --}}
                                </div>
                            </div>

                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">{{ __('master.end volunteering') }}</label>
                                    <input type="date" required name="volunteered_end"
                                        value="{{ old('volunteered_end') }}">
                                    {{-- <span></span> --}}
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">{{ __('master.study experience') }}</label>
                                    <input type="text" name="study_experience" value="{{ old('study_experience') }}"
                                        required id="user_name" style="height: 93px;">
                                    {{-- <span></span> --}}
                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div fileinput">
                                    <label for="">{{ __('master.curriculum vitae') }}</label>
                                    <input type="file" name="resume" required>
                                    {{-- <span></span> --}}
                                </div>
                            </div>

                            <div class="buttons button_space" style="margin-top: -8px">
                                <button class="back_button">{{ __('master.back') }}</button>
                                <button type="submit">{{ __('master.send request') }}</button>
                            </div>
                        </div>
                    </form>

                    {{-- <div class="main">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>

                    <div class="text congrats">
                        <h2>تم الطلب بنجاح</h2>
                        <p>شكرا لك <span class="shown_name"></span>تم إرسال معلوماتك بنجاح.</p>
                    </div>
                </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('website/js/volunteerrequest.js') }}"></script>

@endsection

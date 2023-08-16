@extends('layouts.website.master')

@section('title', __('master.add job application'))

@section('css')
    @if (App::getLocale() == 'en')
    @elseif (App::getLocale() == 'ar')
    @endif
    <link media="all" rel="stylesheet"  href="{{ asset('website/css/jobrequest.css') }}" />
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
                    <h3><span class="step-number">  </span> {{ __('master.basic information') }} </h3>

                </div>
                <ul class="progress-bar">
                    <li class="active">{{ __('master.basic information') }}</li>
                    <li>{{ __('master.additional information') }}</li>
                </ul>
            </div>
            <div class="right-side">
                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="main active">

                        <div class="text">
                            <h2>{{ __('master.add job application') }}</h2>
                            <p>{{ __('master.please fill data') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" value="{{ old('fullname') }}" name="fullname" required id="user_name"  placeholder="{{ __('master.full name') }}">
                            </div>
                        </div>

                        <div class="input-text">
                            <div class="input-div numinputr">
                                <input type="number" value="{{ old('phone_number') }}" name="phone_number" required  placeholder="{{ __('master.mobile number') }}">

                            </div>
                            <div class="input-div ">
                                <input type="email" name="email" required  value="{{ old('email') }}" placeholder="{{ __('master.email') }}">

                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <select required name="gender" style="font-family: 'Cairo', sans-serif;">
                                    <option selected disabled hidden value="">{{ __('master.choose gender') }}</option>
                                    <option {{ old('gender') == 'male' ? 'selected' : '' }} value="male">{{ __('master.male') }}</option>
                                    <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">{{ __('master.female') }}</option>
                                </select>

                            </div>
                            <div class="input-div">

                                <select required name="degree" style="font-family: 'Cairo', sans-serif;">
                                    <option selected disabled hidden value="">{{ __('master.choose academic qualification') }}</option>
                                    <option {{ old('degree') == 'bachelor' ? 'selected' : '' }} value="bachelor">{{ __('master.bachelor') }}</option>
                                    <option {{ old('degree') == 'diploma' ? 'selected' : '' }} value="diploma">{{ __('master.diploma') }}</option>
                                    <option {{ old('degree') == 'college_student' ? 'selected' : '' }} value="college_student">{{ __('master.college student') }}</option>
                                    <option {{ old('degree') == 'high_school' ? 'selected' : '' }} value="high_school">{{ __('master.high school') }}</option>

                                </select>
                            </div>
                        </div>
                        <div class="buttons" style="text-align: left;">
                            <button type="button" class="next_button">{{ __('master.next') }}</button>
                        </div>

                    </div>
                    <div class="main">
                        <div class="text">
                            <h2>{{ __('master.additional information') }}</h2>
                            <p>{{ __('master.please fill data') }}</p>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <label for="">{{ __('master.date birth') }}</label>
                                <input type="date" name="birthdate" required value="{{ old('birthdate') }}">
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

                        <div class="buttons button_space">
                            <button class="back_button" >{{ __('master.back') }}</button>
                            <button type="submit">{{ __('master.send request') }}</button>
                        </div>
                    </div>
                </form>

                 {{-- <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
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

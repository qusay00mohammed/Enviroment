@extends('layouts.website.master')

@section('title', __('nav.become a partner'))

@section('css')
    @if (App::getLocale() == 'en')
        {{-- <link rel="stylesheet" href="{{ asset('website/css/en/contact_us.ltr.css') }}"> --}}
    @elseif (App::getLocale() == 'ar')
    @endif
    <link rel="stylesheet" href="{{ asset('website/css/companyrequest.css') }}">

@endsection


@section('content')

    <div class="container">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">

                    </div>
                    <div class="steps-content">
                        <h3><span class="step-number"> </span> {{ __("master.basic information") }} </h3>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ __("master.write legal name organization") }} </li>
                        <li>{{ __("master.additional information") }}</li>
                        <li>{{ __("master.additional information") }}</li>
                        <li> {{ __("master.information about center") }} </li>
                        <li>{{ __("master.enterprise operation scope") }}</li>
                        <li> {{ __("master.enterprise operation scope") }}</li>
                    </ul>
                </div>
                <div class="right-side">

                    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main active">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2> {{ __("master.general information association") }}</h2>
                                <p> {{ __("master.please fill data") }}</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="organization_name" value="{{ old('organization_name') }}" required id="user_name" style=" font-size: 12px;"
                                        placeholder="{{ __("master.write legal name organization") }}">
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div" style="top: -10px;">
                                    <select name="organization_type" required>
                                        <option selected disabled value="">{{ __("master.organization type") }}</option>
                                        @foreach ($organizations as $item)
                                        <option {{ old('organization_type') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="address_main_branch" value="{{ old('address_main_branch') }}" required id="user_name" placeholder="{{ __("master.main branch address") }}">
                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label for="">{{ __("master.year founded") }}</label>
                                    <input type="date" required name="year_founded" value="{{ old('year_founded') }}">
                                    {{-- <span></span> --}}
                                </div>
                            </div>

                            <div class="buttons" style="text-align: left;">
                                <button type="button" class="next_button">{{ __("master.next") }}</button>
                            </div>

                        </div>

                        <div class="main">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2>{{ __("master.additional information") }}</h2>
                                <!-- --------------------------- -->
                                <p>{{ __("master.please fill data") }}</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="website" value="{{ old('website') }}" required placeholder="{{ __("master.website") }}">
                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="instagram" value="{{ old('instagram') }}" required placeholder="{{ __("master.instagram") }}">

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="facebook" value="{{ old('facebook') }}" required placeholder="{{ __("master.facebook") }}">

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="annual_budget" value="{{ old('annual_budget') }}" required placeholder="{{ __("master.annual budget") }}">

                                </div>
                                <div class="input-div">
                                    <input type="number" name="number_centers" value="{{ old('number_centers') }}" required placeholder="{{ __("master.number centers") }}">

                                </div>
                                <div class="input-div">
                                    <input type="number" name="number_employees" value="{{ old('number_employees') }}" required placeholder="{{ __("master.number employees") }}">

                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button  type="button" class="back_button">{{ __("master.back") }}</button>
                                <button  type="button" class="next_button">{{ __("master.next") }}</button>
                            </div>
                        </div>

                        <div class="main">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2>{{ __("master.additional information") }}</h2>
                                <p>{{ __("master.additional information") }}</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" required name="center_locations" rows="4" placeholder="{{ __("master.center locations") }}"
                                        style="height: 100px;" style="font-family: 'Cairo', sans-serif;">{{ old('center_locations') }}</textarea>

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="ministry_interior_no" value="{{ old('ministry_interior_no') }}" required placeholder="{{ __("master.register interior") }}">

                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="ministry_finance_no" value="{{ old('ministry_finance_no') }}" required placeholder="{{ __("master.register finance") }}">

                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button  type="button" class="back_button">{{ __("master.back") }}</button>
                                <button  type="button" class="next_button">{{ __("master.next") }}</button>
                            </div>
                        </div>




                        <!-- ----------------------------- -->
                        <div class="main">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2>{{ __("master.information about center") }}</h2>
                                <p>{{ __("master.please fill data") }}</p>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="number_current_projects" value="{{ old('number_current_projects') }}" required placeholder="{{ __("master.number current projects") }}">

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" name="donors" required rows="4"
                                        placeholder="{{ __("master.major donors") }}" style="height: 100px;"
                                        style="font-family: 'Cairo', sans-serif;">{{ old('donors') }}</textarea>

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" name="numberemployees_you_deal_with" required rows="4"
                                        placeholder="{{ __("master.number employees your organization deals with") }}" style="height: 100px;"
                                        style="font-family: 'Cairo', sans-serif;">{{ old('numberemployees_you_deal_with') }}</textarea>

                                </div>
                            </div>

                            <div class="buttons button_space">
                                <button  type="button" class="back_button">{{ __("master.back") }}</button>
                                <button  type="button" class="next_button">{{ __("master.next") }}</button>
                            </div>
                        </div>
                        <!-- ---------------- -->
                        <div class="main">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2>{{ __("master.enterprise operation scope") }}</h2>
                                <p>{{ __("master.please fill data") }}</p>
                            </div>

                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" name="nationalities_beneficiaries" required rows="4" placeholder="{{ __("master.natioonalities beneficiaries") }}"
                                        style="height: 100px;">{{ old('nationalities_beneficiaries') }}</textarea>

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" name="beneficiary_age_group" required rows="4" placeholder="{{ __("master.age beneficiaries") }}"
                                        style="height: 100px;">{{ old('beneficiary_age_group') }}</textarea>

                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <textarea class="form-control" id="message" name="upcoming_goals" required rows="4"
                                        placeholder="{{ __("master.strategic goals") }}"
                                        style="height: 100px;">{{ old('upcoming_goals') }}</textarea>

                                </div>
                            </div>

                            <div class="buttons button_space">
                                <button  type="button" class="back_button">{{ __("master.back") }}</button>
                                <button  type="button" class="next_button">{{ __("master.next") }}</button>
                            </div>
                        </div>
                        <!-- ---------------- -->
                        <!-- ---------------- -->
                        <div class="main">
                            <!-- <small><i class="fa fa-smile-o"></i></small> -->
                            <div class="text">
                                <h2>{{ __("master.enterprise operation scope") }}</h2>
                                <p>{{ __("master.please fill data") }}</p>
                            </div>

                            <div class="input-text">
                                <div class="input-div fileinput">
                                    <label for="">{{ __("master.certificate interior") }}</label>
                                    <input type="file" name="company_registration_certificate_ministry_interior" required>
                                    {{-- <span></span> --}}
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div fileinput">
                                    <label for="">{{ __("master.organizational structure") }}</label>
                                    <input type="file" name="company_organizational_structure" required>
                                    {{-- <span></span> --}}
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">{{ __("master.back") }}</button>
                                <button type="submit" >{{ __("master.send request") }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
<script src="{{ asset('website/js/volunteerrequest.js') }}"></script>

@endsection

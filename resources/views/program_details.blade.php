@extends('layouts.website.master')

@section('title', __('master.programs'))

@section('css')
    @if(App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset("website/css/en/programs.ltr.css") }}" />
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset("website/css/news.css") }}" />
        <link rel="stylesheet" href="{{ asset("website/css/Program_Details.css") }}" />
    @endif
@endsection

@section('content')

    <div class="containerr">
        <section class="hedsid" >
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a><a href="{{ route('programs') }}">{{ __('master.programs') }} / </a></h6><h6> {{ __('master.relief development') }} </h6>
        </section>

        <section class="allnewss">
            <div class="newss">
                <h1>{{ $program->title }}</h1>
                <p>{{ $program->description }}</p>
            </div>
        </section>

@endsection

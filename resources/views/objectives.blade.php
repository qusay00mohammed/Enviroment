@extends('layouts.website.master')

@section('title', __('nav.goals'))

@section('meta')

<meta name="title" property="og:title" content="{{ __('nav.goals') }}">
<meta name="description" property="og:description" content="{{ $objectives->first()->title }}">
<meta name="keywords" property="og:keywords" content="Our Goals,اهدافنا"/>
<meta name="image" property="og:image" content="{{ asset("assets/logoo.png") }}">
<meta property="og:image" content="{{ asset("assets/logoo.png") }}">
<meta name="news_keywords" property="og:news_keywords" content="Our Goals,اهدافنا" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ __('nav.goals') }}" />

@endsection


@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/objectives.ltr.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/en/principles.ltr.css') }}" />
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/objectives.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/principles.css') }}" />
    @endif
@endsection


@section('content')
<div class="containerr">
    <section class="hedsid" >
         <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6><h6> {{ __('nav.about us') }}   </h6>
    </section>

    <section class="aboutt objective">
        <h1>  {{ __('nav.goals') }}</h1>

        @foreach ($objectives as $objective)
            <div class="text_princples hedpdj">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ $objective->title }}</h4>
                </div>
                @foreach ($objective->goals as $item)
                    <div class="arrowtext aa">
                        @if(App::getLocale() == 'en')
                        <i class='bx bx-chevron-right'></i>
                        <p>{{ $item->description_goal_en }}</p>
                        @elseif (App::getLocale() == 'ar')
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ $item->description_goal_ar }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach


    </section>
    </div>
@endsection

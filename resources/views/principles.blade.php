@extends('layouts.website.master')

@section('title', __('nav.principles'))

@section('meta')

<meta name="title" property="og:title" content="{{ __('nav.principles') }}">
<meta name="description" property="og:description" content="{{ $principles->first()->description }}">
<meta name="keywords" property="og:keywords" content="about us, من نحن"/>
<meta name="image" property="og:image" content="{{ asset("assets/logoo.png") }}">
<meta property="og:image" content="{{ asset("assets/logoo.png") }}">
<meta name="news_keywords" property="og:news_keywords" content="our principles, قيمنا" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ __('nav.principles') }}" />

@endsection



@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/principles.ltr.css') }}" />
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/principles.css') }}" />
    @endif
@endsection


@section('content')

    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ __('nav.principles') }} </h6>
        </section>
        <section class="aboutt">
            <h1> {{ __('nav.principles') }} </h1>
            @foreach ($principles as $principle)

                <div class="texts_prinp" style="width: 70%">
                    <div class="text_princples" style="width: 100%">
                        <div class="headtex_principles">
                            <div class="line_priciples"></div>
                            <h4>{{ $principle->title }}</h4>
                        </div>
                        <div class="arrowtext">
                            @if (App::getLocale() == 'en')
                            <i class='bx bx-chevron-right'></i>
                            @elseif (App::getLocale() == 'ar')
                            <i class='bx bx-chevron-left'></i>
                            @endif
                            <p>{{ $principle->description }}</p>
                        </div>
                    </div>
                </div>

            @endforeach
            {{-- <div style="clear: both"></div> --}}
        </section>

    </div>

@endsection

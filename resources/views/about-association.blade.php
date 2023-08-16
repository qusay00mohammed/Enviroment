@extends('layouts.website.master')

@section('title', $about->title)


@section('meta')

<meta name="title" property="og:title" content="{{ $about->title }}">
<meta name="description" property="og:description" content="{{ $about->description }}">
<meta name="keywords" property="og:keywords" content="about us, من نحن"/>
<meta name="image" property="og:image" content="{{ asset("storage/images/about-us/$about->image") }}">
<meta property="og:image" content="{{ asset("storage/images/about-us/$about->image") }}">
<meta name="news_keywords" property="og:news_keywords" content="about us, من نحن" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $about->title }}" />

@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('website/css/about-association.css') }}" />
@endsection


@section('content')

    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ $about->title }} </h6>
        </section>

        <section class="aboutt">

            {{-- @foreach ($about as $item) --}}
                <div class="card_about card2">
                    <div class="text_card">
                        <h1>{{ $about->title }}</h1>
                        <p>{{ $about->description }}</p>
                    </div>

                    <div class="img_card_about2">
                        <img src="{{ asset("storage/images/about-us/$about->image") }}" alt="">
                    </div>
                </div>
            {{-- @endforeach --}}



        </section>

    </div>

@endsection

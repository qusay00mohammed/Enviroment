@extends('layouts.website.master')

@section('title', __('nav.visual library'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/news.ltr.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/en/album_presentation.ltr.css') }}">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/news.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/album_presentation.css') }}">
    @endif
@endsection


@section('content')


    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a><a href="visual_library.html"> {{ __('nav.visual library') }} / </a></h6>
            <h6> {{ __('nav.visual library') }} </h6>
        </section>

        <section class="allnewss">
            <div class="newss">
                <h1>{{ $library->title }}</h1>
            </div>
            <div class="textalbomdet">
                <p>{{ $library->description }}</p>
            </div>

            <div class="allcardlib">
                <div class="cardslaib ">
                    @foreach ($library->images as $image)
                    <div class="imgbig" href="{{ asset("storage/images/libraries/$image->filename") }}" data-fancybox="gallery">
                        <img class="imgbodyDetails" src="{{ asset("storage/images/libraries/$image->filename") }}" alt="" />
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

@endsection

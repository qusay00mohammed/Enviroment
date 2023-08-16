@extends('layouts.website.master')

@section('title', __('nav.visual library'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/news.ltr.css') }}">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/news.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('website/css/visual_library.css') }}">
@endsection


@section('content')




    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ __('nav.visual library') }} </h6>
        </section>

        <section class="allnewss">
            <div class="newss">
                <h1>{{ __('nav.visual library') }}</h1>
            </div>


            <div class="allcardnews">

                @foreach ($libraries as $item)
                <div class=" card cardNews ">
                    <a href="{{ route('visualLibrary.show', [$item->id]) }}">
                        @foreach ($item->images as $image)
                            <img src="{{ asset("storage/images/libraries/$image->filename") }}" class="card-img-top" alt="...">
                            @break
                        @endforeach
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </section>
    </div>

    {{ $libraries->links('layouts.website.paginate') }}

@endsection

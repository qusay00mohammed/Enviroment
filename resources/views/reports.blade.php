@extends('layouts.website.master')

@section('title', __('nav.reports'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/news.ltr.css') }}" />
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/news.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('website/css/publications_and_reports.css') }}" />
@endsection

@section('content')




    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6>{{ __('nav.publications') }}</h6>
        </section>

        <section class="allnewss">
            <div class="newss">
                <h1>{{ __('nav.publications') }}</h1>
            </div>

            <div class="allcardspiblicationsss">

                @foreach ($collection as $item)
                <div class="cardpubb">
                    <a href="{{ asset("storage/images/publications/$item->image") }}">
                        <img src="{{ asset("storage/images/publications/$item->image") }}" alt="">
                        <p class="popcc">{{ $item->updated_at->toDateString() }}</p>
                        <p class="textcardpop">{{ $item->title }}</p>
                    </a>
                </div>
                @endforeach

            </div>



        </section>

    </div>

@endsection

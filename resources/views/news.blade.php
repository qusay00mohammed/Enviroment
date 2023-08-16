@extends('layouts.website.master')

@section('title',  __('nav.news and announcements'))


@section('meta')


<meta name="title" property="og:title" content="{{ __('nav.news and announcements') }}">
<meta name="image" property="og:image" content="{{ asset("assets/logoo.png") }}">
<meta name="description" property="og:description" content="Palestine Association for Education &amp; Environmental Protection  ، PAEEP">
<meta name="keywords" property="og:keywords" content="Palestine Association for Education &amp; Environmental Protection  ، PAEEP " />
<meta name="news_keywords" property="og:news_keywords" content="Palestine Association for Education &amp; Environmental Protection  ، PAEEP " />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{__('nav.news and announcements')}}" />
<meta property="og:image" content="{{ asset("assets/logoo.png") }}">

@endsection



@section('css')
@if (App::getLocale() == 'en')
<link rel="stylesheet" href="{{ asset('website/css/en/news.ltr.css') }}">
@elseif (App::getLocale() == 'ar')
<link rel="stylesheet" href="{{ asset('website/css/news.css') }}">
@endif
@endsection


@section('content')


<div class="containerr">
    <section class="hedsid">
        <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
        <h6> {{ __('nav.news and announcements') }} </h6>
    </section>

    <section class="allnewss">
        <div class="newss">
            <h1>{{ __('master.paeep news') }}</h1>
            <div class="serch-news">
                <i class='bx bx-search'></i>
                <form action="{{ route('news') }}" method="GET">
                    <input type="text" name="search" placeholder="{{ __('nav.search') }}" value="{{ request('search') }}">
                </form>
            </div>
        </div>


        <div class="allcardnews">



            @foreach ($news as $item)
            <div class=" card cardNews ">
                @foreach ($item->images as $img)
                <a href="{{ route('news_details', [$item->slug]) }}"> <img src="{{ asset("storage/images/news/$img->filename") }}" class="card-img-top" alt="..."></a>
                @break
                @endforeach
                <div class="card-body">
                    <a href="{{ route('news_details', [$item->slug]) }}">
                        <h5 class="card-title">{{ $item->title }}</h5>
                    </a>
                    <p class="card-text">{{ $item->short_description }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{ $news->links('layouts.website.paginate') }}

    </section>

</div>


@endsection

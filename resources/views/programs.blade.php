@extends('layouts.website.master')

@section('title', __('master.programs'))

@section('css')
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/news.ltr.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/en/programs.ltr.css') }}">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/news.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/programs.css') }}">
    @endif
@endsection


@section('content')


    <div class="containerr">
        <section class="hedsid">
            <h6><a href="{{ route('homePage') }}">{{ __('master.home') }} / </a></h6>
            <h6> {{ __('master.programs') }} </h6>
        </section>

        <section class="allnewss">
            <div class="newss ">
                <h1> {{ __('master.programs') }} </h1>
                {{-- <div class="serch-news">
                    <i class='bx bx-search'></i>
                    <input type="text" placeholder="بحث">
                </div> --}}

            </div>

            <div class="cardsside">
                {{-- <h5>سنة التنفيذ</h5> --}}
                <br><br>
                <div class="cardd">

                    <div class="rightside">


                        <div class="allcardpro">

                            @foreach ($programs as $program)
                                <div class="cardpro">
                                    <img src="{{ asset("storage/images/programs/$program->image") }}" alt=""
                                        data-tilt data-tilt-scale="1.1">
                                    <h4><a href="">{{ $program->title }}</a></h4>
                                    <p>{{ $program->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{ $programs->links('layouts.website.paginate') }}
            </div>
        </section>
    </div>

@endsection

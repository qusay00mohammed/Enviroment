@extends('layouts.website.master')

@section('title', __('nav.home'))

@section('content')

<header class="heade">
    <div class="back_heder"></div>
    <div class="">

        <div class="slide_heder">
            <!-- Swiper -->
            <div class="swiper mySwiper arow d-flex">
                <div class="swiper-wrapper ">

                    @foreach($sliders as $slider)
                        <div class="swiper-slide centerimgheder">
                            <img src="{{ asset("storage/images/slider/$slider->image") }}" alt="">
                            <img class="shado" src="{{ asset("website/imges/Program icons/Rectangle 1502.png") }}" alt="">
                            <div class="textimg textimg1 animate__animated animate__fadeInUp">
                                <h1>{{ $slider->title }}</h1>
                                <p>{{ $slider->description }}</p>
{{--                                <button class="mored">عرض التفاصيل</button>--}}
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="next "><i class='bx bx-right-arrow-alt'></i></div>
                <div class="prev"><i class='bx bx-left-arrow-alt'></i></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

</header>

<section class="news  ">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('master.latest news') }}</h1>
            <a href="{{ route('news') }}">
                <h6>{{ __('master.view all') }}</h6>
            </a>
        </div>

        <div class="swiper mySwiper2">
            <div class="swiper-wrapper ">

                @foreach($news as $new)
                    <a href="{{ route('news_details', [$new->slug]) }}">
                        <div class=" card cardNews swiper-slide" style=" border: none;">
                            @foreach($new->images as $image)
                                <img src="{{ asset("storage/images/news/$image->filename") }}" class="card-img-top" alt="...">
                                @break
                            @endforeach
                            <div class="card-body">
                                <a href="{{ route('news_details', [$new->slug]) }}">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                </a>
                                <p class="card-text">{{ $new->short_description }}</p>

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

</section>

<section class="association_pro">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('master.programs') }}</h1>
            <a href="{{ route('programs') }}">
                <h6>{{ __('master.view all') }}</h6>
            </a>
        </div>

        <div class="allcardpro">
            @foreach($programs as $program)
            <a href="{{ route('program_details', [$program->id]) }}">
                <div class="cardpro">
                    <img src="{{ asset("storage/images/programs/$program->image") }}" alt="" data-tilt data-tilt-scale="1.1">
                    <h4><a href="{{ route('program_details', [$program->id]) }}">{{ $program->title }}</a></h4>
                </div>
            </a>
            @endforeach

        </div>

    </div>
</section>



<section class="count_sec" id="count_sec">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('master.notable achievements') }}</h1>
        </div>

        <div class="allcardpro">

            @foreach($achievements as $achievement)
            <div class="cardpro crad_achievements">
                <img class="h" src="{{ asset("storage/images/achievements/$achievement->image") }}" alt="" data-tilt data-tilt-scale="1.1">
                <h3>{{ $achievement->title }}</h3>
                <div class="con">
                    <h2 class="counter" data-target="{{ $achievement->number }}"></h2>
                    <span>+</span>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>


<section class="comp_section">
    <div class="containerr">
        <div class="textnews">
            <h1> {{ __('master.partners') }}</h1>
        </div>

        <div class="arow3">
            <div class="swiper mySwiper3">
                <div class="swiper-wrapper ">
                    @foreach($partners as $partner)
                    <div class="swiper-slide">
                        <div class="card_comp">
                            <a href="{{ $partner->link }}" target="_blank">
                                <img src="{{ asset("storage/images/partners/$partner->image") }}" alt="">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="nextt "><i class='bx bx-right-arrow-alt'></i>
                {{-- <h5>{{ __('master.previous') }}</h5> --}}
            </div>
            <div class="prevt"><i class='bx bx-left-arrow-alt'></i>
                {{-- <h5>{{ __('master.next') }}</h5> --}}
            </div>


        </div>



    </div>
</section>

@endsection

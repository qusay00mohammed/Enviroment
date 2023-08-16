

<footer class="footer">

    <div class="containerr">

        <div class="allfooter">
            <div class="rightfooter">
                <h5>{{ __("nav.about us") }}</h5>
                <p>{{ __("master.about description") }}</p>

                <div>
                    <h5>
                        {{ __("nav.contact us") }}
                    </h5>

                    @foreach (App\Models\Setting::where('group', 'contact_details')->get() as $item)
                    @if ($item->key == 'location')
                    <div class="point" style="margin-bottom: 10px">
                        <div class="imgpoint">
                            <img src='{{ asset("storage/images/contact-details/location.png") }}' alt="">
                        </div>

                        @if (App::getLocale() == "en")
                            <p>{{ $item->value_en }}</p>
                        @elseif (App::getLocale() == "ar")
                            <p>{{ $item->value_ar }}</p>
                        @endif

                    </div>
                    @elseif ($item->key == 'phone')
                    <div class="point" style="margin-bottom: 10px">
                        <div class="imgpoint">
                            <img src='{{ asset("storage/images/contact-details/phone.png") }}' alt="">
                        </div>

                        <p>{{ $item->value_ar }}</p>

                    </div>
                    @elseif ($item->key == 'email_message')
                    <div class="point" style="margin-bottom: 10px">
                        <div class="imgpoint">
                            <img src='{{ asset("storage/images/contact-details/message.png") }}' alt="">
                        </div>
                            <p>{{ $item->value_ar }}</p>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>

            <div class="leftfooter">
                <div class="ppfoter">
                    <h5>{{ __("master.home") }}</h5>
                    <p><a href="{{ route('programs.index') }}">{{ __("master.programs") }}</a></p>
                    <p><a href="#">{{ __("master.notable achievements") }}</a></p>
                    <p><a href="{{ route('volunteer.index') }}">{{ __("master.partners") }}</a></p>
                </div>
                <div class="ppfoter">
                    <h5>{{ __("nav.about us") }}</h5>

                    <?php
                        $about = App\Models\AboutUs::select(
                                    'id',
                                    'title_' . laravelLocalization::getCurrentLocale() . ' as title',
                                )->get();
                        ?>
                        @foreach ($about as $item)
                        <p><a class="dropdown-item" href="{{ route('about_association', [$item->id]) }}">{{ $item->title }}</a></p>
                        @endforeach

                    {{-- <p><a href="{{ route("about_association") }}#paeep"> {{ __("nav.about us") }} </a></p> --}}

                    {{-- <p><a href="#"> الرؤية</a></p> --}}
                    {{-- <p><a href="#">الرسالة</a></p> --}}
                    <p><a href="{{ route('principles') }}">{{ __("nav.principles") }}</a></p>
                    <p><a href="{{ route('objectives') }}">{{ __("nav.goals") }}</a></p>
                    {{-- <p><a href="#">السياسات</a></p>
                    <p><a href="#">هيكلية الجمعية</a></p> --}}

                </div>
                <div class="ppfoter">
                    <h5>{{ __("nav.library") }}</h5>
                    <p><a href="{{ route('reports') }}">{{ __("nav.reports") }}</a></p>
                    <p><a href="{{ route('publications') }}">{{ __("nav.publications") }} </a></p>
                    <p><a href="{{ route('visualLibrary.index') }}">{{ __("nav.visual library") }}</a></p>
                    <p><a href="{{ route('news') }}">{{ __("master.news") }}</a></p>
                </div>
                <div class="ppfoter">
                    <h5>{{ __("nav.join us") }}</h5>
                    <p><a href="{{ route('job.index') }}">{{ __("master.add job application") }}</a></p>
                    <p><a href="{{ route('volunteer.index') }}">{{ __("nav.volunteer with us") }}</a></p>
                    <p><a href="{{ route('company.index') }}">{{ __("nav.become a partner") }}</a></p>
                    {{-- <p>{{ __("nav.contact us") }}</p> --}}
                    <p><a href="{{ route('contact_us.index') }}">{{ __("nav.contact us") }}</a></p>
                    {{-- <p><a href="#"> معلومات التواصل </a></p> --}}
                </div>

            </div>

        </div>
    </div>
    <div class="footerbotn">
        <div class="container ">
            <div class="footerall">
                <p>{{ __("master.reserved") }} <?php echo date('Y') ?> {{ __("master.ad") }}</p>
                <div class="alliconbt">
                    @foreach (App\Models\Setting::where('group', 'social')->get() as $item)

                    @if ($item->key == 'facebook')
                    <a href="{{ $item->value_ar }}">
                        <div class="icon_footericon">
                            <div class="imgfooticon">
                                <i class='bx bxl-facebook'></i>
                            </div>
                        </div>
                    </a>
                    @elseif ($item->key == 'instagram')
                    <a href="{{ $item->value_ar }}">
                        <div class="icon_footericon">
                            <div class="imgfooticon">
                                <i class='bx bxl-instagram'></i>
                            </div>
                        </div>
                    </a>
                    @elseif ($item->key == 'twitter')
                    <a href="{{ $item->value_ar }}">
                        <div class="icon_footericon">
                            <div class="imgfooticon">
                                <i class='bx bxl-twitter'></i>
                            </div>
                        </div>
                    </a>
                    @elseif ($item->key == 'youtube')
                    <a href="{{ $item->value_ar }}">
                        <div class="icon_footericon">
                            <div class="imgfooticon">
                                <i class='bx bxl-youtube'></i>
                            </div>
                        </div>
                    </a>
                    @elseif ($item->key == 'email')
                    <a href="{{ $item->value_ar }}">
                        <div class="icon_footericon">
                            <div class="imgfooticon">
                                <i class='bx bx-envelope'></i>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>

            </div>
        </div>

    </div>

    </div>



</footer>

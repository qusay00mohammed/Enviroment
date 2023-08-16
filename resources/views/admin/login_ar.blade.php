<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flora</title>
    <link rel="stylesheet" href="{{ asset('login/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('login/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('login/css/styleAr.css') }}" />
    <!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
  </head>
  <body>
    @include('layouts.alert')
    <section class="bodyFlora">

      <div class="allBodyFlora container">
        <div class="sliderSide">
          <div class="logo">
            <img src="{{ asset('login/images/logo.png') }}" alt="" />
          </div>

          <div class="sliderF">
            <!-- Swiper -->
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="textSlider">
                    <h1 class="bgNum">1</h1>
                    <h1>
                      <span class="font1">تو بوب تيك</span>
                      <br />
                      <span class="font3">للحلول المتكاملة</span>
                    </h1>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="textSlider">
                    <h1 class="bgNum">2</h1>
                    <h1>
                      <span class="font1">توفير أمان </span>
                      <br />
                      <span class="font3">إضافي لبياناتك الخاصة</span>
                    </h1>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="textSlider">
                    <h1 class="bgNum">3</h1>
                    <h1>
                      <span class="font1">نركز على بناء</span>
                      <br />
                      <span class="font3">تطبيقات وحلول رائعة</span>
                    </h1>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="textSlider">
                    <h1 class="bgNum">4</h1>
                    <h1>
                      <span class="font1">فكر بكل ما هو كبير</span>
                      <br />
                      <span class="font3">نحن نحقق لك المستحيل</span>
                    </h1>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

        <div class="loginSide">
          <div class="langToggle">
            <a href="{{ route('login.create_en') }}" class="enT">ENGLISH</a>
            <a href="{{ route('login.create_ar') }}" class="arT">العربية</a>
          </div>

          <img class="logoFlora" src="{{ asset('login/images/FLORA.png') }}" alt="" />

          <form action="{{ route('login.store') }}" method="POST" class="inputForm">
            @csrf
            <input
                type="email"
                name="email"
                placeholder="البريد الالكتروني"
                required
                class="@error('email') is-invalid @enderror"
                value="qusay@example.com"
                autocomplete="email"
                autofocus
            />

            <div class="d-flex">
              <input
                class="passwordInput @error('password') is-invalid @enderror"
                type="password"
                name="password"
                placeholder="كلمة المرور"
                required
                autocomplete="current-password"
                value="123123123"
              />
              <img  class="eyeForm" src="{{ asset('login/images/Icon ionic-ios-eye.svg') }}" alt="" />
            </div>

            <div class="chickBoxF">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="remember"
                  id="flexCheckDefault"
                  {{ old('remember') ? 'checked' : '' }}
                />
                <label class="form-check-label" for="flexCheckDefault">
                  تذكرني
                </label>
              </div>
              {{-- <a href="">نسيت كلمة المرور</a> --}}
            </div>
            {{-- <input type="submit" value=""> --}}
            <button type="submit" class="btnInputForm">تسجيل دخول</button>
          </form>

          <div class="clickW">
            <img src="{{ asset('login/images/Iconlong.svg') }}" alt="" />
            <a href="{{ route('homePage') }}">العودة للموقع الإكتروني</a>
          </div>

          <p class="textV">Version 1.0.0 - beta</p>
        </div>
      </div>
    </section>

    <script src="{{ asset('login/js/jqueryLibrary.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/swiper.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>

    <!--Internal  Notify js -->
    <script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
      $(".eyeForm").click(function () {
        $(".passwordInput").attr(
          "type",
          $(".passwordInput").attr("type") === "password" ? "text" : "password"
        );
        if ($(".passwordInput").attr("type") == "password") {
          $(this).attr("src", "{{ asset('login/images/Icon ionic-ios-eye.svg') }}");
        } else {
          $(this).attr("src", "{{ asset('login/images/eyy.svg') }}");
        }
      });
    </script>
  </body>
</html>

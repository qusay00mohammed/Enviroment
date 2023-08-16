{{-- @dd(request()->is('admin/home')) --}}

<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset('assets/logoo.png') }}" class="h-25px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">

            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/donates') or request()->is('admin/home'))
                    here show
                @endif
                menu-accordion"
                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">بيئتي</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">لوحة التحكم</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/donates') ? 'active' : '' }}" href="{{ route('donates.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">التبرعات</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الصفحة الرئيسية</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                class="menu-item
                @if (request()->is('admin/slider') or request()->is('admin/programs') or request()->is('admin/partners') or request()->is('admin/achievements'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-house"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الصفحة الرئيسية</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/slider') ? 'active' : '' }}" href="{{ route('slider.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">سلايدر</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/programs') ? 'active' : '' }}" href="{{ route('programs.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">برامجنا</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/partners') ? 'active' : '' }}" href="{{ route('partners.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">شركائنا</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/achievements') ? 'active' : '' }}" href="{{ route('achievements.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">انجازاتنا</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}


                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">من نحن</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/about-us') or request()->is('admin/principles') or request()->is('admin/goals') or request()->is('admin/list-goal'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-address-card" style="padding: 0 0 0 10px; font-size: 20px; color: #5b6e88"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">من نحن</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/about-us') ? 'active' : '' }}" href="{{ route('about-us.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">عنا</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/principles') ? 'active' : '' }}" href="{{ route('principles.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">مبادئنا وقيمنا</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/goals') ? 'active' : '' }}" href="{{ route('goals.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">الاهداف الاساسية</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/list-goal') ? 'active' : '' }}" href="{{ route('list-goal.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">الاهداف الفرعية</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}


                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الأخبار</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/news'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-newspaper" style="padding: 0 0 0 10px; font-size: 20px; color: #5b6e88"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الأخبار</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/news') ? 'active' : '' }}" href="{{ route('news.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">قائمة الاخبار</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}

                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الرسائل والطلبات</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/job-requests') or request()->is('admin/partner-requests') or request()->is('admin/volunteer-requests') or request()->is('admin/messages'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-message" style="padding: 0 0 0 10px; font-size: 20px; color: #5b6e88"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الرسائل والطلبات</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/job-requests') ? 'active' : '' }}" href="{{ route('job-requests.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">قائمة طلبات التوظيف</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/volunteer-requests') ? 'active' : '' }}" href="{{ route('volunteer-requests.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">قائمة طلبات التطوع</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/partner-requests') ? 'active' : '' }}" href="{{ route('partner-requests.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">قائمة طلبات بناء شركة</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/messages') ? 'active' : '' }}" href="{{ route('messages.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">قائمة الرسائل</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}



                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">المصادر</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/reports') or request()->is('admin/publications') or request()->is('admin/libraries'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-brands fa-sourcetree" style="padding: 0 0 0 10px; font-size: 20px; color: #5b6e88"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">المصادر</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/reports') ? 'active' : '' }}" href="{{ route('reports.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">التقارير</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/publications') ? 'active' : '' }}" href="{{ route('publications.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">الاصدارات</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/libraries') ? 'active' : '' }}" href="{{ route('libraries.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">المكتبة المرئية</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}


                {{-- ------------------------------------------------------------ --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">الاعدادات</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"

                class="menu-item
                @if (request()->is('admin/contact-details') or request()->is('admin/socials') or request()->is('admin/organizations'))
                    here show
                @endif
                menu-accordion"

                >
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-gear" style="padding: 0 0 0 10px; font-size: 20px; color: #5b6e88"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">الاعدادات</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/socials') ? 'active' : '' }}" href="{{ route('socials.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">إدارة مواقع التواصل الاجتماعي</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/contact-details') ? 'active' : '' }}" href="{{ route('contact-details.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">تفاصيل موقعنا</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->is('admin/organizations') ? 'active' : '' }}" href="{{ route('organizations.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">انواع المنظمات</span>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ------------------------------------------------------------ --}}



            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
<!--end::Aside-->

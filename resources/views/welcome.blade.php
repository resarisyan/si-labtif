<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('epora/assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('epora/assets/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/backtotop.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/ui-icon.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/elegentfonts.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/font-awesome-pro.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('epora/assets/css/style.css') }}">
        <!-- Scripts -->
    </head>

    <body>
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <!-- loading content here -->
                </div>
            </div>
        </div>

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->

        <!-- header area start -->
        <header class="header__transparent">
            <div class="header__area pl-220 pr-220 pt-30">
                <div class="main-header" id="header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-6 col-6">
                                <div class="logo-area d-flex align-items-center">
                                    <div class="logo">
                                        <span href="index.html">
                                            <img src="{{ asset('images/logo/logo-light.png') }}" alt="logo">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-9 col-xl-9 col-lg-7 col-md-6 col-6 d-flex align-items-center justify-content-end">
                                <div class="main-menu d-flex justify-content-end mr-15">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li>
                                                <a href="#home">Home</a>
                                            </li>
                                            <li>
                                                <a href="#about">About</a>
                                            </li>
                                            <li>
                                                <a href="#course">Courses</a>
                                            </li>
                                            <li>
                                                <a href="#team">Team</a>
                                            </li>
                                            <li>
                                                <a href="#faq">FAQ</a>
                                            </li>
                                            <li>
                                                <a href="#brand">Support</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right d-md-flex align-items-center">
                                    <div class="header-meta">
                                        <ul>
                                            <li><a href="@auth {{ route('dashboard') }} @else {{ route('login') }} @endauth"
                                                    class="d-none d-md-block"><i class="fi fi-rr-user"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end -->
        <div class="tp-sidebar-menu">
            <button class="sidebar-close"><i class="icon_close"></i></button>
            <div class="side-logo mb-30">
                <a href="index.html"><img src="{{ asset('epora/assets/img/logo/logo-black.png') }}" alt="logo"></a>
            </div>
            <div class="mobile-menu"></div>
            <div class="sidebar-info">
                <h4 class="mb-15">Contact Info</h4>
                <ul class="side_circle">
                    <li>27 Division St, New York</li>
                    <li><a href="tel:123456789">+1 800 123 456 78</a></li>
                    <li><a href="mailto:epora@example.com">epora@example.com</a></li>
                </ul>
                <div class="side-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="body-overlay"></div>

        <main>

            <!-- banner-area -->
            <section class="banner-area fix p-relative" id="home">
                <div class="banner-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-8">
                                <div class="hero-content">
                                    <span>{{ $banner->caption }}</span>
                                    <h2 class="hero-title mb-35">WELCOME TO <i>ASLABTIF</i></h2>
                                    <p>{{ $banner->description }}</p>
                                    <div class="tp-banner-btn">
                                        <a href="{{ route('login') }}" class="tp-btn">Learn Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner-shape d-none d-lg-block">
                                <img src="{{ $banner->image ? url('storage/'.$banner->image) : asset('epora/assets/img/banner/banner-shape-01.png') }}"
                                    alt="banner-shape" class="b-shape" width="925" height="827">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area -->
            <section class="tp-about-area pt-120 pb-90" id="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-6 col-lg-6 col-md-6">
                            <div class="tp-about-img p-relative pb-30 ml-10">
                                <img src="{{ $about->image_1 ? url('storage/'.$about->image_1) : asset('epora/assets/img/about/about-img.png') }}"
                                    alt="about-img" width="500" height="270">
                                <div class="tp-about-line-shape d-none d-md-block">
                                    <img src="{{ asset('epora/assets/img/about/about-shape-03.png') }}"
                                        alt="about-shape" class="tp-aline-one">
                                    <img src="{{ asset('epora/assets/img/about/about-shape-04.png') }}"
                                        alt="about-shape" class="tp-aline-two">
                                    <img src="{{ asset('epora/assets/img/about/about-shape-05.png') }}"
                                        alt="about-shape" class="tp-aline-three">
                                </div>
                                <div class="tp-about-shape  d-none d-xl-block">
                                    <img src="{{ $about->image_2 ? url('storage/'.$about->image_2) : asset('epora/assets/img/about/about-shape-01.png') }}"
                                        alt="about-shape" class="a-shape-one" width="353" height="287">
                                    <img src="{{ $about->image_3 ? url('storage/'.$about->image_3) : asset('epora/assets/img/about/about-shape-02.png') }}"
                                        alt="about-shape" class="a-shape-two" width="224" height="237">
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6">
                            <div class="tp-about-content pb-30 ml-80">
                                <div class="section-title mb-55">
                                    <span class="tp-sub-title mb-20">About Aslabtif</span>
                                    <h2 class="tp-section-title mb-15">{{ $about->title }}</h2>
                                    <p>{{ $about->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- course-area -->
            <section class="course-area pt-115 pb-110" id="course">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-12">
                            <div class="section-title mb-65">
                                <h2 class="tp-section-title mb-20">Explore Our Courses</h2>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-5 col-6">
                            <div class="tp-course-arrow d-flex justify-content-md-end"></div>
                        </div>
                    </div>
                    <div class="course-active mb-15 tp-slide-space">
                        @foreach ($courses as $course)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="tpcourse mb-40">
                                <div class="tpcourse__thumb p-relative w-img fix">
                                    <span><img src="{{ url('storage/'.$course->image) }}" alt="course-thumb" width="410"
                                            height="270"></span>
                                    <div class="tpcourse__tag">
                                        <a href="course-details.html"><i class="fi fi-rr-heart"></i></a>
                                    </div>
                                </div>
                                <div class="tpcourse__content">
                                    <div class="tpcourse__avatar d-flex align-items-center mb-20">
                                        <img src="{{ url('storage/'.$course->image) }}" alt="course-avata" width="70"
                                            height="70">
                                        <h4 class="tpcourse__title">{{$course->nama}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- course-area-end -->

            <!-- instructor-area -->
            <section class="instructor-area pt-110 pb-110" id="team">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-12">
                            <div class="section-title mb-65">
                                <h2 class="tp-section-title mb-20">Our Aslabtif Team</h2>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-5 col-6">
                            <div class="tp-instruc-arrow d-flex justify-content-md-end"></div>
                        </div>
                    </div>
                    <div class="intruc-active mb-15 tp-slide-space">
                        @foreach ($instructors as $instructor)
                        <div class="tp-instruc-item">
                            <div class="tp-instructor text-center p-relative mb-30">
                                <div class="tp-instructor__thumb mb-25">
                                    <img src="{{ url('storage/'.$instructor->image) }}" alt="instructor-profile">
                                </div>
                                <div class="tp-instructor__content">
                                    <h4 class="tp-instructor__title mb-20">{{ $instructor->name }}</h4>
                                    <span>{{ $instructor->asisten->jabatan }}</span>
                                    <div class="tp-instructor__social">
                                        <ul>
                                            <li><a href="instructor-profile.html"><i
                                                        class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="instructor-profile.html"><i
                                                        class="fa-brands fa-twitter"></i></a></li>
                                            <li><a href="instructor-profile.html"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="instructor-profile.html"><i
                                                        class="fa-brands fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- instructor-area-enfd -->

            <!-- faq-area -->
            <section class="faq-area pb-120" id="faq">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="section-title mb-60">
                                <span class="tp-sub-title-box mb-15">FAQ</span>
                                <h2 class="tp-section-title">Many People Ask About This</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion pb-20" id="accordionExample">
                                @foreach ($faqs as $faq)
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faq-area-end -->

            <!-- brand-area -->
            <section class="brand-area pb-110" id="brand">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title mb-65 text-center">
                                <h2 class="tp-section-title mb-20">Our Key Supporters</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="brand-area tp-brand-active">
                                @foreach ($supporters as $supporter)
                                <div class="brand-item">
                                    <img src="{{ url('storage/'.$supporter->image) }}" alt="{{ $supporter->name }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- brand-area-end -->

        </main>

        <!-- footer-area -->
        <footer>
            <div class="footer-bg theme-bg bg-bottom"
                data-background="{{ asset('epora/assets/img/bg/shape-bg-02.png') }}">
                <div class="f-copyright pt-50 pb-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="f-copyright__logo mb-30">
                                    <a href="index.html"><img src="{{ asset('images/logo/logo-light.png') }}"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="f-copyright__text text-md-end mb-30">
                                    <span>Copyright©ASLABTIF 2024, All Rights Reserved</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->

        <script src="{{ asset('epora/assets/js/vendor/jquery.js') }}"></script>
        <script src="{{ asset('epora/assets/js/vendor/waypoints.js') }}"></script>
        <script src="{{ asset('epora/assets/js/bootstrap-bundle.js') }}"></script>
        <script src="{{ asset('epora/assets/js/meanmenu.js') }}"></script>
        <script src="{{ asset('epora/assets/js/slick.js') }}"></script>
        <script src="{{ asset('epora/assets/js/magnific-popup.js') }}"></script>
        <script src="{{ asset('epora/assets/js/parallax.js') }}"></script>
        <script src="{{ asset('epora/assets/js/backtotop.js') }}"></script>
        <script src="{{ asset('epora/assets/js/nice-select.js') }}"></script>
        <script src="{{ asset('epora/assets/js/counterup.js') }}"></script>
        <script src="{{ asset('epora/assets/js/wow.js') }}"></script>
        <script src="{{ asset('epora/assets/js/isotope-pkgd.js') }}"></script>
        <script src="{{ asset('epora/assets/js/imagesloaded-pkgd.js') }}"></script>
        <script src="{{ asset('epora/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('epora/assets/js/main.js') }}"></script>
    </body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="nk-body bg-white npc-general pg-auth">
        <div class="nk-app-root">
            <div class="nk-main">
                <div class="nk-wrap nk-wrap-nosidebar">
                    <main class="nk-content">
                        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                            <div class="brand-logo pb-4 text-center">
                                <a href="html/index.html" class="logo-link">
                                    <x-application-logo />
                                </a>
                            </div>
                            <div class="card card-bordered">
                                <div class="card-inner card-inner-lg">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                        <div class="nk-footer nk-auth-footer-full">
                            <div class="container wide-lg">
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="nk-block-content text-center text-lg-start">
                                            <p class="text-soft">&copy; 2023 Dashlite. All Rights Reserved.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>
    </body>

</html>

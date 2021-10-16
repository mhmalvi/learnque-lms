<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ URL::to('/') }}" />

    <title>{{ config('app.name', 'LearnQue') }} - @yield('title')</title>

    @include('layouts.styles')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    <!-- Drawer Layout -->
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page-content">

            <!-- Header -->
            <!-- Navbar -->
            @include('layouts.header')
            <!-- // END Navbar -->
            <!-- // END Header -->

            @include('components.breadcrumb')

            <!-- BEFORE Page Content -->

            <!-- // END BEFORE Page Content -->

            <!-- Page Content -->
            <div class="container page__container" id="app">
                @yield('content')
            </div>
            <!-- // END Page Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- // END Footer -->
        </div>

        <!-- // END drawer-layout__content -->

        <!-- Drawer -->

        <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
            @include('layouts.sidebar')
        </div>

        <!-- // END Drawer -->

    </div>
    @include('layouts.scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

              @include('layouts.styles')
    </head>

    <body class="layout-sticky-subnav layout-learnly ">

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

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <div id="header" class="mdk-header js-mdk-header mb-0" data-fixed data-effects="waterfall">
                <div class="mdk-header__content">
                    <div class="navbar navbar-expand navbar-light bg-white navbar-shadow" id="default-navbar" data-primary>
                        <div class="container page__container">
                            <!-- Navbar Brand -->
                            <a href="" class="navbar-brand mr-16pt">
                                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                                    <span class="avatar-title rounded bg-primary">
                                        <img src="{{asset('assets/images/illustration/student/128/white.svg')}}" alt="logo" class="img-fluid" />
                                    </span>
                                </span>

                                <span class="d-none d-lg-block">Learnque</span>
                            </a>

                            <!-- Navbar toggler -->
                            <button class="navbar-toggler w-auto mr-16pt d-block rounded-0" type="button" data-toggle="sidebar">
                                <span class="material-icons">menu</span>
                            </button>

                            <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt"></ul>

                            <form class="search-form form-control-rounded navbar-search d-none d-lg-flex mr-16pt" action="" style="max-width: 230px">
                                <button class="btn" type="submit"><i class="material-icons">search</i></button>
                                <input type="text" class="form-control" placeholder="Search ...">
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content ">

                <div class="mdk-box mdk-box--bg-white-35 bg-white js-mdk-box mb-0"
                     data-effects="parallax-background blend-background">
                    <div class="mdk-box__bg">
                        <div class="mdk-box__bg-front"
                             style="background-image: url({{asset('assets/images/photodune-4161018-group-of-students-m.jpg')}});"></div>
                    </div>
                    <div class="mdk-box__content d-flex align-items-center justify-content-center container page__container text-center py-112pt" style="min-height: 656px;">
                        <div class="card card--transparent mb-0 p-3 pt-5" style="width: 28rem">
                            <h3 class="text-primary">We Are Happy To See You!</h3>
                            <div class="card-body text-left">
                                @include('auth.login')
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </div>
            <!-- // END Header Layout Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- // END Footer -->
        </div>
        <!-- // END Header Layout -->

        <!-- Drawer -->
        @include('layouts.nav')
        <!-- // END Drawer -->

        @include('layouts.scripts')

    </body>

</html>
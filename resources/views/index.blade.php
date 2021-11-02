@extends('layouts.guest')

@section('content')
    <div class="page-section border-bottom-2 bg-white">
        <div class="container page__container">
            <div class="page-headline text-center">
                <h2>Features</h2>
                <p class="lead measure-lead mx-auto text-70">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
            </div>

            <div class="row align-items-center">
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">subscriptions</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">8,000+ Courses</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">verified_user</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">By Industry Experts</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">update</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Unlimited Access</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">code</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Lesson Source Files</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">layers</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Printed Diploma</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">accessibility</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Premium Support</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Courses</div>
            </div>

            <home-course-list-component />
        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Learning Paths</div>
            </div>

            <div class="row card-group-row">

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/react_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">React Native</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/react_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">React Native</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with React Native and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/devops_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">Dev Ops</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/devops_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">Dev Ops</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with Dev Ops and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/redis_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">Redis</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/redis_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">Redis</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with Redis and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row card-group-row mb-lg-8pt">

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/mailchimp_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">MailChimp</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/mailchimp_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">MailChimp</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with MailChimp and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">Swift</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/swift_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">Swift</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with Swift and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card mb-lg-0"
                            data-toggle="popover"
                            data-trigger="click">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset('assets/images/paths/wordpress_40x40@2x.png')}}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">WordPress</div>
                                            <p class="flex text-50 lh-1 mb-0"><small>18 courses</small></p>
                                        </div>
                                    </div>
                                </div>

                                <a href="undefinedstudent-path.html"
                                    data-toggle="tooltip"
                                    data-title="Add Favorite"
                                    data-placement="top"
                                    data-boundary="window"
                                    class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                            </div>

                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset('assets/images/paths/wordpress_40x40@2x.png')}}"
                                        width="40"
                                        height="40"
                                        alt="Angular"
                                        class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">WordPress</div>
                                <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-70">Learn the fundamentals of working with WordPress and how to create basic applications.</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center mr-8pt">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-primary mr-8pt">Resume</a>
                                <a href="undefinedstudent-path.html"
                                    class="btn btn-outline-secondary ml-0">Start over</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-50 mr-8pt">Your rating</small>
                            <div class="rating mr-8pt">
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                            </div>
                            <small class="text-50">4/5</small>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">From the blog</div>
            </div>

            <div class="row card-group-row">

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/sketch_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_luke-porter-261779-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                            <div class="posts-card-popular__title card-body">
                                <small class="text-muted text-uppercase">sketch</small>
                                <a class="card-title"
                                    href="">Merge Duplicates Inconsistent Symbols</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/invision_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_michael-dam-258165-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                            <div class="posts-card-popular__title card-body">
                                <small class="text-muted text-uppercase">invision</small>
                                <a class="card-title"
                                    href="">Design Systems Essentials</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/photoshop_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_rsz_1andy-lee-642320-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                            <div class="posts-card-popular__title card-body">
                                <small class="text-muted text-uppercase">photoshop</small>
                                <a class="card-title"
                                    href="">Semantic Logo Design</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="posts-cards">

                <div class="card posts-card mb-0">
                    <div class="posts-card__content d-flex align-items-center flex-wrap">
                        <div class="avatar avatar-lg mr-3">
                            <a href="blog-post.html"><img src="{{asset('assets/images/paths/invision_200x168.png')}}"
                                        alt="avatar"
                                        class="avatar-img rounded"></a>
                        </div>
                        <div class="posts-card__title flex d-flex flex-column">
                            <a href="blog-post.html"
                                class="card-title mr-3">Design Systems Essentials</a>
                            <small class="text-50">35 views last week</small>
                        </div>
                        <div class="d-flex align-items-center flex-column flex-sm-row posts-card__meta">
                            <div class="mr-3 text-50 text-uppercase posts-card__tag d-flex align-items-center">
                                <i class="material-icons text-muted-light mr-1">folder_open</i> inVision
                            </div>
                            <div class="mr-3 text-50 posts-card__date">
                                <small>11 Nov, 2018 07:46 AM</small>
                            </div>
                            <div class="media ml-sm-auto align-items-center">
                                <div class="media-left mr-2 avatar-group">

                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <img src="{{asset('assets/images/256_rsz_1andy-lee-642320-unsplash.jpg')}}"
                                                alt="Avatar"
                                                class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <img src="{{asset('assets/images/256_michael-dam-258165-unsplash.jpg')}}"
                                                alt="Avatar"
                                                class="avatar-img rounded-circle">
                                    </div>

                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <img src="{{asset('assets/images/256_luke-porter-261779-unsplash.jpg')}}"
                                                alt="Avatar"
                                                class="avatar-img rounded-circle">
                                    </div>

                                </div>
                                <div class="media-body">

                                    <a href="">+2 more</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="page-section bg-alt">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">Feedback</div>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

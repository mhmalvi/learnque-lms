@extends('admin.layouts.app')

@section('title', 'Classrooms')

@section('link')
    <a href="{{ route('admin.classroom.create') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            add_circle_outline
        </span>
        Add New
    </a>
@endsection

@section('content')
    <div class="container-fluid page__container p-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card" data-toggle="popover" data-trigger="click" data-original-title="" title="" data-domfactory-upgraded="overlay">
                    <a href="student-course.html" class="card-img-top js-image" 
                    data-position="center" data-height="140" data-domfactory-upgraded="image" 
                    style="display: block; position: relative; overflow: hidden; background-image: url(&quot;file:///F:/Templates/luma/luma-v2.0.0/public/images/paths/sketch_430x168.png&quot;); background-size: cover; background-position: center center; height: 140px;">
                        <img src="../../public/images/paths/sketch_430x168.png" alt="course" style="visibility: hidden;">
                        <span class="overlay__content">
                            <span class="overlay__action d-flex flex-column text-center">
                                <i class="material-icons icon-32pt">play_circle_outline</i>
                                <span class="card-title text-white">Preview</span>
                            </span>
                        </span>
                    </a>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title" href="student-course.html">Learn Sketch</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                            <a href="student-course.html" data-toggle="tooltip" data-title="Add Favorite" data-placement="top" data-boundary="window" class="ml-4pt material-icons text-20 card-course__icon-favorite" data-original-title="" title="">favorite_border</a>
                        </div>
                        <div class="d-flex">
                            <div class="rating flex">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                            <!-- <small class="text-50">6 hours</small> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

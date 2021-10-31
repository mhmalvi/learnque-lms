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
            <div class="col-md-2">
                <div class="card card-sm card--elevated p-relative card-group-row__card">
                    <a href="" class="card-img-top js-image" 
                    data-position="center" data-height="150" data-domfactory-upgraded="image" 
                    style="display: block; position: relative; overflow: hidden; background-image: url('{{asset('assets/images/paths/sketch_430x168.png')}}'); background-size: cover; background-position: center center; height: 140px;">
                    </a>

                    <div class="card-body flex">
                        <div class="d-flex">
                            <div class="flex">
                                <a class="card-title" href="">Learn React - From Beginner To Advance</a>
                                <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">room</span>
                                <p class="flex text-50 lh-1 mb-0"><small>A</small></p>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">people</span>
                                <p class="flex text-50 lh-1 mb-0"><small>12 Students</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Course List')

@section('links')
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Create New</a>
@endsection

@section('content')
    <div class="container page__container p-5">
        <div class="row">
            <div class="col-md-12">
                <course-list />
            </div>
        </div>
    </div>
@endsection

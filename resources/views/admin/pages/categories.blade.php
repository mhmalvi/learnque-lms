@extends('admin.layouts.app')

@section('title', 'Course Category List')


@section('content')
    <div class="row">
        <div class="col-md-4">
            <create-course-category-form />
        </div>
        <div class="col-md-6 offset-md-2">
            <course-category-list />
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Course Category List')


@section('content')
    <div class="row">
        <div class="col-md-4">
            <create-categories />
        </div>
        <div class="col-md-7 offset-md-1">
            <list-categories />
        </div>
    </div>
@endsection

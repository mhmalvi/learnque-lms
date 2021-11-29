@extends('admin.layouts.app')

@section('title', "Dashboard")

@section('content')
    <div class="container-fluid page__container p-5">
        <div class="col-md-8">
            <event-calendar-component />
        </div>
    </div>
@endsection

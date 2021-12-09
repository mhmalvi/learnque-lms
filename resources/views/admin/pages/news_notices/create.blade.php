@extends('admin.layouts.app')

@section("title", "Create News & Notices")

@section('content')
    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                <create-news-notice-component />
            </div>
        </div>
    </div>
@endsection

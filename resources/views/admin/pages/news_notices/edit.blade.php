@extends('admin.layouts.app')

@section("title", "Edit News & Notices")

@section('content')
    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                <edit-news-notice-component data="{{ $news_notice }}" />
            </div>
        </div>
    </div>
@endsection

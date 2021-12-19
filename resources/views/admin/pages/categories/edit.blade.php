@extends('admin.layouts.app')

@section('title', "Edit Course Category")

@section('content')
<div class="container-fluid page__container p-5">
    <div class="row">
        <div class="col-md-10">
            <edit-category-component />
        </div>
    </div>
</div>
@endsection

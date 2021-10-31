@extends('admin.layouts.app')

@section('content')
    <div class="container page__container">
        <div class="row py-2">
            <div class="col-md-12">
                <img src="{{asset('assets/images/paths/typescript_892x286.png')}}" class="img-fluid rounded" alt="">
            </div>
        </div>

        <div class="row py-2">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        {{ json_encode($classroom) }}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        main content
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

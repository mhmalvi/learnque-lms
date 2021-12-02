@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Overview</div>
            </div>

            <div class="col-md-12">
                <event-calendar-component :editable="false" />
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Chart.js -->
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs.js') }}"></script>

    <!-- Moment.js -->
    <script src="{{asset('assets/vendor/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/moment-range.js')}}"></script>

    <!-- Flatpickr -->
    <script src="{{asset('assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>



    <!-- List.js -->
    <script src="{{asset('assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('assets/js/list.js')}}"></script>

    <!-- Tables -->
    <script src="{{asset('assets/js/toggle-check-all.js')}}"></script>
    <script src="{{asset('assets/js/check-selected-row.js')}}"></script>

    <script src="{{ asset('assets/js/page.student-dashboard.js') }}"></script>
@endpush

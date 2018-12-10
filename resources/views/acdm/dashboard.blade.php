@extends('acdm.layout.app')


@section('styles')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('acdm_assets/css/app/vendors.css') }}">
@stop

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            @if($user = Auth::user())
                <div class="content-body">




                </div>
            @endif
        </div>
    </div>
@stop

@section('scripts')

@stop

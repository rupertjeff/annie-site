@extends('template')

@section('pageTitle')
AnnieDigital Admin
@stop

@section('styles')
	@parent
@stop

@section('scripts')
	@parent

	{{ HTML::script('js/admin.js') }}
@stop

@section('content')

@include('partials.admin.header')

<div class="main-content" ng-view></div>

@include('partials.admin.footer')

@stop

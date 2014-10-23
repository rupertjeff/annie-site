@extends('template')

@section('scripts')
	@parent

	{{ HTML::script('js/main.js') }}
@stop

@section('content')

	@include('partials.intro')

	@include('partials.portfolio')

	@include('partials.about')

	@include('partials.contact')

	@include('partials.footer')

@stop

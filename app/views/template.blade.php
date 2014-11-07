<!DOCTYPE html>
<html ng-app="AnnieDigital">

	<head>
		<title>@yield('pageTitle', 'AnnieDigital')</title>

		@section('styles')
		{{ HTML::style('http://fonts.googleapis.com/css?family=Molle:400italic|Raleway:400,700') }}
		{{ HTML::style('css/normalize.css') }}
		{{ HTML::style('css/main.css') }}
		@show
		@section('scripts')
		{{ HTML::script('js/vendor/jquery/jquery.min.js') }}
		{{ HTML::script('js/vendor/underscore/underscore.js') }}
		{{ HTML::script('js/vendor/angular/angular.min.js') }}
		{{ HTML::script('js/vendor/angular/angular-resource.min.js') }}
		{{ HTML::script('js/vendor/angular/angular-route.min.js') }}
		{{ HTML::script('js/vendor/angular/angular-sanitize.min.js') }}
		@show
	</head>

	<body>
		@yield('content')
	</body>

</html>

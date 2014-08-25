<!DOCTYPE html>
<html ng-app="AnnieDigital">

	<head>
		<title>@yield('pageTitle', 'AnnieDigital')</title>

		@section('styles')
		{{ HTML::style('css/main.css') }}
		@show
		@section('scripts')
		{{ HTML::script('js/vendor/angular/angular.min.js') }}
		{{ HTML::script('js/vendor/angular/angular-resource.min.js') }}
		{{ HTML::script('js/vendor/angular/angular-route.min.js') }}
		@show
	</head>

	<body>
		@yield('content')
	</body>

</html>

'use strict';

var annieApp = angular.module('AnnieDigital', [
	'ngRoute'
]);

annieApp.config([
	'$routeProvider',
	function ($routeProvider)
	{
		$routeProvider.when('/tags', {
			'templateUrl': 'partials/tags',
			'controller': 'TagsController'
		});
	}
]);


var annieControllers = angular.module('annieControllers', []);

annieControllers.controller('TagController', ['$scope',
	function ($scope)
	{
		$scope.tags = [];
	}
]);


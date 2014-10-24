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


'use strict';

var annieServices = angular.module('annieServices', ['ngResource']);

annieServices.factory('Tags', ['$resource', function ($resource)
{
	return $resource('/api/tags/:tagId', {}, {
		'query': {
			'method': 'GET',
			'params': {
				'tagId': 'tags'
			},
			'isArray': true
		}
	})
}]);

var annieControllers = angular.module('annieControllers', []);

annieControllers.controller('TagController', ['$scope',
	function ($scope)
	{
		$scope.tags = [];
	}
]);


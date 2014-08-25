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

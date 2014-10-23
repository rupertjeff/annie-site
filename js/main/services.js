angular.module('AnnieServices', ['ngResource']);

angular.module('AnnieServices').factory('Tags', [
	'$resource', function ($resource)
	{
		return $resource('/api/v1/tags/:tagId');
	}
]);

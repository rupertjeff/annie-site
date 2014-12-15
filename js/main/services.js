angular.module('AnnieServices', ['ngResource']);

angular.module('AnnieServices').factory('Tags', [
	'$resource', function ($resource)
	{
		return $resource('/api/v1/tags/:tagId');
	}
]);

angular.module('AnnieServices').factory('Projects', [
	'$resource', function ($resource)
	{
		return $resource('/api/v1/projects/:projectId');
	}
]);

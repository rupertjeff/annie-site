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

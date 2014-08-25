var annieControllers = angular.module('annieControllers', []);

annieControllers.controller('TagController', ['$scope',
	function ($scope)
	{
		$scope.tags = [];
	}
]);

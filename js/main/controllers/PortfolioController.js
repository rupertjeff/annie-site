function PortfolioController($scope, Tags)
{
	$scope.tags = {};
	Tags.query(function (response)
	{
		$scope.tags = response;
	});
}

angular.module('AnnieDigital').controller('PortfolioController', PortfolioController);

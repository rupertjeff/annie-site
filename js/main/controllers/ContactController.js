function ContactController($scope, $http)
{
	$scope.showForm = true;

	$scope.submitForm = function ()
	{
		var data = {
			'name':     $scope.name,
			'email':    $scope.email,
			'comments': $scope.comments
		};

		if ($scope.contactForm.$valid)
		{
			$http.post('/api/v1/contact/store', data)
				.success(function (response)
				{
					$scope.showForm = false;
				});
		}
	}
}

angular.module('AnnieDigital').controller('ContactController', ContactController);

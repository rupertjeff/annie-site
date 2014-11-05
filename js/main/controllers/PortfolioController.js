function PortfolioController($scope, Tags, Projects)
{
	$scope.tags = [
		{
			'name': 'Web',
			'uri': 'web',
			'icon': '/img/tags/web.svg',
			'projects': [
				{
					'name': 'Project 1',
					'description': 'Some project',
					'image': '/img/projects/project-1.jpg',
					'thumb': '/img/projects/thumbs/project-1.jpg'
				}
			]
		},
		{
			'name': 'Mobile',
			'uri': 'mobile',
			'icon': '/img/tags/mobile.svg',
			'projects': [
				{
					'name': 'Mobile Project 1',
					'description': 'Some other project',
					'image': '/img/projects/project-2.jpg',
					'thumb': '/img/projects/thumbs/project-2.jpg'
				}
			]
		}
	];
	$scope.currentTag = $scope.tags[0];

	$scope.switchTag = function (tag)
	{
		$scope.currentTag = tag;
	};

	//Tags.query(function (response)
	//{
	//	$scope.tags = response;
	//	$scope.currentTag = $scope.tags[0];
	//	$scope.setProjects();
	//});
	//
	//$scope.setProjects = function ()
	//{
	//	Projects.query(function (response)
	//	{
	//		$scope.projects = response;
	//	});
	//}
}

angular.module('AnnieDigital').controller('PortfolioController', PortfolioController);

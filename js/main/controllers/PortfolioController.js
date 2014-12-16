function PortfolioController($scope, Tags, Projects)
{
	//import('includes/tags.js');
	$scope.currentImage = null;

	$scope.switchTag = function (tag)
	{
		$scope.currentTag = tag;
		$scope.clearProject();
	};

	$scope.switchProject = function (project)
	{
		if ($scope.isCurrentProject(project))
		{
			$scope.clearProject();
		}
		else
		{
			$scope.currentProject = project;

			$scope.switchImage(project.images[0]);
		}
	};

	$scope.clearProject = function ()
	{
		$scope.currentProject = null;
	};

	$scope.previousImage = function ()
	{
		var images = $scope.currentProject.images,
			currentIndex = _.indexOf(images, $scope.currentImage),
			nextImage = currentIndex - 1;

		if (0 > nextImage)
		{
			nextImage = images.length - 1;
		}

		$scope.switchImage(images[nextImage]);
	};

	$scope.nextImage = function ()
	{
		var images = $scope.currentProject.images,
			currentIndex = _.indexOf(images, $scope.currentImage),
			nextImage = currentIndex + 1;

		if (images.length <= nextImage)
		{
			nextImage = 0;
		}

		$scope.switchImage(images[nextImage]);
	};

	$scope.switchImage = function (image)
	{
		$scope.currentImage = image;
	};

	$scope.isCurrentTag = function (tag)
	{
		return $scope.currentTag === tag;
	};

	$scope.isCurrentProject = function (project)
	{
		return $scope.currentProject === project;
	};

	$scope.isCurrentImage = function (image)
	{
		return $scope.currentImage === image;
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

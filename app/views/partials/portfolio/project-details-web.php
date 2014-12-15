<figcaption class="details">
	<a class="close" ad-close-details ng-click="clearProject()">&times;</a>
	<div class="project-client" ng-bind-html="currentProject.client"></div>
	<div class="project-title" ng-bind-html="currentProject.title"></div>
	<?php include('project-images.php'); ?>
	<?php include('project-side-image.php'); ?>
	<div class="project-description" ng-bind-html="currentProject.description"></div>
</figcaption>

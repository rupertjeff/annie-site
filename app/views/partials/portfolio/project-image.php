<div class="project-image" ng-class="{ 'active': isCurrentImage(image) }" ng-repeat="image in currentProject.images">
	<img src="{{ image.image }}" alt="{{ image.alt }}" />
</div>

<figure id="{{ project.uri }}" class="project" ng-repeat="project in tag.projects" ng-class="{ 'current': isCurrentProject(project) }" ng-click="switchProject(project)">
	<img src="{{ project.thumb }}" alt="{{ project.title }}" />
</figure>

<figure id="{{ project.uri }}" class="project" ng-repeat="project in tag.projects" ng-class="{ 'current': isCurrentProject(project) }" ng-click="switchProject(project)">
	<img ng-src="{{ project.thumb }}" alt="{{ project.title }}" />
	<figcaption ng-bind-html="(project.client ? project.client + ' - ' : '') + project.title"></figcaption>
</figure>

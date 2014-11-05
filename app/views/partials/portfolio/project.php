<figure id="{{ project.uri }}" class="project" ng-repeat="project in tag.projects">
	<img src="{{ project.thumb }}" alt="{{ project.name }}" />
	<figcaption class="details">
		<div class="project-name">{{ project.name }}</div>
		<div class="project-description">{{ project.description }}</div>
	</figcaption>
</figure>

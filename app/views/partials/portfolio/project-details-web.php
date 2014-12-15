<figcaption class="details">
	<a class="close" ad-close-details ng-click="clearProject()">&times;</a>
	<div class="project-client" ng-bind-html="currentProject.client"></div>
	<div class="project-title" ng-bind-html="currentProject.title"></div>
	<?php include('project-images.php'); ?>
	<div class="show-all" ng-if=" ! currentProject.process">
		<?php include('project-side-image.php'); ?>
		<div class="project-description" ng-bind-html="currentProject.description"></div>
	</div>
	<div class="low-res-only" ng-if="currentProject.process">
		<?php include('project-side-image.php'); ?>
		<div class="project-description" ng-bind-html="currentProject.description"></div>
	</div>
	<div class="hi-res-only" ng-if="currentProject.process">
		<div class="project-problem">
			<img ng-src="{{ currentProject.problem.image.file }}" alt="{{ currentProject.problem.image.alt }}" />
			<div class="project-problem-details">
				<div class="project-problem-tag" ng-if="currentProject.problem.text.tag" ng-bind-html="currentProject.problem.text.tag"></div>
				<div class="project-problem-title" ng-if="currentProject.problem.text.title" ng-bind-html="currentProject.problem.text.title"></div>
				<div class="project-problem-description" ng-if="currentProject.problem.text.content" ng-bind-html="currentProject.problem.text.content"></div>
			</div>
		</div>
		<div class="project-process">
			<div class="project-process-top">
				<div class="project-process-details">
					<div class="project-process-tag" ng-if="currentProject.process[0].text.tag" ng-bind-html="currentProject.process[0].text.tag"></div>
					<div class="project-process-title" ng-if="currentProject.process[0].text.title" ng-bind-html="currentProject.process[0].text.title"></div>
					<div class="project-process-description" ng-if="currentProject.process[0].text.content" ng-bind-html="currentProject.process[0].text.content"></div>
				</div>
				<img ng-src="{{ currentProject.process[0].image.file }}" alt="{{ currentProject.process[0].image.alt }}" />
			</div>
			<div class="project-process-bottom">
				<div class="project-process-row">
					<div class="project-process-image">
						<img ng-src="{{ currentProject.process[1].first.file }}" alt="{{ currentProject.process[1].first.alt" />
					</div>
					<div class="project-process-image">
						<img ng-src="{{ currentProject.process[1].second.file }}" alt="{{ currentProject.process[1].second.alt }}" />
					</div>
				</div>
				<div class="project-process-row">
					<div class="project-process-image">
						<img ng-src="{{ currentProject.process[2].first.file }}" alt="{{ currentProject.process[2].first.alt }}" />
					</div>
					<div class="project-process-image">
						<img ng-src="{{ currentProject.process[2].second.file }}" alt="{{ currentProject.process[2].second.alt }}" />
					</div>
				</div>
			</div>
		</div>
		<div class="project-solution">
			<div class="project-solution-top">
				<img ng-src="{{ currentProject.solution[0].image.file }}" alt="{{ currentProject.solution[0].image.alt }}" />
				<div class="project-solution-details">
					<div class="project-solution-tag" ng-if="currentProject.solution[0].text.tag" ng-bind-html="currentProject.solution[0].text.tag"></div>
					<div class="project-solution-title" ng-if="currentProject.solution[0].text.title" ng-bind-html="currentPRoject.solution[0].text.title"></div>
					<div class="project-solution-description" ng-if="currentProject.solution[0].text.content" ng-bind-html="currentProject.solution[0].text.content"></div>
				</div>
			</div>
			<div class="project-solution-bottom">
				<div class="project-solution-details">
					<div class="project-solution-title" ng-if="currentProject.solution[1].text.title" ng-bind-html="currentProject.solution[1].text.title"></div>
					<div class="project-solution-description" ng-if="currentProject.solution[1].text.content" ng-bind-html="currentProject.solution[1].text.content"></div>
				</div>
				<img ng-src="{{ currentProject.solution[1].image.file }}" alt="{{ currentProject.solution[1].image.alt }}" />
			</div>
		</div>
	</div>
	<a class="btn btn-cta" ad-close-details ng-click="clearProject()">Close Project</a>
</figcaption>

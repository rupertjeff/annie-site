<div id="{{ tag.uri }}" class="project-group {{ tag.uri }}" ng-show="isCurrentTag(tag)" ng-repeat="tag in tags" ad-detail-view=".project" data-type="{{ tag.type || 'default' }}" ng-class="{ 'current': isCurrentTag(tag) }">
	<?php include('project.php') ?>
</div>

<a class="tag {{ tag.uri }} js-tag js-tag-{{ tag.uri }}" ng-class="{ 'current': isCurrentTag(tag), 'js-active': isCurrentTag(tag) }" ng-click="switchTag(tag)" ng-repeat="tag in tags">
	{{ tag.name }}
</a>

<a class="tag {{ tag.uri }} js-tag js-tag-{{ tag.uri }}" ng-class="{ 'current': tag.uri === currentTag.uri, 'js-active': tag.uri === currentTag.uri }" ng-click="switchTag(tag)" ng-repeat="tag in tags">
	{{ tag.name }}
</a>

<li class="tag js-tag js-tag-{{ tag.uri }}" ng-repeat="tag in tags">
	<a href="#{{ tag.uri }}">
		<img src="{{ tag.icon }}" alt="{{ tag.name }}" />
		{{ tag.name }}
	</a>
</li>

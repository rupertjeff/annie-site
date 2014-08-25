<div class="tags" ng-controller="TagController">
	<table border="0" class="table" cellpadding="0" cellspacing="0">
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="tag in tags">
			<td>{{ tag.id }}</td>
			<td>{{ tag.name }}</td>
		</tr>
		</tbody>
	</table>
</div>

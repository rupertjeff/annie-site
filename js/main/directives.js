angular.module('AnnieDirectives', []);

angular.module('AnnieDirectives').directive('adDetails', function ()
{
	return {
		'restrict': 'A',
		'transclude': true,

		'templateUrl': function (element, attrs)
		{
			var type = $('.project-group.current').data('type') || 'default';

			return '/partials/details-' + type;
		}
	};
}).directive('adCloseDetails', function ()
{
	return {
		'restrict': 'A',
		'link': function (scope, element, attrs)
		{
			var selector = attrs['adCloseDetails'] || '[ad-details]';

			element.on('click', function ()
			{
				$(selector).detach();
			});
		}
	};
}).directive('adDetailView', function ($compile, $window)
{
	var link = function (scope, element, attrs)
	{
		var selector = attrs['adDetailView'] || '.project';

		function getPerRow($parent, $item)
		{
			var parentWidth = $parent.width(),
				itemWidth = $item.outerWidth(true);

			return Math.floor(parentWidth / itemWidth);
		}

		function getIndexAfter(clickedIndex, perRow, numRows, itemCount)
		{
			var isLastRow = clickedIndex >= (numRows - 1) * perRow;

			return isLastRow ? itemCount - 1 : clickedIndex + perRow - clickedIndex % perRow - 1;
		}

		element.on('click', selector, function ()
		{
			var $this = $(this),
				$items = element.find(selector),
				clickedIndex = $items.index($this),
				perRow = getPerRow(element, $this),
				numRows = Math.ceil($items.length / perRow),
				indexAfter = getIndexAfter(clickedIndex, perRow, numRows, $items.length),
				$afterItem = $items.eq(indexAfter),
				$next = $afterItem.next(),
				isDetails = $next.is('[ad-details]');

			if ($this.hasClass('current') && ! isDetails)
			{
				element.find('[ad-details]').detach();
				$afterItem.after($compile('<div ad-details></div>')(scope));
			}
			else if ( ! $this.hasClass('current') && isDetails)
			{
				$next.detach();
			}
		});

		$($window).on('resize', function ()
		{
			var $this = $(this),
				$details = element.find('[ad-details]'),
				$items, $current, clickedIndex, perRow, numRows, indexAfter, $afterItem;

			if (0 >= $details.length)
			{
				return;
			}

			$items = element.find(selector);
			$current = $items.filter('.current');
			clickedIndex = $items.index($current);
			perRow = getPerRow(element, $current);
			numRows = Math.ceil($items.length / perRow);
			indexAfter = getIndexAfter(clickedIndex, perRow, numRows, $items.length);
			$afterItem = $items.eq(indexAfter);

			$afterItem.after($details);
		});
	};

	return {
		'restrict': 'A',

		'link': link
	};
});

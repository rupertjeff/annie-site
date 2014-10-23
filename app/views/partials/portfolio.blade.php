<section id="portfolio" ng-controller="PortfolioController">
	<ol id="tags" class="tags">
		@include('partials.portfolio.tag')
	</ol>
	<div id="projects" class="project-groups">
		@include('partials.portfolio.project-group')
	</div>
	<noscript>
		<ol id="tags" class="tags">
		@foreach ($tags as $tag)
			<li class="tag js-tag js-tag-{{ $tag->uri }}"><a href="#{{ $tag->uri }}">{{{ $tag->name }}}</a></li>
		@endforeach
		</ol>
		<div id="projects" class="project-groups">
		@foreach ($tags as $tag)
			<div id="{{ $tag->uri }}" class="project-group">
			@foreach ($tag->projects as $project)
				<div class="project">
					{{{ $project->name }}}
				</div>
			@endforeach
			</div>
			@if (8 < $tag->projects->count())
			<button class="load-more js-load-more">More Please!</button>
			@endif
		@endforeach
		</div>
	</noscript>
</section>

<section id="portfolio" ng-controller="PortfolioController">
	<nav id="portfolio-filters">
		@include('partials.portfolio.tag')
	</nav>
	<div id="projects" class="project-groups">
		@include('partials.portfolio.project-group')
	</div>
	{{--<noscript>
		<nav id="portfolio-filters">
		@foreach ($tags as $tag)
			<a class="tag {{ $tag->uri }} js-tag js-tag-{{ $tag->uri }}" href="#{{ $tag->uri }}">{{{ $tag->name }}}</a>
		@endforeach
		</nav>
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
			<button class="btn btn--cta js-load-more">More Please!</button>
			@endif
		@endforeach
		</div>
	</noscript>--}}
</section>

<?php

class PartialsController extends BaseController {

	public function detailsDefault()
	{
		return View::make('partials.portfolio.project-details-default');
	}

	public function detailsWeb()
	{
		return View::make('partials.portfolio.project-details-web');
	}

}

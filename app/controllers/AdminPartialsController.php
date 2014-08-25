<?php

class AdminPartialsController extends BaseController {

	public function tags()
	{
		return View::make('partials.admin.tags');
	}

}

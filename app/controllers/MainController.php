<?php

class MainController extends BaseController {

	public function index()
	{
		return View::make('main');
	}

	public function admin()
	{
		return View::make('admin');
	}

}

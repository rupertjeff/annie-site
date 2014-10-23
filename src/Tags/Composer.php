<?php namespace AnnieDigital\Tags;

use AnnieDigital\Tags\Repository as TagRepository;
use Illuminate\View\View;

class Composer {

	protected $tags;

	public function __construct(TagRepository $tags)
	{
		$this->tags = $tags;
	}

	public function compose(View $view)
	{
		$view->with('tags', $this->tags->all());
	}

}

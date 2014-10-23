<?php namespace AnnieDigital\Composers\Emails\Contact;

use Illuminate\View\View;
use Parsedown;

class SubmissionComposer {

	protected $markdown;

	public function __construct(Parsedown $markdown)
	{
		$this->markdown = $markdown;
	}

	public function compose(View $view)
	{
		$view->with('markdown', $this->markdown);
	}

}

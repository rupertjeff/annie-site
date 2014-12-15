<?php namespace AnnieDigital\Api;

use AnnieDigital\Contracts\Repositories\Projects;
use ApiController;
use Exception;

class ProjectController extends ApiController {

	/**
	 * @var Projects
	 */
	public $projects;

	public function __construct(Projects $projects)
	{
		$this->projects = $projects;
	}

	public function index()
	{
		try
		{
			$projects = $this->projects->all();

			return $this->success($projects);
		}
		catch (Exception $e)
		{}

		return $this->serverError($e);
	}

}

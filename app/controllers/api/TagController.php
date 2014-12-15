<?php namespace AnnieDigital\Api;

use AnnieDigital\Contracts\Repositories\Tags;
use ApiController;
use Exception;

/**
 * Class TagController
 *
 * @package AnnieDigital\Api
 */
class TagController extends ApiController {

	/**
	 * @var Tags
	 */
	protected $tags;

	/**
	 * @param Tags $tags
	 */
	public function __construct(Tags $tags)
	{
		$this->tags = $tags;
	}

	/**
	 *
	 */
	public function index()
	{
		try
		{
			$tags = $this->tags->all();

			return $this->success($tags);
		}
		catch (Exception $e)
		{}

		return $this->serverError($e);
	}

}

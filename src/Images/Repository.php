<?php namespace AnnieDigital\Images;

use AnnieDigital\Contracts\Repositories\Images;
use AnnieDigital\Contracts\Repositories\Projects;
use AnnieDigital\Support\Repository as BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 *
 * @package AnnieDigital\Images
 */
class Repository extends BaseRepository implements Images {

	/**
	 * @var string
	 */
	protected $model = 'AnnieDigital\Images\Model';

	/**
	 * @var Projects
	 */
	public $projects;

	/**
	 * @param Projects $projects
	 */
	public function __construct(Projects $projects)
	{
		$this->projects = $projects;
	}

	/**
	 * @param Model $item
	 *
	 * @return Entity
	 */
	public function transform($item)
	{
		$projects = null;
		if ( ! is_null($item->projects))
		{
			$projects = $this->projects->multiTransform($item->projects);
		}

		return new Entity(
			(int)$item->id,
			$item->file,
			$item->alt,
			$item->caption,
			$item->image,
			$item->thumb,
			$projects
		);
	}

	/**
	 * @param Model $item
	 * @param array $fields
	 *
	 * @return void
	 */
	protected function setData($item, array $fields)
	{
		// TODO: Implement setData() method.
	}

}

<?php namespace AnnieDigital\Projects;

use AnnieDigital\Contracts\Repositories\Projects;
use AnnieDigital\Support\Repository as BaseRepository;

/**
 * Class Repository
 *
 * @package AnnieDigital\Projects
 */
class Repository extends BaseRepository implements Projects {

	/**
	 * @var string
	 */
	protected $model = 'AnnieDigital\Projects\Model';

	/**
	 * @param Model $item
	 *
	 * @return Entity
	 */
	public function transform($item)
	{
		return new Entity(
			$item->id,
			$item->name,
			$item->description,
			$item->image,
			$item->thumb,
			$item->tag,
			$item->images
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

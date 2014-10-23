<?php namespace AnnieDigital\Tags;

use AnnieDigital\Contracts\Repositories\Tags;
use AnnieDigital\Support\Repository as BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Str;

/**
 * Class Repository
 *
 * @package AnnieDigital\Tags
 */
class Repository extends BaseRepository implements Tags {

	/**
	 * @var string
	 */
	protected $model = 'AnnieDigital\Tags\Model';

	/**
	 * @param array $columns
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function all(array $columns = ['*'])
	{
		$query = $this->newQuery()->with([
			'projects' => function ($query)
			{
				$query->orderBy('sort', 'asc');
			}
		]);

		return $this->multiTransform($query->get($columns));
	}

	/**
	 * @param array $fields
	 *
	 * @return Entity
	 */
	public function create(array $fields)
	{
		$fields['uri'] = Str::slug($fields['name']);

		return parent::create($fields);
	}

	/**
	 * @param Model $item
	 *
	 * @return Entity
	 */
	protected function transform(Model $item)
	{
		return new Entity(
			(int)$item->id,
			$item->name,
			$item->uri,
			$item->icon,
			$item->projects,
			(int)$item->sort
		);
	}

	/**
	 * @param Model $item
	 * @param array $fields
	 *
	 * @return void
	 */
	protected function setData(Model $item, array $fields)
	{
		$item->name  = $fields['name'];
		$item->uri   = $fields['uri'];
		$item->image = $fields['image'];
		$item->sort  = $fields['sort'];
	}

}

<?php namespace AnnieDigital\Support;

use AnnieDigital\Contracts\Repository as RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Contracts\ArrayableInterface;
use InvalidArgumentException;

/**
 * Class Repository
 *
 * @package AnnieDigital\Support
 */
abstract class Repository implements RepositoryInterface {

	/**
	 * @var string
	 */
	protected $model;

	/**
	 * @var string
	 */
	protected $by = '';

	/**
	 * @var string
	 */
	protected $sort = 'asc';

	/**
	 * @param Model $item
	 *
	 * @return Entity
	 */
	abstract public function transform($item);

	/**
	 * @param array|ArrayableInterface $items
	 *
	 * @return Collection
	 */
	public function multiTransform($items = [])
	{
		$items = $this->getItems($items);

		$transformed = [];
		foreach ($items as $item)
		{
			$transformed[] = $this->transform($item);
		}

		return $transformed;
	}

	/**
	 * @param array $columns
	 *
	 * @return Collection
	 */
	public function all(array $columns = ['*'])
	{
		return $this->multiTransform($this->newQuery()->get($columns));
	}

	/**
	 * @param mixed $id
	 * @param array $columns
	 *
	 * @return Model
	 */
	public function get($id, array $columns = ['*'])
	{
		return $this->createModel()->find($id, $columns);
	}

	/**
	 * @param mixed $id
	 * @param array $columns
	 *
	 * @return Collection
	 */
	public function find($id, array $columns = ['*'])
	{
		return $this->multiTransform($this->get($id, $columns));
	}

	/**
	 * @param string $by
	 * @param string $sort
	 *
	 * @return $this
	 */
	public function order($by, $sort = 'asc')
	{
		$this->by   = $by;
		$this->sort = $sort;

		return $this;
	}

	/**
	 * @param array $fields
	 *
	 * @return Entity
	 */
	public function create(array $fields)
	{
		$item = $this->createModel()->fill($fields);

		$item->save();

		return $this->transform($item);
	}

	/**
	 * @param mixed $id
	 * @param array $fields
	 *
	 * @return Entity
	 */
	public function update($id, array $fields)
	{
		$item = $this->get($id);

		$this->setData($item, $fields);

		$item->save();

		return $this->transform($item);
	}

	/**
	 * @param Model $item
	 * @param array $fields
	 *
	 * @return void
	 */
	abstract protected function setData($item, array $fields);

	/**
	 * @param mixed $id
	 *
	 * @return Entity
	 * @throws \Exception
	 */
	public function delete($id)
	{
		$item = $this->get($id);

		$item->delete();

		return $this->transform($item);
	}

	/**
	 * @return Model
	 */
	protected function createModel()
	{
		$class = $this->model;

		if (class_exists($class))
		{
			return new $class;
		}

		throw new InvalidArgumentException("Model [$class] not found.");
	}

	/**
	 * @return Builder|static
	 */
	protected function newQuery()
	{
		$query = $this->createModel()->newQuery();

		$query = $this->processOrder($query);

		return $query;
	}

	/**
	 * @param Builder $query
	 *
	 * @return Builder
	 */
	protected function processOrder(Builder $query)
	{
		if ( ! empty($this->by))
		{
			$query->orderBy($this->by, $this->sort);
		}

		$this->by   = '';
		$this->sort = 'asc';

		return $query;
	}

	/**
	 * @param array|ArrayableInterface $items
	 *
	 * @return array|Collection
	 */
	protected function getItems($items)
	{
		if ( ! $items instanceof Collection)
		{
			if ($items instanceof ArrayableInterface)
			{
				$items = $items->toArray();
			}

			$items = new Collection($items);

			return $items;
		}

		return $items;
	}

}

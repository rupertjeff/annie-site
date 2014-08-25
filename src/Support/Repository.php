<?php namespace AnnieDigital\Support;

use AnnieDigital\Contracts\Repository as RepositoryInterface;
use Illuminate\Database\Query\Builder;
use InvalidArgumentException;

/**
 * Class Repository
 *
 * @package AnnieDigital\Support
 */
class Repository implements RepositoryInterface {

	/**
	 * @var string
	 */
	protected $model;
	/**
	 * @var string
	 */
	protected $by = 'sort';
	/**
	 * @var string
	 */
	protected $sort = 'asc';

	/**
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function all(array $columns = ['*'])
	{
		return $this->newQuery()->get($columns);
	}

	/**
	 * @param mixed $id
	 * @param array $columns
	 *
	 * @return \Illuminate\Support\Collection|static
	 */
	public function find($id, array $columns = ['*'])
	{
		return $this->createModel()->find($id, $columns);
	}

	/**
	 * @param string $by
	 * @param string $sort
	 *
	 * @return $this
	 */
	public function order($by, $sort = 'asc')
	{
		$this->by = $by;
		$this->sort = $sort;

		return $this;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Model
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
		$query->orderBy($this->by, $this->sort);

		$this->by = 'sort';
		$this->sort = 'asc';

		return $query;
	}

}

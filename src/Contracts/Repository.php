<?php namespace AnnieDigital\Contracts;

/**
 * Interface Repository
 *
 * @package AnnieDigital\Support\Contracts
 */
interface Repository {

	/**
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function all(array $columns = ['*']);

	/**
	 * @param mixed $id
	 * @param array $columns
	 *
	 * @return mixed
	 */
	public function find($id, array $columns = ['*']);

	/**
	 * @param string $by
	 * @param string $sort
	 *
	 * @return $this
	 */
	public function order($by, $sort = 'asc');

}

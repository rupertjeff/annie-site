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

	/**
	 * @param array $fields
	 *
	 * @return \AnnieDigital\Support\Entity
	 */
	public function create(array $fields);

	/**
	 * @param mixed $id
	 * @param array $fields
	 *
	 * @return \AnnieDigital\Support\Entity
	 */
	public function update($id, array $fields);

	/**
	 * @param mixed $id
	 *
	 * @return \AnnieDigital\Support\Entity
	 */
	public function delete($id);

}

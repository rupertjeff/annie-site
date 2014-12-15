<?php namespace AnnieDigital\Tags;

use AnnieDigital\Support\Entity as BaseEntity;
use Illuminate\Support\Collection;

class Entity extends BaseEntity {

	/**
	 * @var int
	 */
	public $id;
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var string
	 */
	public $uri;
	/**
	 * @var string
	 */
	public $icon;
	/**
	 * @var Collection
	 */
	public $projects;
	/**
	 * @var int
	 */
	public $sort;

	public function __construct($id, $name, $uri, $icon, Collection $projects, $sort = 0)
	{
		$this->id       = $id;
		$this->name     = $name;
		$this->uri      = $uri;
		$this->icon     = $icon;
		$this->projects = $projects;
		$this->sort     = $sort;
	}

	/**
	 * Get the instance as an array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		return [
			'id'       => (int)$this->id,
			'name'     => $this->name,
			'uri'      => $this->uri,
			'icon'     => $this->icon,
			'projects' => $this->projects,
			'sort'     => (int)$this->sort,
		];
	}

}

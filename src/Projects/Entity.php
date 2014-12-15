<?php namespace AnnieDigital\Projects;

use AnnieDigital\Support\Entity as BaseEntity;
use AnnieDigital\Tags\Entity as Tag;
use Illuminate\Support\Collection;

/**
 * Class Entity
 *
 * @package AnnieDigital\Projects
 */
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
	public $description;

	/**
	 * @var Tag
	 */
	public $tag;

	/**
	 * @var Collection
	 */
	public $images;

	/**
	 * @param int        $id
	 * @param string     $name
	 * @param string     $description
	 * @param Tag        $tag
	 * @param Collection $images
	 */
	public function __construct($id, $name, $description, $image, $thumb, $tag = null, Collection $images = null)
	{
		$this->id          = $id;
		$this->name        = $name;
		$this->description = $description;
		$this->image       = $image;
		$this->thumb       = $thumb;
		$this->tag         = $tag;
		$this->images      = $images;
	}

	/**
	 * Get the instance as an array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		$array = [
			'id'          => $this->id,
			'name'        => $this->name,
			'description' => $this->description,
			'image'       => $this->image,
			'thumb'       => $this->thumb,
		];

		if ( ! is_null($this->tag))
		{
			$array['tag'] = $this->tag->toArray();
		}
		if ( ! is_null($this->images))
		{
			$array['images'] = $this->images->toArray();
		}

		return $array;
	}

}

<?php namespace AnnieDigital\Images;

use AnnieDigital\Support\Entity as BaseEntity;
use Illuminate\Support\Collection;

/**
 * Class Entity
 *
 * @package AnnieDigital\Images
 */
class Entity extends BaseEntity {

	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $file;

	/**
	 * @var string
	 */
	public $alt;

	/**
	 * @var string
	 */
	public $caption;

	/**
	 * @var string
	 */
	public $image;

	/**
	 * @var string
	 */
	public $thumb;

	/**
	 * @var Collection
	 */
	public $projects;

	/**
	 * @param int        $id
	 * @param string     $file
	 * @param string     $alt
	 * @param string     $caption
	 * @param string     $image
	 * @param string     $thumb
	 * @param Collection $projects
	 */
	public function __construct($id, $file, $alt, $caption, $image, $thumb, Collection $projects = null)
	{
		$this->id       = $id;
		$this->file     = $file;
		$this->alt      = $alt;
		$this->caption  = $caption;
		$this->image    = $image;
		$this->thumb    = $thumb;
		$this->projects = $projects;
	}

	/**
	 * Get the instance as an array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		$array = [
			'id'      => (int)$this->id,
			'file'    => $this->file,
			'alt'     => $this->alt,
			'caption' => $this->caption,
			'image'   => $this->image,
			'thumb'   => $this->thumb,
		];

		if ( ! is_null($this->projects))
		{
			$array['projects'] = $this->projects->toArray();
		}

		return $array;
	}

}

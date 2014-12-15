<?php namespace AnnieDigital\Contact;

use AnnieDigital\Contracts\Repositories\Contact;
use AnnieDigital\Support\Repository as BaseRepository;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class Repository
 *
 * @package AnnieDigital\Contact
 */
class Repository extends BaseRepository implements Contact {

	protected $model = 'AnnieDigital\Contact\Model';

	/**
	 * @param Model $item
	 *
	 * @return \AnnieDigital\Support\Entity
	 */
	public function transform($item)
	{
		return new Entity(
			$item->name,
			$item->email,
			$item->comments
		);
	}

	/**
	 * @param Model $item
	 * @param array $fields
	 *
	 * @return void
	 */
	public function setData($item, array $fields)
	{
		$item->name     = $fields['name'];
		$item->email    = $fields['email'];
		$item->comments = $fields['comments'];
	}

}

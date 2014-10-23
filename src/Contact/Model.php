<?php namespace AnnieDigital\Contact;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class Model
 *
 * @package AnnieDigital\Contact
 */
class Model extends BaseModel {

	/**
	 * @var string
	 */
	protected $table = 'contacts';

	/**
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'comments'];

}

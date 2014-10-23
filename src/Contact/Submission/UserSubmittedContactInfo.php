<?php namespace AnnieDigital\Contact\Submission;

use AnnieDigital\Contact\Entity;

/**
 * Class UserSubmittedContactInfo
 *
 * @package AnnieDigital\Contact\Submission
 */
class UserSubmittedContactInfo {

	/**
	 * @var Entity
	 */
	public $contact;

	/**
	 * @param Entity $data
	 */
	public function __construct(Entity $data)
	{
		$this->contact = $data;
	}

}

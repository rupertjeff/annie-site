<?php namespace AnnieDigital\Contact;

use AnnieDigital\Support\Entity as BaseEntity;

class Entity extends BaseEntity {

	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var string
	 */
	public $email;
	/**
	 * @var string
	 */
	public $comments;

	public function __construct($name, $email, $comments)
	{
		$this->name = $name;
		$this->email = $email;
		$this->comments = $comments;
	}

	/**
	 * Get the instance as an array.
	 *
	 * @return array
	 */
	public function toArray()
	{
		return [
			'name' => $this->name,
			'email' => $this->email,
			'comments' => $this->comments,
		];
	}

}

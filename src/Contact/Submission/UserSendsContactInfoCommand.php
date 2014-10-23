<?php namespace AnnieDigital\Contact\Submission;

/**
 * Class UserSendsContactInfoCommand
 *
 * @package AnnieDigital\Contact\Submission
 */
class UserSendsContactInfoCommand {

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

	/**
	 * @param string $name
	 * @param string $email
	 * @param string $comments
	 */
	public function __construct($name, $email, $comments)
	{
		$this->name = $name;
		$this->email = $email;
		$this->comments = $comments;
	}

}

<?php namespace AnnieDigital\Exceptions\Validation;

use \Exception;
use Illuminate\Support\Contracts\MessageProviderInterface;
use Illuminate\Support\MessageBag;

/**
 * Class Failure
 *
 * @package AnnieDigital\Exceptions\Validation
 */
class Failure extends Exception implements MessageProviderInterface {

	/**
	 * @var MessageBag
	 */
	protected $messages;

	/**
	 * @param MessageBag $messages
	 * @param string     $message
	 * @param int        $code
	 * @param Exception  $previous
	 */
	public function __construct(MessageBag $messages, $message = "", $code = 0, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);

		$this->messages = $messages;
	}

	/**
	 * Get the messages for the instance.
	 *
	 * @return \Illuminate\Support\MessageBag
	 */
	public function getMessageBag()
	{
		return $this->messages;
	}

}

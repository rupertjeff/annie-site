<?php namespace AnnieDigital\Events;

use AnnieDigital\Contact\Submission\UserSubmittedContactInfo;
use Illuminate\Config\Repository;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use ReflectionClass;

/**
 * Class Handler
 *
 * @package AnnieDigital\Events
 */
class Handler {

	/**
	 * @var Mailer
	 */
	protected $mailer;
	/**
	 * @var Repository
	 */
	protected $config;

	/**
	 * @param Mailer     $mailer
	 * @param Repository $config
	 */
	public function __construct(Mailer $mailer, Repository $config)
	{
		$this->mailer = $mailer;
		$this->config = $config;
	}

	/**
	 * @param $event
	 */
	public function handle($event)
	{
		$eventName = 'when' . (new ReflectionClass($event))->getShortName();

		if (method_exists($this, $eventName))
		{
			return call_user_func([$this, $eventName], $event);
		}

		throw new \BadMethodCallException("Method [$eventName] does not exist on [" . get_class() . "].");
	}

	/**
	 * @param UserSubmittedContactInfo $event
	 */
	public function whenUserSubmittedContactInfo(UserSubmittedContactInfo $event)
	{
		$this->mailer->queue('emails.contact.submission', (array)$event, function (Message $email)
		{
			$email->to('rupert.jeff@gmail.com');
			$email->subject('New Contact Submission!');
		});
	}

}

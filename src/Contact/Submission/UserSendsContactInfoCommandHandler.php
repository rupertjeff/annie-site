<?php namespace AnnieDigital\Contact\Submission;

use AnnieDigital\Contracts\Commanding\Handler;
use AnnieDigital\Contracts\Repositories\Contact as ContactRepository;
use Event;

/**
 * Class UserSendsContactInfoCommandHandler
 *
 * @package AnnieDigital\Contact\Submission
 */
class UserSendsContactInfoCommandHandler implements Handler {

	/**
	 * @var ContactRepository
	 */
	protected $contacts;

	/**
	 * @param ContactRepository $contacts
	 */
	public function __construct(ContactRepository $contacts)
	{
		$this->contacts = $contacts;
	}

	/**
	 * @param UserSendsContactInfoCommand $command
	 *
	 * @return mixed
	 */
	public function handle($command)
	{
		$response = $this->contacts->create([
			'name' => $command->name,
			'email' => $command->email,
			'comments' => $command->comments,
		]);

		Event::fire('Annie.UserSubmittedContactInfo', new UserSubmittedContactInfo($response));

		return $response;
	}

}

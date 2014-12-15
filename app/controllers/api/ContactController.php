<?php namespace AnnieDigital\Api;

use AnnieDigital\Contact\Submission\UserSendsContactInfoCommand;
use AnnieDigital\Contact\Submission\Validator;
use AnnieDigital\Contracts\Commanding\CommandBus;
use AnnieDigital\Exceptions\Validation\Failure as ValidationFailureException;
use ApiController;
use Exception;
use Input;

/**
 * Class ContactController
 *
 * @package AnnieDigital\Api
 */
class ContactController extends ApiController {

	/**
	 * @var Validator
	 */
	protected $validator;

	/**
	 * @param CommandBus $commandBus
	 * @param Validator  $validator
	 */
	public function __construct(CommandBus $commandBus, Validator $validator)
	{
		parent::__construct($commandBus);

		$this->validator = $validator;
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store()
	{
		$input = Input::only(['name', 'email', 'comments']);

		try
		{
			$command = new UserSendsContactInfoCommand(
				$input['name'],
				$input['email'],
				$input['comments']
			);

			$this->validator->validate($command);
			$this->commandBus->execute($command);

			return $this->success([
				'message' => 'Thanks for your input! I’ll get back to you as soon as I can.',
			]);
		}
		catch (ValidationFailureException $e)
		{
			return $this->validationError($e);
		}
		catch (Exception $e)
		{
			return $this->serverError($e);
		}
	}

}

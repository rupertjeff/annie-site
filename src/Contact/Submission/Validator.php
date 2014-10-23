<?php namespace AnnieDigital\Contact\Submission;

use AnnieDigital\Exceptions\Validation\Failure as ValidationFailureException;
use Illuminate\Validation\Factory as ValidationFactory;

/**
 * Class Validator
 *
 * @package AnnieDigital\Contact\Submission
 */
class Validator {

	/**
	 * @var array
	 */
	protected $rules = [
		'name'     => 'required',
		'email'    => 'required|email',
		'comments' => 'required',
	];

	/**
	 * @var ValidationFactory
	 */
	protected $factory;

	/**
	 * @param ValidationFactory $factory
	 */
	public function __construct(ValidationFactory $factory)
	{
		$this->factory = $factory;
	}

	/**
	 * @param UserSendsContactInfoCommand $command
	 *
	 * @throws ValidationFailureException
	 */
	public function validate(UserSendsContactInfoCommand $command)
	{
		$validator = $this->factory->make([
			'name' => $command->name,
			'email' => $command->email,
			'comments' => $command->comments,
		], $this->rules);

		$this->guardOnFailure($validator);
	}

	/**
	 * @param \Illuminate\Validation\Validator $validator
	 *
	 * @throws ValidationFailureException
	 */
	protected function guardOnFailure($validator)
	{
		if ($validator->fails())
		{
			throw new ValidationFailureException($validator->errors(), "Could not validate contact submission data.");
		}
	}

}

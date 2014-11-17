<?php

use AnnieDigital\Contracts\Commanding\CommandBus;
use AnnieDigital\Exceptions\Validation\Failure as ValidationFailureException;

/**
 * Class ApiController
 */
class ApiController extends BaseController {

	/**
	 * @var CommandBus
	 */
	protected $commandBus;
	/**
	 * @var int
	 */
	protected $statusCode = 200;

	public function __construct(CommandBus $commandBus)
	{
		$this->commandBus = $commandBus;
	}

	/**
	 * @param array $data
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function success(array $data)
	{
		return $this->respond($data);
	}

	/**
	 * @param Exception $e
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function serverError(Exception $e)
	{
		return $this->setStatusCode(500)->respondError($e);
	}

	/**
	 * @param ValidationFailureException $e
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function validationError(ValidationFailureException $e)
	{
		return $this->setStatusCode(500)->respondError($e, [
			'messages'  => $e->getMessageBag(),
		]);
	}

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param int $statusCode
	 *
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * @param array $data
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function respond(array $data)
	{
		return Response::json($data, $this->getStatusCode());
	}

	/**
	 * @param Exception $exception
	 * @param array     $data
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function respondError(Exception $exception, array $data = [])
	{
		return $this->respond($this->getErrors($exception, $data));
	}

	/**
	 * @param Exception $e
	 * @param array     $data
	 *
	 * @return array
	 */
	protected function getErrors(Exception $e, array $data = [])
	{
		return array_merge([
			'exception' => $e
		], $data);
	}

}

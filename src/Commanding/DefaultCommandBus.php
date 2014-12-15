<?php namespace AnnieDigital\Commanding;

use AnnieDigital\Contracts\Commanding\CommandBus;
use AnnieDigital\Contracts\Commanding\Translator;
use Illuminate\Foundation\Application;

/**
 * Class DefaultCommandBus
 *
 * @package AnnieDigital\Commanding
 */
class DefaultCommandBus implements CommandBus {

	/**
	 * @var Application
	 */
	protected $ioc;
	/**
	 * @var Translator
	 */
	protected $translator;

	/**
	 * @param Application $ioc
	 * @param Translator  $translator
	 */
	public function __construct(Application $ioc, Translator $translator)
	{
		$this->ioc        = $ioc;
		$this->translator = $translator;
	}

	/**
	 * @param mixed $command
	 *
	 * @return mixed
	 */
	public function execute($command)
	{
		$handlerClass = $this->translator->getCommandHandler($command);

		/** @var \AnnieDigital\Contracts\Commanding\Handler $handler */
		$handler = $this->ioc->make($handlerClass);

		return $handler->handle($command);
	}

}

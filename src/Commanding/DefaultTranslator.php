<?php namespace AnnieDigital\Commanding;

use AnnieDigital\Contracts\Commanding\Translator as CommandTranslator;
use AnnieDigital\Exceptions\Commanding\HandlerNotFound as CommandHandlerNotFoundException;

/**
 * Class DefaultTranslator
 *
 * @package AnnieDigital\Commanding
 */
class DefaultTranslator implements CommandTranslator {

	/**
	 * @param mixed $command
	 *
	 * @return string
	 * @throws CommandHandlerNotFoundException
	 */
	public function getCommandHandler($command)
	{
		$class = get_class($command);
		$class = str_replace('Command', 'CommandHandler', $class);

		if ( ! class_exists($class))
		{
			throw new CommandHandlerNotFoundException("Could not find [$class].");
		}

		return $class;
	}

}

<?php namespace AnnieDigital\Contracts\Commanding;

/**
 * Interface Translator
 *
 * @package AnnieDigital\Contracts\Commanding
 */
interface Translator {

	/**
	 * @param mixed $command
	 *
	 * @return string
	 * @throws \AnnieDigital\Exceptions\Commanding\HandlerNotFound
	 */
	public function getCommandHandler($command);

}

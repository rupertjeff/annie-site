<?php namespace AnnieDigital\Contracts\Commanding;

/**
 * Interface CommandHandler
 *
 * @package AnnieDigital\Contracts\Commanding
 */
interface Handler {

	/**
	 * @param mixed $command
	 *
	 * @return mixed
	 */
	public function handle($command);

}

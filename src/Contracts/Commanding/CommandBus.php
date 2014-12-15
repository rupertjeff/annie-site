<?php namespace AnnieDigital\Contracts\Commanding;

/**
 * Interface CommandBus
 *
 * @package AnnieDigital\Contracts\Commanding
 */
interface CommandBus {

	/**
	 * @param mixed $command
	 *
	 * @return mixed
	 */
	public function execute($command);

}

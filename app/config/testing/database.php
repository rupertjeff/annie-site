<?php

return [

	'default'     => 'testing',

	'connections' => append_config([
		'testing' => [
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		],
	]),

];

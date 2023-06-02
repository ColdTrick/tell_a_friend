<?php

return [
	'plugin' => [
		'version' => '5.0',
	],
	'actions' => [
		'tell_a_friend/share' => [],
	],
	'events' => [
		'register' => [
			'menu:entity' => [
				'ColdTrick\TellAFriend\Menus\Entity::registerShare' => [],
			],
		],
	],
	'view_options' => [
		'tell_a_friend/share' => ['ajax' => true],
	],
];

<?php

return [
	'plugin' => [
		'version' => '4.0',
	],
	'actions' => [
		'tell_a_friend/share' => [],
	],
	'hooks' => [
		'register' => [
			'menu:entity' => [
				'ColdTrick\TellAFriend\EntityMenu::registerShare' => [],
			],
		],
	],
	'view_options' => [
		'tell_a_friend/share' => ['ajax' => true],
	],
];

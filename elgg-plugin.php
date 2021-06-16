<?php

return [
	'plugin' => [
		'version' => '2.1.1',
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

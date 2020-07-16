<?php

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof ElggEntity) {
	return;
}

$user = elgg_get_logged_in_user_entity();

$title = $entity->getDisplayName() ?: $entity->description;
$title = elgg_get_excerpt($title, 25);

if (elgg_language_key_exists("item:{$entity->getType()}:{$entity->getSubtype()}")) {
	$type = elgg_echo("item:{$entity->getType()}:{$entity->getSubtype()}");
} else {
	$type = elgg_echo('unknown');
}

$subject = elgg_echo('tell_a_friend:share:subject:default', [
	$user->getDisplayName(),
	$type,
	$title,
]);

$message = elgg_echo('tell_a_friend:share:message:default', [
	$user->getDisplayName(),
	$entity->getDisplayName() ? PHP_EOL . $entity->getDisplayName() : '',
	$entity->description ? elgg_get_excerpt($entity->description) . PHP_EOL : '',
	$entity->getURL(),
]);

echo elgg_view_field([
	'#type' => 'hidden',
	'name' => 'guid',
	'value' => $entity->guid,
]);

echo elgg_view_field([
	'#type' => 'userpicker',
	'#label' => elgg_echo('tell_a_friend:share:recipient'),
	'name' => 'members',
	'required' => true,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('tell_a_friend:share:subject'),
	'name' => 'subject',
	'value' => $subject,
	'required' => true,
]);

echo elgg_view_field([
	'#type' => 'plaintext',
	'#label' => elgg_echo('tell_a_friend:share:message'),
	'name' => 'message',
	'value' => $message,
	'required' => true,
]);

// form footer
$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('send'),
]);

elgg_set_form_footer($footer);

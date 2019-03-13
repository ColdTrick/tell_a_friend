<?php

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof ElggEntity) {
	return;
}

$user = elgg_get_logged_in_user_entity();

$subject = elgg_echo('tell_a_friend:share:subject:default', [
	$user->getDisplayName(),
]);

$message = elgg_echo('tell_a_friend:share:message:default', [
	$user->getDisplayName(),
	$entity->getDisplayName(),
	$entity->getURL(),
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

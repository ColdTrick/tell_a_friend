<?php

$recipients = get_input('members');
$subject = get_input('subject');
$message = get_input('message');
$guid = (int) get_input('guid');

// only send to users
if (!is_array($recipients)) {
	$recipients = [$recipients];
}

$object = get_entity($guid);
if (!$object instanceof \ElggEntity) {
	return elgg_error_response(elgg_echo('error:missing_data'));
}

if (empty($recipients)) {
	return elgg_error_response(elgg_echo('tell_a_friend:action:share:error:recipients'));
}

// required
if (empty($subject)) {
	return elgg_error_response(elgg_echo('tell_a_friend:action:share:error:subject'));
}

// required
if (empty($message)) {
	return elgg_error_response(elgg_echo('tell_a_friend:action:share:error:message'));
}

foreach ($recipients as $user_guid) {
	$user = get_user((int) $user_guid);
	if (!$user instanceof \ElggUser) {
		continue;
	}
	
	$user->notify('tell_a_friend', $object, [
		'subject' => $subject,
		'body' => $message,
		'methods_override' => ['email'],
	], elgg_get_logged_in_user_entity());
}

return elgg_ok_response('', elgg_echo('tell_a_friend:action:share:success'));

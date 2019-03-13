<?php

$recipients = get_input('members');
$subject = get_input('subject');
$message = get_input('message');

// only send to users
if (!is_array($recipients)) {
	$recipients = [$recipients];
}

foreach ($recipients as $index => $guid) {
	$guid = (int) $guid;
	if ($guid == elgg_get_logged_in_user_guid()) {
		// don't send to yourself
		unset($recipients[$index]);
	}
	
	if (!get_user($guid)) {
		// not a user
		unset($recipients[$index]);
	}
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

notify_user($recipients, elgg_get_logged_in_user_guid(), $subject, $message, [], ['email']);

return elgg_ok_response('', elgg_echo('tell_a_friend:action:share:success'));

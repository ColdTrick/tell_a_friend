<?php

$recipients = get_input("members");
$subject = get_input("subject");
$message = get_input("message");

// only send to users
if (!is_array($recipients)) {
	$recipients = array($recipients);
}
foreach ($recipients as $index => $guid) {
	$guid = sanitise_int($guid, false);
	if ($guid == elgg_get_logged_in_user_guid()) {
		unset($recipients[$index]);
	}

	if (!get_user($guid)) {
		unset($recipients[$index]);
	}
}

if (empty($recipients)) {
	register_error(elgg_echo("tell_a_friend:action:share:error:recipients"));
	forward(REFERER);
}

// required
if (empty($subject)) {
	register_error(elgg_echo("tell_a_friend:action:share:error:subject"));
	forward(REFERER);
}

// required
if (empty($message)) {
	register_error(elgg_echo("tell_a_friend:action:share:error:message"));
	forward(REFERER);
}

notify_user($recipients, elgg_get_logged_in_user_guid(), $subject, $message);

system_message(elgg_echo("tell_a_friend:action:share:success"));
forward(REFERER);
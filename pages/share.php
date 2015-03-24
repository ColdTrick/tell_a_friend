<?php

gatekeeper();

$guid = (int) get_input("guid");
if (empty($guid)) {
	register_error(elgg_echo("InvalidParameterException:MissingParameter"));
	forward(REFERER);
}

$entity = get_entity($guid);
if (empty($entity) || !elgg_instanceof($entity)) {
	register_error(elgg_echo("InvalidParameterException:GUIDNotFound", array($guid)));
	forward(REFERER);
}

$title = elgg_echo("tell_a_friend:share_title");

$content = elgg_view_form("tell_a_friend/share", array(), array("entity" => $entity));

if (elgg_is_xhr()) {
	echo elgg_view_module("info", $title, $content, array("class" => "tell-a-friend-share-wrapper"));
} else {
	$page_data = elgg_view_layout("content", array(
		"title" => $title,
		"content" => $content,
		"filter" => ""
	));
	
	echo elgg_view_page($title, $page_data);
}
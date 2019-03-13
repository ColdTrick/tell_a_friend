<?php

elgg_gatekeeper();

$guid = (int) elgg_extract('guid', $vars);
elgg_entity_gatekeeper($guid);

$entity = get_entity($guid);

$title = elgg_echo('tell_a_friend:share_title');

$content = elgg_view_form('tell_a_friend/share', [], ['entity' => $entity]);

echo elgg_view_module('info', $title, $content);

<?php

elgg_gatekeeper();

$guid = (int) elgg_extract('guid', $vars);
elgg_entity_gatekeeper($guid);

$content = elgg_view_form('tell_a_friend/share', [], ['entity' => get_entity($guid)]);

echo elgg_view_module('info', elgg_echo('tell_a_friend:share_title'), $content);

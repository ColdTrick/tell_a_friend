<?php
/**
 * All plugin hooks are bundled here
 */

/**
 * Add a menu item to the entity menu
 *
 * @param string         $hook         the name of the hook
 * @param string         $type         the type of the hook
 * @param ElggMenuItem[] $return_value current return value
 * @param array          $params       supplied params
 *
 * @return ElggMenuItem[]
 */
function tell_a_friend_register_entity_menu_hook($hook, $type, $return_value, $params) {
	
	if (elgg_in_context("widgets") || elgg_in_context("livesearch")) {
		return $return_value;
	}
	
	if (!elgg_is_logged_in()) {
		return $return_value;
	}
	
	if (empty($params) || !is_array($params)) {
		return $return_value;
	}
	
	$entity = elgg_extract("entity", $params);
	if (empty($entity) || !elgg_instanceof($entity)) {
		return $return_value;
	}
	
	elgg_load_js("lightbox");
	elgg_load_css("lightbox");
	elgg_load_js('elgg.userpicker');
	elgg_load_js('jquery.ui.autocomplete.html');
	
	$return_value[] = ElggMenuItem::factory(array(
		"name" => "tell_a_friend",
		"text" => elgg_view_icon("share"),
		"href" => "tell_a_friend/share/" . $entity->getGUID(),
		"link_class" => "elgg-lightbox",
		"priority" => 200
	));
	
	
	return $return_value;
}
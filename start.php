<?php

require_once(dirname(__FILE__) . "/lib/hooks.php");
require_once(dirname(__FILE__) . "/lib/page_handlers.php");

// register default Elgg events
elgg_register_event_handler("init", "system", "tell_a_friend_init");

/**
 * Gets called during system initialization
 *
 * @return void
 */
function tell_a_friend_init() {
	
	// css
	elgg_extend_view("css/elgg", "css/tell_a_friend/site");
	
	// register page handler for nice url's
	elgg_register_page_handler("tell_a_friend", "tell_a_friend_page_handler");
	
	// register plugin hooks
	elgg_register_plugin_hook_handler("register", "menu:entity", "tell_a_friend_register_entity_menu_hook");
	
	// register actions
	elgg_register_action("tell_a_friend/share", dirname(__FILE__) . "/actions/share.php");
}
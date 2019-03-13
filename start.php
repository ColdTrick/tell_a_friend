<?php

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
	
}

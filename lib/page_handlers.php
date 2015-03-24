<?php
/**
 * All page handlers are bundled here
 */

function tell_a_friend_page_handler($page) {
	
	$include_file = "";
	
	switch ($page[0]) {
		case "share":
			if (isset($page[1])) {
				set_input("guid", $page[1]);
			}
			
			$include_file = dirname(dirname(__FILE__)) . "/pages/share.php";
			break;
	}
	
	if (!empty($include_file)) {
		include ($include_file);
		return true;
	}
	
	return false;
}
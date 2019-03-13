<?php

namespace ColdTrick\TellAFriend;

use Elgg\Menu\MenuItems;

class EntityMenu {
	
	/**
	 * Add share link to entity menu
	 *
	 * @param \Elgg\Hook $hook 'regsiter', 'menu:entity'
	 *
	 * @return void|MenuItems
	 */
	public static function registerShare(\Elgg\Hook $hook) {
		
		if (!elgg_is_logged_in()) {
			return;
		}
		
		$entity = $hook->getEntityParam();
		if (!$entity instanceof \ElggEntity) {
			return;
		}
		
		$result = $hook->getValue();
		
		$result[] = \ElggMenuItem::factory([
			'name' => 'tell_a_friend',
			'icon' => elgg_view_icon('share'),
			'text' => elgg_echo('tell_a_friend:share_title'),
			'href' => elgg_http_add_url_query_elements('ajax/view/tell_a_friend/share', [
				'guid' => $entity->guid,
			]),
			'link_class' => 'elgg-lightbox',
		]);
		
		return $result;
	}
}

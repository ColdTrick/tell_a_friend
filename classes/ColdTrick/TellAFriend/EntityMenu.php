<?php

namespace ColdTrick\TellAFriend;

use Elgg\Menu\MenuItems;

class EntityMenu {
	
	/**
	 * Add share link to entity menu
	 *
	 * @param \Elgg\Hook $hook 'register', 'menu:entity'
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
		
		if (!$entity->hasCapability('searchable')) {
			// limit to searchable entities
			return;
		}
		
		$result = $hook->getValue();
		
		$result[] = \ElggMenuItem::factory([
			'name' => 'tell_a_friend',
			'icon' => 'share-alt-square',
			'text' => elgg_echo('tell_a_friend:share_title'),
			'href' => elgg_http_add_url_query_elements('ajax/view/tell_a_friend/share', [
				'guid' => $entity->guid,
			]),
			'link_class' => 'elgg-lightbox',
			'data-colorbox-opts' => json_encode([
				'width' => '750px',
			]),
		]);
		
		return $result;
	}
}

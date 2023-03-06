<?php

namespace ColdTrick\TellAFriend\Menus;

use Elgg\Menu\MenuItems;

/**
 * Add menu items to the entity menu
 */
class Entity {
	
	/**
	 * Add share link to entity menu
	 *
	 * @param \Elgg\Event $event 'register', 'menu:entity'
	 *
	 * @return null|MenuItems
	 */
	public static function registerShare(\Elgg\Event $event): ?MenuItems {
		if (!elgg_is_logged_in()) {
			return null;
		}
		
		$entity = $event->getEntityParam();
		if (!$entity instanceof \ElggEntity) {
			return null;
		}
		
		if (!$entity->hasCapability('searchable')) {
			// limit to searchable entities
			return null;
		}
		
		/* @var $result MenuItems */
		$result = $event->getValue();
		
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

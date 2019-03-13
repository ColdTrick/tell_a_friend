<?php

namespace ColdTrick\TellAFriend;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
	
	/**
	 * {@inheritDoc}
	 * @see \Elgg\DefaultPluginBootstrap::init()
	 */
	public function init() {
		
		$this->initHooks();
		$this->initViews();
	}
	
	/**
	 * Register plugin hooks
	 *
	 * @retrun void
	 */
	protected function initHooks() {
		$hooks = $this->elgg()->hooks;
	}
	
	/**
	 * Extend views or register AJAX views
	 *
	 * @return void
	 */
	protected function initViews() {
		elgg_register_ajax_view('tell_a_friend/share');
	}
}

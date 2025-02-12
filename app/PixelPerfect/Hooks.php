<?php

namespace PixelPerfect;

/**
 * Hooks class.
 * 
 * @since 1.0
 */
class Hooks {

	/**
	 * Register hooks.
	 * 
	 * @since 1.0
	 */
	public function register_hooks() {

		$ajax = new Ajax();
		$ajax->register_hooks();


	}
}

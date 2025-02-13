<?php

namespace PixelPerfect;

/**
 * Loader class.
 *
 * @since 1.0
 */
class Loader {

	/**
	 * Load plugin.
	 *
	 * @since 1.0
	 */
	public function load() {

		( new Dialog() )->hooks();
	}
}

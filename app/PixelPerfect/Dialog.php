<?php

namespace PixelPerfect;

/**
 * Dialog class.
 *
 * @since 1.0
 */
class Dialog {

	/**
	 * Register hooks.
	 *
	 * @since 1.0
	 */
	public function hooks() {

		add_action( 'wp_footer', [ $this, 'add_dialog' ] );
		add_action( 'admin_footer', [ $this, 'add_dialog' ] );

		add_action( 'admin_enqueue_scripts' , [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts' , [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script(
			'pixel-perfect-custom-element',
			PP_PLUGIN_URL . 'node_modules/@kkarpieszuk/pixel-perfect-custom-element/pixel-perfect.js',
			[],
			'1.0',
			true
		);
	}

	/**
	 * Add dialog.
	 *
	 * @since 1.0
	 */
	public function add_dialog() {

		echo '<pixel-perfect></pixel-perfect>';
	}
}

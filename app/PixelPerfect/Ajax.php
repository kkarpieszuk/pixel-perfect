<?php

namespace PixelPerfect;

/**
 * Ajax class.
 * 
 * @since 1.0
 */
class Ajax {

	/** 
	 * Register hooks.
	 * 
	 * @since 1.0
	 */
	public function register_hooks() {

		\add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
		\add_action( 'wp_ajax_fetch_PixelPerfect_ajax', [ $this, 'fetch_for_ajax' ] );
		\add_action( 'wp_ajax_nopriv_fetch_PixelPerfect_ajax', [ $this, 'fetch_for_ajax' ] );
	}
	
	/**
	 * Enqueue and localize scripts.
	 * 
	 * @since 1.0
	 */
	public function enqueue() {
		\wp_enqueue_script( 'PixelPerfect_script', PIXEL-PERFECT_PLUGIN_URL . 'assets/js/script.js', [ 'jquery' ] );
		\wp_localize_script( 'PixelPerfect_script', 'PixelPerfect_data',
			[
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			] );
	}

	/**
	 * Response to ajax.
	 * 
	 * @since 1.0
	 */
	public function fetch_for_ajax() {
		
		\wp_send_json( '' );
	}
}

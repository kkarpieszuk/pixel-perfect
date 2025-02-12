<?php
/*
 * Plugin Name: Pixel Perfect
 * Description: The tool for developer helping to stay pixel perfect with the design. Shows overlay with image on your page, slightly transparent.
 * Author: Konrad Karpieszuk
 * Version: 1.0
 */

use PixelPerfect\Loader;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/constants.php';

define( 'PP_PLUGIN_FILE', __FILE__ );
define( 'PP_PLUGIN_DIR', __DIR__ );
define( 'PP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

( new Loader() )->load();

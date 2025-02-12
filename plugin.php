<?php
/*
 * Plugin Name: Pixel Perfect
 * Description: The tool for developer helping to stay pixel perfect with the design. Shows overlay with image on your page, slightly transparent.
 * Author: Konrad Karpieszuk
 * Version: 1.0
 */

use PixelPerfect\Factory;
use PixelPerfect\Hooks;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/constants.php';

( new Hooks() )->register_hooks();

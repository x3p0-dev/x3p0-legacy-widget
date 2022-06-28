<?php
/**
 * Plugin Name:       X3P0 - Legacy Widget
 * Plugin URI:        https://github.com/x3p0-dev/x3p0-legacy-widget
 * Description:       Enables the Legacy Widget block.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Justin Tadlock
 * Author URI:        https://x3p0.com
 * Text Domain:       x3p0-legacy-widget
 * Domain Path:       /public/lang
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\LegacyWidget;

# ------------------------------------------------------------------------------
# Run the Composer autoloader.
# ------------------------------------------------------------------------------
#
# Auto-load classes and files via the Composer autoloader. Be sure to check if
# the file exists in case someone's using Composer to load their dependencies in
# a different directory.

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

# ------------------------------------------------------------------------------
# Bootstrap plugin.
# ------------------------------------------------------------------------------
#
# Just runs a small bootstrapping routine.

plugin();

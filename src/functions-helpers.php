<?php
/**
 * Helper functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-legacy-widget
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\LegacyWidget;

/**
 * Mini container.
 *
 * This allows us to set up single instances of our objects
 * without using the singleton pattern and gives third-party devs easy access to
 * the objects if they need to unhook actions/filters added by the classes.
 *
 * @since 1.0.0
 */
function plugin( string $abstract = '' ): mixed
{
	/** @var array<string, \X3P0\LegacyWidget\Plugins> $bindings */
	static $bindings = [];

	if ( [] === $bindings ) ) {
		$bindings = [
			'plugin' => new Plugin(),
		];

		foreach ( $bindings as $binding ) {
			$binding->boot();
		}
	}

	return $abstract === '' ? $bindings : $bindings[ $abstract ];
}

<?php
/**
 * Plugin class.
 *
 * Sets up and enables the Legacy Widget block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022, Justin Tadlock
 * @link      https://github.com/x3p0-dev/x3p0-legacy-widget
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\LegacyWidget;

class Plugin
{
	/**
	 * Plugin directory path.
	 *
	 * @since 1.0.0
	 * @todo  Move this to the constructor with PHP 8 support.
	 */
	protected string $path;

	/**
	 * Plugin directory URI.
	 *
	 * @since 1.0.0
	 * @todo  Move this to the constructor with PHP 8 support.
	 */
	protected string $url;

	/**
	 * Sets up the object properties.
	 *
	 * @since 1.0.0
	 */
	public function __construct( string $path, string $url )
	{
		$this->path = $path;
		$this->url  = $url;
	}

        /**
         * Boots the component, running its actions/filters.
         *
         * @since 1.0.0
         */
        public function boot(): void
        {
		add_action( 'admin_print_styles', [ $this, 'adminStyles' ] );
		add_action( 'admin_print_scripts', [ $this, 'adminScripts' ] );
		add_action( 'admin_print_footer_scripts', [ $this, 'adminFooterScripts'] );
		add_action( 'admin_footer', [ $this, 'adminFooterWidgets' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'editorAssets' ] );
                add_action( 'admin_init', [ $this, 'addEditorStyles' ] );
	}

	/**
         * Loads the widget scripts and registers the Legacy Widget block via JS.
         *
         * @since 1.0.0
         */
	public function editorAssets(): void
	{
		wp_enqueue_script( 'wp-widgets' );
		wp_add_inline_script( 'wp-widgets', 'wp.widgets.registerLegacyWidgetBlock()' );

		// Editor stylesheet.
		wp_enqueue_style(
			'x3p0-legacy-widget-editor',
			$this->url . '/public/css/editor.css',
			[],
			filemtime( $this->path . '/public/css/editor.css' )
	        );
	}

	/**
	 * Loads editor style for cleaning up the block design.
	 *
	 * @since 1.0.0
	 */
	public function addEditorStyles(): void
	{
		add_editor_style( [
			$this->url . '/public/css/style.css'
		] );
	}

	/**
         * Runs the widget styles action in the block editor.
         *
         * @since 1.0.0
         */
	public function adminStyles(): void
	{
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_print_styles-widgets.php' );
		}
	}

	/**
         * Runs various widget actions in the block editor.
         *
         * @since 1.0.0
         */
	public function adminScripts(): void
	{
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'load-widgets.php' );
			do_action( 'widgets.php' );
			do_action( 'sidebar_admin_setup' );
			do_action( 'admin_print_scripts-widgets.php' );
		}
	}

	/**
         * Runs the footer widget scripts action in the block editor.
         *
         * @since 1.0.0
         */
	public function adminFooterScripts(): void
	{
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_print_footer_scripts-widgets.php' );
		}
	}

	/**
         * Runs the widgets footer action in the block editor.
         *
         * @since 1.0.0
         */
	public function adminFooterWidgets(): void
	{
		if ( get_current_screen()->is_block_editor() ) {
			do_action( 'admin_footer-widgets.php' );
		}
	}
}

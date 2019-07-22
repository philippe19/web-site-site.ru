<?php
namespace CT_Elementor_Widgets;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		//wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/ct-listings-grid.php' );
		require_once( __DIR__ . '/widgets/ct-listings-list.php' );
		require_once( __DIR__ . '/widgets/ct-listings-minimal-grid.php' );
		require_once( __DIR__ . '/widgets/ct-three-item-grid.php' );
		require_once( __DIR__ . '/widgets/ct-six-item-grid.php' );
		require_once( __DIR__ . '/widgets/ct-agent.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Listings_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Listings_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Listings_Minimal_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Agent() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Three_Item_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CT_Six_Item_Grid() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.creatrix.wordpress.com
 * @since      1.0.0
 *
 * @package    Creatrix
 * @subpackage Creatrix/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Creatrix
 * @subpackage Creatrix/public
 * @author     Shailesh Dhandhukiya <mrcreatrixx@gmail.com>
 */
class Creatrix_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creatrix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creatrix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/creatrix-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( "countdown", plugin_dir_url( __FILE__ ) . 'css/countdown.css', array(), "1.0.0", 'all',true );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Creatrix_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Creatrix_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/creatrix-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( "countdown", plugin_dir_url( __FILE__ ) . 'js/countdown.js', array( 'jquery' ), "1.0.0" , true );
		wp_enqueue_script( "countdownTimer", plugin_dir_url( __FILE__ ) . 'js/jQuery.countdownTimer.min.js', array( 'jquery' ), "1.0.0", true );
	}
}

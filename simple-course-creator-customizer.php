<?php
/**
 * Plugin Name: SCC - Customizer
 * Plugin URI: http://buildwpyourself.com/downloads/scc-customizer/
 * Description: Customizer the Simple Course Creator output with the WordPress theme customizer
 * Version: 1.0.2
 * Author: Sean Davis
 * Author URI: http://seandavis.co
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 3.9.1
 * Text Domain: scc_customizer
 * Domain Path: /languages/
 * 
 * This plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see http://www.gnu.org/licenses/.
 *
 * @package Simple Course Creator
 * @category Customizer
 * @author Sean Davis
 * @license GNU GENERAL PUBLIC LICENSE Version 2 - /license.txt
 */
if ( ! defined( 'ABSPATH' ) ) exit; // No accessing this file directly


/**
 * primary class for Simple Course Creator Customizer
 *
 * @since 1.0.0
 */
class Simple_Course_Creator_Customizer {

		
	/**
	 * constructor for Simple_Course_Creator_Customizer class
	 *
	 * Set up the basic plugin environment and with definitions,
	 * plugin information, and required plugin files.
	 */
	public function __construct() {
		
		// define plugin name
		define( 'SCCC_NAME', 'Simple Course Creator Customizer' );
		
		// define plugin version
		define( 'SCCC_VERSION', '1.0.2' );
		
		// define plugin directory
		define( 'SCCC_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		
		// define plugin root file
		define( 'SCCC_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// load text domain
		add_action( 'init', array( $this, 'load_textdomain' ) );
		
		// require additional plugin files
		$this->includes();
	}
	

	/**
	 * load SCC Customizer textdomain
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'scc_customizer', false, SCCC_DIR . "languages" );
	}
	
	
	/**
	 * require additional plugin files
	 */
	private function includes() {
		require_once( SCCC_DIR . 'includes/admin/class-scc-customizer.php' );		// customizer class
	}
}
new Simple_Course_Creator_Customizer();
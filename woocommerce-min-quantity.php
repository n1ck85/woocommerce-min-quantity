<?php
/*
Plugin Name: WooCommerce Minimum Quantity for Products
Plugin URI:
Description: A plugin to allow minimum quantity per product
Version: 1.0
Author: Nick Bibby
Author URI: https://nickbibby.me
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: woo_min_quantity
WC requires at least: 3.0.0
WC tested up to: 3.3.5

WooCommerce Minumum Quantity for Products. A Plugin that works with the WooCommerce plugin for WordPress.
Copyright (C) 2018 Paramount Digital

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	class woo_min_quantity {

    /**
     * The Constructor!
     */
    public function __construct() {
      $this->min_quantity_class_loader();
    }

    /**
     * Add the classes that make the magic
     */
    function min_quantity_class_loader() {
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-min-quantity-admin.php';
      require_once trailingslashit( dirname( __FILE__ ) ) . 'classes/class-min-quantity-frontend.php';
    }

  } // END class woo_qi

	// Instantiate the class
	$woo_min_quantity = new woo_min_quantity();

endif; // If WC is active

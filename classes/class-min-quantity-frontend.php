<?php
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class woo_min_quantity_output {

  /**
   * The Constructor!
   */
  public function __construct() {
    $this->min_quantity_add_actions_filters();
  }

  /**
   * Add actions and filters.
   */
  function min_quantity_add_actions_filters() {
    add_filter( 'woocommerce_quantity_input_args', array( &$this, 'woo_min_quantity_adjust_quantity' ), 20, 2 );
  }

	/**
	 * Render the output
	 */
	 function woo_min_quantity_adjust_quantity( $args, $product ) {
	  global $post;
	  // Check if min_quantity number exists
	  $woo_min_quantity_output = get_post_meta( $post->ID, 'min_quantity', true );
	  	// Check if variable or min_quantity number exists
		if( $woo_min_quantity_output ){
			if ( is_singular( 'product' ) ) {
			  //Starting value (we only want to affect product pages, not cart
			  $args['input_value'] 	=  $woo_min_quantity_output;
			}
			$args['min_value'] 	= $woo_min_quantity_output;

			return $args;
		}
		else
		{
			return $args;
		}
    }

}
// Instantiate the class
$woo_min_quantity_output = new woo_min_quantity_output();

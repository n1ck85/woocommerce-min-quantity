<?php
if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

class woo_min_quantity_input {

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
    add_action( 'woocommerce_product_options_inventory_product_data', array( &$this, 'woo_min_quantity_product_fields' ) );
    add_action( 'woocommerce_process_product_meta', array( &$this, 'woo_min_quantity_save_field_input' ) );
  }

  /**
   * Add the custom fields or the qi to the prodcut general tab
   */
  function woo_min_quantity_product_fields() {
    global $woocommerce, $post;

  	echo '<div class="wc_min_quantity_input">';
  		// woo_min_quantity field will be created here.
  		woocommerce_wp_text_input(
  			array(
				'type'        => 'number',
  				'id'          => 'min_quantity',
  				'label'       => __( 'Min Qty', 'woo_min_quantity' ),
  				'placeholder' => get_post_meta( $post->ID, "min_quantity", true ),
  				'desc_tip'    => 'true',
  				'description' => __( 'Enter the minimum quantity for this product here.', 'woo_min_quantity' )
  			)
  		);
  	echo '</div>';
  }

  /**
   * Update the database with the new input
   */
   function woo_min_quantity_save_field_input( $post_id ){
    // woo_min_quantity number field
    $woo_min_quantity_input = $_POST['min_quantity'];
    update_post_meta( $post_id, 'min_quantity', esc_attr( $woo_min_quantity_input ) );
  }

}
// Instantiate the class
$woo_min_quantity_input = new woo_min_quantity_input();

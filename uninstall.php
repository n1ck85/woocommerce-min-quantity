<?php
/**
 * Delete wooCommerce quantity increment data if plugin is deleted.
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) :
	exit;
endif;

delete_post_meta_by_key( 'min_quantity' );

<?php 
/*
	* Name: Dokan Vendor Hook
	* Develop: SmartAddons
*/

add_action( 'wp', 'floris_dokan_hook' );
function floris_dokan_hook(){
	 if ( dokan_is_store_page () ) {
		remove_action( 'woocommerce_before_main_content', 'floris_banner_listing', 10 );
	}
}

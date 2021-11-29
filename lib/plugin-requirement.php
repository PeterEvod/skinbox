<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'floris_register_required_plugins' );
function floris_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => esc_html__( 'WooCommerce', 'floris' ), 
            'slug'               => 'woocommerce', 
            'required'           => true, 
			'version'			 => '5.3.0'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Core', 'floris' ),
            'slug'      		 => 'sw_core',
            'source'             => get_template_directory_uri() . '/lib/plugins/sw_core.zip',  
            'required'  		 => true,   
			'version'			 => '1.5.3'
		),
		
		array(
            'name'     			 => esc_html__( 'SW WooCommerce', 'floris' ),
            'slug'      		 => 'sw_woocommerce',
            'source'             => get_template_directory_uri() . '/lib/plugins/sw_woocommerce.zip',   
            'required'  		 => true,
			'version'			 => '1.6.4'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Ajax Woocommerce Search', 'floris' ),
            'slug'      		 => 'sw_ajax_woocommerce_search',
            'source'             => get_template_directory_uri() . '/lib/plugins/sw_ajax_woocommerce_search.zip',  
            'required'  		 => true,
			'version'			 => '1.1.8'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Wooswatches', 'floris' ),
            'slug'      		 => 'sw_wooswatches',
            'source'             => get_template_directory_uri() . '/lib/plugins/sw_wooswatches.zip',  
            'required'  		 => true,
			'version'			 => '1.0.7'
        ),
				
		array(
            'name'               => esc_html__( 'One Click Install', 'floris' ), 
            'slug'               => 'one-click-demo-import', 
            'source'             => get_template_directory_uri() . '/lib/plugins/one-click-demo-import.zip',   
            'required'           => true, 
        ),
		array(
            'name'               => esc_html__( 'Sw Product Bundles', 'floris' ), 
            'slug'               => 'sw-product-bundles', 
            'source'             => get_template_directory_uri() . '/lib/plugins/sw-product-bundles.zip',  
            'required'           => true, 
            'version'            => '2.0.15'
        ),
		array(
            'name'      		 => esc_html__( 'MailChimp for WordPress Lite', 'floris' ),
            'slug'     			 => 'mailchimp-for-wp',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'Contact Form 7', 'floris' ),
            'slug'     			 => 'contact-form-7',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'YITH Woocommerce Compare', 'floris' ),
            'slug'      		 => 'yith-woocommerce-compare',
            'required'			 => false
        ),
		 array(
            'name'     			 => esc_html__( 'YITH Woocommerce Wishlist', 'floris' ),
            'slug'      		 => 'yith-woocommerce-wishlist',
            'required' 			 => false
        ), 
		array(
            'name'     			 => esc_html__( 'WordPress Seo', 'floris' ),
            'slug'      		 => 'wordpress-seo',
            'required'  		 => false,
        ),

    );		
    $config = array();

    tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'floris_vcSetAsTheme' );
function floris_vcSetAsTheme() {
    vc_set_as_theme();
}
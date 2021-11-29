<?php 
function sw_import_files() { 
	return array(

		array(
			'import_file_name'             => 'Home',
			'page_title'				   => 'Home',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/data.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/widgets.json',
			'local_import_revslider'  		 => array( 
				'slide1' => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/slideshow1.zip',
				'slide2' => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/slideshow1_1.zip',
				),
			'local_import_options'         => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'lib/import/demo-1/theme_options.txt',
					'option_name' => 'floris_theme',
					),
				),
			'menu_locate'									 => array(
				'primary_menu' => 'Primary Menu',
				'vertical_menu' => 'Vertical Menu',
				'mobile_menu1' => 'Mobile Menu'
				),
			'import_preview_image_url'     => get_template_directory_uri() . '/lib/import/demo-1/1.jpg',
			'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately. This import maybe finish on 10-15 minutes', 'floris' ),
			'preview_url'                  => esc_url( 'http://demo.wpthemego.com/themes/sw_floris/' ),
			),
	);
}
add_filter( 'pt-ocdi/import_files', 'sw_import_files' );
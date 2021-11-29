<?php
$lib_dir = trailingslashit( str_replace( '\\', '/', get_template_directory() . '/lib/' ) );

if( !defined('FLORIS_DIR') ){
	define( 'FLORIS_DIR', $lib_dir );
}

if( !defined('FLORIS_URL') ){
	define( 'FLORIS_URL', trailingslashit( get_template_directory_uri() ) . 'lib' );
}

if (!isset($content_width)) { $content_width = 940; }

define("FLORIS_PRODUCT_TYPE","product");
define("FLORIS_PRODUCT_DETAIL_TYPE","product_detail");

if ( !defined('SW_THEME') ){
	define( 'SW_THEME', 'floris_theme' );
}

require_once( get_template_directory().'/lib/options.php' );

if( class_exists( 'SW_Options' ) ) :
	function floris_Options_Setup(){
		global $sw_options, $options, $options_args;

		$options = array();
		$options[] = array(
			'title' => esc_html__('General', 'floris'),
			'desc' => wp_kses( __('<p class="description">The theme allows to build your own styles right out of the backend without any coding knowledge. Upload new logo and favicon or get their URL.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
			'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_019_cogwheel.png',
			//Lets leave this as a floris section, no options just some intro text set above.
			'fields' => array(	

				array(
					'id' => 'sitelogo',
					'type' => 'upload',
					'title' => esc_html__('Logo Image', 'floris'),
					'sub_desc' => esc_html__( 'Use the Upload button to upload the new logo and get URL of the logo', 'floris' ),
					'std' => get_template_directory_uri().'/assets/img/logo-default.png'
				),

				array(
					'id' => 'favicon',
					'type' => 'upload',
					'title' => esc_html__('Favicon', 'floris'),
					'sub_desc' => esc_html__( 'Use the Upload button to upload the custom favicon', 'floris' ),
					'std' => ''
				),

				array(
					'id' => 'tax_select',
					'type' => 'multi_select_taxonomy',
					'title' => esc_html__('Select Taxonomy', 'floris'),
					'sub_desc' => esc_html__( 'Select taxonomy to show custom term metabox', 'floris' ),
				),

				array(
					'id' => 'title_length',
					'type' => 'text',
					'title' => esc_html__('Title Length Of Item Listing Page', 'floris'),
					'sub_desc' => esc_html__( 'Choose title length if you want to trim word, leave 0 to not trim word', 'floris' ),
					'std' => 0
				),

				array(
					'id' => 'page_404',
					'type' => 'pages_select',
					'title' => esc_html__('404 Page Content', 'floris'),
					'sub_desc' => esc_html__('Select page 404 content', 'floris'),
					'std' => ''
				),
			)		
		);

		$options[] = array(
			'title' => esc_html__('Schemes', 'floris'),
			'desc' => wp_kses( __('<p class="description">Custom color scheme for theme. Unlimited color that you can choose.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
			'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_163_iphone.png',
			//Lets leave this as a floris section, no options just some intro text set above.
			'fields' => array(		
				array(
					'id' => 'scheme',
					'type' => 'radio_img',
					'title' => esc_html__('Color Scheme', 'floris'),
					'sub_desc' => esc_html__( 'Select one of 12 predefined schemes', 'floris' ),
					'desc' => '',
					'options' => array(
						'default' => array('title' => 'Default', 'img' => get_template_directory_uri().'/assets/img/default.png'),
						'red' => array('title' => 'Red', 'img' => get_template_directory_uri().'/assets/img/red.png'),
									), //Must provide key => value(array:title|img) pairs for radio options
					'std' => 'default'
				),
				
				array(
					'id' => 'custom_color',
					'title' => esc_html__( 'Enable Custom Color', 'floris' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( 'Check this field to enable custom color and when you update your theme, custom color will not lose.', 'floris' ),
					'desc' => '',
					'std' => '0'
				),

				array(
					'id' => 'developer_mode',
					'title' => esc_html__( 'Developer Mode', 'floris' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( 'Turn on/off compile less to css and custom color', 'floris' ),
					'desc' => '',
					'std' => '0'
				),
				
				array(
					'id' => 'scheme_color',
					'type' => 'color',
					'title' => esc_html__('Color', 'floris'),
					'sub_desc' => esc_html__('Select main custom color.', 'floris'),
					'std' => ''
				),
				
				array(
					'id' => 'scheme_body',
					'type' => 'color',
					'title' => esc_html__('Body Color', 'floris'),
					'sub_desc' => esc_html__('Select main body custom color.', 'floris'),
					'std' => ''
				),
				
				array(
					'id' => 'scheme_border',
					'type' => 'color',
					'title' => esc_html__('Border Color', 'floris'),
					'sub_desc' => esc_html__('Select main border custom color.', 'floris'),					
					'std' => ''
				)			
			)
		);

		$options[] = array(
			'title' => esc_html__('Layout', 'floris'),
			'desc' => wp_kses( __('<p class="description">WpThemeGo Framework comes with a layout setting that allows you to build any number of stunning layouts and apply theme to your entries.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
			'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_319_sort.png',
			//Lets leave this as a floris section, no options just some intro text set above.
			'fields' => array(
				array(
					'id' => 'layout',
					'type' => 'select',
					'title' => esc_html__('Box Layout', 'floris'),
					'sub_desc' => esc_html__( 'Select Layout Box or Wide', 'floris' ),
					'options' => array(
						'full' => esc_html__( 'Wide', 'floris' ),
						'boxed' => esc_html__( 'Boxed', 'floris' )
					),
					'std' => 'wide'
				),
				
				array(
					'id' => 'bg_box_img',
					'type' => 'upload',
					'title' => esc_html__('Background Box Image', 'floris'),
					'sub_desc' => '',
					'std' => ''
				),
				array(
					'id' => 'sidebar_left_expand',
					'type' => 'select',
					'title' => esc_html__('Left Sidebar Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12', 
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '3',
					'sub_desc' => esc_html__( 'Select width of left sidebar.', 'floris' ),
				),

				array(
					'id' => 'sidebar_right_expand',
					'type' => 'select',
					'title' => esc_html__('Right Sidebar Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12',
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '3',
					'sub_desc' => esc_html__( 'Select width of right sidebar medium desktop.', 'floris' ),
				),
				array(
					'id' => 'sidebar_left_expand_md',
					'type' => 'select',
					'title' => esc_html__('Left Sidebar Medium Desktop Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12',
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '4',
					'sub_desc' => esc_html__( 'Select width of left sidebar medium desktop.', 'floris' ),
				),
				array(
					'id' => 'sidebar_right_expand_md',
					'type' => 'select',
					'title' => esc_html__('Right Sidebar Medium Desktop Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12',
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '4',
					'sub_desc' => esc_html__( 'Select width of right sidebar.', 'floris' ),
				),
				array(
					'id' => 'sidebar_left_expand_sm',
					'type' => 'select',
					'title' => esc_html__('Left Sidebar Tablet Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12',
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '4',
					'sub_desc' => esc_html__( 'Select width of left sidebar tablet.', 'floris' ),
				),
				array(
					'id' => 'sidebar_right_expand_sm',
					'type' => 'select',
					'title' => esc_html__('Right Sidebar Tablet Expand', 'floris'),
					'options' => array(
						'2' => '2/12',
						'3' => '3/12',
						'4' => '4/12',
						'5' => '5/12',
						'6' => '6/12',
						'7' => '7/12',
						'8' => '8/12',
						'9' => '9/12',
						'10' => '10/12',
						'11' => '11/12',
						'12' => '12/12'
					),
					'std' => '4',
					'sub_desc' => esc_html__( 'Select width of right sidebar tablet.', 'floris' ),
				),				
			)
		);
$options[] = array(
	'title' => esc_html__('Mobile Layout', 'floris'),
	'desc' => wp_kses( __('<p class="description">WpThemeGo Framework comes with a mobile setting home page layout.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_163_iphone.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(				
		array(
			'id' => 'mobile_enable',
			'type' => 'checkbox',
			'title' => esc_html__('Enable Mobile Layout', 'floris'),
			'sub_desc' => '',
			'desc' => '',
							'std' => '1'// 1 = on | 0 = off
						),

		array(
			'id' => 'mobile_logo',
			'type' => 'upload',
			'title' => esc_html__('Logo Mobile Image', 'floris'),
			'sub_desc' => esc_html__( 'Use the Upload button to upload the new mobile logo', 'floris' ),
			'std' => get_template_directory_uri().'/assets/img/logo-default.png'
		),

		array(
			'id' => 'mobile_logo_account',
			'type' => 'upload',
			'title' => esc_html__('Logo Mobile My Account Page', 'floris'),
			'sub_desc' => esc_html__( 'Use the Upload button to upload the new mobile logo in my account page', 'floris' ),
			'std' => get_template_directory_uri().'/assets/img/icon-myaccount.png'
		),

		array(
			'id' => 'sticky_mobile',
			'type' => 'checkbox',
			'title' => esc_html__('Sticky Mobile', 'floris'),
			'sub_desc' => '',
			'desc' => '',
							'std' => '0'// 1 = on | 0 = off
				),

		array(
			'id' => 'mobile_content',
			'type' => 'pages_select',
			'title' => esc_html__('Mobile Layout Content', 'floris'),
			'sub_desc' => esc_html__('Select content index for this mobile layout', 'floris'),
			'std' => ''
		),

		array(
			'id' => 'mobile_header_style',
			'type' => 'select',
			'title' => esc_html__('Header Mobile Style', 'floris'),
			'sub_desc' => esc_html__('Select header mobile style', 'floris'),
			'options' => array(
				'mstyle1'  => esc_html__( 'Style 1', 'floris' ),
			),
			'std' => 'style1'
		),

		array(
			'id' => 'mobile_footer_style',
			'type' => 'select',
			'title' => esc_html__('Footer Mobile Style', 'floris'),
			'sub_desc' => esc_html__('Select footer mobile style', 'floris'),
			'options' => array(
				'mstyle1'  => esc_html__( 'Style 1', 'floris' ),
			),
			'std' => 'style1'
		),

		array(
			'id' => 'mobile_addcart',
			'type' => 'checkbox',
			'title' => esc_html__('Enable Add To Cart Button', 'floris'),
			'sub_desc' => esc_html__( 'Enable Add To Cart Button on product listing', 'floris' ),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),

		array(
			'id' => 'mobile_header_inside',
			'type' => 'checkbox',
			'title' => esc_html__('Enable Header Other Pages', 'floris'),
			'sub_desc' => esc_html__( 'Enable header in other pages which are different with homepage', 'floris' ),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),

		array(
			'id' => 'mobile_jquery',
			'type' => 'checkbox',
			'title' => esc_html__('Include Jquery Florislution', 'floris'),
			'sub_desc' => esc_html__( 'Enable jquery florislution slider on mobile layout.', 'floris' ),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),
	)
);

$options[] = array(
	'title' => esc_html__('Header & Footer', 'floris'),
	'desc' => wp_kses( __('<p class="description">WpThemeGo Framework comes with a header and footer setting that allows you to build style header.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_336_read_it_later.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'header_style',
			'type' => 'select',
			'title' => esc_html__('Header Style', 'floris'),
			'sub_desc' => esc_html__('Select Header style', 'floris'),
			'options' => array(
				'style1'  => esc_html__( 'Style 1', 'floris' ),
				'style2'  => esc_html__( 'Style 2', 'floris' ),
			),
			'std' => 'style1'
		),

		array(
			'id' => 'disable_search',
			'title' => esc_html__( 'Disable Search', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Check this to disable search on header', 'floris' ),
			'desc' => '',
			'std' => '0'
		),

		array(
			'id' => 'disable_cart',
			'title' => esc_html__( 'Disable Cart', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Check this to disable cart on header', 'floris' ),
			'desc' => '',
			'std' => '0'
		),				

		array(
			'id' => 'footer_style',
			'type' => 'pages_select',
			'title' => esc_html__('Footer Style', 'floris'),
			'sub_desc' => esc_html__('Select Footer style', 'floris'),
			'std' => ''
		),


		array(
			'id' => 'copyright_style',
			'type' => 'select',
			'title' => esc_html__('Copyright Style', 'floris'),
			'sub_desc' => esc_html__('Select Copyright style', 'floris'),
			'options' => array(
				'style1'  => esc_html__( 'Style 1', 'floris' ),
				'style2'  => esc_html__( 'Style 2', 'floris' ),
			),
			'std' => 'style1'
		),

		array(
			'id' => 'footer_copyright',
			'type' => 'editor',
			'sub_desc' => '',
			'title' => esc_html__( 'Copyright text', 'floris' )
		),	

	)
);
$options[] = array(
	'title' => esc_html__('Navbar Options', 'floris'),
	'desc' => wp_kses( __('<p class="description">If you got a big site with a lot of sub menus we recommend using a mega menu. Just select the dropbox to display a menu as mega menu or dropdown menu.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_157_show_lines.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'menu_type',
			'type' => 'select',
			'title' => esc_html__('Menu Type', 'floris'),
			'options' => array( 
				'dropdown' => esc_html__( 'Dropdown Menu', 'floris' ), 
				'mega' => esc_html__( 'Mega Menu', 'floris' ) 
			),
			'std' => 'mega'
		),	

		array(
			'id' => 'menu_location',
			'type' => 'menu_location_multi_select',
			'title' => esc_html__('Theme Location', 'floris'),
			'sub_desc' => esc_html__( 'Select theme location to active mega menu and menu responsive.', 'floris' ),
			'std' => 'primary_menu'
		),		

		array(
			'id' => 'sticky_menu',
			'type' => 'checkbox',
			'title' => esc_html__('Active sticky menu', 'floris'),
			'sub_desc' => '',
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),

		array(
			'id' => 'more_menu',
			'type' => 'checkbox',
			'title' => esc_html__('Active More Menu', 'floris'),
			'sub_desc' => esc_html__('Active more menu if your primary menu is too long', 'floris'),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),

		array(
			'id' => 'menu_event',
			'type' => 'select',
			'title' => esc_html__('Menu Event', 'floris'),
			'options' => array( 
				'' 		=> esc_html__( 'Hover Event', 'floris' ), 
				'click' => esc_html__( 'Click Event', 'floris' ) 
			),
			'std' => ''
		),

		array(
			'id' => 'menu_number_item',
			'type' => 'text',
			'title' => esc_html__( 'Number Item Vertical', 'floris' ),
			'sub_desc' => esc_html__( 'Number item vertical to show', 'floris' ),
			'std' => 8
		),	

		array(
			'id' => 'menu_title_text',
			'type' => 'text',
			'title' => esc_html__('Vertical Title Text', 'floris'),
			'sub_desc' => esc_html__( 'Change title text on vertical menu', 'floris' ),
			'std' => ''
		),

		array(
			'id' => 'menu_more_text',
			'type' => 'text',
			'title' => esc_html__('Vertical More Text', 'floris'),
			'sub_desc' => esc_html__( 'Change more text on vertical menu', 'floris' ),
			'std' => ''
		),

		array(
			'id' => 'menu_less_text',
			'type' => 'text',
			'title' => esc_html__('Vertical Less Text', 'floris'),
			'sub_desc' => esc_html__( 'Change less text on vertical menu', 'floris' ),
			'std' => ''
		),
		array(
					'id' => 'menu_less_text',
					'type' => 'text',
					'title' => esc_html__('Vertical Less Text', 'floris'),
					'sub_desc' => esc_html__( 'Change less text on vertical menu', 'floris' ),
					'std' => ''
				),
				
				array(
					'id' => 'info_typon2',
					'type' => 'info',
					'title' => esc_html__( 'Responsive Menu Config', 'floris' ),
					'desc' => '',
					'class' => 'floris-opt-info'
				),
				
				array(
					'id' => 'mobile_menu',
					'type' => 'menu_location_multi_select',
					'title' => esc_html__('Mobile & Responsive Menu Location', 'floris'),
					'sub_desc' => esc_html__( 'Select theme location to active mobile menu.', 'floris' ),
					'std' => 'primary_menu'
				),
				
				array(
					'id' => 'mobile_menu_title',
					'type' => 'text',
					'title' => esc_html__('Mobile Menu Title', 'floris'),
					'sub_desc' => esc_html__( 'Change title heading of menu responsive. If there are many menu, each title separated by commas.', 'floris' ),
					'std' => ''
				),		
	)
);
$options[] = array(
	'title' => esc_html__('Blog Options', 'floris'),
	'desc' => wp_kses( __('<p class="description">Select layout in blog listing page.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_071_book.png',
		//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'sidebar_blog',
			'type' => 'select',
			'title' => esc_html__('Sidebar Blog Layout', 'floris'),
			'options' => array(
				'full' 	=> esc_html__( 'Full Layout', 'floris' ),		
				'left'	=> esc_html__( 'Left Sidebar', 'floris' ),
				'right' => esc_html__( 'Right Sidebar', 'floris' ),
			),
			'std' => 'left',
			'sub_desc' => esc_html__( 'Select style sidebar blog', 'floris' ),
		),
		array(
			'id' => 'blog_layout',
			'type' => 'select',
			'title' => esc_html__('Layout blog', 'floris'),
			'options' => array(
				'list'	=>  esc_html__( 'List Layout', 'floris' ),
				'grid' 	=>  esc_html__( 'Grid Layout', 'floris' )								
			),
			'std' => 'list',
			'sub_desc' => esc_html__( 'Select style layout blog', 'floris' ),
		),
		array(
			'id' => 'blog_column',
			'type' => 'select',
			'title' => esc_html__('Blog column', 'floris'),
			'options' => array(								
				'2' =>  esc_html__( '2 Columns', 'floris' ),
				'3' =>  esc_html__( '3 Columns', 'floris' ),
				'4' =>  esc_html__( '4 Columns', 'floris' )								
			),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select style number column blog', 'floris' ),
		),
	)
);	
$options[] = array(
	'title' => esc_html__('Product Options', 'floris'),
	'desc' => wp_kses( __('<p class="description">Select layout in product listing page.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_202_shopping_cart.png',
		//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Product Categories Config', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'product_colcat_large',
			'type' => 'select',
			'title' => esc_html__('Product Category Listing column Desktop', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',							
			),
			'std' => '4',
			'sub_desc' => esc_html__( 'Select number of column on Desktop Screen', 'floris' ),
		),

		array(
			'id' => 'product_colcat_medium',
			'type' => 'select',
			'title' => esc_html__('Product Listing Category column Medium Desktop', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',	
				'5' => '5',
				'6' => '6',
			),
			'std' => '3',
			'sub_desc' => esc_html__( 'Select number of column on Medium Desktop Screen', 'floris' ),
		),

		array(
			'id' => 'product_colcat_sm',
			'type' => 'select',
			'title' => esc_html__('Product Listing Category column Tablet', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',	
				'5' => '5',
				'6' => '6'
			),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select number of column on Tablet Screen', 'floris' ),
		),

		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Product General Config', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'product_banner',
			'title' => esc_html__( 'Select Banner', 'floris' ),
			'type' => 'select',
			'sub_desc' => '',
			'options' => array(
				'' 			=> esc_html__( 'Use Banner', 'floris' ),
				'listing' 	=> esc_html__( 'Use Category Product Image', 'floris' ),
			),
			'std' => '',
		),

		array(
			'id' => 'product_listing_banner',
			'type' => 'upload',
			'title' => esc_html__('Listing Banner Product', 'floris'),
			'sub_desc' => esc_html__( 'Use the Upload button to upload banner product listing', 'floris' ),
			'std' => get_template_directory_uri().'/assets/img/listing-banner.jpg'
		),
		array(
				'id' => 'link_banner_shop',
				'type' => 'text',
				'title' => esc_html__('Link Of Banner Product', 'floris'),
				'sub_desc' => esc_html__( 'Use the link for the banner product listing', 'floris' ),
				'std' => '',
				),
		array(
			'id' => 'product_col_large',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Desktop', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6',							
			),
			'std' => '3',
			'sub_desc' => esc_html__( 'Select number of column on Desktop Screen', 'floris' ),
		),

		array(
			'id' => 'product_col_medium',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Medium Desktop', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',	
				'5' => '5',
				'6' => '6',
			),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select number of column on Medium Desktop Screen', 'floris' ),
		),

		array(
			'id' => 'product_col_sm',
			'type' => 'select',
			'title' => esc_html__('Product Listing column Tablet', 'floris'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',	
				'5' => '5',
				'6' => '6'
			),
			'std' => '2',
			'sub_desc' => esc_html__( 'Select number of column on Tablet Screen', 'floris' ),
		),

		array(
			'id' => 'sidebar_product',
			'type' => 'select',
			'title' => esc_html__('Sidebar Product Layout', 'floris'),
			'options' => array(
				'left'	=> esc_html__( 'Left Sidebar', 'floris' ),
				'full' 	=> esc_html__( 'Full Layout', 'floris' ),		
				'right' => esc_html__( 'Right Sidebar', 'floris' )
			),
			'std' => 'left',
			'sub_desc' => esc_html__( 'Select style sidebar product', 'floris' ),
		),

		array(
			'id' => 'product_quickview',
			'title' => esc_html__( 'Quickview', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off Product Quickview', 'floris' ),
			'std' => '1'
		),

		array(
			'id' => 'product_listing_countdown',
			'title' => esc_html__( 'Enable Countdown', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off Product Countdown on product listing', 'floris' ),
			'std' => '1'
		),


		array(
			'id' => 'product_number',
			'type' => 'text',
			'title' => esc_html__('Product Listing Number', 'floris'),
			'sub_desc' => esc_html__( 'Show number of product in listing product page.', 'floris' ),
			'std' => 12
		),

		array(
			'id' => 'newproduct_time',
			'title' => esc_html__( 'New Product', 'floris' ),
			'type' => 'number',
			'sub_desc' => '',
			'desc' => esc_html__( 'Set day for the new product label from the date publish product.', 'floris' ),
			'std' => '1'
		),

		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Product Single Config', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'sidebar_product_detail',
			'type' => 'select',
			'title' => esc_html__('Sidebar Product Single Layout', 'floris'),
			'options' => array(
				'left'	=> esc_html__( 'Left Sidebar', 'floris' ),
				'full' 	=> esc_html__( 'Full Layout', 'floris' ),		
				'right' => esc_html__( 'Right Sidebar', 'floris' )
			),
			'std' => 'left',
			'sub_desc' => esc_html__( 'Select style sidebar product single', 'floris' ),
		),

		array(
			'id' => 'product_single_style',
			'type' => 'select',
			'title' => esc_html__('Product Detail Style', 'floris'),
			'options' => array(
				'default'	=> esc_html__( 'Default', 'floris' ),
				'style1' 	=> esc_html__( 'Full Width', 'floris' ),	
				'style2' 	=> esc_html__( 'Full Width With Accordion', 'floris' ),	
				'style3' 	=> esc_html__( 'Full Width With Accordion 1', 'floris' ),	
			),
			'std' => 'default',
			'sub_desc' => esc_html__( 'Select style for product single', 'floris' ),
		),

		array(
			'id' => 'product_single_thumbnail',
			'type' => 'select',
			'title' => esc_html__('Product Thumbnail Position', 'floris'),
			'options' => array(
				'bottom'	=> esc_html__( 'Bottom', 'floris' ),
				'left' 		=> esc_html__( 'Left', 'floris' ),	
				'right' 	=> esc_html__( 'Right', 'floris' ),	
				'top' 		=> esc_html__( 'Top', 'floris' ),					
			),
			'std' => 'bottom',
			'sub_desc' => esc_html__( 'Select style for product single thumbnail', 'floris' ),
		),		


		array(
			'id' => 'product_zoom',
			'title' => esc_html__( 'Product Zoom', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off image zoom when hover on single product', 'floris' ),
			'std' => '1'
		),

		array(
			'id' => 'product_brand',
			'title' => esc_html__( 'Enable Product Brand Image', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off product brand image show on single product.', 'floris' ),
			'std' => '1'
		),

		array(
			'id' => 'product_single_countdown',
			'title' => esc_html__( 'Enable Countdown Single', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => '',
			'desc' => esc_html__( 'Turn On/Off Product Countdown on product single', 'floris' ),
			'std' => '1'
		),

		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Config For Product Categories Widget', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'product_number_item',
			'type' => 'text',
			'title' => esc_html__( 'Category Number Item Show', 'floris' ),
			'sub_desc' => esc_html__( 'Choose to number of item category that you want to show, leave 0 to show all category', 'floris' ),
			'std' => 8
		),	

		array(
			'id' => 'product_more_text',
			'type' => 'text',
			'title' => esc_html__( 'Category More Text', 'floris' ),
			'sub_desc' => esc_html__( 'Change more text on category product', 'floris' ),
			'std' => ''
		),

		array(
			'id' => 'product_less_text',
			'type' => 'text',
			'title' => esc_html__( 'Category Less Text', 'floris' ),
			'sub_desc' => esc_html__( 'Change less text on category product', 'floris' ),
			'std' => ''
		)	
	)
);		
$options[] = array(
	'title' => esc_html__('Typography', 'floris'),
	'desc' => wp_kses( __('<p class="description">Change the font style of your blog, custom with Google Font.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_151_edit.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'info_typo1',
			'type' => 'info',
			'title' => esc_html( 'Global Typography', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'google_webfonts',
			'type' => 'google_webfonts',
			'title' => esc_html__('Use Google Webfont', 'floris'),
			'sub_desc' => esc_html__( 'Insert font style that you actually need on your webpage.', 'floris' ), 
			'std' => ''
		),

		array(
			'id' => 'webfonts_weight',
			'type' => 'multi_select',
			'sub_desc' => esc_html__( 'For weight, see Google Fonts to custom for each font style.', 'floris' ),
			'title' => esc_html__('Webfont Weight', 'floris'),
			'options' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900'
			),
			'std' => ''
		),

		array(
			'id' => 'info_typo2',
			'type' => 'info',
			'title' => esc_html( 'Header Tag Typography', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'header_tag_font',
			'type' => 'google_webfonts',
			'title' => esc_html__('Header Tag Font', 'floris'),
			'sub_desc' => esc_html__( 'Select custom font for header tag ( h1...h6 )', 'floris' ), 
			'std' => ''
		),

		array(
			'id' => 'info_typo2',
			'type' => 'info',
			'title' => esc_html( 'Main Menu Typography', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'menu_font',
			'type' => 'google_webfonts',
			'title' => esc_html__('Main Menu Font', 'floris'),
			'sub_desc' => esc_html__( 'Select custom font for main menu', 'floris' ), 
			'std' => ''
		),

		array(
			'id' => 'info_typo2',
			'type' => 'info',
			'title' => esc_html( 'Custom Typography', 'floris' ),
			'desc' => '',
			'class' => 'floris-opt-info'
		),

		array(
			'id' => 'custom_font',
			'type' => 'google_webfonts',
			'title' => esc_html__('Custom Font', 'floris'),
			'sub_desc' => esc_html__( 'Select custom font for custom class', 'floris' ), 
			'std' => ''
		),

		array(
			'id' => 'custom_font_class',
			'title' => esc_html__( 'Custom Font Class', 'floris' ),
			'type' => 'text',
			'sub_desc' => esc_html__( 'Put custom class to this field. Each class separated by commas.', 'floris' ),
			'desc' => '',
			'std' => '',
		),

	)
);

$options[] = array(
	'title' => __('Social', 'floris'),
	'desc' => wp_kses( __('<p class="description">This feature allow to you link to your social.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_222_share.png',
		//Lets leave this as a blank section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'social-share-fb',
			'title' => esc_html__( 'Facebook', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-tw',
			'title' => esc_html__( 'Twitter', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-tumblr',
			'title' => esc_html__( 'Tumblr', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-in',
			'title' => esc_html__( 'Linkedin', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-instagram',
			'title' => esc_html__( 'Instagram', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-go',
			'title' => esc_html__( 'Google+', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		),
		array(
			'id' => 'social-share-pi',
			'title' => esc_html__( 'Pinterest', 'floris' ),
			'type' => 'text',
			'sub_desc' => '',
			'desc' => '',
			'std' => '',
		)

	)
);

$options[] = array(
	'title' => esc_html__('Popup Config', 'floris'),
	'desc' => wp_kses( __('<p class="description">Enable popup and more config for Popup.</p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_318_more-items.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'popup_active',
			'type' => 'checkbox',
			'title' => esc_html__( 'Active Popup Subscribe', 'floris' ),
			'sub_desc' => esc_html__( 'Check to active popup subscribe', 'floris' ),
			'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),	

		array(
			'id' => 'popup_background',
			'title' => esc_html__( 'Popup Background', 'floris' ),
			'type' => 'upload',
			'sub_desc' => esc_html__( 'Choose popup background image', 'floris' ),
			'desc' => '',
			'std' => get_template_directory_uri().'/assets/img/popup/bg-main.jpg'
		),

		array(
			'id' => 'popup_content',
			'title' => esc_html__( 'Popup Content', 'floris' ),
			'type' => 'editor',
			'sub_desc' => esc_html__( 'Change text of popup mode', 'floris' ),
			'desc' => '',
			'std' => ''
		),	

		array(
			'id' => 'popup_form',
			'title' => esc_html__( 'Popup Form', 'floris' ),
			'type' => 'text',
			'sub_desc' => esc_html__( 'Put shortcode form to this field and it will be shown on popup mode frontend.', 'floris' ),
			'desc' => '',
			'std' => ''
		),

	)
);

$options[] = array(
	'title' => esc_html__('Advanced', 'floris'),
	'desc' => wp_kses( __('<p class="description">Custom advanced with Cpanel, Widget advanced, Developer mode </p>', 'floris'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it floris for default.
	'icon' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a floris section, no options just some intro text set above.
	'fields' => array(
		array(
			'id' => 'show_cpanel',
			'title' => esc_html__( 'Show cPanel', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off Cpanel', 'floris' ),
			'desc' => '',
			'std' => ''
		),

		array(
			'id' => 'widget-advanced',
			'title' => esc_html__('Widget Advanced', 'floris'),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off Widget Advanced', 'floris' ),
			'desc' => '',
			'std' => '1'
		),					

		array(
			'id' => 'social_share',
			'title' => esc_html__( 'Social Share', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn on/off social share', 'floris' ),
			'desc' => '',
			'std' => '1'
		),

		array(
			'id' => 'breadcrumb_active',
			'title' => esc_html__( 'Turn Off Breadcrumb', 'floris' ),
			'type' => 'checkbox',
			'sub_desc' => esc_html__( 'Turn off breadcumb on all page', 'floris' ),
			'desc' => '',
			'std' => '0'
		),

		array(
			'id' => 'back_active',
			'type' => 'checkbox',
			'title' => esc_html__('Back to top', 'floris'),
			'sub_desc' => '',
			'desc' => '',
						'std' => '1'// 1 = on | 0 = off
					),	

		array(
			'id' => 'direction',
			'type' => 'select',
			'title' => esc_html__('Direction', 'floris'),
			'options' => array( 'ltr' => 'Left to Right', 'rtl' => 'Right to Left' ),
			'std' => 'ltr'
		),


	)
);

$options_args = array();

	//Setup custom links in the footer for share icons
$options_args['share_icons']['facebook'] = array(
	'link' => 'http://www.facebook.com/wpthemego',
	'title' => 'Facebook',
	'img' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_320_facebook.png'
);
$options_args['share_icons']['twitter'] = array(
	'link' => 'https://twitter.com/wpthemego/',
	'title' => 'Folow me on Twitter',
	'img' => FLORIS_URL.'/admin/img/glyphicons/glyphicons_322_twitter.png'
);


	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$options_args['opt_name'] = SW_THEME;
$webfonts = ( sw_options( 'google_webfonts_api' ) ) ? sw_options( 'google_webfonts_api' ) : 'AIzaSyAL_XMT9t2KuBe2MIcofGl6YF1IFzfB4L4';
	$options_args['google_api_key'] = $webfonts; //must be defined for use with google webfonts field type

	//Custom menu title for options page - default is "Options"
	$options_args['menu_title'] = esc_html__('Theme Options', 'floris');

	//Custom Page Title for options page - default is "Options"
	$options_args['page_title'] = esc_html__('Floris Options ', 'floris');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "floris_theme_options"
	$options_args['page_slug'] = 'floris_theme_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	$options_args['page_type'] = 'submenu';

	//custom page location - default 100 - must be unique or will override other items
	$options_args['page_position'] = 27;
	$sw_options = new SW_Options( $options, $options_args );
}
add_action( 'init', 'floris_Options_Setup', 0 );
// floris_Options_Setup();
endif; 


/*
** Define widget
*/
function floris_widget_setup_args(){
	$floris_widget_areas = array(
		
		array(
			'name' => esc_html__('Sidebar Left Blog', 'floris'),
			'id'   => 'left-blog',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		array(
			'name' => esc_html__('Sidebar Right Blog', 'floris'),
			'id'   => 'right-blog',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Header Left', 'floris'),
			'id'   => 'header-left',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		array(
			'name' => esc_html__('Header Left2', 'floris'),
			'id'   => 'header-left2',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		array(
			'name' => esc_html__('Mid Header', 'floris'),
			'id'   => 'mid-header',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		array(
			'name' => esc_html__('Header Right', 'floris'),
			'id'   => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		array(
			'name' => esc_html__('Header Right2', 'floris'),
			'id'   => 'header-right2',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		array(
			'name' => esc_html__('Bottom Header', 'floris'),
			'id'   => 'bottom-header',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),

		array(
			'name' => esc_html__('Sidebar Left Product', 'floris'),
			'id'   => 'left-product',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Sidebar Right Product', 'floris'),
			'id'   => 'right-product',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Banner Mobile', 'floris'),
			'id'   => 'banner-mobile',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Sidebar Left Detail Product', 'floris'),
			'id'   => 'left-product-detail',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Sidebar Right Detail Product', 'floris'),
			'id'   => 'right-product-detail',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget' => '</div></div>',
			'before_title' => '<div class="block-title-widget"><h2><span>',
			'after_title' => '</span></h2></div>'
		),
		
		array(
			'name' => esc_html__('Sidebar Bottom Detail Product', 'floris'),
			'id'   => 'bottom-detail-product',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		
		array(
			'name' => esc_html__('Bottom Detail Product Mobile', 'floris'),
			'id'   => 'bottom-detail-product-mobile',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
		
		array(
			'name' => esc_html__('Filter Mobile', 'floris'),
			'id'   => 'filter-mobile',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),

		array(
			'name' => esc_html__('Footer Copyright', 'floris'),
			'id'   => 'footer-copyright',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		),
	);
return apply_filters( 'floris_widget_register', $floris_widget_areas );
}
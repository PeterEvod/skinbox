<?php
/* 
** Content Header
*/
$floris_page_header = get_post_meta( get_the_ID(), 'page_header_style', true );
$floris_colorset = sw_options('scheme');
$floris_logo = sw_options('sitelogo');
$sticky_menu 		= sw_options( 'sticky_menu' );
$floris_page_header  = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : sw_options('header_style');
$floris_menu_item 	= ( sw_options( 'menu_number_item' ) ) ? sw_options( 'menu_number_item' ) : 9;
$floris_more_text 	= ( sw_options( 'menu_more_text' ) )	 ? sw_options( 'menu_more_text' )		: esc_html__( 'See More', 'floris' );
$floris_less_text 	= sw_options( 'menu_less_text' )			 ? sw_options( 'menu_less_text' )		: esc_html__( 'See Less', 'floris' );
$floris_menu_text 	= ( sw_options( 'menu_title_text' ) )	 ? sw_options( 'menu_title_text' )	: esc_html__( 'All Departments', 'floris' );
?>
<header id="header" class="header header-style2">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<!-- Sidebar Top Menu -->
				<?php if (is_active_sidebar('header-left2')) {?>
				<div class="left-header col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar('header-left2'); ?>
				</div>
				<?php }?>
				<!-- Sidebar Top Menu -->
				<?php if (is_active_sidebar('mid-header')) {?>
				<div class="mid-header col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<?php dynamic_sidebar('mid-header'); ?>
				</div>
				<?php }?>	
				<!-- Sidebar Top Menu -->
				<?php if( class_exists( 'WooCommerce' ) ) : ?>	
					<div class="right-header col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php dynamic_sidebar('header-right'); ?>
						<?php if (is_active_sidebar('header-right2')) {?>
						<div class="sw-floris-account pull-right">
							<i class="fa fa-user" aria-hidden="true"></i>						
							<div id="sidebar-top-right" class="sidebar-top-right">
								<?php dynamic_sidebar('header-right2'); ?>
							</div>						
						</div>
						<?php }?>
					</div>
				<?php endif; ?>
			</div>
		</div>		
	</div>
	<div class="header-mid">
		<div class="container">
			<!-- Logo -->
			<div class="top-header col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left">
				<div class="floris-logo">
					<?php floris_logo(); ?>
				</div>
			</div>
			<!-- Primary navbar -->
			<?php if ( has_nav_menu('primary_menu') ) { ?>
			<div id="main-menu" class="main-menu clearfix col-lg-9 col-md-9 pull-left">
				<nav id="primary-menu" class="primary-menu">
					<div class="mid-header clearfix">
						<div class="navbar-inner navbar-inverse">
							<?php
							$floris_menu_class = 'nav nav-pills';
							if ( 'mega' == sw_options('menu_type') ){
								$floris_menu_class .= ' nav-mega';
							} else $floris_menu_class .= ' nav-css';
							?>
							<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $floris_menu_class)); ?>
						</div>
					</div>
				</nav>
			</div>			
			<?php } ?>
			<!-- Sidebar Top Menu -->
			<div class="search-cate pull-right">
				<div class="icon-search">
					<i class="fa fa-search"></i>
				</div>
				<?php if( is_active_sidebar( 'search' ) && class_exists( 'sw_woo_search_widget' ) ): ?>
					<?php dynamic_sidebar( 'search' ); ?>
				<?php else : ?>
					<div class="widget floris_top-3 floris_top non-margin">
						<div class="widget-inner">
							<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>
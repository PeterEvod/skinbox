<?php get_header(); ?>
<?php 
	$floris_sidebar_template	= get_post_meta( get_the_ID(), 'page_sidebar_layout', true );
	$floris_sidebar 			= get_post_meta( get_the_ID(), 'page_sidebar_template', true );
?>
	<?php if ( !is_front_page() ) { ?>
	<div class="floris_breadcrumbs">
		<div class="container">
			<?php				
				if ( function_exists( 'floris_breadcrumb' ) ){
					floris_breadcrumb( '<div class="breadcrumbs custom-font theme-clearfix">', '</div>' );
				} 
			?>
			<div class="listing-title">			
				<h1><span><?php floris_title(); ?></span></h1>				
			</div>
		</div>
	</div>	
	<?php } ?>
	
	<div class="container">
		<div class="row">
		<?php 
			if ( is_active_sidebar( $floris_sidebar ) && $floris_sidebar_template != 'right' && $floris_sidebar_template !='full' ):
			$floris_left_span_class = 'col-lg-'.sw_options('sidebar_left_expand');
			$floris_left_span_class .= ' col-md-'.sw_options('sidebar_left_expand_md');
			$floris_left_span_class .= ' col-sm-'.sw_options('sidebar_left_expand_sm');
		?>
			<aside id="left" class="sidebar <?php echo esc_attr( $floris_left_span_class ); ?>">
				<?php dynamic_sidebar( $floris_sidebar ); ?>
			</aside>
		<?php endif; ?>
		
			<div id="contents" role="main" class="main-page <?php floris_content_page(); ?>">
				<?php
				get_template_part('templates/content', 'page')
				?>
			</div>
			<?php 
			if ( is_active_sidebar( $floris_sidebar ) && $floris_sidebar_template != 'left' && $floris_sidebar_template !='full' ):
				$floris_left_span_class = 'col-lg-'.sw_options('sidebar_left_expand');
				$floris_left_span_class .= ' col-md-'.sw_options('sidebar_left_expand_md');
				$floris_left_span_class .= ' col-sm-'.sw_options('sidebar_left_expand_sm');
			?>
				<aside id="right" class="sidebar <?php echo esc_attr($floris_left_span_class); ?>">
					<?php dynamic_sidebar( $floris_sidebar ); ?>
				</aside>
			<?php endif; ?>
		</div>		
	</div>
<?php get_footer(); ?>


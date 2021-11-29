<?php get_template_part('header'); ?>
<?php 
	$floris_sidebar_template =( sw_options('sidebar_blog') ) ? sw_options('sidebar_blog') : 'right';
	$floris_blog_styles = ( sw_options('blog_layout') ) ? sw_options('blog_layout') : 'list';
?>

<div class="floris_breadcrumbs">
	<div class="container">
		<?php
			if (!is_front_page() ) {
				if (function_exists('floris_breadcrumb')){
					floris_breadcrumb('<div class="breadcrumbs custom-font theme-clearfix">', '</div>');
				} 
			} 
		?>
	</div>
</div>

<div class="container">
	<div class="row sidebar-row">
		<!-- Left Sidebar -->
		<?php if ( is_active_sidebar('left-blog') && $floris_sidebar_template == 'left' ):
			$floris_left_span_class = 'col-lg-'.sw_options('sidebar_left_expand');
			$floris_left_span_class .= ' col-md-'.sw_options('sidebar_left_expand_md');
			$floris_left_span_class .= ' col-sm-'.sw_options('sidebar_left_expand_sm');
		?>
		<aside id="left" class="sidebar <?php echo esc_attr($floris_left_span_class); ?>">
			<?php dynamic_sidebar('left-blog'); ?>
		</aside>

		<?php endif; ?>
		
		<div class="category-contents <?php floris_content_blog(); ?>">
			<div class="listing-title">			
				<h1><span><?php floris_title(); ?></span></h1>				
			</div>
			<!-- No Result -->
			<?php if (!have_posts()) : ?>
			<?php get_template_part('templates/no-results'); ?>
			<?php endif; ?>			
			
			<?php 
				$floris_blogclass = 'blog-content blog-content-'. $floris_blog_styles;
				if( $floris_blog_styles == 'grid' ){
					$floris_blogclass .= ' row';
				}
			?>
			<div class="<?php echo esc_attr( $floris_blogclass ); ?>">
			<?php 			
				while( have_posts() ) : the_post();
					get_template_part( 'templates/content', $floris_blog_styles );
				endwhile;
			?>
			<?php get_template_part('templates/pagination'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- Right Sidebar -->
		<?php if ( is_active_sidebar('right-blog') && $floris_sidebar_template =='right' ):
			$floris_right_span_class = ( sw_options('sidebar_right_expand') ) ? 'col-lg-'.sw_options('sidebar_right_expand') : 'col-lg-3';
			$floris_right_span_class .= ( sw_options('sidebar_right_expand_md') ) ? ' col-md-'.sw_options('sidebar_right_expand_md') : ' col-md-3';
			$floris_right_span_class .= ( sw_options('sidebar_right_expand_sm') ) ? ' col-sm-'.sw_options('sidebar_right_expand_sm') : ' col-sm-3';
		?>
		<aside id="right" class="sidebar <?php echo esc_attr($floris_right_span_class); ?>">
			<?php dynamic_sidebar('right-blog'); ?>
		</aside>
		<?php endif; ?>
	</div>
</div>
<?php get_template_part('footer'); ?>

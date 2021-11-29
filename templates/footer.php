<?php 	
$floris_page_footer   	 = ( get_post_meta( get_the_ID(), 'page_footer_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_footer_style', true ) : sw_options( 'footer_style' );
$floris_copyright_text 	 = sw_options( 'footer_copyright' );
$floris_copyright_footer = get_post_meta( get_the_ID(), 'copyright_footer_style', true );
$floris_copyright_footer  = ( get_post_meta( get_the_ID(), 'copyright_footer_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'copyright_footer_style', true ) : sw_options('copyright_style');
?>

<footer id="footer" class="footer default theme-clearfix">
	<!-- Content footer -->
	<div class="container">
		<?php 
			if( $floris_page_footer != '' ) :
				echo sw_get_the_content_by_id( $floris_page_footer ); 
			endif;
		?>
	</div>
	<div class="footer-copyright <?php echo esc_attr( $floris_copyright_footer ); ?>">
		<div class="container">
			<!-- Copyright text -->
			<div class="copyright-text">
				<?php if( $floris_copyright_text == '' ) : ?>
					<p>&copy;<?php echo date_i18n('Y') .' '. esc_html__('WordPress Theme SW Floris. All Rights Reserved.','floris'); ?></p>
				<?php else : ?>
					<?php echo wp_kses( $floris_copyright_text, array( 'a' => array( 'href' => array(), 'title' => array(), 'class' => array() ), 'p' => array()  ) ) ; ?>
				<?php endif; ?>
			</div>
			<?php if (is_active_sidebar('footer-copyright')){ ?>
			<div class="sidebar-copyright">
				<?php dynamic_sidebar('footer-copyright'); ?>
			</div>
		<?php } ?>
		</div>
	</div>
</footer>
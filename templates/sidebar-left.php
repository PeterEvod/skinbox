<?php if ( is_active_sidebar('left') ):
	$floris_left_span_class = 'col-lg-'.sw_options('sidebar_left_expand');
	$floris_left_span_class .= ' col-md-'.sw_options('sidebar_left_expand_md');
	$floris_left_span_class .= ' col-sm-'.sw_options('sidebar_left_expand_sm');
?>
<aside id="left" class="sidebar <?php echo esc_attr($floris_left_span_class); ?>">
	<?php dynamic_sidebar('left'); ?>
</aside>
<?php endif; ?>
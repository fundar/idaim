
<?php
	$footer_sidebars = array('footer-area-1','footer-area-2','footer-area-3');
	$any_widget_area_active = is_active_sidebar( $footer_sidebars[0] ) || is_active_sidebar( $footer_sidebars[1] ) || is_active_sidebar( $footer_sidebars[2] );
?>
		
		</div> <!-- end .container -->
	</div> <!-- end #main-area -->

	<?php if ( $any_widget_area_active ) { ?>
		
	<?php } ?>
		<div class="container">
			
	<footer id="main-footer">
			<?php	if ( function_exists( 'get_smooth_slider' ) ) {
				     	get_smooth_slider(); } ?>
			<div id="footer-widgets" class="clearfix">
				<?php
					if ( $any_widget_area_active ) {
						foreach ( $footer_sidebars as $key => $footer_sidebar ){
							if ( is_active_sidebar( $footer_sidebar ) ) {
								echo '<div class="footer-widget' . (  2 == $key ? ' last' : '' ) . '">';
								dynamic_sidebar( $footer_sidebar );
								echo '</div> <!-- end .footer-widget -->';
							}
						}
					}
				?>
			</div> <!-- end #footer-widgets -->	
		</div> <!-- end .container -->
		
		<?php if ( 'on' == et_get_option( 'lucid_728_enable', 'false' ) ){ ?>

		<?php } ?>		
	</footer> <!-- end #main-footer -->	
	<?php wp_footer(); ?>
</body>
</html>
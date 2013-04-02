
<?php
	$footer_sidebars = array('footer-area-1','footer-area-2','footer-area-3');
	$any_widget_area_active = is_active_sidebar( $footer_sidebars[0] ) || is_active_sidebar( $footer_sidebars[1] ) || is_active_sidebar( $footer_sidebars[2] );
?>
		
		</div> <!-- end .container -->
	</div> <!-- end #main-area -->

	<?php if ( $any_widget_area_active ) { ?>
		
	<?php } ?>
		<div id="footer">
			
			<div id="footer-content">
				
				<div id="footer-info">
					<a class="logos-footer fundar-logo" href="http://fundar.org.mx" title="Fundar, Centro de Análisis e Investigación">Fundar, Centro de An&aacute;lisis e Investigaci&oacute;n</a>
					<a class="logos-footer article19-logo" href="http://www.article19.org" title="Article 19">Article 19</a>
					<ul>
						<li>
							<a href="" title="Inicio">Inicio</a>
						</li>
						<li>
							<a href="" title="Quiénes Somos">Qui&eacute;nes Somos</a>
						</li>
						<li>
							<a href="" title="Acerca de">Acerca de</a>
						</li>
						<li>
							<a href="" title="Blog">Blog</a>
						</li>
					</ul>
				</div>
			</div>
			
			<p>Copyright ARTICLE 19 y FUNDAR, Centro de An&aacute;lisis e Investigaci&oacute;n. Todos los Derechos Reservados</p>
		 </div>
		
	

	<?php wp_footer(); ?>
</body>
</html>
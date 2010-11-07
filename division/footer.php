
		<?php if(is_active_sidebar( 'footer-widget-area-1' )  || is_active_sidebar( 'footer-widget-area-2' ) || is_active_sidebar( 'footer-widget-area-3' )  || is_active_sidebar( 'footer-widget-area-4' ) ) { ?>
		<div id="footbar">	
		<div class="inner">
			<div class="fwidget-area box" id="fwidget-area-1">
				<?php if ( is_active_sidebar( 'footer-widget-area-1' ) ) :  dynamic_sidebar( 'footer-widget-area-1'); endif; ?>
			</div>
	
			<div class="fwidget-area box" id="fwidget-area-2">
				<?php if ( is_active_sidebar( 'footer-widget-area-2' ) ) :  dynamic_sidebar( 'footer-widget-area-2'); endif; ?>
			</div>
			
			<div class="fwidget-area box" id="fwidget-area-3">
				<?php if ( is_active_sidebar( 'footer-widget-area-3' ) ) :  dynamic_sidebar( 'footer-widget-area-3'); endif; ?>
			</div>
		
			<div class="fwidget-area box last" id="fwidget-area-4">
				<?php if ( is_active_sidebar( 'footer-widget-area-4' ) ) :  dynamic_sidebar( 'footer-widget-area-4'); endif; ?>
			</div>
		</div>
		</div><!--end #footbar -->
		<?php } ?>

		<div id="footer">
		<div id="footer-inner">	
			<?php 
			$pagesNav = '';
			if (function_exists('wp_nav_menu')) {
				$pagesNav = wp_nav_menu( array( 'theme_location' => 'footer-pages', 'menu_id' => 'footer-pages', 'echo' => false, 'fallback_cb' => '' ) );};
			if ($pagesNav == '') { ?>
				<ul id="footer-pages"><?php wp_list_pages('title_li=&depth=1'); ?></ul>
			<?php }
				else echo($pagesNav); 
			?>
		
			<p id="footer-copyright">&copy; <?php echo mysql2date('Y',current_time('timestamp')); ?> <a href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <?php _e('All rights reserved', 'themejunkie'); ?>.
				<?php _e('Powered by','themejunkie'); ?> <a href="http://www.racktheme.com"><?php _e('WordPress', 'themejunkie'); ?></a> <?php _e('and', 'themejunkie'); ?> <a href="http://www.racktheme.com"><?php _e('Theme Junkie', 'themejunkie'); ?></a>.
			</p>
		</div>
		</div><!--end #footer -->
  
</div><!--end #wrapper -->

<!--begin of footer code-->	
<?php if(get_theme_mod('body_code_status') == "Yes") echo stripslashes(get_theme_mod('body_code')); ?>
<!--end of footer code-->

<?php wp_footer(); ?>

</body>
</html>
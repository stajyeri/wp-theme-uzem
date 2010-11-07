<div id="sidebar">
	<?php 
		if(is_page()) {
			global $post;
			if($post->ID == get_theme_mod('folio_page')) {
				if ( is_active_sidebar( 'folio-sidebar' ) ) 
					dynamic_sidebar( 'folio-sidebar'); 
				else
					echo '<p class="tips">Drag Widgets to this widget(Portfolio Sidebar) in Admin -> Appearance -> Widgets</p>';
			} elseif($post->ID == get_theme_mod('blog_page')) { 
				if ( is_active_sidebar( 'blog-sidebar' ) ) 
					dynamic_sidebar( 'blog-sidebar'); 
				else
					echo '<p class="tips">Drag Widgets to this widget area(Blog Sidebar) in Admin -> Appearance -> Widgets</p>';
			} else {
				if ( is_active_sidebar( 'page-sidebar' ) )  
					dynamic_sidebar( 'page-sidebar'); 
				else
					echo '<p class="tips">Drag Widgets to this widget area(Page Sidebar) in Admin -> Appearance -> Widgets</p>';
			}	
		} elseif(is_single() && tj_in_folio_cat() ) {
			if ( is_active_sidebar( 'folio-sidebar' ) ) 
				dynamic_sidebar( 'folio-sidebar'); 
			else
				echo '<p class="tips">Drag Widgets to this widget area(Portfolio Sidebar) in Admin -> Appearance -> Widgets</p>';
		} elseif(is_category() && tj_is_folio_cat()) {
			if ( is_active_sidebar( 'folio-sidebar' ) ) 
				dynamic_sidebar( 'folio-sidebar'); 
			else
				echo '<p class="tips">Drag Widgets to this widget area(Portfolio Sidebar) in Admin -> Appearance -> Widgets</p>';
		} else {
			if ( is_active_sidebar( 'blog-sidebar' ) ) 
				dynamic_sidebar( 'blog-sidebar'); 
			else
				echo '<p class="tips">Drag Widgets to this widget area(Blog Sidebar) in Admin -> Appearance -> Widgets</p>';
		}
	?>
</div><!-- end #sidebar -->

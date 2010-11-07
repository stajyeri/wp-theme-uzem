<?php get_header(); ?>

<div id="container">
<div class="inner">
	<div class="entry entry-404">
		<p class="intro"><?php _e( 'Apologies, but the page you requested could not be found. Perhaps you are here because: ', 'themejunkie' ); ?></p>
		
		<ul>
			<li><?php _e( 'The page has moved', 'themejunkie' ); ?></li>
			<li><?php _e( 'The page no longer exists', 'themejunkie' ); ?></li>
			<li><?php _e( 'You were looking for your puppy and got lost', 'themejunkie' ); ?></li>
			<li><?php _e( 'You like 404 pages', 'themejunkie' ); ?></li>
		</ul>
		
		<p>
		<?php 
			if(version_compare(get_bloginfo('version'), '2.9') >= 0) 
				printf(__('Perhaps searching will help or <a href="%1$s">return to homepage</a> or Check out some of our more popular posts:','themejunkie'),get_bloginfo('url'),$string);
			else 
				printf(__('Perhaps searching will help or <a href="%1$s">return to homepage</a> or Check out some of our more recent posts:','themejunkie'),get_bloginfo('url'),$string);
		?>
		</p>
		
		<?php 
			query_posts('showposts=10&orderby=comment_count');
			echo '<ul class="circle-list">';
			while(have_posts()) {
				the_post();
				echo '<li><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></li>';
			}
			echo '</ul>';
		?>
	</div>
</div><!-- end #container .inner -->
</div><!-- end #container -->

<?php get_footer(); ?>
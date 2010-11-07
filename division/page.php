<?php 
	if(get_theme_mod('blog_page') && is_page(get_theme_mod('blog_page'))) {
		include(TEMPLATEPATH. '/blog.php');
	} elseif(get_theme_mod('folio_page') && is_page(get_theme_mod('folio_page'))) {
		include(TEMPLATEPATH. '/portfolio.php');
	} elseif(get_theme_mod('contact_page') && is_page(get_theme_mod('contact_page'))) {
		include(TEMPLATEPATH. '/contact.php');
} else { ?>

<?php get_header(); ?>

	<div id="container" class="page-container">
	<div class="inner">
	
	<div id="content">
		
		<?php the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
			</div> <!--end .entry-->
			
		</div> <!--end #post-->
	
	</div><!--end #content-->
	
	<?php get_sidebar(); ?>

	</div><!--end #container .inner -->	
	</div><!--end #container -->
	
<?php get_footer(); ?>
<?php } ?>

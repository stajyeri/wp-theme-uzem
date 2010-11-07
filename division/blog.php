<?php get_header(); ?>

<div id="container">
<div class="inner">
	<div id="content">
		<?php 
			if(is_page(get_theme_mod('blog_page'))) {
				$paged = get_query_var('paged') ? get_query_var('paged'):1;
				$folio_cat_ids = get_theme_mod('folio_cats');
				$folio_cat_arr = explode(',',$folio_cat_ids);
				query_posts(array(
					'paged' => $paged,
					'category__not_in' => $folio_cat_arr
				));
			}
			
			if (have_posts()) {
				include(TEMPLATEPATH. '/includes/blog-loop.php');
			} else { 
				include(TEMPLATEPATH. '/includes/not-found.php'); 
			}
		?>
	</div><!-- end #content -->

	<?php get_sidebar(); ?>
</div><!--end #container .inner -->
</div><!--end #container -->

<?php get_footer(); ?>
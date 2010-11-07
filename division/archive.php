<?php get_header(); ?>

<div id="container">
<div class="inner">
	<div id="content">
		<?php 
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
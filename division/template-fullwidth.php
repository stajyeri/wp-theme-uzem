<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>
	<div id="container" class="page-container">	
<div class="inner">
		
		<?php the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
			</div> 
			
		</div> <!--end .entry-->
	

	</div><!--end #container .inner -->	
</div><!--end #container -->

<?php get_footer(); ?>
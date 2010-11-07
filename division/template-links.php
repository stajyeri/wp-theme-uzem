<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>
<div id="container" class="page-container">	
<div class="inner">
	<div id="content">
	
		<?php the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="entry">
				<ul>
					<?php wp_list_bookmarks('title_li=&category_before=&category_after=&title_before=<h3>&title_after=</h3>'); ?>
				</ul>
			</div> <!--end .entry-->
				
		</div> <!--end #post-->
	
	</div> <!--end #content-->

<?php get_sidebar(); ?>
</div><!--end #container .inner -->	
</div><!--end #container -->

<?php get_footer(); ?>
<?php get_header(); ?>

<div id="container">
<div class="inner">
	<div id="content">
		<p class="intro"><?php printf( __( 'Search Results for: %s', 'themejunkie' ), '<strong>' . get_search_query() . '</strong>' ); ?></p>
		<?php 
			if (have_posts()) {
				while (have_posts()) : the_post();
				global $post; ?>
				
				<div id="post-<?php the_ID(); ?>" class="post">
							
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
					
					
					<div class="entry-meta">
						<span class="meta-date"><?php the_time(get_option('date_format')); ?></span>
						by <span class="meta-author"><?php the_author(); ?></span> 
						in <span class="meta-cat"><?php the_category(', ')?></span>
						with <span class="meta-comments"><?php comments_popup_link('0 Comments','1 Comments','% Comments'); ?></span>
					</div>
					<div class="entry-thumb">
						<?php tj_thumbnail(580,160);?>
					</div><!-- end .entry-thumb -->
					
					<div class="entry">
						<?php tj_content_limit(380); ?>
					</div>
					
					<p class="readmore"><a class="button button-white" href="<?php the_permalink(); ?>"><span class="button-text">Read more</span><span class="button-right"></span></a></p>
					
				</div><!-- end .post -->
		
		<?php 
				endwhile;
				
				if ( $wp_query->max_num_pages > 1 ) tj_pagenavi();
				wp_reset_query();
			} else { 
				echo '<p>'. _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'themejunkie' ).'</p>';
			}
		?>
	</div><!-- end #content -->

	<?php get_sidebar(); ?>
</div><!--end #container .inner -->
</div><!--end #container -->

<?php get_footer(); ?>
<?php while (have_posts()) : the_post(); global $post; ?>

	<div id="post-<?php the_ID(); ?>" class="post clear">
							
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
		<div class="entry-meta">
			<span class="meta-date"><?php the_time(get_option('date_format')); ?></span>
			<?php printf(__('by %1$s in %2$s with ','themejunkie'),'<span class="meta-author">'.get_the_author().'</span>','<span class="meta-cat">'.get_the_category_list(', ').'</span>'); ?><span class="meta-comments"><?php comments_popup_link( __( '0 comment', 'themejunkie' ), __( '1 Comment', 'themejunkie' ), __( '% Comments', 'themejunkie' ) ); ?></span> <?php edit_post_link( __( 'Edit', 'themejunkie' ), '(<span class="meta-edit">', '</span>)' ); ?>
		</div>
					
		<?php
			$thumb = get_thumbnail($post->ID, 'blog_thumb','blog_thumb');
			$width = get_theme_mod('blog_thumb_width');
			$height = get_theme_mod('blog_thumb_height');
			$auto = get_theme_mod('blog_thumb_auto');
							
			if($thumb) {
				echo '<div class="entry-thumb">';
								
				if($auto == 'Yes')
					$url = get_bloginfo('template_url').'/timthumb.php?src='.$thumb.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';
				else
					$url = $thumb;
									
				echo '<a href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'"><img width="'.$width.'" height="'.$height.'" src="'.$url.'" alt="'.get_the_title().'" /></a>';
				echo '</div><!-- end .entry-thumb -->	';
			}
		?>
						
		<div class="entry">
			<?php tj_content_limit(get_theme_mod('blog_excerpt_length')); ?>
		</div>
					
		<p class="readmore"><a class="button button-white" href="<?php the_permalink(); ?>"><span class="button-text">Read more</span><span class="button-right"></span></a></p>
					
	</div><!-- end .post -->
				
<?php endwhile; if ( $wp_query->max_num_pages > 1 ) tj_pagenavi(); wp_reset_query(); ?>
<?php get_header(); ?>

<div id="container">
<div class="inner">
	<div class="folio">
	<?php 
		$paged = get_query_var('paged') ? get_query_var('paged'):1;
		
		if(is_page(get_theme_mod('folio_page'))) {
			$folio_cat_ids = get_theme_mod('folio_cats');
			$folio_cat_arr = explode(',',$folio_cat_ids);
			query_posts(array(
				'posts_per_page' => get_theme_mod('folio_num'),
				'paged' => $paged,
				'category__in' => $folio_cat_arr
			));
		} else {
			$cat = get_query_var('cat');
			query_posts('posts_per_page='.get_theme_mod('folio_num').'&paged='.$paged.'&cat='.$cat);
		}
		
		if (have_posts()) {
			echo '<div class="gridrow clear">';
			
			while (have_posts()) : the_post();
				global $post; 
				$q = $wp_query->current_post;  
				$maxq = count($wp_query->posts);
				if(is_int(($q+1)/4)) $postclass = 'fpost last'; else $postclass = 'fpost'; ?>
				
				<div class="<?php echo $postclass; ?>">
					<div class="thumb">
						<?php
							$thumb = get_thumbnail($post->ID, 'folio_thumb','folio_thumb');
							$width = '208';
							$height = get_theme_mod('folio_thumb_height');
							$auto = get_theme_mod('folio_thumb_auto');
							$lightbox = get_theme_mod('folio_thumb_lightbox');
							
							if($thumb) {
								if($auto == 'Yes')
									$thumb_url = get_bloginfo('template_url').'/timthumb.php?src='.$thumb.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1';
								else
									$thumb_url = $thumb;
									
								if($lightbox == 'Yes') {
									$link_url = get_thumbnail($post->ID, 'full','full_image');
									$hover_image = '<span class="hover-image" style="height:'.$height.'px;"></span>';
									$rel = ' rel="lightbox[portfolio]"';
								} else {
									$link_url = get_permalink();
									$rel = '';
								}
								
								echo '<a title="'.the_title_attribute( 'echo=0' ).'" href="'.$link_url.'"'.$rel.'><img width="'.$width.'" height="'.$height.'" src="'.$thumb_url.'" alt="'.get_the_title().'" />'.$hover_image.'</a>';
							} else {
								echo '<a title="'.the_title_attribute( 'echo=0' ).'" class="noimage" href="'.get_permalink().'" style="height:'.$height.'px;"></a>';
							}
						 ?>
					</div>
					
					<?php if(get_theme_mod('folio_post_content') == 'Yes') { ?>
					<div class="wrap">
						<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
						<p class="excerpt">
							<?php tj_content_limit(140); ?>
						</p>
					</div>
					
					<div class="meta">
						<span class="meta-date"><?php the_time('M j, Y'); ?></span>
						<span class="meta-cat"><?php $category = get_the_category(); if ($category) { echo '- <a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s",'themejunkie' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> '; } ?></span>
					</div>
					<?php } ?>
				</div>
			
				<?php if($q < $maxq-1 && is_int(($q+1)/4)) echo '</div><div class="gridrow clear">';
			endwhile;
			
			echo '</div> <!--end .gridrow-->';
				
			if ( $wp_query->max_num_pages > 1 ) tj_pagenavi();
		} else { 
			include(TEMPLATEPATH. '/includes/not-found.php'); 
		}	
	?>
	</div><!-- end #folio -->
</div><!-- end #container .inner -->
</div><!-- end #container -->

<?php get_footer(); ?>
<div id="home-carousel">
	<div class="inner">
		
		<a href="#" class="next">Next</a>
		<a href="#" class="prev">Prev</a>
		
		<h3 class="section-title"><?php if(get_theme_mod('folio_page')) echo '<a href="'.get_permalink(get_theme_mod('folio_page')).'">'.get_theme_mod('home_folio_title').'</a>'; else echo get_theme_mod('home_folio_title') ?></h3>
		
		<div class="carousel">
			<div class="slide">
			<?php
				$folio_cat_ids = get_theme_mod('folio_cats');
				$folio_cat_arr = explode(',',$folio_cat_ids);
				query_posts(array(
					'showposts' => get_theme_mod('home_folio_num'),
					'category__in' => $folio_cat_arr
				));
				while(have_posts()) : the_post(); 
				global $wp_query;
				$q = $wp_query->current_post; 
				$maxq = count($wp_query->posts);
				?>
					<div class="fpost<?php if(($q+1)%4 == 0) echo ' last'; ?>">
						<div class="thumb">
						<?php
							$thumb = get_thumbnail($post->ID, 'folio_thumb','folio_thumb');
							$width = '208';
							$height = get_theme_mod('folio_thumb_height');
							$auto = get_theme_mod('folio_thumb_auto');
							$lightbox = get_theme_mod('home_folio_lightbox');
							
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
					</div>
				<?php 
				
				if($q < $maxq-1 && ($q+1)%4 == 0) echo '</div><!-- end .slide -->'."\n".'<div class="slide">';
			
				endwhile;
				wp_reset_query();
			?>
			</div><!-- end .slide -->
		</div><!-- end .home-carousel .carousel -->

</div><!-- end .home-carousel .inner -->
</div><!-- end .home-carousel -->

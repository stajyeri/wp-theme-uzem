<?php get_header(); ?>
	
	<?php if(get_theme_mod('home_services_status') == 'Yes') { ?>
	<div id="home-services">
	<div class="inner">	
		<?php for($i = 1;$i < 5;$i++) { ?>
			<div class="item<?php if($i == 4) echo ' last'; ?>">
				<div class="item-inner">
				<div class="item-content">
				<a class="item-icon" href="<?php echo get_theme_mod('fs_url_'.$i); ?>">
				<img src="<?php echo get_theme_mod('fs_icon_'.$i); ?>" alt="<?php echo get_theme_mod('fs_title_'.$i); ?>" />
				</a>
				<h3><a href="<?php echo get_theme_mod('fs_url_'.$i); ?>"><?php echo get_theme_mod('fs_title_'.$i); ?></a></h3>
				<?php echo wpautop(stripslashes(get_theme_mod('fs_desc_'.$i))); ?>
				<p class="readmore">&raquo; <a href="<?php echo get_theme_mod('fs_url_'.$i); ?>">Read More</a></p>
				</div>
				</div>
			</div>
		<?php } ?>
	</div><!--end #home-service .inner -->	
	</div><!--end #home-service -->
	<?php } ?>
	
	<div id="home-container">
	<div class="inner">	
		<div id="home-content">
			<div id="home-blog">
			<h3 class="section-title"><?php if(get_theme_mod('blog_page')) echo '<a href="'.get_permalink(get_theme_mod('blog_page')).'">'.get_theme_mod('home_blog_title').'</a>'; else echo get_theme_mod('home_blog_title'); ?></h3>
				<?php 
					$folio_cat_ids = get_theme_mod('folio_cats');
					$folio_cat_arr = explode(',',$folio_cat_ids);
					query_posts(array(
						'showposts' => get_theme_mod('home_news_num'),
						'category__not_in' => $folio_cat_arr
					));
					if(have_posts()):
					while(have_posts()): the_post(); 
					$q = $wp_query->current_post; 
					?>
					
					<?php if($q < 1) { ?>
						<div class="item first">
							<h4 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							
							<p class="meta">
								by <span class="author"><?php the_author(); ?></span>
								on <span class="date"><?php the_time(get_option('date_format')); ?></span>
								with <span class="comments"> <?php comments_popup_link('0 Comments','1 Comments','% Comments'); ?></span>
							</p>
							
							<p class="excerpt clear">
								<?php tj_content_limit(400); ?>
							</p>
						</div><!-- end .item -->
					<?php } else { ?>
						<div class="item">
							<h4 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							
							<p class="meta">
								by <span class="author"><?php the_author(); ?></span>
								on <span class="date"><?php the_time(get_option('date_format')); ?></span>
								with <span class="comments"> <?php comments_popup_link('0 Comments','1 Comments','% Comments'); ?></span>
							</p>	
						</div><!-- end .item -->
					<?php } ?>
					<?php endwhile;
					endif;
				?>
			</div><!-- end #home-blog -->
		</div><!-- end #home-content -->
		
		<div id="home-sidebar">
			<div id="home-quote">
				<h3 class="section-title"><?php if(get_theme_mod('home_quote_page_url')) echo '<a href="'.get_theme_mod('home_quote_page_url').'">'.get_theme_mod('home_quote_title').'</a>'; else echo get_theme_mod('home_quote_title') ?></h3>
				
				<a href="#" class="prev">Prev</a>
				<a href="#" class="next">Next</a>
				
				<div id="home-quote-prefix">
				<div id="home-quote-subfix">
				<div id="home-quote-slider">
					<?php echo do_shortcode(stripslashes(get_theme_mod('home_quote_content'))); ?>
				</div>
				</div>
				</div>
			</div><!-- end #home-quote -->
			
			<div id="home-twitter">
				<?php if ( is_active_sidebar( 'home-twitter' ) ) dynamic_sidebar( 'home-twitter'); else echo '<h3 class="section-title">Widget</h3><p class="tips">Drag a Twitter Widget to here in Admin -> Appearance -> Widgets</p>'; ?>
			</div><!-- end #home-twitter -->
			
			<div id="home-clients">
				<h3 class="section-title"><?php if(get_theme_mod('home_clients_url')) echo '<a href="'.get_theme_mod('home_clients_url').'">'.get_theme_mod('home_clients_title').'</a>'; else echo get_theme_mod('home_clients_title'); ?></h3>
				<ul>
					<?php echo stripslashes(get_theme_mod('home_clients_code')); ?>
				</ul>
			</div><!-- end #home-clients -->
		
		</div><!-- end #home-sidebar-->
	
	</div><!--end #home-container .inner -->	
	</div><!--end #home-container -->
	
	<?php if(get_theme_mod('home_folio_carousel_status') == 'Yes') include(TEMPLATEPATH. '/includes/home-portfolio-carousel.php'); ?>
	
<?php get_footer(); ?>
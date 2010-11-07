<?php get_header(); ?>

<div id="container">	
<div class="inner">
		<?php the_post(); ?>
		
		<div id="content">
		<div class="contact-form">
			<h3 class="contact-section-title"><?php echo get_theme_mod('contact_form_title'); ?></h3>
			
			<div class="contact-section-inner">
			
			<?php if(get_theme_mod('before_contact_form')) { ?>
			<div class="contact-form-before">
				<?php echo stripslashes(wpautop(get_theme_mod('before_contact_form'))); ?>
			</div><!-- end .contact-form-before -->
			<?php } ?>
					
			<?php echo tj_contact_form(); ?>
	
			</div>
		
		</div><!-- end .contact-form -->
		</div>
		
		<div id="sidebar">
		<div class="contact-info">
			<h3 class="contact-section-title"><?php echo get_theme_mod('contact_info_title'); ?></h3>
				
			<div class="contact-section-inner">
					<?php
						$address = get_theme_mod('address');
						$phone = get_theme_mod('phone');
						$fax = get_theme_mod('fax');
						$email = get_theme_mod('email');
					?>
					
					<dl class="contact-list">
						<?php if($address) { ?><dt>Address:</dt><dd><?php echo wpautop($address); ?></dd><?php } ?>
						<?php if($phone) { ?><dt>Phone:</dt><dd><?php echo $phone; ?></dd><?php } ?>
						<?php if($fax) { ?><dt>Fax:</dt><dd><?php echo $fax; ?></dd><?php } ?>
						<?php if($email) { ?><dt>Email:</dt><dd><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></dd><?php } ?>
					</dl>
					
					<?php if(get_theme_mod('after_contact_info')) { ?>
						<div class="contact-info-after">
							<?php echo stripslashes(wpautop(get_theme_mod('after_contact_info'))); ?>
						</div><!-- end .contact-map -->
					<?php } ?>
		
			</div><!-- end .contact-section-inner -->
		</div><!-- end .contact-info -->
				
		<div class="contact-social">
			<h3 class="contact-section-title"><?php echo get_theme_mod('social_links_title'); ?></h3>
			<div class="contact-section-inner">
				<?php 
						$twitter_url = get_theme_mod('twitter_url');
						$facebook_url = get_theme_mod('facebook_url');
						$linkedin_url = get_theme_mod('linkedin_url');
						$flickr_url = get_theme_mod('flickr_url');
						$rss_url = get_theme_mod('rss_url');
					?>
					
					<ul class="social-links">
						<?php if($twitter_url) { ?><li class="link-twitter"><a href="<?php echo $twitter_url; ?>"><?php _e('Follow us on Twitter','themejunkie'); ?></a></li><?php } ?>
						<?php if($facebook_url) { ?><li class="link-facebook"><a href="<?php echo $facebook_url; ?>"><?php _e('Become our fan on Facebook','themejunkie'); ?></a></li><?php } ?>
						<?php if($linkedin_url) { ?><li class="link-linkedin"><a href="<?php echo $linkedin_url; ?>"><?php _e('More contact details on Linkedin','themejunkie'); ?></a></li><?php } ?>
						<?php if($flickr_url) { ?><li class="link-flickr"><a href="<?php echo $flickr_url; ?>"><?php _e('Browser Our photos on Flickr','themejunkie'); ?></a></li><?php } ?>
						<?php if($rss_url) { ?><li class="link-rss"><a href="<?php echo $rss_url; ?>"><?php _e('Subscribe to RSS Feed','themejunkie'); ?></a></li><?php } ?>
					</ul>
			</div><!-- end .contact-section-inner -->
		</div><!-- end .contact-social -->
		</div>
	
</div><!--end #container .inner -->	
</div><!--end #container -->

<?php get_footer(); ?>
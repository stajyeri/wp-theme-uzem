<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico" />
	<?php wp_head(); ?>
	
	<!--begin of header code-->	
		<?php if(get_theme_mod('head_code_status') == "Yes") echo stripslashes(get_theme_mod('head_code')); ?>
	<!--end of header code-->
	
	<!--[if lt IE 8]>
		<style type="text/css">
			#topnav{text-align:right;width:640px;}
			#topnav ul{display:inline;}
			#topnav ul li{display:inline;float:none;zoom:1;}
			#topnav ul ul{text-align:left;top:32px;}
			#topnav ul ul li{display:list-item;}
		</style>
	<![endif]-->
	<!--[if lt IE 7]>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/pngfix.js"></script>
		<script type="text/javascript">
			DD_belatedPNG.fix('#image-logo a, .slide-image,.button-text,.button-right,.item-icon img,.section-title, .slide-image, .home-slider .next, .home-slider .pager a, .home-slider .prev, #home-quote .next, #home-quote .prev,.slide-image-wrap');
			$(".entry").ImageAutoSize(580);
		</script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	
	<div id="header">
	<div class="inner">
		<?php 
			if(get_theme_mod('logo') == 'Image Logo') $logo_class = 'image-logo';
			if(get_theme_mod('logo') == 'Text Logo') $logo_class = 'text-logo';
		?>
		
		<?php if ( is_home() || is_front_page() ) echo '<h1'; else echo '<div'; echo ' class="logo" id="'.$logo_class.'">'; ?>
		
		<a <?php if(get_theme_mod('logo') == 'Image Logo' && get_theme_mod('logo_url')) {echo 'style="background:url('.get_theme_mod('logo_url').') no-repeat" ';} 
			?>href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		
		<?php if ( is_home() || is_front_page() ) echo '</h1>'; else echo '</div>'; ?>
		
		<?php get_search_form(); ?>
		<div id="topnav">
			<?php 
			$pagesNav = '';
			if (function_exists('wp_nav_menu')) {
				$pagesNav = wp_nav_menu( array( 'theme_location' => 'header-pages', 'menu_class' => 'topnav', 'menu_id' => 'page-nav', 'echo' => false, 'fallback_cb' => '' ) );};
			if ($pagesNav == '') { ?>
			<ul>
				<li<?php if(is_home() || is_front_page()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>
		<?php }
			else echo($pagesNav); 
		?>
		</div><!-- end #topnav -->
	</div><!-- end #header .inner -->
	</div><!-- end #header -->
	
	<?php if(is_home()) { ?>
		<?php home_slider(); ?>
	<?php } else { ?>
		<div id="teaser">
		<div class="inner">
			<?php teaser_output(); ?>
		</div><!-- end #teaser .inner -->
	</div><!-- end #teaser -->
	<?php } ?>
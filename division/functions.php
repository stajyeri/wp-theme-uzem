<?php
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'themejunkie', TEMPLATEPATH . '/languages' );	

/*---------------------------------------------------------------------------------*/
/* Load functions and Widgets */
/*---------------------------------------------------------------------------------*/
require_once(TEMPLATEPATH . '/functions/meta-box.php');
require_once(TEMPLATEPATH . '/functions/comments.php');
require_once(TEMPLATEPATH . '/functions/contact-form.php');
require_once(TEMPLATEPATH . '/functions/theme-options.php');
require_once(TEMPLATEPATH . '/functions/flickr-widget.php');
require_once(TEMPLATEPATH . '/functions/twitter-widget.php');
require_once(TEMPLATEPATH . '/functions/category-widget.php');

/*---------------------------------------------------------------------------------*/
/* Add Theme Support */
/*---------------------------------------------------------------------------------*/

if (function_exists('create_initial_post_types')) create_initial_post_types(); //fix for wp 3.0
if (function_exists('add_post_type_support')) add_post_type_support( 'page', 'excerpt' );
if(function_exists('add_theme_support')) add_theme_support( 'post-thumbnails' );
add_action( 'init', 'tj_register_my_menu' );
function tj_register_my_menu() {
   register_nav_menus(
      array(
         'header-pages' => __( 'Header Pages', 'themejunkie' ),
		 'footer-pages' => __( 'Footer Pages', 'themejunkie' ),
      )
   );
}
add_custom_background();

// Register Widgets
function tj_widgets_init() {
	
	// Blog Sidebar
	register_sidebar( array (
		'name' => __( 'Home Twitter Widget Area', 'themejunkie' ),
		'id' => 'home-twitter',
		'description' => __( 'This widget area use on Home Page, Drag a Twitter Widget to here.', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="section-title">',
		'after_title' => '</h3>',
	) );
	
	// Blog Sidebar
	register_sidebar( array (
		'name' => __( 'Blog Sidebar', 'themejunkie' ),
		'id' => 'blog-sidebar',
		'description' => __( 'The blog widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Portfolio Sidebar
	register_sidebar( array (
		'name' => __( 'Portfolio Sidebar', 'themejunkie' ),
		'id' => 'folio-sidebar',
		'description' => __( 'The portfolio widget area use on single portfolio post.', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Page Sidebar
	register_sidebar( array (
		'name' => __( 'Page Sidebar', 'themejunkie' ),
		'id' => 'page-sidebar',
		'description' => __( 'The page widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Widget Area 1
	register_sidebar( array (
		'name' => __( 'Footer Widget Area 1', 'themejunkie' ),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The bottom widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="fwidget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="fwidget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Widget Area 2
	register_sidebar( array (
		'name' => __( 'Footer Widget Area 2', 'themejunkie' ),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The bottom widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="fwidget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="fwidget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Widget Area 3
	register_sidebar( array (
		'name' => __( 'Footer Widget Area 3', 'themejunkie' ),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The bottom widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="fwidget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="fwidget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer Widget Area 3
	register_sidebar( array (
		'name' => __( 'Footer Widget Area 4', 'themejunkie' ),
		'id' => 'footer-widget-area-4',
		'description' => __( 'The bottom widget area', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="fwidget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="fwidget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'init', 'tj_widgets_init' );

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size('folio_thumb',208,get_theme_mod('folio_thumb_height'),true);
	add_image_size('blog_thumb',get_theme_mod('blog_thumb_width'),get_theme_mod('blog_thumb_height'),true);
}

/*---------------------------------------------------------------------------------*/
/* Custom Shortcodes */
/*---------------------------------------------------------------------------------*/
add_shortcode('button','tj_button');
add_shortcode('quote', 'tj_quote');

function tj_quote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'name' => '',
		'sitename' => '',
		'siteurl' => '',
		'avatar' => ''
    ), $atts));
	
	$output = '<div class="quote"><div class="quote-inner"><p class="quote-text">';
	
	if($avatar)
		$output .= '<img class="avatar" src="'.$avatar.'" alt="" />';
	
	$output .= do_shortcode($content). '</p><p class="quote-from">';
   
	if($name)
		$output .= '~ <span class="fn">'.$name.'</span>';
	
	if($siteurl && $sitename)
		$output .= ', <a class="su" href="'.$siteurl.'"><span class="sitename">'.$sitename.'</span></a>';
	elseif($sitename)
		$output .= ', <span class="sn">'.$sitename.'</span>';

   $output .= '</p></div></div>';
   
   return $output;
}

function tj_button($atts) {
	extract(shortcode_atts(array(
		'color' => '',
		'url' => '#',
		'value' => 'button'
    ), $atts));
	
	if($color)
		$class = 'button button-'.$color;
	else
		$class = 'button';
	
	$output = '<a href="'.$url.'" class="'.$class.'"><span class="button-text">'.$value.'</span><span class="button-right"></span></a>';
	
	return $output;
}

/*---------------------------------------------------------------------------------*/
/* Custom Conditional Tags */
/*---------------------------------------------------------------------------------*/
function tj_is_folio_cat($cid = false) {
	if($cid) 
		$cat = $cid;
	else
		$cat = get_query_var('cat');
	
	$folio_cat_ids = get_theme_mod('folio_cats');
	$folio_cat_arr = explode(',',$folio_cat_ids);
	
	if(in_array($cat,$folio_cat_arr)) {
		return true;
	} else {
		foreach($folio_cat_arr as $folio_cat) {
			if(cat_is_ancestor_of($folio_cat,$cat))
			return true;
			break;
		}
	}
}

function tj_in_folio_cat($pid = '') {
	global $post;		
	$cats = get_the_category($pid);
	
	foreach($cats as $cat) {
		$folio_cat_ids = get_theme_mod('folio_cats');
		$folio_cat_arr = explode(',',$folio_cat_ids);
					
		if(in_array($cat->cat_ID,$folio_cat_arr)) {
			return true;
			break;
		}
	}
}

// Tests if any of a post's assigned categories are descendants of target categories
function post_is_in_descendant_category( $cats, $_post = null ) {
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
		}
	return false;
}

/*---------------------------------------------------------------------------------*/
/* Add Filter */
/*---------------------------------------------------------------------------------*/
function myFilter($query) {
	$paged = get_query_var('paged') ? get_query_var('paged'):1;
	
	$folio_showposts = get_theme_mod('folio_num');
	$folio_cat_ids = get_theme_mod('folio_cats');
	$folio_cat_arr = explode(',',$folio_cat_ids);
	
    if (is_search()) {
        $query->set('category__not_in',$folio_cat_arr);
    }

	if (is_date()) {
        $query->set('category__not_in',$folio_cat_arr);
    }
	
	if (is_tag()) {
        $query->set('category__not_in',$folio_cat_arr);
    }
	
	if (is_feed()) {
        $query->set('category__not_in',$folio_cat_arr);
    }
	
return $query;
}
add_filter('pre_get_posts','myFilter');


/*---------------------------------------------------------------------------------*/
/* Templat Tags */
/*---------------------------------------------------------------------------------*/

function home_slider() {
	global $shortname;
	$list = get_option($shortname.'SS-ItemLevels');
	$list = $list['SlideShow'];
	$options = get_option($shortname.'SS-ItemValues');
	$sclass = '';
	
	if(get_theme_mod('home_services_status') != 'Yes') 
		$sclass = ' no-services-below';
	if(get_option('division_home_slider_position') == 'left')
		$sclass .= ' home-left-slider';
	else
		$sclass .= ' home-right-slider';
	
	if(get_option('division_home_slider_type') == 'onlyimage')
		$sclass .= ' home-image-slider';
	else
		$sclass .= ' home-full-slider';
	
	echo '<div class="home-slider'.$sclass.'">';
	echo '<div class="inner">';
	
	echo '<div class="slider">';
		
	if (count($list) > 0) {
		if(get_option('division_home_slider_type') == 'onlyimage') {
			foreach ($list as $key => $value) {
				$id = $value['id'];
				$title = $options['ss-'. $id .'-title'];
				$url = $options['ss-'. $id .'-url'];
				$desc = $options['ss-'. $id .'-desc'];
			
				$slide_text =  '<div class="slide-text"><h2>'.$title.'</h2>'.wpautop(do_shortcode(stripslashes($desc))).'</div><!-- end .slide-text -->';
			
				if($key == '0')
					echo $slide_text;
			}
			
			echo '<div class="slide-image-wrap">';
			echo '<div class="slide-image">';
			foreach ($list as $key => $value) {
				$id = $value['id'];
				$title = $options['ss-'. $id .'-title'];
				$image = $options['ss-'. $id .'-image'];
				if(!$image || $image == 'http://')
					$image = get_bloginfo('template_url').'/images/default_slide_image.png';
				$url = $options['ss-'. $id .'-url'];
				$desc = $options['ss-'. $id .'-desc'];
				
				echo '<div class="slide">';
				if($url)
					echo '<a href="'.$url.'"><img src="'. htmlspecialchars_decode(stripslashes($image)) .'" alt="'.$title.'" /></a>';
				else
					echo '<img src="'. htmlspecialchars_decode(stripslashes($image)) .'" alt="'.$title.'" />';
				echo '</div><!-- end .slide -->';
			}
			echo '</div><!-- end .slide-image -->';
			
			if(get_option('division_home_slider_control') == 'Yes')
				echo '<div class="control image-slider-control"><a href="#" class="prev">Prev</a> <span class="pager"></span> <a class="next" href="#">Next</a></div>';
			
			echo '</div><!-- end .slide-image-wrap -->';
			
			
			
		} else {
			foreach ($list as $key => $value) {
			$id = $value['id'];
			$title = $options['ss-'. $id .'-title'];
			$image = $options['ss-'. $id .'-image'];
			if(!$image || $image == 'http://')
				$image = get_bloginfo('template_url').'/images/default_slide_image.png';
			$url = $options['ss-'. $id .'-url'];
			$desc = $options['ss-'. $id .'-desc'];
		
			echo '<div class="slide">';
			
			$slide_text =  '<div class="slide-text"><h2>'.$title.'</h2>'.wpautop(do_shortcode(stripslashes($desc))).'</div><!-- end .slide-text -->';
			
			echo $slide_text;
			
			echo '<div class="slide-image">';
			if($url)
				echo '<a href="'.$url.'"><img src="'. htmlspecialchars_decode(stripslashes($image)) .'" alt="'.$title.'" /></a>';
			else
				echo '<img src="'. htmlspecialchars_decode(stripslashes($image)) .'" alt="'.$title.'" />';
			echo '</div><!-- end .slide-image -->';
			
			echo '</div><!-- end .slide -->';
			}
	
		}
		
	}

	echo '</div><!-- end .slider -->';
	
	if(get_option('division_home_slider_type') != 'onlyimage' && get_option('division_home_slider_control') == 'Yes')
		echo '<div class="control"><a href="#" class="prev">Prev</a> <span class="pager"></span> <a class="next" href="#">Next</a></div>';
		
	echo '</div><!-- end #home-slider .inner-->';
	echo '</div><!-- end #home-slider -->';
} 

function teaser_output() {
	global $post;
				
				$teaser_title = '';
				$teaser_text = '';

				if(is_home()) {
					$teaser_title = __('Home', 'themejunkie');
				} elseif(is_page()) {
					$teaser_title = $post->post_title;
					$teaser_text = get_post_meta($post->ID,'teaser_text',true);
				} elseif(is_single()) {
					if(tj_in_folio_cat()) {
						$teaser_title = get_the_title(get_theme_mod('folio_page'));
						$teaser_text =  get_post_meta(get_theme_mod('folio_page'),'teaser_text',true);	
					} else {
						$teaser_title = get_the_title(get_theme_mod('blog_page'));
						$teaser_text =  get_post_meta(get_theme_mod('blog_page'),'teaser_text',true);	
					}
				} elseif(is_category()) {
					$teaser_title = single_cat_title('',false);
					$teaser_text = category_description();
				} elseif(is_tag()) {
					$teaser_title = single_tag_title('',false);
					$teaser_text = tag_description();
				} elseif(is_search()) {
					$teaser_title = __('Search Results','themejunkie');
				} elseif(is_archive()) {
					$teaser_title = '<h2>Archive</h2>';
						if ( is_day() )  {
							$teaser_text = get_the_date(); 
						} elseif( is_month() ) {
							$teaser_text = get_the_date('F Y'); 
						} elseif( is_year() ) {
							$teaser_text = get_the_date('Y');
						}
				} elseif(is_404()) {
					$teaser_title = __('404 - Not found</h2>','themejunkie');
				}
				if($teaser_title)
					echo '<h2>'.$teaser_title.'</h2>';
				if($teaser_text)
					echo '<div class="teaser-text">'.$teaser_text.'</div>';
}

// Pagenavi
function tj_pagenavi($range = 9) {
	global $paged, $wp_query;
	if ( !$max_page ) { $max_page = $wp_query->max_num_pages;}
	if($max_page > 1){
		echo '<div class="pagenav clear">';
		if(!$paged){$paged = 1;}
		echo '<span>Page '.$paged.' / '.$max_page.'</span>';
		previous_posts_link('&laquo; Previous');
		if($max_page > $range){
			if($paged < $range){
				for($i = 1; $i <= ($range + 1); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";

				}
			} elseif($paged >= ($max_page - ceil(($range/2)))){
				for($i = $max_page - $range; $i <= $max_page; $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";
				}
			} elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
				for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) echo " class='current'";
					echo ">$i</a>";
				}
			}
		} else {
			for($i = 1; $i <= $max_page; $i++){
				echo "<a href='" . get_pagenum_link($i) ."'";
				if($i==$paged) echo " class='current'";
				echo ">$i</a>";
			}
		}
		next_posts_link('Next &raquo;');
		echo '</div>';
	}
}

// Get image attachment (sizes: thumbnail, medium, full)
function get_thumbnail($postid=0, $size='full',$thumb_key='') {
	if ($postid<1) 
	$postid = get_the_ID();
	
	if($thumb_key)
		$thumb_key = $thumb_key;
	else
		$thumb_key = 'thumb';
	$thumb = get_post_meta($postid, $thumb_key, TRUE); // Declare the custom field for the image
	
	if(version_compare(get_bloginfo('version'), '2.9') >= 0) {
		if(!$thumb && has_post_thumbnail($postid) && function_exists( 'the_post_thumbnail' ) ) {
			$post_thumbnail_id = get_post_thumbnail_id( $post_id );
			$image = wp_get_attachment_image_src( $post_thumbnail_id, $size );
			$thumb = $image[0];
		}
	}

	if ($thumb != null or $thumb != '') {
		return $thumb; 
	} elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', ))) {
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
			return $thumbnail[0]; 
		}
	} else {
		if($default)
			return $default;
	}
	
}

// Automatically display/resize thumbnail
function tj_thumbnail($width, $height) {
	echo '<a href="'.get_permalink($post->ID).'" rel="bookmark"><img src="'.get_bloginfo('template_url').'/timthumb.php?src='.get_thumbnail($post->ID, 'full').'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.get_the_title().'" /></a>';
}

// Get limit excerpt
function tj_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "";
      echo $content;
      echo "...";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo "...";
   }
   else {
      echo "";
      echo $content;
   }
}


function tj_save_tweet_link($id) {
	$url = sprintf('%s?p=%s', get_bloginfo('url').'/', $id);

	add_post_meta($id, 'tweet_trim_url_2', $url);
	
	return $url;
}

function tj_the_tweet_link() {
	if (!$url = get_post_meta(get_the_ID(), 'tweet_trim_url_2', true)) {
	  $url = tj_save_tweet_link(get_the_ID());
	}
	
	if ($old_url = get_post_meta(get_the_ID(), 'tweet_trim_url', true)) {
	  delete_post_meta(get_the_ID(), 'tweet_trim_url');
	}
	
	$output_url = sprintf(
	  'http://twitter.com/home?status=%s%s%s',
	  urlencode(get_the_title()),
	  urlencode(' - '),
	  $url
	);
	$output_url = str_replace('+','%20',$output_url);
	return $output_url;
}

function tj_sociable_bookmarks() {
	global $wp_query, $post;
	
	$sociable_sites = array (

		array( "name" => "Twitter",
			'icon' => 'twitter.png',
			'class' => 'twitter_icon',
			'url' => tj_the_tweet_link(),
		),

	    array( "name" => "StumbleUpon",
		    'icon' => 'stumbleupon.png',
			'class' => 'stumbleupon_icon',
		    'url' => 'http://www.stumbleupon.com/submit?url=PERMALINK&amp;title=TITLE',
		),

		array( "name" => "Reddit",
			'icon' => 'reddit-logo.png',
			'class' => 'reddit_icon',
			'url' => 'http://reddit.com/submit?url=PERMALINK&amp;title=TITLE',
		),

		array( "name" => "Digg",
			'icon' => 'digg-logo.png',
			'class' => 'digg_icon',
			'url' => 'http://digg.com/submit?phase=2&amp;url=PERMALINK&amp;title=TITLE&amp;bodytext=EXCERPT',
		),

		array( "name" => "del.icio.us",
			'icon' => 'delicious.png',
			'class' => 'delicious_icon',
			'url' => 'http://delicious.com/post?url=PERMALINK&amp;title=TITLE&amp;notes=EXCERPT',
		),
		
		array( "name" => "Facebook",
			'icon' => 'facebook-logo-square.png',
			'class' => 'facebook_icon',
			'url' => 'http://www.facebook.com/share.php?u=PERMALINK&amp;t=TITLE',
		),
		
		array( "name" => "LinkedIn",
			'icon' => 'linkedin-square.png',
			'class' => 'linkedin_icon',
			'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url=PERMALINK&amp;title=TITLE&amp;source=BLOGNAME&amp;summary=EXCERPT',
		),

	);
	
	// Load the post's and blog's data
	$blogname = urlencode(get_bloginfo('name')." ".get_bloginfo('description'));
	$post = $wp_query->post;
	
	
	// Grab the excerpt, if there is no excerpt, create one
	$excerpt = urlencode(strip_tags(strip_shortcodes($post->post_excerpt)));
	if ($excerpt == "") {
		$excerpt = urlencode(substr(strip_tags(strip_shortcodes($post->post_content)),0,250));
	}
	
	// Clean the excerpt for use with links
	$excerpt = str_replace('+','%20',$excerpt);
	$excerpt = str_replace('%0D%0A','',$excerpt);
	$permalink 	= urlencode(get_permalink($post->ID));
	$title = str_replace('+','%20',urlencode($post->post_title));
	
	foreach($sociable_sites as $bookmark) {	
		$url = $bookmark['url'];
		$url = str_replace('TITLE', $title, $url);
		$url = str_replace('BLOGNAME', $blogname, $url);
		$url = str_replace('EXCERPT', $excerpt, $url);
		$url = str_replace('PERMALINK', $permalink, $url);
		
		$output .= '<div class="' .$bookmark['class']. '">';
		$output .= '<a title="' .$bookmark['name']. '" href="' .$url. '">';
		$output .= '</a>';
		$output .= '</div>';
	}

	return $output;
}

/*---------------------------------------------------------------------------------*/
/* Custom styles and scripts */
/*---------------------------------------------------------------------------------*/
add_action( 'template_redirect', 'custom_enqueue_styles');
add_action( 'template_redirect', 'custom_enqueue_scripts');
add_action('wp_footer','custom_scripts');

function custom_enqueue_styles() {
	wp_enqueue_style('prettyPhoto',get_bloginfo('template_url'). '/js/prettyPhoto/css/prettyPhoto.css',false,'2.5.6','screen, projection');

 }	
 
function custom_enqueue_scripts() {
	wp_deregister_script( 'jquery' );
	
	// wp_enqueue_script('jquery', get_bloginfo('template_url').'/js/jquery-1.4.2.min.js', array('jquery'), '1.4.2');
	wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', false, '1.4.2');
	wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js', false, '1.8.4');
	wp_enqueue_script('jquery-cycle', get_bloginfo('template_url').'/js/jquery.cycle.all.min.js', array('jquery'), '2.88');
	wp_enqueue_script('jquery-prettyPhoto', get_bloginfo('template_url').'/js/prettyPhoto/jquery.prettyPhoto.js', array('jquery'), '2.5.6',true);
	if(get_theme_mod('cufon') == 'Yes') {
		wp_enqueue_script('cufon', get_bloginfo('template_url').'/js/cufon-yui.js', false, '1.09');
		wp_enqueue_script('cufon-font-cLight', get_bloginfo('template_url'). '/js/Droid_Sans.font.js',array('cufon'), '1.09');
	}

	wp_enqueue_script('jquery-global', get_bloginfo('template_url').'/js/global.js', array('jquery'), '1.0');

	if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );
}

function custom_scripts() { ?>
<script type="text/javascript">
$(document).ready(function() {
	
	<?php 
	$get_hslider_timeout = get_option('division_home_slider_timeout');
	if($get_hslider_timeout != '')
		$hslider_timeout = $get_hslider_timeout;
	else
		$hslider_timeout = 4000;
		
	$get_hslider_fx = get_option('division_home_slider_fx');
	if($get_hslider_fx)
		$hslider_fx = $get_hslider_fx;
	else
		$hslider_fx = 'fade';
	?>
	$('.home-full-slider .slider').cycle({
		fx:<?php echo "'".$hslider_fx."'"; ?>,
		timeout: <?php echo $hslider_timeout; ?>,
		next: '.home-slider .next',
		prev: '.home-slider .prev',
		pager: '.home-slider .pager',
		pause: 1,
		cleartypeNoBg: true
	});
	
	$('.home-image-slider .slide-image').cycle({
		fx:	<?php echo "'".$hslider_fx."'"; ?>,
		timeout: <?php echo $hslider_timeout; ?>,
		next: '.home-slider .next',
		prev: '.home-slider .prev',
		pager: '.home-slider .pager',
		pause: 1,
		cleartypeNoBg: true
	});
	
	<?php 
	$get_hquote_timeout = get_theme_mod('home_quote_timeout');
	if($get_hquote_timeout != '')
		$hquote_timeout = $get_hquote_timeout;
	else
		$hquote_timeout = 4000;
	?>
	$('#home-quote-slider').cycle({
		fx:	'fade',
		timeout: <?php echo $hquote_timeout; ?>,
		next: '#home-quote .next',
		prev: '#home-quote .prev',
		pause: 1,
		cleartypeNoBg: true
	});
	
	<?php 
	$get_hfolio_timeout = get_theme_mod('home_folio_timeout');
	if($get_hfolio_timeout != '')
		$hfolio_timeout = $get_hfolio_timeout;
	else
		$hfolio_timeout = 4000;
	?>
    $('#home-carousel .carousel').cycle({
		fx: 'scrollHorz',
		timeout: <?php echo $hfolio_timeout; ?>,  
		next: '#home-carousel .next',
		prev: '#home-carousel .prev',
		pause: 1,
		cleartypeNoBg: true
	});
	
	$('.post .readmore .button').hover(function(){
		$(this).addClass('button-blue');
	},function(){
		$(this).removeClass('button-blue');
	});
	
});
</script>

<?php if(get_theme_mod('cufon') == 'Yes') { ?>
<script type="text/javascript">
	Cufon.set('fontFamily', 'Droid Sans');
	Cufon.replace('.logo',{textShadow:'0 1px 0 #FFF',color: '-linear-gradient(#999,#222)'})('.slide-text h2, #home-services h3,#home-services .readmore, .section-title')('.entry-title',{hover:{color:'#222'}})('.widget-title,.fpost .title, .contact-section-title')('.fwidget-title, #comments-title,#reply-title');
	Cufon.now();
</script>
<?php } ?>
<?php }
?>
<?php
$theme = get_current_theme();
$themename = "Division";
$modsname = 'mods_'.$theme;
$shortname = 'division';
$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );

$cat_array = get_categories('hide_empty=0');
$page_array = get_pages('parent=0&hide_empty=0');
$pages_number = count($page_array);

$site_pages = array();
$site_cats = array();

foreach ($page_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$page_ids[] = $pagg->ID;
}

foreach ($cat_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cat_ids[] = $categs->cat_ID;
}


$options = array (
// Begin Primary Metabox Holder
	array( 	"type" => "box-container-open"),

	// General Settings
	array(  "name" => __( 'General Settings', 'themejunkie' ),
			"type" => "box-open"),
			
	array(  "name" => __( 'Logo Type', 'themejunkie' ),
            "id" => "logo",
            "type" => "select",
            "std" => "Image Logo",
            "options" => array("Image Logo", "Text Logo")),
	array(  "name" => __( 'Image Logo URL', 'themejunkie' ),
            "id" => "logo_url",
			"desc" => "fixed width: 160x48px",
            "type" => "text"),
			
	array(  "name" => __( 'Enable Cufon font replacement', 'themejunkie'),
            "id" => "cufon",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	
	array( 	"type" => "box-close"),
	

	
	// Blog Settings
	array(  "name" => __( 'Blog Settings', 'themejunkie' ),
			"type" => "box-open"),
	
	array(  "name" => __( 'Blog Page', 'themejunkie'),
            "id" => "blog_page",
            "type" => "droppage"),	
	array(  "name" => __( 'Blog Post Excerpt Length', 'themejunkie' ),
            "id" => "blog_excerpt_length",
			"class" => "small-text",
			"type" => "text",
            "std" => 520),
	array(  "name" => __( 'Blog Header Image Height', 'themejunkie' ),
            "id" => "blog_thumb_width",
			"class" => "small-text",
			"desc" => "Recommended width: 580px",
			"type" => "text",
            "std" => 580),
	array(  "name" => __( 'Blog Header Image Height', 'themejunkie' ),
            "id" => "blog_thumb_height",
			"class" => "small-text",
			"desc" => "Recommended height: 160px",
			"type" => "text",
            "std" => 160),
	array(  "name" => __( 'Enable Timthumb(Auto-Resizing) for Blog Header Image', 'themejunkie'),
            "id" => "blog_thumb_auto",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),
			
	array( 	"type" => "box-close"),
	
	array(	"name" => "Custom Slider",
			"type" => "custom_slider"),
	
	// Portfolio Settings
	array(  "name" => __( 'Portfolio Settings', 'themejunkie' ),
			"type" => "box-open"),
	array(  "name" => __( 'Portfolio Page', 'themejunkie'),
            "id" => "folio_page",
            "type" => "droppage"),	
	array(  "name" => __( 'Portfolio Categories', 'themejunkie'),
            "id" => "folio_cats",
            "type" => "checkbox",
			"wptype" => "cat",
            "std" => "",
            "options" => $cat_ids),
			
	array(  "name" => __( 'Posts on Portfolio Post List', 'themejunkie'),
			"type" => "sub-title"),	
	array(  "name" => __( '	Number posts in per page', 'themejunkie'),
            "id" => "folio_num",
			"std" => 8,
			"type" => "select",
			"options" => array(4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24)),
	array(  "name" => __( 'Display post title, excerpt and meta', 'themejunkie'),
            "id" => "folio_post_content",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'Thumbnail Height', 'themejunkie' ),
            "id" => "folio_thumb_height",
			"class" => "small-text",
			"desc" => "fixed width: 208px",
			"type" => "text",
            "std" => 138),
	array(  "name" => __( 'Enable Timthumb(Auto-Resizing)', 'themejunkie'),
            "id" => "folio_thumb_auto",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'Enable Lightbox Window', 'themejunkie'),
            "id" => "folio_thumb_lightbox",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
			
	array(  "name" => __( 'Single Portfolio Post', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Allow comments', 'themejunkie'),
            "id" => "folio_comments",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),
	
	array(  "name" => __( 'Exclude Portfolio from', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Date Archive Page', 'themejunkie'),
            "id" => "ex_folio_from_cat",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'Search Page', 'themejunkie'),
            "id" => "ex_folio_from_search",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'Tag Page', 'themejunkie'),
            "id" => "ex_folio_from_tag",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'RSS feed', 'themejunkie'),
            "id" => "ex_folio_from_feed",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),
	
	array( 	"type" => "box-close"),
	
	// Contact Settings
	array(  "name" => __('Contact Settings', 'themejunkie'),
			"type" => "box-open"),
			
	array(  "name" => __( 'Contact Page', 'themejunkie'),
            "id" => "contact_page",
            "type" => "droppage"),	
	
	array(  "name" => "Contact Info",
            "type" => "sub-title"),
	array(  "name" => "Contact Info Title",
            "id" => "contact_info_title",
            "std" => "Contact Info",
            "type" => "text"),
	array(  "name" => "Address",
            "id" => "address",
            "type" => "textarea"),
	array(  "name" => "Phone",
            "id" => "phone",
            "type" => "text"),
	array(  "name" => "Fax",
            "id" => "fax",
			"type" => "text"),
	array(  "name" => "Email",
            "id" => "email",
            "std" => get_option('admin_email'),
            "type" => "text"),
	array(  "name" => "After Contact Info",
			"desc" => "Maybe you want to enter some text for more contact infomation, for example, to insert a google map.",
            "id" => "after_contact_info",
            "type" => "textarea"),
	
	array(  "name" => "Social Links",
            "type" => "sub-title"),
	array(  "name" => "Social Links Title",
            "id" => "social_links_title",
            "std" => "Find us elsewhere",
            "type" => "text"),
	array(  "name" => "RSS Feed URL",
            "id" => "rss_url",
            "std" => get_bloginfo('rss2_url'),
            "type" => "text"),
	array(  "name" => "Twitter URL",
            "id" => "twitter_url",
			"type" => "text"),
	array(  "name" => "Facebook URL",
            "id" => "facebook_url",
            "type" => "text"),
	array(  "name" => "Linkedin URL",
            "id" => "linkedin_url",
            "type" => "text"),
	array(  "name" => "Flickr URL",
            "id" => "flickr_url",
            "type" => "text"),
			
	array(  "name" => "Conatct Form",
            "type" => "sub-title"),
	array(  "name" => "Contact Form Title",
            "id" => "contact_form_title",
            "std" => "Contact Form",
            "type" => "text"),
	array(  "name" => "Contact Form Email",
			"desc" => "Your email for receive submissions from contact form",
            "id" => "contact_form_email",
            "std" => get_option('admin_email'),
            "type" => "text"),
	array(  "name" => "Before Contact Form",
			"desc" => "Maybe you want to enter some text as tips for contact form",
            "id" => "before_contact_form",
            "type" => "textarea"),
			
	array( 	"type" => "box-close"),
	


	// Integration Settings
	array(  "name" => __( 'Code Integration', 'themejunkie'),
			"type" => "box-open"),
			
	array(  "name" => __( 'Enable head code', 'themejunkie'),
            "id" => "head_code_status",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( '<span class="description">Add code to the < head > of your site</span>', 'themejunkie'),
            "id" => "head_code",
            "type" => "textarea",
            "std" => ""),

	array(  "name" => __( 'Enable body code', 'themejunkie'),
            "id" => "body_code_status",
			"std" => "No",
            "type" => "select",
			"options" => array("Yes","No")),            	
	array(  "name" => __( '<span class="description">Add code to the < body > (good tracking codes such as google analytics)</span>', 'themejunkie'),
            "id" => "body_code",
            "type" => "textarea",
            "std" => ""),
	array( 	"type" => "box-close"),
	

	array( 	"type" => "box-container-close"), 
// End Primary Metabox Holder


/*---------------------------------------------------------------------------------*/
/* Begin Secondary Metabox Holder */
/*---------------------------------------------------------------------------------*/
	array( 	"type" => "box-container-open"),
	
	// Home Settings - Featured Services
	array(  "name" => __( 'Home Settings - Featured Services', 'themejunkie'),
			"type" => "box-open"),
			
	array(  "name" => __( 'Enable this area', 'themejunkie'),
            "id" => "home_services_status",
            "type" => "select",
			"options" => array("Yes","No"),
			"std" => "Yes"),		
			
	array(  "name" => __( 'Featured Services 1', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Icon url', 'themejunkie'),
            "id" => "fs_icon_1",
			"type" => "text",
			"std" => get_bloginfo('template_url').'/test/s1.png'),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "fs_title_1",
            "type" => "text",
			"std" => "WordPress Enhanced"),
	array(  "name" => __( 'Description', 'themejunkie'),
            "id" => "fs_desc_1",
            "type" => "textarea",
			"std" => "Division is a WordPress Theme best used for Portfolio and Business Sites. Get more out of your Wordpress install with Advanced jQuery Scripts, Custom Widgets, Contact Form, Portfolio Gallery, Button Styles and more."),
	array(  "name" => __( 'Link URL', 'themejunkie'),
            "id" => "fs_url_1",
            "type" => "text",
			"std" => "#"),
			
	array(  "name" => __( 'Featured Services 2', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Icon url', 'themejunkie'),
            "id" => "fs_icon_2",
			"type" => "text",
			"std" => get_bloginfo('template_url').'/test/s2.png'),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "fs_title_2",
            "type" => "text",
			"std" => "Works Everywhere"),
	array(  "name" => __( 'Description', 'themejunkie'),
            "id" => "fs_desc_2",
            "type" => "textarea",
			"std" => "This theme works fine under Windows, Linux and Mac OSX.\n\nIt was coded with web standards in mind and tested in multiple browsers, among them Internet Explorer 6,7 and 8, Firefox, Opera, Google Chrome and Safari."),
	array(  "name" => __( 'Link URL', 'themejunkie'),
            "id" => "fs_url_2",
            "type" => "text",
			"std" => "#"),
			
	array(  "name" => __( 'Featured Services 3', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Icon url', 'themejunkie'),
            "id" => "fs_icon_3",
			"type" => "text",
			"std" => get_bloginfo('template_url').'/test/s3.png'),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "fs_title_3",
            "type" => "text",
			"std" => "Easy to Customize"),
	array(  "name" => __( 'Description', 'themejunkie'),
            "id" => "fs_desc_3",
            "type" => "textarea",
			"std" => "Easy to customize your Theme with extended admin panel for any kind of users. You can simply control your theme look and content without any special knowledge. Control each of your pages from Header to Footer!"),
	array(  "name" => __( 'Link URL', 'themejunkie'),
            "id" => "fs_url_3",
            "type" => "text",
			"std" => "#"),
	
	array(  "name" => __( 'Featured Services 4', 'themejunkie'),
			"type" => "sub-title"),
	array(  "name" => __( 'Icon url', 'themejunkie'),
            "id" => "fs_icon_4",
			"type" => "text",
			"std" => get_bloginfo('template_url').'/test/s4.png'),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "fs_title_4",
            "type" => "text",
			"std" => "Excellent Support"),
	array(  "name" => __( 'Description', 'themejunkie'),
            "id" => "fs_desc_4",
            "type" => "textarea",
			"std" => "We do our best to support our clients. When you buy a theme, you also buy excellent support from us, Our Customer Service Specialist deliver outstanding technical support and basic customization issues that you might have."),
	array(  "name" => __( 'Link URL', 'themejunkie'),
            "id" => "fs_url_4",
            "type" => "text",
			"std" => "#"),
	
	array(  "type" => "box-close"),
	
	// Home Settings - Home News
	array(  "name" => __( 'Home Settings - Home Blog News', 'themejunkie'),
			"type" => "box-open"),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "home_blog_title",
            "type" => "text",
			"std" => "News from our blog"),
	array(  "name" => __( '	Number of <b>Blog Posts</b>', 'themejunkie'),
            "id" => "home_news_num",
			"std" => 6,
			"type" => "select",
			"options" => array(2,3,4,5,6,7,8,9,10)),
	array(  "type" => "box-close"),
	
	// Home Settings - Home Quote
	array(  "name" => __( 'Home Settings - Home Quote', 'themejunkie'),
			"type" => "box-open"),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "home_quote_title",
            "type" => "text",
			"std" => "Testimonials"),
	array(  "name" => __( 'Testimonials Page URL', 'themejunkie'),
            "id" => "home_quote_page_url",
            "type" => "text",
			"std" => ""),
	array(  "name" => __( 'Timeout', 'themejunkie'),
            "id" => "home_quote_timeout",
            "type" => "text",
			"std" => '4000',
			"desc" => "milliseconds between slide transitions (0 to disable auto advance)"),
	array(  "name" => __( 'Testimonial Content', 'themejunkie'),
            "id" => "home_quote_content",
            "type" => "textarea",
			"rows" => "20",
			"desc" => 'You can use shortcode [quote][/quote] for per quote:<br /><code style="font-style:normal;color:#000;">[quote name="Author Name" sitename="Site Name" siteurl="http://quoteurl.com" avatar="http://your.com/avatar.png"]Quote Content[/quote]</code><br/>
			1. name, sitename, siteurl and avatar is optional.<br/>
			2. Recommended avatar image size:48px*48px<br/>
			3. You can use shortcode [quote][/quote] on admin post editor for creat a testimonails page.',
			"std" => '[quote name="James Cameron" sitename="Avatar" siteurl="http://www.avatarmovie.com/" avatar="'.get_bloginfo('template_url').'/test/a1.gif"]I want to say for all to read that the support I received from the crew at Theme Junkie - namely one member, RADEK - was absolutely outstanding. Your support crew is an example - or model - of what all such support service should be like.[/quote]'."\n\n".'[quote name="Christopher Nolan" sitename="Inception" siteurl="http://inceptionmovie.warnerbros.com/" avatar="'.get_bloginfo('template_url').'/test/a2.gif"]All the themes are of the best quality and up to date with all Wordpress software and run smoothly across all browsers. The support is great, I have had all my questions on modifications solved with in 24hrs and have learned a great deal in the process.[/quote]'."\n\n".'[quote name="Robert Rodriguez" sitename="Machete"]The support is great, I have had all my questions on modifications solved with in 24hrs and have learned a great deal in the process.All the themes are of the best quality and up to date with all Wordpress software and run smoothly across all browsers.[/quote]'),
	array(  "type" => "box-close"),
	
	// Home Settings - Home Clients
	array(  "name" => __( 'Home Settings - Home Clients', 'themejunkie'),
			"type" => "box-open"),
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "home_clients_title",
            "type" => "text",
			"std" => "Our Clients"),
	array(  "name" => __( 'Clients Page URL for title', 'themejunkie'),
            "id" => "home_clients_url",
            "type" => "text"),
	array(  "name" => __( 'Client List Code', 'themejunkie'),
            "id" => "home_clients_code",
            "type" => "textarea",
			"std" => '<li><a href="http://www.racktheme.com"><img src="'.get_bloginfo('template_url').'/test/c1.jpg" alt="img" /></a></li>'."\n".'<li><a href="#"><img src="'.get_bloginfo('template_url').'/test/c2.jpg" alt="img" /></a></li>'."\n".'<li><a href="#"><img src="'.get_bloginfo('template_url').'/test/c3.jpg" alt="img" /></a></li>'."\n".'<li><a href="#"><img src="'.get_bloginfo('template_url').'/test/c4.jpg" alt="img" /></a></li>'."\n".'<li><a href="#"><img src="'.get_bloginfo('template_url').'/test/c5.jpg" alt="img" alt="img" /></a></li>'."\n".'<li><a href="#"><img src="'.get_bloginfo('template_url').'/test/c6.jpg" alt="img" /></a></li>',
			"rows" => 20,
			"desc" => 'Use this html for per client: '.htmlspecialchars('<li><a href="http://www.racktheme.com"><img src="http://http://test.com/your-client-logo.jpg" alt="img" /></a></li>').'<br />Recommended logo size: 95px*60px'),
	array(  "type" => "box-close"),
	
	// Home Settings - Home Portfolio
	array(  "name" => __( 'Home Settings - Home Portfolio Carousel', 'themejunkie'),
			"type" => "box-open"),
	array(  "name" => __( 'Enable this area', 'themejunkie'),
            "id" => "home_folio_carousel_status",
            "type" => "select",
			"options" => array("Yes","No"),
			"std" => "Yes"),	
	array(  "name" => __( 'Title', 'themejunkie'),
            "id" => "home_folio_title",
            "type" => "text",
			"std" => "We have create many beautiful works"),
	array(  "name" => __( '	Number of <b>Portfolio Posts</b>', 'themejunkie'),
            "id" => "home_folio_num",
			"std" => 12,
			"type" => "select",
			"options" => array(4,8,12,16,20,24)),
	array(  "name" => __( 'Enable Lightbox Window', 'themejunkie'),
            "id" => "home_folio_lightbox",
			"std" => "Yes",
            "type" => "select",
			"options" => array("Yes","No")),
	array(  "name" => __( 'Timeout', 'themejunkie'),
            "id" => "home_folio_timeout",
            "type" => "text",
			"std" => '4000',
			"desc" => "milliseconds between slide transitions (0 to disable auto advance)"),
	array(  "type" => "box-close"),
	
	
	array( 	"type" => "box-container-close")
);
// 
/*---------------------------------------------------------------------------------*/
/* End Secondary Metabox Holder */
/*---------------------------------------------------------------------------------*/

function hello_options() {
	global $themename, $modsname, $options;
	foreach ($options as $value) {
		$key = $value['id'];
		$val = $value['std'];
		$new_options[$key] = $val; 
	}
	add_option($modsname, $new_options );
}
add_action('wp_head', 'hello_options');
add_action('admin_head', 'hello_options');

function mytheme_add_admin() {
    global $themename, $modsname, $options;
	$settings = get_option($modsname);
    if ( $_GET['page'] == 'division-theme' ) {
        if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				if(($value['type'] === "checkbox" or $value['type'] === "multiselect" ) and is_array($_REQUEST[ $value['id'] ]))
					{ $_REQUEST[ $value['id'] ]=implode(',',$_REQUEST[ $value['id'] ]);
					}
				$key = $value['id']; 
				$val = $_REQUEST[$key];
				$settings[$key] = $val;
			}
			update_option($modsname, $settings);                   
			header("Location: themes.php?page=division-theme&saved=true");
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				$key = $value['id'];
				$std = $value['std'];
				$new_options[$key] = $std;
			}
			update_option($modsname, $new_options );
            header("Location: themes.php?page=division-theme&reset=true");
            die;
        }
    }
	add_menu_page($themename." Theme Options", $themename, 'edit_themes', 'division-theme', 'mytheme_admin');
    add_submenu_page('division-theme', $themename." Theme Options", "Theme Options", 'edit_themes', 'division-theme', 'mytheme_admin');
}

function mytheme_admin() {
    
	global $themename, $modsname, $options;
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings saved.', 'themejunkie').'</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.__('settings reset.', 'themejunkie').'</strong></p></div>'; ?>
	
	<div class="wrap">
		<div class="icon32" id="icon-themes"><br></div>
		<h2><?php echo $themename; ?> <?php _e('Theme Options','themejunkie'); ?></h2>
		<div id="poststuff">
			<form method="post">
			<div class="metabox-holder">
				<?php 
					$settings = get_option($modsname);
					foreach ($options as $value) { 
						$id = $value['id'];
						$std = $value['std'];
						if (($value['type'] == "text") || ($value['type'] == "textarea") || ($value['type'] == "select") || ($value['type'] == "multiselect") || ($value['type'] == "checkbox") || ($value['type'] == "radio") || ($value['type'] == "dropcat") || ($value['type'] == "droppage")) { ?>
							<tr>
								<th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?>:</label></th>
								<td>
						<?php } ?>
						
						<?php if ($value['type'] == "box-container-open") { ?>
							<div class="postbox-container" style="width:49%;">
								<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						<?php } elseif ($value['type'] == "box-container-close") { ?>
								</div><!-- end .meta-box-sortables -->
							</div><!-- end .post-box-container -->
							
							
						<?php } elseif ($value['type'] == "box-open") { ?>
							<div class="postbox ">
								<div class="handlediv" title="<?php _e('Show/Hide','themejunkie'); ?>"><br></div>
								<h3 class="hndle"><span><?php echo $value['name']; ?></span></h3>
								<div class="inside">
								<table class="form-table">
						<?php } elseif ($value['type'] == "box-close") { ?>
								</table><!-- end .form-table -->
								</div><!-- end .inside -->
							</div><!-- end .postbox -->
						
						<?php } elseif ($value['type'] == "sub-title") { ?>
							<tr><td colspan ="2" style="padding:4px 10px;margin:0 0 10px 0;background:#F7F7F7;border-top:1px solid #EEE;border-bottom:1px solid #EEE;"><strong><?php echo $value['name']; ?></strong></td></tr>
							
						<?php } elseif ($value['type'] == "about") { ?>
							<tr>
								<th><?php _e( 'Theme:', $domain ); ?></th>
								<td><a href="<?php echo $theme_data['URI']; ?>" title="<?php echo $theme_data['Title']; ?>"><?php echo $theme_data['Title']; ?> <?php echo $theme_data['Version']; ?></a></td>
							</tr>
							<tr>
								<th><?php _e( 'Author:', $domain ); ?></th>
								<td><?php echo $theme_data['Author']; ?></td>
							</tr>
							<tr>
								<th><?php _e( 'Description:', $domain ); ?></th>
								<td><?php echo $theme_data['Description']; ?></td>
							</tr>
						<?php } elseif ($value['type'] == "text") { ?>
							<input <?php if($value['class'] == 'small-text') echo 'class="small-text"'; else echo 'class="regular-text"';?>name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $settings[$id]; ?>" />
							
						<?php } elseif ($value['type'] == "textarea") { ?>
							<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="<?php if($value['rows']) echo $value['rows']; else echo '5'; ?>" cols="37"/><?php echo stripslashes($settings[$id]); ?></textarea>
						<?php } elseif ($value['type'] == "select") { ?>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
								<?php foreach ($value['options'] as $option) { ?>
								<option<?php if ( $settings[$id] == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
								<?php } ?>
							</select>
						<?php } elseif ($value['type'] == "multiselect") { ?>
							<select  multiple="multiple" size="3" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>" style="height:100px;">
								<?php $ch_values=explode(',',$settings[$id] ); foreach ($value['options'] as $option) { ?>
								<option<?php if ( in_array($option,$ch_values)) { echo ' selected="selected"'; }?> value="<?php echo $option; ?>"><?php echo $option; ?></option>
								<?php } ?>
							</select>
						<?php } elseif ($value['type'] == "radio") { ?>
							<?php foreach ($value['options'] as $option) { ?>
									<?php echo $option; ?><input name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" 									<?php if ( $settings[$id] == $option) { echo 'checked'; } ?>/>
							<?php } ?>
						<?php } elseif ($value['type'] == "checkbox") { ?>
							<div style="height:12em;overflow:auto;border:1px solid #EEE;padding:10px;">
							<?php 
								$ch_values=explode(',',$settings[$id]);
								foreach ($value['options'] as $option) { ?>
									<input name="<?php echo $value['id']; ?>[]" type="<?php echo $value['type']; ?>" value="<?php echo $option; ?>" <?php if ( in_array($option,$ch_values)) { echo ' checked="checked"'; } ?> />
									<?php
									if($value['wptype'] == "cat") {
										echo get_cat_name($option); 
									} elseif($value['wptype'] == "page") {
										$page_data = get_page($option); 
										echo $page_data->post_title;
									} else {
										echo $option; 
									} ?>
							
									<br/>
									
<?php 		} ?></div>
						<?php } elseif ($value['type'] == "dropcat") { ?>
							<?php wp_dropdown_categories(array('show_option_none' => 'Select Caegory', 'selected' => get_theme_mod($value['id']), 'name' => $value['id'], 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0' )); ?>
						<?php } elseif ($value['type'] == "droppage") { ?>
							<?php wp_dropdown_pages(array('show_option_none' => 'Select Page', 'selected' => get_theme_mod($value['id']), 'name' => $value['id'], 'depth' => 1)); ?>
						<?php } ?>
						
						<?php if(isset($value['desc'])){ ?><br/><span class="description"><?php echo $value['desc']?></span><?php } ?>
						
						<?php if (($value['type'] == "text") || ($value['type'] == "textarea") || ($value['type'] == "select") || ($value['type'] == "multiselect") || ($value['type'] == "checkbox") || ($value['type'] == "radio") || ($value['type'] == "dropcat") || ($value['type'] == "droppage")) { ?>
							</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</div><!-- end .metabox-holder -->
				<p id="submit-saved" class="submit">
					<input id="submit-saved" class="button-primary" name="save" type="submit" value="<?php _e('Save Changes','themejunkie') ;?>" />    
					<input type="hidden" name="action" value="save" />
				</p>
			</form>
			
			<form method="post">
				<p id="submit-reset" class="submit">
					<input id="submit-reset" name="reset" type="submit" value="<?php _e('Reset to Defaults','themejunkie') ;?>" />
					<input type="hidden" name="action" value="reset" />
				</p>
			</form>
	</div><!-- end #wrap -->
<?php } ?>
<?php add_action('admin_menu', 'mytheme_add_admin');

function tj_theme_options_css_js() {
	if ( $_GET['page'] == 'division-theme' ) {
	// wp_enqueue_script( 'common' );
	// wp_enqueue_script( 'wp-lists' );
	wp_enqueue_script( 'postbox' ); ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){ // Toglle .postbox
				jQuery(".postbox").addClass("closed");
				jQuery(".handlediv").click(function(){
				jQuery(this).parent(".postbox").toggleClass("closed");
			});
		});
	</script>
	<style type="text/css">
		#submit-saved{clear:left;}
		.submit{float:left;margin:0 10px 0 0;}
		#poststuff .inside{margin-left:0;margin-right:0;}
	</style>
	
	<?php
	
}}
add_action('admin_head','tj_theme_options_css_js');

add_action('admin_menu', 'add_slider_admin');

function add_slider_admin() {
	global $themename;
	add_submenu_page('division-theme', $themename." Slider Options", "Slider Options", 'edit_themes', 'slider-options', 'slider_admin');
}

function slider_admin() {
	include_once('slider-options.php');
}
 ?>
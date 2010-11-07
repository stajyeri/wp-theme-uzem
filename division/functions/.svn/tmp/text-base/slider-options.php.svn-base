<?php
global $themename,$shortname;

$options = array (
		array(	"name" => "Home Slider Type",
				"desc" => "Select which slider type to use.<br /><strong>Full Slider:</strong> Text+Image for per slide<br /><strong>Only Imge:</strong> Image for per slide, and use text of first slide below display as fixed overview.",
				"id" => $shortname."_home_slider_type",
				"options"=> array('full'=>'Full Slider', 'onlyimage'=>'Only Image'),
				"default" => "onlyimage",
				"format" => "select"),
				
		array(	"name" => "Image Area Position",
				"desc" => "Select the position of image area.",
				"id" => $shortname."_home_slider_position",
				"options"=> array('left'=>'Left', 'right'=>'Right'),
				"default" => "left",
				"format" => "select"),
				
		array(	"name" => "Transition Effect",
				"desc" => "Select whiche transition effect to use. Recommended effects for full slider: scrollHorz or fade",
				"id" => $shortname."_home_slider_fx",
				"options"=> array('scrollHorz' => 'scrollHorz','scrollVert' => 'scrollVert','fade' => 'fade','shuffle' => 'shuffle','blindY' => 'blindY','blindZ' => 'blindZ','cover' => 'cover','curtainX' => 'curtainX','curtainY' => 'curtainY','fadeZoom' => 'fadeZoom','growX' => 'growX','growY' => 'growY','scrollUp' => 'scrollUp','scrollDown' => 'scrollDown','scrollLeft' => 'scrollLeft','scrollRight' => 'scrollRight','slideX' => 'slideX','slideY' => 'slideY','toss' => 'toss','turnUp' => 'turnUp','turnDown' => 'turnDown','turnLeft' => 'turnLeft','turnRight' => 'turnRight','uncover' => 'uncover','wipe' => 'wipe','zoom' => 'zoom','none' => 'none'),
				"default" => "fade",
				"format" => "select"),
				
		array(	"name" => "Timeout",
				"desc" => "milliseconds between slide transitions (0 to disable auto advance, default value: 4000)",
				"id" => $shortname."_home_slider_timeout",
				"default" => "4000",
				"format" => "text"),
				
		array(	"name" => "Show slider control",
				"id" => $shortname."_home_slider_control",
				"options"=> array('Yes'=>'Yes', 'No'=>'No'),
				"default" => "Yes",
				"format" => "select")
);
?>
<script src="<?php echo bloginfo('template_url'); ?>/js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/functions/js/sortMenu.js"></script>
<script type="text/javascript"> var $j = jQuery.noConflict(); </script>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/functions/css/sortable-lists.css" />
<?php 
function options_select($value) {
	echo '<tr><th scope="row"><h4>'. $value['name'] .'</h4></th>';
	echo '<td><label>'. $value['label'] .'</label>';
	echo '<select style="width:350px;" name="'. $value['id'] .'" id="'. $value['id'] .'" onchange="checkForCustom(this, \''. $value['id'] .'_customOption\');">';
	echo '<option value="">Choose one...</option>';
	
	foreach ($value['options'] as $key=>$option) { 
		echo '<option value="'. $key .'"'; 
			if ( get_option( $value['id'] ) == $option || get_option( $value['id'] ) == $key) { 
				echo ' selected="selected"'; 
			} elseif  ( !get_option( $value['id']) && $key == $value['default'] ) {
				echo ' selected="selected"'; 
			}
		echo '>'. $option .'</option>';
	}
			
	echo '</select><br />';
	echo '<span class="description">'. $value['desc'] .'</span><br />';
	
	// this select allows for a custom value entered by the user 
	if ($value['custom']) {
		echo '<div class="customOption" id="'. $value['id'] .'_customOption"'; 
			if ( get_option( $value['id'] ) == 'custom' ) { 
				echo 'style="display:block;"'; 
			} 
		echo '><br />';
		echo '<label for="'. $value['custom'] .'">Custom:</label>';
		echo '<input style="width:297px;" name="'. $value['custom'] .'" id="'. $value['custom'] .'" type="text" value="'. get_option( $value['custom'] ) .'" />';
		echo '<br /><span class="description">'. $value['custom_desc'] .'</span>';
		echo '</div></td></tr>';
	}
}

function options_text($value) {
	echo '<tr><th scope="row"><h4>'. $value['name'] .'</h4></th><td>';
	echo '<label>'. $value['label'] .'</label>';
	echo '<input style="width:350px;" name="'. $value['id'] .'" id="'. $value['id'] .'" type="'. $value['format'] .'" value="';
		if ( get_option( $value['id'] ) != "") { 
			echo stripslashes(get_option( $value['id'] )); 
		} else { 
			echo $value['default']; 
		}
	echo '" /><br />';
	echo '<span class="description">'. $value['desc'] .'</span>';
	echo '</td></tr>';
}

?>

<div class="wrap">

	<h2><?php echo $themename; ?> - Slider Settings</h2>

	<?php
	global $shortname;
	// save options to database (on submit)
	if (isset($_POST['save_theme_options'])) :
		
		// convert to and store setup options 
		parse_str($_POST['SS-Options'], $SlideOptions);

		foreach ($options as $value) {     
			update_option($value['id'], $SlideOptions[$value['id']]);
		}
		
		// convert to and store array 
		parse_str($_POST['SS-ItemLevels'], $SlideLevels);
		update_option($shortname.'SS-ItemLevels', $SlideLevels);
		
		// convert to and store array 
		parse_str($_POST['SS-ItemValues'], $SlideValues);
		update_option($shortname.'SS-ItemValues', $SlideValues);
		
		// display success message
		echo '<div id="message" class="updated fade"><p><strong>Updated Successfully</strong></p></div>';
	endif;
	
	// the default options
	echo '<form method="post" action="" id="optionsForm">';
	echo '<div class="themeTableWrapper">';
	echo '<table cellspacing="0" class="widefat themeTable">';
	echo '<thead><tr>';
	echo '<th scope="row" colspan="2">Home Slider Option</th>';
	echo '</tr></thead><tbody>';
		foreach ($options as $value) { 
			if (function_exists('options_'.$value['format'])) {
				call_user_func('options_'.$value['format'], $value);
			}
		}
	echo '</tbody></table></div>';
	echo '</form>';

	// middle buttons
	echo '<p>Recommended image size: 420 px * 260 px</p>';
	echo '<input type="button" name="save_theme_options" class="button-primary autowidth" onClick="saveMenu();" value="Save Changes" style="float:left; margin-right: 2em;" />';
	echo '<input type="button" class="button-secondary autowidth" style="float:left;" onClick="addMenuItem(true);" value="Add New Slide" />';
	echo '<p style="clear:both; margin: 0;">&nbsp;</p>'; ?>
	
	<p class="description">You can use shortcode [button] in descrition fields like code below:</p>
	<code>
		[button value="Submit" link="http://button-link-to.com" color="red"]
	</code>
	<p>Available colors: white, gray, black, red, green, blue, yellow, brown, pink, purple, orange(Default:white)</p>
	
	<?php
	
	// start the main slide setup table	
	echo '<form method="post" action="" id="editForm">';
	echo '<div class="themeTableWrapper">';
	echo '<table cellspacing="0" class="widefat themeTable"><tbody>';

	
	?>
	<td colspan="4">
	
		<div>
			<ul id="SlideShow">
				<?php
				// output the menu as an unordered list
				$SS_Levels = get_option($shortname.'SS-ItemLevels');
				$SS_Values = get_option($shortname.'SS-ItemValues');
				
				if(!empty($SS_Levels) && is_array($SS_Levels)) {
					buildList($SS_Levels['SlideShow'], $SS_Values);
				}
				?>
			</ul>
		</div>
	
	</td>
	<?php
	
	// call table end function
	echo '</tbody></table></div>';
	
	echo '</form>';
	echo '<p class="submit"><input type="button" name="save_theme_options" class="button-primary autowidth" onClick="saveMenu();" value="Save Changes" /></p>';

	?>
	
	<br/>
	<form method="post" action="" id="submitForm" style="display:none;">
		<input type="hidden" name="SS-Options" id="SS-Options" value="" />
		<input type="hidden" name="SS-ItemLevels" id="SS-ItemLevels" value="" />
		<input type="hidden" name="SS-ItemValues" id="SS-ItemValues" value="" />
		<input type="hidden" value="true" name="save_theme_options" />
	</form>
	
	<ul style="display:none;" id="sample-ss-item">
		<?php 
		
		// Default options (for new items)
		$SS_Defaults = array(
			'ss-#-title' =>	'Title',
			'ss-#-image' =>	'http://',
			'ss-#-url' =>	'http://',
			'ss-#-desc'	=>	'Description'
		);

		// create the template li used for inserting new items
		buildList(array('id' => '#'), $SS_Defaults);
		?>
	</ul>
	
	<?php
	function buildList($theArray, $theValues = array()) {   
		foreach ($theArray as $key => $value) {
		
			// get variables setup
			$id = $value['id'];
			$options = $theValues;
							
				?>
				<li id="ss-item-<?php echo $id ?>" rel="<?php echo $id ?>" class="isSortable slide-item noNesting">
					<div class="sortItem">
						<table cellspacing="0" width="100%">
							<tbody>
								<td class="handle"><div></div></td>
								<td>
									<span style="display:block;width:100px;float:left;">Title:</span>
									<input type="text" size="40" name="ss-<?php echo $id ?>-title" value="<?php echo htmlspecialchars(stripslashes($options['ss-'. $id .'-title'])) ?>" />
									<br />
								
									<span style="display:block;width:100px;float:left;">Image URL:</span>
									<input type="text" size="40" name="ss-<?php echo $id ?>-image" value="<?php echo htmlspecialchars(stripslashes($options['ss-'. $id .'-image'])) ?>" />
									<br />
									
									<span style="display:block;width:100px;float:left;">Link URL:</span>
									<input type="text" size="40" name="ss-<?php echo $id ?>-url" value="<?php echo htmlspecialchars(stripslashes($options['ss-'. $id .'-url'])) ?>" />
									<br / >
								</td>
								<td>
									<span>Description:</span>
									<textarea name="ss-<?php echo $id ?>-desc" class="widefat" rows="5"><?php echo htmlspecialchars(stripslashes($options['ss-'. $id .'-desc'])) ?></textarea>
								</td>
								<td width="90"><div class="button-secondary delete-item">Delete</div></td>
							</tbody>
						</table>
					</div>
	
				<?php
				echo "</li>";
				
		} // end foreach item
	}
	
	?>
</div>

<script type="text/javascript">

// array to track all nested item id's
var nestedListIds = [];

// creates draggable nested item menu
function initializeMenu() {

	// convert into sortable list
	$j('#SlideShow').NestedSortable({
		accept: 'isSortable',
		noNestingClass: "noNesting",
		opacity: 0.8,
		helperclass: 'helper',
		onChange: function(serialized) {
			$j('#SS-ItemLevels').val((serialized[0].hash));
		},
		onStart: function() {
			// prevents a horizontal scroll when dragging
			$j(document.body).css('overflow-x','hidden');
		},
		onStop: function() {
			// restors scrolling after draggin completes
			$j(document.body).css('overflow-x','auto');
		},
		autoScroll: true,
		handle: '.handle'
	})
	.find('li').each( function() {
		
		// add onclick other dynamic functions
		if (!this.hasClickEventHandlers) {
			
			var thisItem = $j(this);
			var n = thisItem.attr('rel');
			nestedListIds.push(parseInt(n)); // add the id to a list (used to prevent duplicates when editing)

			var deleteButton = thisItem.find(".delete-item:first");

			// add click event for delete button
			deleteButton.click( function() {
				if (confirm("Are you sure you want to delete this item?")) {
					thisItem.remove();
				} else {
					return false;
				}
			});
			
			this.hasClickEventHandlers = true;
		}
	});
	
}

// inserts a new menu item
function addMenuItem(itemType) {

	var count = $j('#SlideShow').find('li').length,
	menuItem = $j('#sample-ss-item li'),
	template;
	template  = menuItem;
	
	// prevent duplicate id's by checking agains all current ones	
	var newID = count;
	while ($j.inArray(newID, nestedListIds) != -1 ) {
		newID++;
	}

	template.clone()
		.attr('id',template.attr('id').replace('#',newID))
		.attr('rel',newID)
		.find('*').each( function() {
			
			var attrId = $j(this).attr('id'),
				attrName = $j(this).attr('name'),
				attrFor = $j(this).attr('for');
				
			if (attrId) $j(this).attr('id', attrId.replace('#',newID));
			if (attrName)$j(this).attr('name', attrName.replace('#',newID));
			if (attrFor)$j(this).attr('for', attrFor.replace('#',newID));
		
		}).end()
		.prependTo($j('#SlideShow'));
		
	// re-initialize sorting to include new item
	initializeMenu();
}


// save the menu options to the database
function saveMenu() {
	
	// get the individual item options
	$j('#SS-Options').val($j('#optionsForm').serialize());

	// get the individual item options
	$j('#SS-ItemValues').val($j('#editForm').serialize());
	
	// get the list in it's sorted order for creating menus and sub-menus
	$j('#SS-ItemLevels').val(jQuery.iNestedSortable.serialize('SlideShow').hash);
	
	$j('#submitForm').submit();
}


jQuery(document).ready(function() {

	// activate the sortable list
	initializeMenu();

});	
</script>

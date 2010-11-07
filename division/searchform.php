<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<div>
	<input type="text" class="input-text" name="s" id="s"  value="<?php _e('Enter Search keywords...','themejunkie'); ?>" onfocus="if (this.value == '<?php _e('Enter Search keywords...','themejunkie'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Enter Search keywords...','themejunkie'); ?>';}" />
	<input id="searchsubmit" type="submit" value="Search" />
	</div>
</form>
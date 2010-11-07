<?php 
	if(is_category() && tj_is_folio_cat())
		include(TEMPLATEPATH. '/portfolio.php');
	else
		include(TEMPLATEPATH. '/blog.php');
?>
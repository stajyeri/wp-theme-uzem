<?php 
	if(tj_in_folio_cat()) 
		include(TEMPLATEPATH. '/includes/single-folio.php');
	else
		include(TEMPLATEPATH. '/includes/single-blog.php');
?>
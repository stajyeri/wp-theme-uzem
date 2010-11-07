jQuery.fn.ImageAutoSize = function(width) {
    $("img",this).each(function()
    {
        var image = $(this);
        if(image.width()>width)
        {
            image.width(width);
            image.height(width/image.width()*image.height());
        }
    });
}

function equalHeight(group) {
	var tallest = 0;
	group.each(function() {
		var thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}

jQuery(document).ready(function(){
	/* Topnav Dropdown menu.	*/
	$('#topnav ul li').each(function(){
		if($(this).children('ul').length > 0) {
			$(this).addClass('withul');
			$(this).children('a').addClass('withula');
		
			$(this).hover(function(){
				$(this).addClass('withul-hover');
				$(this).children('ul').slideDown(200);
			},function(){
				$(this).removeClass('withul-hover');
				$(this).children('ul').slideUp(100);	
			});
		}
	});
	
	$('.home-full-slider .slider').height($('.home-full-slider .slide').height());
	
	equalHeight($('.fpost .wrap'));
	
	$('#home-services .item-content').height($('#home-services').height());
	
	$("a[rel^='prettyPhoto'], a[rel^='lightbox']").prettyPhoto({
		"theme": 'facebook'															
	});
	
	$('.entry-thumb img').hover(function(){
		$(this).stop().animate({backgroundColor: "#DDD"},400);
	},function(){
		$(this).stop().animate({backgroundColor: "#F7F7F7"},400);
	});
	
	$('.fpost .thumb').each(function() {
		if(($(this).find('.hover-image').length) <= 0) {
			$(this).hover(function(){
				$(this).stop().animate({backgroundColor: "#DDD"},400);
			},function(){
				$(this).stop().animate({backgroundColor: "#F7F7F7"},400);
			});
		} else {
			$('.fpost .thumb a img').hover(function(){
				$(this).stop().animate({opacity:0.5},400);
			},function(){
				$(this).stop().animate({opacity:1},400);
			});
		}
	});


});
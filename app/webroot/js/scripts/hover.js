jQuery(function() { 
    jQuery(".h-button").hide();
    jQuery('.blue-circle').hover(function() {
		jQuery(this).find('.w-img').css("opacity","0.4");
		jQuery(this).find('.h-button').stop().fadeIn(400);
    }, function() {
    	jQuery(this).find('.w-img').css("opacity","1");
		jQuery(this).find('.h-button').stop().fadeOut(400);
    });
});
var $= jQuery;

$(document).ready(function() {


	//mobile toggle menu
	$(".mobile-menu").on('click', function(){
		$(".mobile-dropdown").slideToggle("slow");
	});
	
	//scroll to This is me
	$(".menu-item-107").on('click', function() {
    	$('html, body').animate({
        	scrollTop: $("#this-is-me").offset().top
    	}, 2000);
    });

    //scroll to Portfolio
	$(".menu-item-108").on('click', function() {
	    $('html, body').animate({
	        scrollTop: $("#portfolio").offset().top
	    }, 2000);
    });

    //scroll to Contact me
	$(".menu-item-109").on ('click', function() {
	    $('html, body').animate({
	        scrollTop: $("#contact-me").offset().top
	    }, 2000);
	});

	//scroll to Home
	$(".menu-item-115").on ('click', function() {
	    $('html, body').animate({
	        scrollTop: $("#home").offset().top
	    }, 1000);
	});
});


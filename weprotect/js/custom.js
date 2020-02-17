$(document).ready(function() {

	// Nav Sticky
	
	$(window).scroll(function(){
		if(window.scrollY > 500 && !$('.mobile-toggle').is(":visible")){
			$('.navbar').addClass('nav-sticky');
		}else{
			$('.navbar').removeClass('nav-sticky');
		}
	});
	
	// ==================== SCROLL TO TOP ====================== //
	$(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
	    $("html, body").animate({ scrollTop: 0 }, 600);
	    return false;
    });


	// ==================== CSS ANIMATIONS (DISABLES ON MOBILE DEVICES) ==================== //
	userAgent = window.navigator.userAgent;
	
	if(/iP(hone|od|ad)/.test(userAgent)==false) {

		$('.slide-up').bind('inview', function (event, visible) {
		  if (visible == true) {
		    // element is now visible in the viewport
		    $(this).addClass('animated fadeInUp');
		  } else {
		    // element has gone out of viewport
		    $(this).removeClass('animated fadeInUp');
		  }
		});

		$('.slide-right').bind('inview', function (event, visible) {
		  if (visible == true) {
		    // element is now visible in the viewport
		    $(this).addClass('animated fadeInRight');
		  } else {
		    // element has gone out of viewport
		    $(this).removeClass('animated fadeInRight');
		  }
		});

		$('.slide-left').bind('inview', function (event, visible) {
		  if (visible == true) {
		    // element is now visible in the viewport
		    $(this).addClass('animated fadeInLeft');
		  } else {
		    // element has gone out of viewport
		    $(this).removeClass('animated fadeInLeft');
		  }
		});

	}
   
	// ==================== BOOTSTRAP SCROLLSPY ==================== //
	$('#main-nav').scrollspy();

	// ==================== SMOOTH SCROLLING BETWEEN SECTIONS ==================== //
	$('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
	        || location.hostname == this.hostname) {

	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	           if (target.length) {
	           	if ($(".navbar").css("position") == "fixed" ) {
	             $('html,body').animate({
	                 scrollTop: target.offset().top-83
	            }, 1000);
	         } else {
	             $('html,body').animate({
	                 scrollTop: target.offset().top
	            }, 1000);
	         }
	            return false;
	        }
	    }
	});

	

	// Closing the $(document).ready(function())
});
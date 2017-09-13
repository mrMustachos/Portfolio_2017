$(window).load(function() {

	function myTimerFunction() {
		var mydiv = $("#contactFrame").contents().find("form");
		var h     = mydiv.height();
		$('#contactFrame').css('height', h)
		setTimeout(myTimerFunction, 10);
	}

	myTimerFunction();

	svgeezy.init(false, 'png');

	$(".currentYear").text((new Date).getFullYear());

	$("img.lazy").unveil(300, function() {
		$(this).load(function() {
			this.style.opacity = 1;
		});
	});

	$('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
			// $('body').removeClass('loading');
		}
	});

	$(function() {
		$.scrollIt();

		// $.scrollIt({
		// 	upKey: 38,             // key code to navigate to the next section
		// 	downKey: 40,           // key code to navigate to the previous section
		// 	easing: 'linear',      // the easing function for animation
		// 	scrollTime: 600,       // how long (in ms) the animation takes
		// 	activeClass: 'active', // class given to the active nav element
		// 	onPageChange: null,    // function(pageIndex) that is called when page is changed
		// 	topOffset: 0           // offste (in px) for fixed top navigation
		// });
	});

	$(function() {

		// change triggers
		var nav_container = $("#nav");
		var hero_logo = $(".hero__logo");
		var hero_h1 = $('.hero__h1, .project');
		var nav_height = $("#nav").outerHeight();
		var menu = $('.menu');

		var nav_logo = $('#nav .logo')
			nav_logo = nav_logo.outerHeight();
		
		var nav_logo_TM = $('#nav .logo').outerHeight(true)
			nav_logo_TM = (nav_logo_TM - nav_logo) * .5;

		var h1_offest = (nav_height - (nav_logo_TM * 2));

		var nav_offset = nav_height * 1.25;


		hero_logo.waypoint({
			handler: function(direction) {
				if ($(window).width() < 800) {
					nav_container.toggleClass('transparent', direction == 'down');
				}
			},
			offset: function() {
				return nav_offset;
			}
		});

		hero_logo.waypoint({
			handler: function(direction) {
				if ($(window).width() < 800) {
					nav_container.toggleClass('nav_flip', direction == 'down');
					hero_logo.toggleClass('nav_flip', direction == 'down');
				}
			},
			offset: function() {
				return nav_logo_TM;
			}
		});

		hero_h1.waypoint({
			handler: function(direction) {
				nav_container.toggleClass('filled', direction == 'down');
			},
			offset: function() {
				return h1_offest;
			}
		});
	});

	$('.viewer').click(function() {
		$('body').toggleClass('view');
	});


	// // Potential way to get the animation to fire for the send button before the form sends the email
	// $('.send_mail').click(function () { 

	// 	$(this).addClass('clicked');

	// 	$(this).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
	// 		// code to execute after animation ends
	// 		$(this).removeClass('clicked');
	// 	});
	// });

});
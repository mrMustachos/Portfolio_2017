$(window).load(function() {

	$('.hamburger').click(function() {
		$('.menu').toggleClass('open').addClass('mobile');
		$('#nav .logo, #nav .nav_bg').toggleClass('open');
	});

	function resize() {
		if ($(window).width() > 800) {
			$('.menu, #nav .logo').removeClass('mobile').removeClass('open');
			return true;
		}
		// $('.menu').addClass('mobile');
	}
	$(window).resize(resize).trigger('resize');

	[].slice.call(document.querySelectorAll('.menu')).forEach(function(menu) {
		var menuItems = menu.querySelectorAll('.menu__link'),
			setCurrent = function(ev) {
				// ev.preventDefault();

				var item = ev.target.parentNode; // li

				// return if already current
				if (classie.has(item, 'menu__item--current')) {
					return false;
				}
				// remove current
				classie.remove(menu.querySelector('.menu__item--current'), 'menu__item--current');
				// set current
				classie.add(item, 'menu__item--current');
			};

		[].slice.call(menuItems).forEach(function(el) {
			el.addEventListener('click', setCurrent);
		});
	});

});

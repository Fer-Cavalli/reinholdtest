jQuery.noConflict();
jQuery(document).ready(function($){

	
	// $('a[href^="#"]').on('click', function(e){
	// 	e.preventDefault();
	// 	const el = $($(this).attr('href'));
	//     el.length && $('html, body').animate({ scrollTop: el.offset().top - 90}, 500);
	// 	return false;
	// });

	$('.responsive__btn').on('click',() => $('body').toggleClass('menu-responsive-open') );

	$(window).scroll(function(){
		$(window).scrollTop() > 20 ? $('body').addClass('scrolled') : $('body').removeClass('scrolled').removeClass('nav-down');
	}).trigger('scroll');	

	$('.read_more').readmore({
		speed: 150, 
		collapsedHeight: 0,
		moreLink: '<a class="ac" href="#">Read More <i class="fas fa-sort-down"></i></a>', 
		lessLink: '<a class="kapat" href="#">Read More	<i class="fas fa-sort-up"></i></a>',
	  });

	$(".js-accordion-open").on('click', function(){
		$('.js-accordion-open').addClass('js-active');
        $("table.variations").toggle();
    });

	$('.site-menu__first-level').filter(function(){
		return this.href === location.href;
	  }).addClass('js-active');

	$('.js-open-popup').click(function(){
		$('.popup').fadeIn();
	});
	
	$('.close_popup').click(function(){
		$('.popup' ).fadeOut();
	});
});
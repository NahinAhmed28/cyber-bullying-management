// $(function(){
// 	$(".dropdown-item").click(function(){
// 		var icon_text = $(this).html();
// 		$(".dropdown-toggle").html(icon_text);
// 	})
// })

// $(function(){
// 	$("[data-trigger]").on('click', function(){
// 		var target_id = $(this).attr('data-trigger');
// 		$(target_id).toggleClass("show");
// 		$('body').toggleClass("offcanvas-active");
// 	})

// 	$(".btn-close").on('click', function(e){
// 		$(".navbar-collapse").removeClass("show");
// 		$("body").removeClass("offcanvas-active");
// 	})
// })

//var mixer = mixitup('.gallary');

// var container = document.querySelector('.gallary');

// var mixer = mixitup(container, {
// 	selectors:{
// 		control: '[data-mixitup-control]'
// 	}
// })

$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});

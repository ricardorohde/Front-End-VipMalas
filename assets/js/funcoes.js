$(function() {
	
    $(window).scroll(function(){

		var wScreen = $(window).width();

		if ($(this).scrollTop() > 160) {
				$('.gotop').addClass("show");
			} else {
				$('.gotop').removeClass("show");
		}
    });

    $('.gotop').click(function() {
        $('body,html').animate({scrollTop:0},1000);
    });
});

$(function(){
    $(window).resize(function(){
        if($(this).width() >= 992 || $(this).width() <= 992){
			$('.header-site').scrollToFixed();
         } else {
             $('.header-site').unbind('scrollToFixed');

         }
    })
    .resize();//trigger resize on page load
});

function getLoading(){
    var montaLoader = '<div id="elm_loading"><i class="fas fa-circle-notch fa-spin fa-5x fas-fw"></i><span class="sr-only">Carregando...</span></div>';
    $('body').prepend(montaLoader).fadeIn();
}

function delLoading(){
    $('#elm_loading').remove();
}

$('.elemento-clique').click(function(){
    $('html, body').animate({scrollTop: $('.elemento-destino').offset().top  -120}, 'slow');
});

// NAVBAR EFFECT ON SCROLL
$(document).on("scroll", function() {
    if($(document).scrollTop()>100) {
      $("#menu").removeClass("expand").addClass("retract");
    } else {
      $("#menu").removeClass("retract").addClass("expand");
    }
  });

$(document).ready(function(){
    $('.sliders').slick({
      slidesToShow: 1,
      accessibility: false,
      slidesToScroll: 1,
      autoplay: false,
      adaptiveHeight: true,
      autoplaySpeed: 8000,
      dotsClass: 'slider-bullet',
      arrows: false,
      dots: true,
    });

    $('.slider-list').slick({
        slidesToShow: 3,
        accessibility: false,
        slidesToScroll: 1,
        autoplay: false,
        adaptiveHeight: true,
        autoplaySpeed: 5000,
        dotsClass: 'slider-bullet',
        arrows: true,
        dots: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
});
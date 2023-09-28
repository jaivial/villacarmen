function initSlider() {
  $('.slider').slick({
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    infinite: true,
    speed: 1800,
    slidesToShow: 1,
    slidesToScroll: 1,
    pauseOnHover: false,
    pauseOnFocus: false,
    swipe: true,
    swipeToSlide: true
  });
}

$(document).ready(function() {
  initSlider();
});
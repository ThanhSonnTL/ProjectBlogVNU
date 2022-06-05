$(document).ready(function () {
  $("#slider .owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 1,
  });
});
$(".owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  autoplay: true,
  autoplayTimeout: 2000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 5,
    },
  },
});

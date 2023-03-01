// Scroll back to top

$(document).ready(function () {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 200) {
      $('.back-top').fadeIn();
    } else {
      $('.back-top').fadeOut();
    }
  });
});

function scrolltotop() {
  $('html, body').animate({
    scrollTop: 0
  }, 1500);
}

// parallax
// parallax poster


var swiper = new Swiper(".mySwiper", {

  // effect: 'fade',
  loop: true,
  spaceBetween: 10,
  // fadeEffect: {
  //   crossFade: true
  // },
  simulateTouch: false,
  speed:1000,
  autoplay: {
    delay: 2800,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + (index + 1) + "</span>";
    },
  },
});
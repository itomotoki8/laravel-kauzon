/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
var swiper = new Swiper(".swiper", {
  slidesPerView: 2,
  breakpoints: {
    // 768px以上の場合
    768: {
      slidesPerView: 4.5
    }
  },
  // ナビボタンが必要なら追加
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});
var swiper2 = new Swiper(".swiper2", {
  slidesPerView: 1,
  // ページネーションが必要なら追加
  pagination: {
    el: ".swiper-pagination"
  },
  // ナビボタンが必要なら追加
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});
/******/ })()
;
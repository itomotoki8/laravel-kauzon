/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/review.js ***!
  \********************************/
$(function () {
  $("#star").raty({
    // cancelButton: true,
    target: "#hint",
    targetType: "score",
    targetKeep: true,
    number: 5,
    //星全体の表示数
    starOn: "/storage/starOn.svg",
    starOff: "/storage/starOff.svg",
    starHalf: "/storage/starHalf.svg"
  });
});
/******/ })()
;
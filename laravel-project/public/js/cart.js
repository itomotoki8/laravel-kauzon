/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
// cookieから総額とcountを取得できるapiを作って取得して表示。
// 個数変更はcookieを変更して、apiを読み込みなおしてajaxで非同期に表示。

$(function () {
  $(".star").each(function () {
    var star = $(this).prev().val();
    $(this).raty({
      // cancelButton: true,
      targetKeep: true,
      readOnly: true,
      number: 5,
      //星全体の表示数
      score: star,
      starOn: "/storage/starOn.svg",
      starOff: "/storage/starOff.svg",
      starHalf: "/storage/starHalf2.svg"
    });
  });

  //関数
  //ajaxでitemのトータル金額を取得
  var total_countGet = function total_countGet() {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content")
      }
    });
    $.ajax({
      url: "/total_count",
      method: "GET"
      //取得できたら画面描写
    }).then(function (res) {
      $("#total").text("".concat(res.total.toLocaleString()));
      $("#count").text("\uFF08".concat(res.count.toLocaleString(), "\u500B\uFF09"));
    });
  };

  //関数ここまで

  // 総額と件数をajaxで取得
  total_countGet();
  $(".delete").each(function (index, element) {
    var _this = this;
    $(element).on("click", function () {
      var cart = JSON.parse(Cookies.get("cart"));
      var id = $(_this).prev().val();
      console.log(id);
      cart.forEach(function (e, index) {
        if (e.id == id) {
          cart.splice(index, 1);
          return;
        }
      });
      if (cart.length) {
        console.log(cart);
        Cookies.set("cart", JSON.stringify(cart));
      } else {
        Cookies.remove("cart");
      }
    });
  });

  // cartの中身のitem分の class selectを取得
  $(".select").each(function (index, element) {
    var _this2 = this;
    // 展開してクリックイベントを付ける
    $(element).on("change", function () {
      //htmlのselectの上にinput hiddenのvalueにitem_idを入れてるのでidとして取得
      var id = $(_this2).prev().val();
      // 変更したitemのnumを取得
      var num = _this2.value;

      // cookieの書き換え
      var cart = JSON.parse(Cookies.get("cart"));
      cart.forEach(function (e) {
        if (e.id == id) {
          e.num = num;
          return;
        }
      });
      Cookies.set("cart", JSON.stringify(cart));

      // ajaxで総額と件数を更新
      total_countGet();
    });
  });
});
/******/ })()
;
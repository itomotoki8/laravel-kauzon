/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/category.js ***!
  \**********************************/
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
  $(".cartButton").each(function () {
    $(this).on("click", function () {
      var result = confirm("カートに追加しますか？");
      if (result) {
        //item_idと個数を取得
        var id = $(this).prev().val();

        // 取得したitem_idと個数をオブジェクトに変換
        var cart_list = {
          id: id,
          num: 1
        };

        // cartを入れる空の配列
        var cart = [];

        // 重複するitemがあるかのチェック用
        var bool = false;

        // Cookieのcartが存在したらcartに今のcartの配列を代入
        if (Cookies.get("cart")) {
          cart = JSON.parse(Cookies.get("cart"));

          // cartに同じ商品が入っていたら個数を加算してboolをfalse->trueに
          cart.forEach(function (e) {
            if (e.id == id) {
              e.num = Number(e.num) + Number(num);
              bool = true;
              return;
            }
          });
        }

        // itemの重複がなければcartにアイテムを追加
        if (!bool) {
          cart.push(cart_list);
        }

        // Cookieに代入
        Cookies.set("cart", JSON.stringify(cart));
        alert("登録しました。");
      } else {
        alert("登録をキャンセルしました。");
      }
    });
  });
});
/******/ })()
;
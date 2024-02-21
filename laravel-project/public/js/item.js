/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/item.js ***!
  \******************************/
$(function () {
  //サーバ側でも扱えるようにCookieにitem_idと個数をjson形式で入れる
  // Cookiesというjsライブラリを使用

  // $("#star").raty({
  //     // cancelButton: true,
  //     target: "#hint",
  //     targetType: "score",
  //     targetKeep: true,
  //     size: 36,
  //     number: 5, //星全体の表示数
  //     score: $(this).val(),
  //     path: "/storage/", //サーバ上のRaty画像のパス
  // });

  var cart_button = document.getElementById("cart");
  var id = $(location).attr("pathname").split("/")[2];
  var getReviews = function getReviews() {
    var select = $("#review").val();
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content")
      }
    });
    $.ajax({
      url: "/review",
      method: "GET",
      data: {
        type: select,
        id: id
      },
      dataType: "json"
    }).done(function (res) {
      $("#reviewArea").html("");
      $(res).each(function (i, val) {
        $("#reviewArea").append("<div class=\"mt-5\">\n                    <p class=\"font-bold\">".concat(val.user.name, "</p>\n                    <div class=\"flex my-1 items-center\">\n                    <input value=\"").concat(val.star, "\" id=\"hint\" type=\"hidden\" /><div class=\" flex mr-2 star h-4\"></div>\n                    <h3 class=\"inline-block font-bold\">").concat(val.title, "</h3>\n                    </div>\n                    <div class=\"text-sm text-slate-500\">").concat(val.created_at, "\u306B\u30EC\u30D3\u30E5\u30FC\u6E08\u307F</div>\n                    <div class=\"mt-2\">\n                        <p class=\"break-words\">").concat(val.review, "</p>\n                    </div>\n                    </div>"));
      });
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
    });
  };
  getReviews();
  $("#review").on("change", function () {
    getReviews();
  });

  //clickイベント
  var cart_in = function cart_in() {
    var result = confirm("カートに追加しますか？");
    if (result) {
      //item_idと個数を取得
      var _id = document.getElementById("id").value;
      var num = document.getElementById("num").value;
      console.log(num);
      // 取得したitem_idと個数をオブジェクトに変換
      var cart_list = {
        id: _id,
        num: num
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
          if (e.id == _id) {
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
  };

  // 良くないと思うけどログイン状態を取得して実行するかを判断
  var a = document.getElementById("bool").value;
  if (a) {
    cart_button.addEventListener("click", cart_in);
  } else {
    cart_button.addEventListener("click", function () {
      document.location = "/login";
    });
  }
});

//商品を５個以上追加できないようにする。エラーを返す
/******/ })()
;
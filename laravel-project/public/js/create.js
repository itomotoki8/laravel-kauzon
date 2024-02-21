/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/create.js ***!
  \********************************/
$(function () {
  $(".line").each(function (index, value) {
    $(value).on("change", function () {
      if ($(value).val()) {
        $(value).removeClass("outline");
      } else {
        $(value).addClass("outline");
      }
    });
  });
  $("#price").on("change", function () {
    $("#priceT").text($("#price").val());
  });

  // 1. ファイル選択後に呼ばれるイベント
  $("#input1").on("change", function (e) {
    // 2. 画像ファイルの読み込みクラス
    var reader = new FileReader();

    // 3. 準備が終わったら、id=sample1のsrc属性に選択した画像ファイルの情報を設定
    reader.onload = function (e) {
      $("#sample1").attr("src", e.target.result);
    };

    // 4. 読み込んだ画像ファイルをURLに変換
    reader.readAsDataURL(e.target.files[0]);
  });
  var area = document.querySelectorAll(".area");
  area.forEach(function (e) {
    var clientHeight = e.clientHeight;
    //textareaのinputイベント
    e.style.height = clientHeight + "px";
    //textareaの入力内容の高さを取得
    var scrollHeight = e.scrollHeight;
    e.style.height = scrollHeight + "px";
    e.addEventListener("input", function () {
      //textareaの要素の高さを設定（rows属性で行を指定するなら「px」ではなく「auto」で良いかも！）
      e.style.height = clientHeight + "px";
      //textareaの入力内容の高さを取得
      var scrollHeight = e.scrollHeight;
      //textareaの高さに入力内容の高さを設定
      e.style.height = scrollHeight + "px";
    });
  });
});
/******/ })()
;
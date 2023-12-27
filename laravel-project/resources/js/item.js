$(function () {
    $(".sidebar__order").css({ width: $("#sidebar1").width() + "px" });
    $(window).on(scroll, function () {
        //スクロールするオブジェクトの高さ
        var boxhight = $(".sidebar__order").height();
        //追従開始位置
        var toplimit = $(".sidebar__sticky").offset().top;
        //追従終了位置
        var bottomimit = $(".seminar").offset().top - boxhight - 40;

        if ($(window).scrollTop() > toplimit) {
            $(".sidebar__order").css({ position: "fixed", top: "0" });
            if ($(window).scrollTop() > bottomimit) {
                $(".sidebar__order").css({
                    position: "absolute",
                    top: bottomimit + "px",
                });
            }
        } else {
            $(".sidebar__order").css({ position: "initial", top: "auto" });
        }
    });
});

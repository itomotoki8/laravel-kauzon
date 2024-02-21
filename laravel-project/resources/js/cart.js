// cookieから総額とcountを取得できるapiを作って取得して表示。
// 個数変更はcookieを変更して、apiを読み込みなおしてajaxで非同期に表示。

$(function () {
    $(".star").each(function () {
        const star = $(this).prev().val();
        $(this).raty({
            // cancelButton: true,
            targetKeep: true,
            readOnly: true,
            number: 5, //星全体の表示数
            score: star,
            starOn: "/storage/starOn.svg",
            starOff: "/storage/starOff.svg",
            starHalf: "/storage/starHalf2.svg",
        });
    });

    //関数
    //ajaxでitemのトータル金額を取得
    const total_countGet = () => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
            },
        });
        $.ajax({
            url: "/total_count",
            method: "GET",
            //取得できたら画面描写
        }).then((res) => {
            $("#total").text(`${res.total.toLocaleString()}`);
            $("#count").text(`（${res.count.toLocaleString()}個）`);
        });
    };

    //関数ここまで

    // 総額と件数をajaxで取得
    total_countGet();

    $(".delete").each(function (index, element) {
        $(element).on("click", () => {
            const cart = JSON.parse(Cookies.get("cart"));
            const id = $(this).prev().val();
            console.log(id);

            cart.forEach((e, index) => {
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
        // 展開してクリックイベントを付ける
        $(element).on("change", () => {
            //htmlのselectの上にinput hiddenのvalueにitem_idを入れてるのでidとして取得
            const id = $(this).prev().val();
            // 変更したitemのnumを取得
            const num = this.value;

            // cookieの書き換え
            const cart = JSON.parse(Cookies.get("cart"));
            cart.forEach((e) => {
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

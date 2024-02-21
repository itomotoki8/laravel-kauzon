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

    const cart_button = document.getElementById("cart");

    const id = $(location).attr("pathname").split("/")[2];

    const getReviews = () => {
        const select = $("#review").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
            },
        });

        $.ajax({
            url: `/review`,
            method: "GET",
            data: {
                type: select,
                id: id,
            },
            dataType: "json",
        }).done((res) => {
            $("#reviewArea").html("");
            $(res).each((i, val) => {
                $("#reviewArea").append(
                    `<div class="mt-5">
                    <p class="font-bold">${val.user.name}</p>
                    <div class="flex my-1 items-center">
                    <input value="${val.star}" id="hint" type="hidden" /><div class=" flex mr-2 star h-4"></div>
                    <h3 class="inline-block font-bold">${val.title}</h3>
                    </div>
                    <div class="text-sm text-slate-500">${val.created_at}にレビュー済み</div>
                    <div class="mt-2">
                        <p class="break-words">${val.review}</p>
                    </div>
                    </div>`
                );
            });
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
        });
    };
    getReviews();

    $("#review").on("change", function () {
        getReviews();
    });

    //clickイベント
    const cart_in = () => {
        const result = confirm("カートに追加しますか？");

        if (result) {
            //item_idと個数を取得
            const id = document.getElementById("id").value;
            const num = document.getElementById("num").value;

            console.log(num);
            // 取得したitem_idと個数をオブジェクトに変換
            const cart_list = { id: id, num: num };

            // cartを入れる空の配列
            let cart = [];

            // 重複するitemがあるかのチェック用
            let bool = false;

            // Cookieのcartが存在したらcartに今のcartの配列を代入
            if (Cookies.get("cart")) {
                cart = JSON.parse(Cookies.get("cart"));

                // cartに同じ商品が入っていたら個数を加算してboolをfalse->trueに
                cart.forEach((e) => {
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
    };

    // 良くないと思うけどログイン状態を取得して実行するかを判断
    const a = document.getElementById("bool").value;
    if (a) {
        cart_button.addEventListener("click", cart_in);
    } else {
        cart_button.addEventListener("click", () => {
            document.location = "/login";
        });
    }
});

//商品を５個以上追加できないようにする。エラーを返す

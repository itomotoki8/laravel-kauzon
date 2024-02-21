$(function () {
    $("#js-pagetop").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            300
        );
    });

    $("#menu").hover(
        () => {
            setTimeout(() => {
                $("#submenu").removeClass("hidden");
            }, 500);
        },
        () => {
            $("#submenu").addClass("hidden");
        }
    );

    $("#result").hide();
    $("#word").focus(function () {
        $("#background").width([$("body").outerWidth(true)]);
        $("#background").height([$("body").outerHeight(true)]);
        $("#wordarea").addClass("outline-orange-400 outline");
        $("#result").show();
        if ($(this).val() == "") {
            const word = $(this).val();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
                },
            });

            $.ajax({
                url: `/search`,
                method: "GET",
                data: {
                    word: word,
                },
                dataType: "json",
            }).done((res) => {
                $("#result").html("");
                $(res).each((i, val) => {
                    $("#result").append(
                        `<a href="category_search?word=${val.name}"><div class="hover:bg-slate-300 pl-8 py-2 break-words relative before:absolute before:content-['🔍'] before:left-1 cursor-pointer">${val.name}</div></a>`
                    );
                });
            });
        }
    });

    $("#background").on("click", function () {
        $("#wordarea").removeClass("outline-orange-400 outline");
        $("#result").hide();
        $("#background").width([0]);
        $("#background").height([0]);
        $("#word").blur();
    });

    window.onkeyup = function (event) {
        if (event.keyCode == "27") {
            $("#wordarea").removeClass("outline-orange-400 outline");
            $("#result").hide();
            $("#background").width([0]);
            $("#background").height([0]);
            $("#word").blur();
        }
    };

    $("#word").on("input", function () {
        const word = $(this).val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("[name='csrf-token']").attr("content"),
            },
        });

        $.ajax({
            url: `/search`,
            method: "GET",
            data: {
                word: word,
            },
            dataType: "json",
        }).done((res) => {
            $("#result").html("");
            $(res).each((i, val) => {
                $("#result").append(
                    `<a href="/category/${val.id}"><div class="hover:bg-slate-300 pl-8 py-2 break-words relative before:absolute before:content-['🔍'] before:left-1 cursor-pointer">${val.name}</div></a>`
                );
            });
        });
    });
});

$(function () {
    $("body").addClass("bg-slate-200");

    const swiper = new Swiper(".swiper", {
        slidesPerView: 2,
        breakpoints: {
            // 768px以上の場合
            768: {
                slidesPerView: 4.5,
            },
        },
        // ナビボタンが必要なら追加
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiper2 = new Swiper(".swiper2", {
        slidesPerView: 1,

        // ナビボタンが必要なら追加
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        loop: true,

        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
            reverseDirection: false,
        },
    });
});

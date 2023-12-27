@extends('layouts.app')
@section('content')
<div class="h-full min-h-screen overflow-x-hidden bg-slate-200 pb-5">

<!-- 広告画像スライダー -->
<div class="swiper2 relative min-h-full">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    @foreach($sliders as $slider)
        <div class="swiper-slide" key="{{$slider->item_id}}"><a href="item/{{$slider->item_id}}"><img src="{{$slider->img_url}}" alt=""></a></div>
    @endforeach
  </div>
  <!-- 必要に応じてナビボタン -->
  <div class="swiper-button-prev absolute top-1/4 left-5"></div>
  <div class="swiper-button-next absolute top-1/4 right-5"></div>
</div>
<!-- 広告スライダーここまで -->

    <div class="px-5 -mt-60 relative z-10">
        <div class="mt-5">
            <div class="flex justify-between gap-5">
                <div class="w-1/3 md:w-1/4 relative overflow-hidden before:pt-[100%] before:pb-[20%] before:block bg-white">
                    <p class="absolute left-2 top-1 font-bold">kkkkk</p>
                    <div class="absolute w-4/5 before:pt-[100%] bg-gray-800 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
                        <img class="w-full h-full" src="https://img.benesse-cms.jp/pet-cat/item/image/normal/0cd456a4-71c5-46f3-9bea-4ccf155c7a89.jpg?w=1120&h=1120&resize_type=cover&resize_mode=force" alt="">
                    </div>
                    <p class="absolute bottom-2 left-1"><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a></p>
                </div>
                <div class="w-1/3 md:w-1/4 relative overflow-hidden before:pt-[100%] before:pb-[20%] before:block bg-white">
                    <p class="absolute left-2 top-1 font-bold">kkkk</p>
                    <div class="absolute w-4/5 before:pt-[100%] bg-gray-800 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
                        <img class="w-full h-full" src="https://img.benesse-cms.jp/pet-cat/item/image/normal/0cd456a4-71c5-46f3-9bea-4ccf155c7a89.jpg?w=1120&h=1120&resize_type=cover&resize_mode=force" alt="">
                    </div>
                    <p class="absolute bottom-2 left-1"><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a></p>
                </div>
                <div class="w-1/3 md:w-1/4 relative overflow-hidden before:pt-[100%] before:pb-[20%] before:block bg-white">
                    <p class="absolute left-2 top-1 font-bold">kkkk</p>
                    <div class="absolute w-4/5 before:pt-[100%] bg-gray-800 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">
                        <img class="w-full h-full" src="https://img.benesse-cms.jp/pet-cat/item/image/normal/0cd456a4-71c5-46f3-9bea-4ccf155c7a89.jpg?w=1120&h=1120&resize_type=cover&resize_mode=force" alt="">
                    </div>
                    <p class="absolute bottom-2 left-1"><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a></p>
                </div>
                <div class="hidden md:block md:w-1/4 relative overflow-hidden before:pt-[100%] before:block bg-white">
                    <p class="absolute top-1 left-2 font-bold">kkkk</p>
                    <div class="absolute w-4/5 before:pt-[100%] bg-gray-800 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ">                        
                        <img class="w-full h-full" src="https://img.benesse-cms.jp/pet-cat/item/image/normal/0cd456a4-71c5-46f3-9bea-4ccf155c7a89.jpg?w=1120&h=1120&resize_type=cover&resize_mode=force" alt="">
                    </div>
                    <p class="absolute bottom-1 left-2"><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a></p>
                </div>
            </div>
            <div class="mt-5 bg-white p-5">
                <h2 class="font-bold inline-block mr-5 text-lg ">これにも注目</h2><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a>
                <div class="swiper">
                    <ul class="flex gap-5 h-[200px] swiper-wrapper">
                    @foreach($items as $item)
                        <li class="w-52 max-w-64 swiper-slide">
                            <a href="item/{{$item->id}}"><img src="{{$item->img_url}}" class="object-contain w-full h-full" alt=""></a>
                        </li>
                    @endforeach
                    </ul>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <div class="mt-5 bg-white p-5">
                <h2 class="font-bold inline-block mr-5 text-lg ">これにも注目</h2><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a>
                <div class="swiper">
                    <ul class="flex gap-5 h-[200px] swiper-wrapper">
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                        <li class="w-52 max-w-64 bg-slate-600 swiper-slide">
                            <a href=""><img src="https://www.anicom-sompo.co.jp/inu/wp-content/uploads/2023/05/GettyImages-1323306331-scaled.jpg" class="object-cover w-full h-full" alt=""></a>
                        </li>
                    </ul>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <div class="mt-5 bg-white p-5">
                <h2 class="font-bold inline-block mr-5 text-lg">カテゴリ</h2><a href="" class="text-sm text-sky-700 hover:underline hover:text-orange-700">カテゴリ一覧</a>
                <ul class="w-full flex justify-between">
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="object-cover rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                    <li class="border border-black relative"><a href=""><img src="https://pics.prcm.jp/e71658ade5a7f/51571185/png/51571185_220x220.png" class="rounded-full w-40 h-40" alt=""><p class="absolute bottom-0 bg-white w-full h-1/4 flex justify-center items-center font-bold">ゲーム</p></a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
@section('js')
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
@endsection
@endsection

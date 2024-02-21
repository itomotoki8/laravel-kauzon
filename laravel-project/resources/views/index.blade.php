@extends('layouts.app')
@section('content')
<div class="h-full min-h-screen overflow-x-hidden bg-slate-200 pb-5">

    <!-- 広告画像スライダー -->
    <div class="swiper2 relative select-none">
    <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($sliders as $slider)
                <div class="swiper-slide" key="{{$slider->item_id}}"><a href="item/{{$slider->item_id}}"><img src="{{$slider->img_url}}" alt=""></a></div>
            @endforeach
        </div>
        <!-- 必要に応じてナビボタン -->
        <div class="swiper-button-prev focus:border-white focus:border-2 rounded-md absolute top-0 left-0 w-[6%] h-[47%] after:bg-no-repeat after:bg-contain after:content-[''] after:h-[25%] after:w-[35%] m-auto after:bg-[url('/storage/leftarrow.png')] before:content-[''] before:absolute before:w-full before:h-full before:focus:border-2 before:border-cyan-700 before:rounded-md"></div>
        <div class="swiper-button-next focus:border-white focus:border-2 absolute top-0 right-0 w-[6%] h-[47%] after:bg-no-repeat after:bg-contain after:content-[''] after:h-[25%] after:w-[35%] m-auto after:bg-[url('/storage/rightarrow.png')]  before:content-[''] before:absolute before:w-full before:h-full before:focus:border-2 before:border-cyan-700 before:rounded-md"></div>
    </div>
    <!-- 広告スライダーここまで -->

    <div class="px-5 -mt-[23%] relative z-10">
        <div class="mt-5">
            <div class="flex justify-between gap-5">
                <div class="w-1/3 md:w-1/4 bg-white p-4">
                    <p class="font-bold md:text-lg line-clamp-2 min-h-[3em]">ファッションセール開催中！最大50%オフ！</p>
                    <div class="mx-auto mt-2">
                        <img class="w-full h-full" src="https://images-fe.ssl-images-amazon.com/images/G/09/2023/fashion/09_Sep/MoD/01_Gateway/04_MoD_Sep_GW_categorycard_dt_1x_379x304._SY304_CB577972905_.jpg" alt="">
                    </div>
                    <a href="" class="text-sm mt-4 inline-block text-sky-700 hover:underline hover:text-orange-700">もっと見る</a>
                </div>


                <div class="w-1/3 md:w-1/4 bg-white p-4">
                    <p class="font-bold md:text-lg line-clamp-2 min-h-[3em]">日本赤十字社を通して令和６年能登半島地震災害義援金へご支援のお願い</p>
                    <div class="mx-auto mt-2">
                        <img class="w-full h-full" src="https://images-fe.ssl-images-amazon.com/images/G/09/Gateway/DisasterRelief/DisasterRelief_Hand_icon_dt_gw_category_379x304._SY304_CB585496300_.jpg" alt="">
                    </div>
                    <a href="" class="text-sm mt-4 inline-block text-sky-700 hover:underline hover:text-orange-700">詳しくはこちら</a>
                </div>
                
                <div class="w-1/3 md:w-1/4 bg-white p-4">
                    <p class="font-bold md:text-lg line-clamp-2 min-h-[3em]">ビューティお買い得情報</p>
                    <div class="mx-auto mt-2">
                        <img class="w-full h-full" src="https://images-fe.ssl-images-amazon.com/images/G/09/consumables/yasuiine/lifeStyleImg_GW_CatCard_beauty_379x304._SY304_CB662353413_.jpg" alt="">
                    </div>
                    <a href="" class="text-sm mt-4 inline-block text-sky-700 hover:underline hover:text-orange-700">詳しくはこちら</a></p>
                </div>
                
                <div class="w-1/3 md:w-1/4 bg-white p-4 hidden md:block">
                    <p class="font-bold md:text-lg line-clamp-2 min-h-[3em]">【最大50％還元】Kindle本ポイントキャンペーン</p>
                    <div class="mx-auto mt-2">                        
                        <img class="w-full h-full" src="https://images-fe.ssl-images-amazon.com/images/G/09/2024/kindle/Promo/Feb/ALC_KindleQ1point_GatewayCard_758x608_20240205._SY608_CB582053458_.jpg" alt="">
                    </div>
                    <a href="" class="text-sm mt-4 inline-block text-sky-700 hover:underline hover:text-orange-700">今すぐチェック</a>
                </div>
            </div>
            @foreach($items as $item)

            <div class="mt-5 bg-white p-5">
                <h2 class="font-bold inline-block mr-5 text-lg">これにも注目</h2><a href="{{route('category',$item['category_id'])}}" class="text-sm text-sky-700 hover:underline hover:text-orange-700">もっと見る</a>
                <div class="swiper select-none">
                    <ul class="flex gap-5 h-[200px] swiper-wrapper">
                    @foreach($item['item'] as $val)
                        <li class="w-52 max-w-64 swiper-slide">
                            <a href="item/{{$val->id}}"><img src="{{$val->img_url}}" class="object-contain w-full h-full" alt=""></a>
                        </li>
                    @endforeach
                    </ul>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>


            @endforeach

            <div class="mt-5 bg-white p-5">
                <h2 class="font-bold inline-block mr-5 text-lg">カテゴリ</h2>
                <ul class="w-full flex justify-between gap-5">
                    @foreach($categories as $category)
                        <li class="w-2/12"><a href="{{route('category',$category->id)}}" class="block"><img src="{{$category->img_url}}" class="object-contain" alt=""></a></li>
                    @endforeach
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

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LaravelEC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
        <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <main class="min-h-screen pb-5">
        <div class="px-5 mt-4">
            <form action="{{route('create_confirmation')}}" method="post" enctype='multipart/form-data'>
                @csrf
            <input type="file" id="input1" name="img"/>
            <div class="flex gap-5 border-b border-slate-300 pb-5 min-h-screen">
                <div class="w-1/3 text-center">
                    <img id="sample1" class="w-full sticky top-0 max-h-screen object-contain" src="https://cdn.ibispaint.com/movie/742/3/742003120/image742003120l.png" alt="">
                </div>
                <div class="flex-1">
                    <textarea id="name" name="name" class="outline outline-1 w-full block text-3xl resize-none area line" style="height: 1em;" placeholder="商品名"></textarea>
                    <div class="flex gap-5 mt-5"><div>0 <span class="relative whitespace-nowrap">☆☆☆☆☆</span></div><span class="">0件の評価</span></div>

                    <div class="border-y mt-5">
                        <div class="flex items-center py-2"><span class="text-xs">￥</span><input name="price" type="number" min=0 max=9999999 class="w-full outline outline-1 text-3xl line" id="price"><p class="text-sm ml-2">税込</p></div>
                    </div>

                    <div class="mt-2">
                        <h4 class="text-xl font-bold">この商品について</h4>
                        <p class="leading-loose">
                            <textarea class="w-full outline outline-1 resize-none area line" name="this">ケーブルいらずでストレスフリー：USB-C端子一体型のため、ケーブルレスで充電可能。充電しながら快適にスマホを操作いただけます。
                            持ち運びしやすい折りたたみ式を採用：コンパクトなサイズに加え、一体型のUSB-C端子部分は折りたたんで収納が可能。他の荷物を傷つけないため、持ち運びにも便利です。
                            コンパクトかつパワフル：コンパクト設計ながらスマホ約1回分の5000mAhの容量と最大22.5Wの出力を実現。コンパクトさとパワフルさを兼ね備えています。
                            最大22.5Wでの急速充電：最大22.5W出力で、スマートフォンを含めた様々な機器に急速充電。2ポート利用時も合計最大18Wで、スマートフォンとイヤホンへの2台同時充電も可能です。
                            選べる充電方法：バッテリー本体には、内蔵のUSB-C端子を直接充電器に繋ぐ方法と本体側面にケーブルを接続して充電する方法の2種類から選んで充電することが可能です。
                            パススルー充電対応：パススルー充電に対応しており、バッテリー本体に充電しながらもスマホなどお使いの機器に充電いただけます。
                            ケースはそのままで：端子をさしやすい形状になっているため、ケースをつけたままでもお使いいただけます。
                            パッケージ内容：Anker Nano Power Bank (22.5W, Built-In USB-C Connector)、USB-C＆USB-Cケーブル (0.6m) 、取扱説明書、カスタマーサポート
                            </textarea>
                        </p>
                    </div>
                </div>

                <div class="w-1/5 border border-slate-300 rounded-lg p-5">
                    @csrf
                    <div class="flex items-center py-2"><span class="text-xs">￥</span><p id="priceT" class="text-3xl"></p><p class="text-sm ml-2">税込</p></div>
                    <div class="">
                        <span>数量:</span>
                        <select name="num" id="num" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 pr-5 pl-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                        </select>
                    </div>

                    <div class="mt-12 text-center w-full">
                        <button type="button" id="cart" class="bg-yellow-400 hover:bg-yellow-500 font-bold py-2 w-full block rounded-full">
                            カートに入れる
                        </button>

                        <button type="button" class="bg-orange-400 hover:bg-orange-500 font-bold py-2 block w-full rounded-full mt-2">
                            今すぐ買う
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-b border-slate-300 py-5">
                <h4 class="text-xl font-bold">商品の説明</h4>
                <div class="ml-5 text-sm outline outline-1 resize-none"><textarea id="textarea" name="syoukai" class="px-1 mt-5 w-full block tracking-widest leading-loose area line">商品紹介
“清く、涼しく、気持ちがスーッと澄みわたる"国民的炭酸飲料
●水・・・ろ過を重ねた安心・安全な“磨かれた水"を使っています。
●香り・・果実などから集めた香りにより独自のおいしさがうまれます。
●製法・・熱を加えていないので、さわやかな味わいが引き立ちます。
●保存料を一切使っておりません。

知っていただきたい3つの価値:
●爽快感・・熱を加えない製法で引き立てられた爽快な味わい。
●安心安全・・念入りにろ過し、一定範囲内の硬度に調整した磨かれた水を使用。
●日本生まれ・・1884年、日本の天然鉱泉から誕生愛され続ける国民の炭酸飲料。

原材料・成分
砂糖類(果糖ぶどう糖液糖、砂糖)/炭酸、香料、酸味料</textarea></div>
            </div>
            <div class="text-center mt-5">
            <button class="">本番確認</button>
            </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('js/create.js') }}"></script>
</body>
</html>



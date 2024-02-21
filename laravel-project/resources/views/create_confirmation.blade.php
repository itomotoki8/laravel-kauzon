<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LaravelEC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
        <link href="/css/app.css" rel="stylesheet">

    </head>
    <body class="text-slate-900">
        <header class="flex justify-around text-white bg-slate-900 items-center py-3">
            <a href="/"><img src="{{asset('storage/logo.png')}}" class="w-20 h-auto block"></a>
            <input type="text" class="border border-slate-900 w-[50%] px-2 py-1 text-slate-800 focus:outline-orange-500 outline-4" placeholder="検索">
            <nav>
                <ul class="flex gap-10 items-center justify-center">
                    @if(Auth::check())
                    <li id="menu" class="relative hover:outline-white hover:outline hover:outline-1 p-1">
                        <p class="cursor-pointer">メニュー</p>
                        <ul id="submenu" class="whitespace-nowrap p-5 hidden absolute text-slate-900 bg-white border border-gray-700 z-40">
                            <li><a href="{{route('history')}}" class="hover:underline hover:text-orange-700">購入履歴</a></li>
                            <li class="pt-3"><a href="" class="hover:underline hover:text-orange-700">再び購入</a></li>
                            <li class="pt-3"><a href="" class="hover:underline hover:text-orange-700">ユーザー情報</a></li>
                        </ul>
                    </li>
                    <li>カート</li>
                    @else
                    <li>ログイン</li>
                    @endif
                </ul>
            </nav>
        </header>

        <main class="min-h-screen pb-5">
            
            <div class="px-5 mt-10">
                <div class="flex gap-5 border-b border-slate-300 pb-5">
                    <div class="w-1/3">
                        <img class="w-full sticky top-0 max-h-screen object-contain" src="" alt="">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-3xl">{{$name}}</h3>
                        <div class="flex gap-5 mt-5"><div>0 <span class="relative whitespace-nowrap">☆☆☆☆☆</span></div><span class="">0件の評価</span></div>

                        <div class="border-y mt-5">
                            <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{$price}}</p><p class="text-sm ml-2">税込</p></div>
                        </div>

                        <div class="mt-2">
                            <h4 class="text-xl font-bold">この商品について</h4>
                            <ul class="list-disc list-inside mt-5">
                                @foreach($thistext as $body)
                                <li class="mt-2">{{$body}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="w-1/5 border border-slate-300 rounded-lg p-5">
                        <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{$price}}</p><p class="text-sm ml-2">税込</p></div>

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

                            <button type="submit" class="bg-orange-400 hover:bg-orange-500 font-bold py-2 block w-full rounded-full mt-2">
                                今すぐ買う
                            </button>
                        </div>    
                    </div>
                </div>

                <div class="border-b border-slate-300 py-5">
                <h4 class="text-xl font-bold">商品の説明</h4>
                <p class="ml-5 mt-5 inline-block text-sm">
                    {!! nl2br(e($syoukai)) !!}
                </p>
                </div>


                <div class="mt-5 flex">
                    <div class="w-1/3">
                        <h2 class="text-2xl mt-5 font-bold">カスタマーレビュー</h2>
                        <div class="flex gap-5 mt-5"><div>0 <span class="relative">☆☆☆☆☆</span></div><span class="">0件の評価</span></div>
                        <p>レビューをかく</p>
                        
                    </div>

                    
                    <div class="mt-5">
                        <select name="" id="" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 pr-5 pl-2">
                            <option value="top">トップレビュー</option>
                            <option value="row">評価が低い</option>
                            <option value="new">新しい順</option>
                        </select>
                        <div class="mt-5">
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <div class="cursor-pointer bg-sky-950 text-white py-2 hover:bg-sky-900 text-center" id="js-pagetop">トップに戻る</div>
        <footer class="flex justify-center text-white bg-gray-900 items-center px-8 py-5">
            <small>© 2024 hatiman.ec. All Rights Reserved.</small>
        </footer>
        @yield('js')
    </body>
</html>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-raty-js@2.8.0/lib/jquery.raty.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/jquery-raty-js@2.8.0/lib/jquery.raty.min.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">

    </head>
    <div id="background" class="bg-black absolute top-0 left-0 z-20 opacity-50"></div>
    <body class="text-slate-900">
        <header class="flex justify-around text-white bg-slate-900 items-center py-3 z-30 relative">
            <a href="/"><img src="{{asset('storage/logo.png')}}" class="w-20 h-auto block z-30"></a>
            <form class="w-[50%] flex rounded-sm z-30" id="wordarea" action="{{route('category_search')}}" method="GET">
                <div class="flex-1 relative">
                    @if(session('word') !== null)
                    <input type="text" value="{{ session('word')}}" name="word" id="word" class="w-full rounded-l-sm px-2 py-1 text-slate-800 outline-none placeholder-slate-500" placeholder="検索 Kauzon.co.jp" autocomplete="off">
                    @else
                    <input type="text" name="word" id="word" class="w-full rounded-l-sm px-2 py-1 text-slate-800 outline-none placeholder-slate-500" placeholder="検索 Kauzon.co.jp" autocomplete="off">
                    @endif
                    <div class="absolute z-50 w-full bg-white border border-slate-300 text-zinc-900 text-lg" id="result">
                    </div>
                </div>
                <button type="submit" class="w-10 bg-orange-300 flex items-center justify-center text-lg rounded-r-sm hover:bg-orange-400 cursor-pointer">🔍</button>
            </form>
            <nav>
                <ul class="flex gap-10 items-center justify-center">
                    @if(Auth::check())
                    <!-- <li id="menu" class="relative hover:outline-white hover:outline hover:outline-1 p-2">
                        <p class="cursor-pointer">メニュー</p>
                        <ul id="submenu" class="whitespace-nowrap p-5 hidden absolute text-slate-900 bg-white border border-gray-700 z-40">
                            <li><a href="{{route('history')}}" class="hover:underline hover:text-orange-700">購入履歴</a></li>
                            <li class="pt-3"><a href="" class="hover:underline hover:text-orange-700">再び購入</a></li>
                            <li class="pt-3"><a href="" class="hover:underline hover:text-orange-700">ユーザー情報</a></li>
                            <li class="pt-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="hover:underline hover:text-orange-700">ログアウト</button>
                                </form>
                            </li>
                        </ul>
                    </li> -->
                    <li class="hover:outline-white hover:outline hover:outline-1 p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button>ログアウト</button>
                                </form>
                            </li>
                    <li class="hover:outline-white hover:outline hover:outline-1 p-2"><a href="{{route('cart')}}">カート</a></li>
                    @else
                    <li class="hover:outline-white hover:outline hover:outline-1 p2"><a href="{{route('login')}}">ログイン</a></li>
                    @endif
                </ul>
            </nav>
        </header>

        <main class="min-h-screen pb-5 max-w-[1480px] mx-auto">
            @yield('content')
        </main>
        @if(!Auth::check())
        <div class="flex justify-center h-28 items-center my-4 border-y border-slate-300"><a href="{{route('login')}}"><button class="font-bold border border-amber-600 bg-amber-400 py-1 px-16">ログイン</button></a></div>
        @endif

        <div class="cursor-pointer bg-sky-950 text-white py-2 hover:bg-sky-900 text-center" id="js-pagetop">トップに戻る</div>
        <footer class="flex justify-center text-white bg-gray-900 items-center px-8 py-5">
            <small>© 2024 hatiman.ec. All Rights Reserved.</small>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js')
    </body>
</html>

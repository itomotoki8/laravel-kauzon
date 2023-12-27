<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <header class="flex justify-between text-white bg-slate-900 items-center py-3 px-8">
        <a href="/"><img src="{{asset('storage/logo.png')}}" class="w-20 h-auto block"></a>
            <input type="text" class="border border-slate-900 w-[50%] px-2 py-1 text-slate-800" placeholder="検索">
            <nav>
                <ul class="flex gap-10">
                    <li><a href="">お気に入り</a></li>
                    <li><a href="cart">カート</a></li>
                    <li><a href="">マイページ</a></li>
                    <li><a href="">ログイン</a></li>
                </ul>
            </nav>
        </header>
        <main class="min-h-screen pb-5">
            @yield('content')
        </main>
        <div class="flex justify-center h-28 items-center mb-4 mt-4 border-y border-slate-300"><button class="font-bold border border-amber-600 bg-amber-400 py-1 px-16"><a href="">ログイン</a></button></div>

        <div class="bg-sky-950 text-white py-2 hover:bg-sky-900"><a href="" class="w-full text-center block">トップに戻る</a></div>
        <footer class="flex justify-center text-white bg-gray-900 items-center px-8 py-5">
            <small>© 2024 hatiman.ec. All Rights Reserved.</small>
        </footer>
        @yield('js')
    </body>
</html>

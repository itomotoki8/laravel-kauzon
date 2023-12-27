@extends('layouts.app')
@section('content')
<div class="px-5 mt-10">
    <div class="flex gap-5 border-b border-slate-300 pb-5">
        <div class="w-1/3">
            <img class="w-full sticky top-0" src="{{$item->img_url}}" alt="">
        </div>
        <div class="flex-1">
            <h3 class="text-3xl">{{$item->name}}</h3>
            <div class="flex gap-5 mt-5"><div>4.0 ★★★★☆</div><span class="">10件の評価</span></div>

            <div class="border-y mt-5">
                <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{$item->price}}</p><p class="text-sm ml-2">税込</p></div>
            </div>

            <div class="mt-2">
                <h4 class="text-xl font-bold">この商品について</h4>
                <p>{{$item->body}}</p>
            </div>
        </div>
        <div class="w-1/5 border border-slate-300 rounded-lg p-5">
            <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{$item->price}}</p><p class="text-sm ml-2">税込</p></div>

            <div class="">
            <span>数量:</span>
            <select name="" id="" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 pr-5 pl-2">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </div>


            <div class="mt-12 text-center w-full">
                <button class="bg-yellow-400 hover:bg-yellow-500 font-bold py-2 w-full block rounded-full">
                    カートに入れる
                </button>

                <button class="bg-orange-400 hover:bg-orange-500 font-bold py-2 block w-full rounded-full mt-2">
                    今すぐ買う
                </button>
            </div>
            
        </div>
    </div>
    <div class="mt-5 flex">
        <div class="w-1/3">
            <h2 class="text-2xl mt-5 font-bold">カスタマーレビュー</h2>
            <div class="flex gap-5 mt-5"><div>4.0 ★★★★☆</div><span class="">10件の評価</span></div>
        </div>
        <div class="mt-5">
            <select name="" id="" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 pr-5 pl-2">
                <option value="top">トップレビュー</option>
                <option value="row">評価が低い</option>
                <option value="new">新しい順</option>
            </select>
            <div class="mt-11">
                <div class="mt-5">
                    <p>maruta</p>
                    <div>★★★★☆</div>
                    <div class="text-sm text-slate-500">2023年12月27日にレビュー済み</div>
                    <div class="mt-2">
                        <p>2脚購入し、ダイニングチェアとして使っています！<br>
                            座り心地最高です！<br>
                            体の大きな夫も、身長150センチのわたしも、大変満足です！！！
                        </p>
                    </div>
                </div>

                <div class="mt-5">
                    <p>souta</p>
                    <div class="text-orange-500">★★★★☆</div>
                    <div class="text-sm text-slate-500">2023年12月27日にレビュー済み</div>
                    <div class="mt-2">
                        <p>８０代にプレゼント。<br>
                            感想は、座り心地良くて、椅子に包まれるようで、脚は安定している。<br>
                            肘置きは根元が幅広くて先細なので、肘が安定する、10万円の価値があるなど、<br>
                            大好評。ただ、４隅の生地の絞り（丸め）がもう少し丸みがあると、もっと良い。
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('js/item.js') }}"></script>
@endsection
@endsection
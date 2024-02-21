@extends('layouts.app')
@section('content')
<div class="px-5 mt-10">
    <div class="flex gap-5 border-b border-slate-300 pb-5">
        <div class="w-1/3">
            <img class="w-full sticky top-0 min-w-[50%] max-h-[calc(100vh-40px)] 2xl:max-h-[calc(50vh)] object-contain" src="{{$item->img_url}}" alt="">
        </div>
        <div class="flex-1 max-w-[50%]">
            <h3 class="text-3xl break-words">{{$item->name}}</h3>
            <div class="flex mt-5 items-center"><p class="mr-2">{{$item->getAvgStar()}}</p><input value="{{$item->getAvgStar()}}" id="hint" type="hidden" /><div class="flex mr-5 star h-5"></div><p>{{$item->getCountReview()}}件の評価</p></div>

            <div class="border-y mt-5">
                <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{ number_format($item->price)}}</p><p class="text-sm ml-2">税込</p></div>
            </div>

            <div class="mt-2">
                <h4 class="text-xl font-bold">この商品について</h4>
                <ul class="list-disc list-inside">
                    @foreach($item->getBody() as $body)
                    <li class="mt-2">{{$body}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <form action="{{route('checkout')}}" method="post" class="w-1/5 border border-slate-300 rounded-lg p-5">
            @csrf
            <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{ number_format($item->price)}}</p><p class="text-sm ml-2">税込</p></div>

            @if($item->buy_num !== 1)
            <div class="">
                <span>数量:</span>
                <select name="num" id="num" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 px-2">
                @for ($i = 1; $i <= $item->buy_num; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
                </select>
            </div>
            @else
            <input type="hidden" name="num" id="num" value="1">
            @endif
            <input type="hidden" name="id" id="id" value="{{$item->id}}">
            <input type="hidden" id="bool" value="{{Auth::check()}}">


            <div class="mt-12 text-center w-full">
                <button type="button" id="cart" class="bg-yellow-400 hover:bg-yellow-500 font-bold py-2 w-full block rounded-full">
                    カートに入れる
                </button>

                <button type="submit" class="bg-orange-400 hover:bg-orange-500 font-bold py-2 block w-full rounded-full mt-2">
                    今すぐ買う
                </button>
            </div>
            
        </form>
    </div>

    <div class="border-b border-slate-300 py-5">
    <h4 class="text-xl font-bold">商品の説明</h4>
    <p class="mx-5 mt-5 inline-block text-sm">
        {!! nl2br(e($item->explanation)) !!}
    </p>
    </div>

    <div class="mt-5 flex gap-10 min-w-0">
        <div class="">
            <h2 class="text-2xl mt-5 font-bold">カスタマーレビュー</h2>
            <div class="flex mt-5 items-center"><p class="mr-2">{{$item->getAvgStar()}}</p><input value="{{$item->getAvgStar()}}" id="hint" type="hidden" /><div class="flex mr-5 star h-5"></div><p>{{$item->starCount}}件の評価</p></div>
            <p class="mt-5"><a href="{{route('review',$item->id)}}">カスタマーレビューをかく</a></p>
        </div>
        
        <div class="mt-5 flex-1 pr-5">
            <select name="" id="review" class="bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 pr-5 pl-2">
                <option value="top">トップレビュー</option>
                <option value="row">評価が低い</option>
                <option value="new">新しい順</option>
            </select>
            
            <div class="mt-5" id="reviewArea">

            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('js/item.js') }}"></script>
@endsection
@endsection
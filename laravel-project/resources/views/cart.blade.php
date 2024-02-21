@extends('layouts.app')
@section('content')
<div class="px-5">
    @if(isset($items))
    <div class="flex gap-5 pb-5">
        <div class="w-full">
            @foreach($items as $item)
            <div class="flex gap-5 border-b border-slate-300 py-10">
                <div class="w-1/3">
                    <img class="w-full sticky top-0 mx-auto min-w-[50%] h-[calc(100vh-40px)] object-contain" src="{{$item->img_url}}" alt="">
                </div>
                <div class="flex-1">
                    <h3 class="text-3xl">{{$item->name}}</h3>
                    <div class="flex mt-5 items-center"><p class="mr-2">{{$item->starAvg}}</p><input value="{{$item->starAvg}}" id="hint" type="hidden" /><div class="flex mr-5 star h-5"></div><p>{{$item->starCount}}件の評価</p></div>

                    <div class="border-y flex items-center gap-10 mt-2">
                        <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{ number_format($item->price)}}</p><p class="text-sm ml-2">税込</p></div>
                        <div class="">
                            <span>数量:</span>
                            <input type="hidden" value="{{$item->id}}">
                            <select name="" id="" class="select bg-slate-200 outline-none inline-block text-sm rounded-lg border border-slate-500 px-2">
                                @for ($i = 1; $i <= $item->buy_num; $i++)
                                @if($i == $item->num)
                                <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endfor
                            </select>


                        </div>
                        <form action="cart/{{$item->id}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$item->id}}">
                            <button class="hover:text-red-500 delete">削除</button>
                        </form>

                    </div>

                    <div class="mt-2">
                        <h4 class="text-xl font-bold">この商品について</h4>
                        <ul class="list-disc list-inside">
                            @foreach($item->body as $body)
                            <li class="mt-2">{{$body}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="w-1/5 border border-slate-300 rounded-lg p-5 h-screen sticky top-0 my-10">
            <div class="text-lg">カートの小計</div>
                <div class="flex items-center py-2"><span class="text-xs">￥</span><p id="total" class="text-2xl"></p><p class="text-sm ml-2">税込</p></div>

                    <form action="{{route('checkout')}}" method="POST" class="mt-12 text-center w-full">
                        @csrf
                        <button class="bg-orange-400 hover:bg-orange-500 font-bold py-2 block w-full rounded-full mt-2">レジに進む<span id="count"></span></button>
                    </form>                
            </div>
        </div>
    </div>
    @else
    <p class="text-center text-2xl">お客様のショッピングカートに商品はありません</p>
    @endif
</div>

    @section('js')
    <script src="{{ asset('js/cart.js') }}"></script>

    @endsection


@endsection
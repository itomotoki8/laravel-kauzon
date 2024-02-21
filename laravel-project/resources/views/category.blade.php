@extends('layouts.app')
@section('content')
<div class="px-12">
    <h2 class="text-3xl font-bold mt-4">{{$category_name}}</h2>
    <div class="flex flex-wrap mt-10">
        @foreach($items as $item)
        <div class="w-1/4 p-3 relative pb-9">
            <a href="{{route('item',$item->id)}}">
                <div class="max-h-64 h-full bg-slate-50 p-2">
                    <img src="{{$item->img_url}}" class="w-full h-full object-contain" alt="">
                </div>
            </a>
            <a href="{{route('item',$item->id)}}" class="hover:text-yellow-500">
                <p class="line-clamp-3 text-lg h-20 break-words">{{$item->name}}</p>
            </a>
            <div class="flex mt-2 items-center"><input value="{{$item->starAvg}}" id="hint" type="hidden" /><div class="flex mr-2 star h-4"></div><p>{{$item->starCount}}</p></div>
            <div class="flex items-center py-2"><span class="text-xs">￥</span><p class="text-3xl">{{$item->price}}</p><p class="text-sm ml-2">税込</p></div>
            
            <input type="hidden" value="{{$item->id}}">
            <button type="button" class="absolute bottom-0 cartButton bg-yellow-400 hover:bg-yellow-500 font-bold py-1 w-3/4 block rounded-full mx-auto ">
                カートに入れる
            </button>
        </div>
        @endforeach
    </div>
    {{$items->links('vendor.pagination.tailwind2')}}
</div>

@section('js')
<script src="{{ asset('js/category.js') }}"></script>
@endsection
@endsection
@extends('layouts.app')
@section('content')
<div class="px-5 mt-5">
    <h1>購入履歴</h1>
    <div class="mt-10 flex flex-col items-center gap-5">
    @foreach($histories as $history)
    <div class="flex items-center justify-around w-full" key="{{$history->id}}">
        <div class="h-40"><img src="{{$history->item->img_url}}" class="h-full" alt=""></div>
        <div class="">
            <p class="text-3xl">{{$history->item->name}}</p>
            <p>2024/01/18に購入済み</p>
        </div>
    </div>
    @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="px-5 mt-10">
  @isset($user_review)
  <div class="flex gap-10 justify-center items-center mb-6">
  <p class="text-2xl font-bold">レビューの編集</p>
  <p>{{$user_review->updated_at}}にレビュー済み</p>
  </div>
  @endisset
  <form class="w-4/5 mx-auto" method="POST">
    @csrf
    <h1 class="text-2xl font-bold">この商品をレビュー</h1>
    <div class="border-b border-slate-300 pb-5 pt-3">
      <div class="flex gap-5">
        <img src="{{$item->img_url}}" class="w-14 h-14 object-contain block" alt="">
        <p class="min-w-0 truncate mt-2">{{$item->name}}</p>
      </div>
    </div>
    <div class="border-b border-slate-300 pb-5 pt-3">
      <h2 class="text-lg font-bold mb-4">総合評価</h2>
      <div id="star" class="flex h-9"></div>
      <input name="score" id="hint" type="hidden" value="{{old('score')}}" />
      @if($errors->has('score'))
        <span class="text-red-600 mt-4 block">
          {{$errors->first('score')}}
        </span>
      @endif
    </div>
    <div class="border-b border-slate-300 pb-5 pt-3">
      <h2 class="text-lg font-bold mb-4">レビュータイトル</h2>
      @if(null !== old('title'))
      <input name="title" type="text" value="{{old('title')}}" class="px-2 focus:outline-orange-500 outline-1 py-1 rounded-md placeholder-slate-500 shadow-inner border border-slate-500 w-full font-medium" placeholder="最も伝えたいポイントは何ですか？" required />
      @elseif(@isset($user_review))
      <input name="title" type="text" value="{{$user_review->title}}" class="px-2 focus:outline-orange-500 outline-1 py-1 rounded-md placeholder-slate-500 shadow-inner border border-slate-500 w-full font-medium" placeholder="最も伝えたいポイントは何ですか？" required />      
      @else
      <input name="title" type="text" value="" class="px-2 focus:outline-orange-500 outline-1 py-1 rounded-md placeholder-slate-500 shadow-inner border border-slate-500 w-full font-medium" placeholder="最も伝えたいポイントは何ですか？" required />
      @endif
      @if($errors->has('title'))
        <span class="text-red-600 mt-4 block">
          {{$errors->first('title')}}
        </span>
      @endif
    </div>
    <div class="border-b border-slate-300 pb-5 pt-3">
      <h2 class="text-lg font-bold mb-4">レビューを追加</h2>
      @if(null !== old('body'))
      <textarea name="body" class="w-full h-32 border border-slate-500 shadow-inner px-2 py-1 focus:outline-orange-500" placeholder="気に入ったこと/気に入らなかったことは何ですか？この製品をどのように使いましたか？" required>{{old('body')}}</textarea>
      @else
      <textarea name="body" class="w-full h-32 border border-slate-500 shadow-inner px-2 py-1 focus:outline-orange-500" placeholder="気に入ったこと/気に入らなかったことは何ですか？この製品をどのように使いましたか？" required>@isset($user_review){{$user_review->review}}@endisset</textarea>
      @endif
      @if($errors->has('body'))
        <span class="text-red-600 mt-4 block">
          {{$errors->first('body')}}
        </span>
      @endif
    </div>
    <div class="text-right">
    <button type="submit" class="px-2 py-1 text-sm rounded-md bg-yellow-400 hover:bg-yellow-500 font-semibold mt-5">投稿</button>
    </div>
  </form>

</div>
@section('js')
<script src="{{ asset('js/review.js') }}"></script>
@endsection
@endsection 
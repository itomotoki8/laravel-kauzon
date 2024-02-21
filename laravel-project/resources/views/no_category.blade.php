@extends('layouts.app')
@section('content')
<div class="px-5 mt-10">
    <div class="flex flex-col items-center">
        <h2 class="text-xl mb-10">キーワードを絞るか、以下をお試しください。</h2>
        <p>{{session('word')}}の検索に一致する商品はありませんでした</p>
    </div>
</div>
@section('js')
<script src="{{ asset('js/item.js') }}"></script>
@endsection
@endsection
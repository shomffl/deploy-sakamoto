<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム編集画面</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="pt-16 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ルーム編集画面') }}
            </h2>
        </x-slot>
        <body>
        　　<div class="pt-6 pl-20 pb-4 pr-20">
            　　<form action="/rooms/{{ $room->id }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class='content__title'>
                            <h2 class="text-xl font-bold">タイトル</h2>
                            <input class='mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100' type='text' name='room[title]' value="{{ $room->title }}">
                            <p class="title__error" style="color:red">{{ $errors->first('room.title') }}</p>
                        </div>
                        <div class="category">
                        <h2 class="< text-xl font-bold">カテゴリ</h2>
                            <select class="pt-3 t-1 block rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100" name="room[category]">
                                <option value="選択されていません">選択してください</option>
                                <option value="プロ野球">プロ野球</option>
                                <option value="MLB">MLB</option>
                                <option value="高校野球">高校野球</option>
                                <option value="大学野球">大学野球</option>
                                <option value="Jリーグ">Jリーグ</option>
                                <option value="プレミアリーグ">プレミアリーグ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                        <div class='content__comment'>
                            <h2 class="pt-3 text-xl font-bold">コメント</h2>
                            <input class=' mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100' type='text' name='room[comment]' value="{{ $room->comment }}">
                            <p class="comment__error" style="color:red">{{ $errors->first('room.comment') }}</p>   
                        </div>
                        
                        <div class='content__team'>
                            <h2 class="pt-3 text-xl font-bold">チーム名１</h2>
                            <input class=' mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100' type='text' name='room[first_bench_team]' value="{{ $room->first_bench_team }}">
                            <p class="first_bench_team__error" style="color:red">{{ $errors->first('room.first_bench_team') }}</p>
                        </div>
                        <div class='content__team'>
                            <h2 class="pt-3 text-xl font-bold">チーム名２</h2>
                            <input class=' mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100' type='text' name='room[third_bench_team]' value="{{ $room->third_bench_team }}">
                            <p class="third_bench_team__error" style="color:red">{{ $errors->first('room.third_bench_team') }}</p>
                        </div>
                        <div class="pt-3">       
                            <input  class="float-left rounded-full py-3 px-6 px-2 py-2 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" type="submit" value="保存">
                        </div> 
                </form>
                <div class='pt-3 pb-3 px-2 py-2 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800'>
                    <a href="/chat/{{ $room->id }}">戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>

      
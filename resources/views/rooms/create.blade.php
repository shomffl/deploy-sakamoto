<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ルーム新規作成</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ルーム新規作成') }}
            </h2>
        </x-slot>
        <body>
            <div class="pt-6 pl-20 pb-4 pr-20">
                <form action="/chat" method="POST">
                    @csrf
                    <div class="title">
                        <h2 class="text-xl font-bold">タイトル</h2>
                        <input class="mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100" type="text" name="room[title]" placeholder="タイトルや日にちを書いてください" value="{{ old('room.title') }}">
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
                    <div class="comment">
                        <h2 class="pt-3 text-xl font-bold">コメント</h2>
                        <textarea class="mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100" name="room[comment]" placeholder="コメントを書いてください。">{{ old('room.comment') }}</textarea>
                        <p class="comment__error" style="color:red">{{ $errors->first('room.comment') }}</p>   
                    </div>
                    <div class="first_bench_team">
                        <h2 class="pt-3 text-xl font-bold">チーム名1</h2>
                        <textarea class="mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100" name="room[first_bench_team]" placeholder="例：巨人">{{ old('room.first_bench_team') }}</textarea>
                        <p class="first_bench_team__error" style="color:red">{{ $errors->first('room.first_bench_team') }}</p>
                    </div>
                    <div class="third_bench_team">
                        <h2 class="pt-3 text-xl font-bold">チーム名2</h2>
                        <textarea class="mt-1 block w-full rounded-md border-purple-500 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-100" name="room[third_bench_team]" placeholder="例：阪神">{{ old('room.third_bench_team') }}</textarea>
                        <p class="third_bench_team__error" style="color:red">{{ $errors->first('room.third_bench_team') }}</p>
                    </div>
                    <div class="pt-3">    
                        <input class='float-left px-2 py-2 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800' type="submit" value="ルームを作成"/>
                    </div> 
                    
                </form>
                <div class="">
                    <a class='px-2 py-2 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800' href="/">戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>

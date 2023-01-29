<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aioeo</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('新規作成') }}
            </h2>
        </x-slot>
        <body class="antialiased">
            <form action="/chat" method="POST">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="room[title]" placeholder="タイトルを書いてください">
                </div>
                    <div class="comment">
                       <h2>Comment</h2>
                       <textarea name="room[comment]" placeholder="コメントを書いてください。"></textarea>
                </div>
                <div class="first_bench_team">
                    <h2>チーム名</h2>
                       <textarea name="room[first_bench_team]" placeholder="例：巨人"></textarea>
                </div>
                <div class="third_bench_team">
                    <h2>チーム名</h2>
                       <textarea name="room[third_bench_team]" placeholder="例：阪神"></textarea>
                </div>
                <input type="submit" value="ルームを作成"/>
            </form>
            <div>
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>

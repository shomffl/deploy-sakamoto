<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>編集画面</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('編集画面') }}
            </h2>
        </x-slot>
        <body>
        　　<div class="content">
            　　<form action="/rooms/{{ $room->id }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class='content__title'>
                            <h2>タイトル</h2>
                            <input type='text' name='room[title]' value="{{ $room->title }}">
                            <p class="title__error" style="color:red">{{ $errors->first('room.title') }}</p>
                        </div>
                        <div class='content__comment'>
                            <h2>コメント</h2>
                            <input type='text' name='room[comment]' value="{{ $room->comment }}">
                            <p class="comment__error" style="color:red">{{ $errors->first('room.comment') }}</p>   
                        </div>
                        
                        <div class='content__comment'>
                            <h2>チーム名１</h2>
                            <input type='text' name='room[first_bench_team]' value="{{ $room->first_bench_team }}">
                            <p class="first_bench_team__error" style="color:red">{{ $errors->first('room.first_bench_team') }}</p>
                        </div>
                        <div class='content__comment'>
                            <h2>チーム名２</h2>
                            <input type='text' name='room[third_bench_team]' value="{{ $room->third_bench_team }}">
                            <p class="third_bench_team__error" style="color:red">{{ $errors->first('room.third_bench_team') }}</p>
                        </div>
                    <input type="submit" value="保存">
                </form>
                <div>
                    <a href="/chat/{{ $room->id }}">戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>

      
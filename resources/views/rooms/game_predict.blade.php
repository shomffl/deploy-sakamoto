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
                {{ __('予想をしよう！') }}
            </h2>
        </x-slot>
        <body class="antialiased">
            　 <div>
            　   <h1>勝敗予想</h1>
            　 </div>　
               <div>
                   <div class="first_bench_team">{{ $room->first_bench_team }}が勝利</div>
                   <div>カウント</div>
                   <form class="vote" action="/vote/0" method="POST">
                       @csrf
                       <input type="hidden" name="game_predict[room_id]" value="{{$room->id}}">
                       <button type="submit">投票する</button>
                   </form>
               </div>
               <div>
                   <div class="third_bench_team">{{ $room->third_bench_team }}が勝利</div>
                   <div>カウント</div>
                   <form class="vote" action="/vote/1" method="POST">
                       @csrf
                       <button type="submit">投票する</button>
                   </form>    
               </div>
        </body>
    </x-app-layout>
</html>
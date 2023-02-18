<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>試合結果予想</title>
        
    </head>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('予想をしよう！') }}
            </h2>
        </x-slot>
        <body class="antialiased">
            <div>
                　 <div class="border-solid  bg-violet-100  rounded-lg">
                　   <h1 class="text-center text-4xl">勝敗予想</h1>
                　 </div>
                        　 <div class="pt-1 pl-20 pb-1 pr-20 border-solid  bg-white  rounded-lg">
                               <div class="float-left pr-2 text-center">
                                   <div class="text-2xl">{{ $room->first_bench_team }}が勝利</div>
                                   <div class="text-5xl">{{ $total0 }}</div>
                                   <form class="vote" action="/game_predict/first_bench_team" method="POST">
                                       @csrf
                                           @if($choice === null)
                                                <input type="hidden" name="game_predict[room_id]" value="{{$room->id}}">
                                                <button class="text-2xl" type="submit">投票する</button>
                                           @else
                                                <p class="text-2xl font-color text-violet-600" >投票済み</p>
                                           @endif
                                   </form>
                               </div>
                               <div class="pr-2 text-center">
                                   <div class="text-2xl">{{ $room->third_bench_team }}が勝利</div>
                                   <div class="text-5xl">{{ $total1 }}</div>
                                   <form class="vote" action="/game_predict/third_bench_team" method="POST">
                                       @csrf
                                           @if($choice === null)
                                               <input type="hidden" name="game_predict[room_id]" value="{{$room->id}}">
                                               <button class="text-2xl" type="submit">投票する</button>
                                           @else
                                               <p class="text-2xl text-violet-600" >投票済み</p>
                                           @endif
                                   </form>    
                               </div>
                           </div>
                         
                   <div class="pt-1 pl-20 pb-1 pr-20">
                       <a href="/chat/{{ $room->id }}">チャット画面へ</a>
                   </div>
            </div>
        </body>
    </x-app-layout>
</html>
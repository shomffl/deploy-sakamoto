<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>room_info</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ルーム情報') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
        <body class="antialiased">
            <div>
                <h1>ルーム情報</h1>
            </div>
                <div>    
                    <div>
                        <h1 class='title'>{{ $room->title }}</h1>
                        <P class='comment'>{{ $room->comment }}</P>
                        <p class='name'>{{ $room->user }}</p>
                        <P>{{ $room->first_bench_team }} VS {{ $room->third_bench_team }}</P>
                        
                    </div>
                </div>
                <div>
                    <a href="/chat/{{ $room->id }}">ルームに入る</a>
                </div>
            <div>
                <a href="/">戻る</a>
            </div>   
               
        </body>
    </x-app-layout>
</html>
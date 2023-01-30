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
                {{ __('野球を見よう') }}
            </h2>
        </x-slot>
        <body class="antialiased">
            <div class="search">
                <form action="/" method="get">
                    @csrf
                    <div>
                        <input class="room_search" name="keyword" type="text" value="{{ $keyword }}">
                        <input class="search_button" type="submit" value="検索">
                    </div>
                </form>
            </div>
            <div>
                <div class='rooms'>
                    @foreach($rooms as $room)
                        <div class='room'>
                            <p class='created_at'>{{ $room->created_at }}</p>
                            <P class='title'>{{ $room->title }}</P>
                            <P class='comment'>{{ $room->comment }}</P>
                            <P>坂本真人</P>
                        </div>
                         <div>
                            <a href="rooms/{{ $room->id }}/preview">のぞいてみる</a>
                        </div>
                    @endforeach
                </div>
            <div>
                <p>
                    <a href="/rooms/create">作成</a>
                </p>
            </div>
        </body>
    </x-app-layout>
</html>
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
                            <a href="posts/{{ $room->id }}">のぞいてみる</a>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $rooms->links() }}
                </div>
            <div>
                <p>
                    <a href="/posts/create">作成</a>
                </p>
            </div>
        </body>
    </x-app-layout>
</html>
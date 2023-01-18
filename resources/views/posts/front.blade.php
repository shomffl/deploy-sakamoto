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
                <div>
                   <p>2011/11/20 18:00</p>
                   <P>野球を見よう</P>
                   <P>野球を見たい人大歓迎</P>
                   <P>坂本真人</P>
                </div>
                <div>
                    <a href="posts/room_info">のぞいてみる</a>
                </div>
            </div>
            <div>
                <div>
                   <p>2011/11/20 18:00</p>
                   <P>野球を見よう</P>
                   <P>野球を見たい人大歓迎</P>
                   <P>坂本真人</P>
                </div>
                <div>
                    <a href="">のぞいてみる</a>
                </div>
            </div>
            <div>
                <div>
                   <p>2011/11/20 18:00</p>
                   <P>野球を見よう</P>
                   <P>野球を見たい人大歓迎</P>
                   <P>坂本真人</P>
                </div>
                <div>
                    <a href="">のぞいてみる</a>
                </div>
            </div>
            
            <div>
                <p>
                    <a href="/posts/create">作成</a>
                </p>
            </div>
        </body>
    </x-app-layout>
</html>
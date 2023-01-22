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
                <div>
                    <h1 class='title'>{{ $room->title }}</h1>
                    <p class='name'>{{ $room->id }}</p>
                    <P class='comment'>{{ $room->comment }}</P>
                </div>
            </div>
        </div>
        <div class="chats">
            <ul>
                @foreach ($chats as $chat)
                    <li class="chat">{{ $chat->user->name }}   {{ $chat->body }}</li>
                    <li class="date">{{ $chat->created_at}}</li>
                @endforeach
            </ul>
        </div>
        <form class="chat_input" action="/input" method="POST">
            @csrf
            <input type="hidden" name="chat[user_id]" value="{{ $chat->user_id}}">
            <input type="hidden" name="chat[room_id]" value="{{ $chat->room_id}}">
            <input class="body" type="text" name="chat[body]">
            <button class="input" type="submit">送信</button>
        </form>
        <div>
            <a href="/">戻る</a>
        </div>   
               
        </body>
    </x-app-layout>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aioeo</title>
        
    </head>

    <x-app-layout>
        <body class="antialiased">
        <div>
            <div>    
                <div>
                    <h1 class='title'>{{ $room->title }}</h1>
                    <P class='comment'>{{ $room->comment }}</P>
                    <P class="team_info">{{ $room->first_bench_team}}vs{{ $room->third_bench_team}}</P>
                </div>
            </div>
        </div>
        <div>
            <a href="/game_predict/{{ $room->id }}">勝敗予想入力画面へ</a>
            
        </div>
        <div class="chats">
            <ul>
                @foreach ($chats as $chat)
                    <li class="chat">{{ $chat->user->name }}   {{ $chat->body }} 
                    @isset($game_predicts->where('user_id',$chat->user_id)->first()->choice)
                          @if($game_predicts->where('user_id',$chat->user_id)->first()->choice == 0)<p>勝敗予想：{{$room->first_bench_team}}勝利</P>
                          @else<p>勝敗予想：{{$room->third_bench_team}}勝利</P>
                          @endif
                    @else<a href="/rooms/game_predict/{{ $room->id }}">勝敗予想をしよう</a>
                    @endisset
                    </li>
                    <li class="date">{{ $chat->created_at }}</li>
                @endforeach
            </ul>
        </div>
        <form class="chat_input" action="/input" method="POST">
            @csrf
            <input type="hidden" name="chat[room_id]" value="{{$room->id}}">
            <input class="body" type="text" name="chat[body]" value="{{ old('chat.body') }}">
            <button class="input" type="submit">送信</button>
            <p class="body__error" style="color:red">{{ $errors->first('chat.body') }}</p>
        </form>
        <div>
            <a href="/">戻る</a>
        </div>   
        <div class="edit">
            <a href="/rooms/{{ $room->id }}/edit">編集画面へ</a>
        </div>
        </body>
    </x-app-layout>
</html>
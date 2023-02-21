<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>試合結果予想</title>
        
    </head>

    <x-app-layout>
        <body class="antialiased">
            <div class="pt-20 pl-20 pb-20 pr-20">
                　 <div class="border-solid  bg-white  rounded-lg">
                　   <h1 class="pr-10 text-center text-4xl">勝敗予想</h1>
                　 </div>
                        　 <div class="pt-1 pl-8 pb-1 pr-20 border-solid  bg-white  rounded-lg">
                               <div class="float-left pl-96 text-center">
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
                               <div class="text-center ">
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
                           <div class="pt-10 pr-10 text-center">
                               @if($choice == null)
                                  <P class="px-2 ml-2 mb-2 inline-flex bg-purple-600 rounded-lg text-2xl text-gray-50">まだ予想はされていません</P>
                               @else
                                      @if($choice == 0)　　
                                         <P class="px-2 ml-2 mb-2 inline-flex bg-purple-600 rounded-lg text-2xl text-gray-50">あなたは{{ $room->first_bench_team }}を勝利予想しました</P>
                                      @else
                                         <P class="px-2 ml-2 mb-2 inline-flex bg-purple-600 rounded-lg text-2xl text-gray-50">あなたは{{ $room->third_bench_team }}を勝利予想しました</P>
                                      @endif     
                               @endif
                           </div>
                           <div class="pt-10 pr-10 text-center">
                               <div class=' px-2 py-2 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800'>
                                   <a href="/chat/{{ $room->id }}">チャット画面へ</a>
                               </div>
                           </div>
            </div>
        </body>
    </x-app-layout>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>マイルーム</title>
        
    </head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ここではあなたが過去にコメント投稿をしたルームを最新順に表示しています。ルームが見当たらなくなった時にご活用下さい。') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
        <body class="antialiased">
            <div class="pt-1 pl-20 pb-1 pr-20">
                <div class="">
                    @foreach($myrooms as $myroom)
                        <div class=' pt-2 pb-2 border-solid  bg-white  rounded-lg'>
                            <p class='px-2 py-1 ml-2 mb-2 text-xs'>{{ $myroom->created_at }}</p>
                            <P class='px-2 py-1 ml-2 mb-2 text-2xl font-bold'>{{ $myroom->title }}</P>
                            <P class='px-2 py-1 ml-2 mb-2 text-lg font-bold'>{{ $myroom->comment }}</P>
                            <P class='px-2 py-1 ml-2 mb-2 text-xl font-bold'>{{ $myroom->first_bench_team }} VS {{ $myroom->third_bench_team }}</P>
                            <div class='px-2 py-1 ml-2 mb-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-purple-200 font-semibold text-purple-500 hover:text-white hover:bg-purple-500 hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800'><a href="/rooms/{{ $myroom->id }}/preview">のぞいてみる</a></div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <div class='paginate'>
                        {{ $myrooms->links() }}
                    </div>  
                </div>
            </div>
        </body>
    </x-app-layout>
</html>
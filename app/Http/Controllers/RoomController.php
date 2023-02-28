<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Chat;
use App\Models\Game_predict;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomController extends Controller
{
    use SoftDeletes;
    
    //フロント画面の処理
    public function front(Request $request, Room $room)
    {
        //キーワード検索の処理
        $keyword = $request->input('keyword');
        
        //ペジネーション
        if(!empty($keyword)){
            
            $rooms = $room->getPaginateByResult($keyword, 10);
        
        }else{ 
            
            $rooms = $room->getPaginateByLimit(10);
            
        }        
        
        //ルーム数の取得
        $roomsCount = $rooms->count();
         
        return view('rooms/front')->with(['rooms' => $rooms , 'keyword' => $keyword, 'roomsCount' => $roomsCount ]);
    }
    //新規作成画面の表示   
    public function create(Room $room)
    {
        return view('rooms/create')->with(['room' => $room]);
    }
    //ルーム新規作成
    public function store(RoomRequest $request)
    {
        //インスタンス化
        $input = new Room;
        
        $input->title = $request['room']['title'];
        
        $input->comment = $request['room']['comment'];
        
        $input->room_creator_name = auth()->user()->name;
        
        $input->category = $request['room']['category'];
        
        $input->first_bench_team = $request['room']['first_bench_team'];
        
        $input->third_bench_team = $request['room']['third_bench_team'];
        
        $input->save();
        
        
        return redirect('/chat/' . $input->id);
    
    }
    //ルーム詳細画面の表示
    public function room_info(Room $room)
    {
        return view('rooms/room_info')->with(['room' => $room]);
    }
    //チャット画面の処理
    public function chat(Room $room)
    {
        //チャット表示件数制限処理
        $id = $room->id;

        $chats = Chat::where('room_id', $id)->get();

        return view('rooms/chat')->with(['room' => $room,'chats' => $chats,'game_predicts' => $room->game_predicts]);
    }
    //ルーム編集画面の表示
    public function edit(Room $room)
    {
        return view('rooms/edit')->with(['room' => $room]);
    }
    //ルーム編集実行
    public function update(RoomRequest $request, Room $room)
    {
        //
        $input_room = $request['room'];
        
        $room->fill($input_room)->save();
        
        return redirect('/chat/'.$room->id);
    }
    //ルーム削除処理
    public function delete(Room $room)
    {
        //削除処理
        $room->delete();
        
        return redirect('/');
    }
}


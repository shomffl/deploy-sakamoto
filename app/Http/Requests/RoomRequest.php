<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{

    public function rules()
    {
        return [
            'room.title' => 'required|string|max:50',
            'room.comment' => 'required|string|max:100',
            'room.first_bench_team' => 'required|string|max:15',
            'room.third_bench_team' => 'required|string|max:15',
        ];
    }
}

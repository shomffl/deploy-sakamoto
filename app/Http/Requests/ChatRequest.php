<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'message' => 'required|string|max:40',
        ];
    }
}

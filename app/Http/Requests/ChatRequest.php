<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'body' => 'required|string|max:40',
        ];
    }
}

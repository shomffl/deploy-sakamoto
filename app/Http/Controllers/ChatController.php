<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    
    public function index()
    {
        return view('posts/front');
    }
    public function create()
    {
        return view('posts/create');
    }
}

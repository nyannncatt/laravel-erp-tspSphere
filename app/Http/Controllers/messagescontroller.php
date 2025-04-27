<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messagescontroller extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }
}

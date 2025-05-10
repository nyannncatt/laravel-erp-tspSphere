<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class feedController extends Controller
{
    public function index()
    {
        return view('admin.feed.index');
    }
}

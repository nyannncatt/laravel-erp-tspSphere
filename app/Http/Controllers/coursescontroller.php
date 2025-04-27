<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class coursescontroller extends Controller
{
    public function index()
    {
        return view('admin.courses.index');
    }
}
